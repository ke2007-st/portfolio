<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ImportGithubProjects extends Command
{
    protected $signature = 'portfolio:import-github
        {username : GitHub username (e.g. octocat)}
        {--forks : Include forked repositories}
        {--limit=0 : Max number of projects to import (0 = all)}
        {--token= : GitHub Personal Access Token (optional, raises rate limits)}';

    protected $description = 'Import a GitHub user\'s public repositories into the projects table.';

    public function handle(): int
    {
        $username = (string) $this->argument('username');
        $includeForks = (bool) $this->option('forks');
        $limit = (int) $this->option('limit');
        $token = $this->option('token');

        $this->info("Fetching public repositories for GitHub user '{$username}'...");

        $repos = $this->fetchRepos($username, $token);
        if ($repos === null) {
            $this->error('Failed to fetch repositories. Check the username and try again.');
            return self::FAILURE;
        }

        if (empty($repos)) {
            $this->warn('No public repositories found for this user.');
            return self::SUCCESS;
        }

        // Filter
        $filtered = array_values(array_filter($repos, function ($r) use ($includeForks) {
            if (!$includeForks && !empty($r['fork'])) {
                return false;
            }
            return true;
        }));

        // Sort: pushed_at desc (most recently active first), then stars
        usort($filtered, function ($a, $b) {
            $pa = strtotime($a['pushed_at'] ?? '1970-01-01');
            $pb = strtotime($b['pushed_at'] ?? '1970-01-01');
            if ($pa === $pb) {
                return ($b['stargazers_count'] ?? 0) <=> ($a['stargazers_count'] ?? 0);
            }
            return $pb <=> $pa;
        });

        if ($limit > 0) {
            $filtered = array_slice($filtered, 0, $limit);
        }

        if (empty($filtered)) {
            $this->warn('No repositories left after filtering (try --forks to include forks).');
            return self::SUCCESS;
        }

        $this->info(sprintf('Importing %d repo(s)...', count($filtered)));

        Project::truncate();

        $imported = 0;
        foreach ($filtered as $i => $repo) {
            $technologies = $this->technologiesFor($repo);
            $status = $this->statusFor($repo);
            $category = $this->categoryFor($repo, $technologies);
            $date = !empty($repo['pushed_at']) ? substr($repo['pushed_at'], 0, 10) : (
                !empty($repo['created_at']) ? substr($repo['created_at'], 0, 10) : date('Y-m-d')
            );

            $title = $repo['name'] ?? 'Untitled';
            $description = !empty($repo['description'])
                ? $repo['description']
                : 'Projet personnel — voir le dépôt GitHub pour les détails.';

            Project::create([
                'title'        => $title,
                'slug'         => $this->uniqueSlug($title),
                'description'  => $description,
                'technologies' => $technologies,
                'image'        => null,
                'category'     => $category,
                'link_live'    => !empty($repo['homepage']) ? $repo['homepage'] : null,
                'link_github'  => $repo['html_url'] ?? null,
                'status'       => $status,
                'project_date' => $date,
                'order_index'  => $i + 1,
                'is_featured'  => $i < 3, // top 3 as featured
            ]);
            $imported++;
        }

        $this->newLine();
        $this->info("Done. Imported {$imported} project(s).");
        $this->line('View them at http://localhost:8000#projects');

        return self::SUCCESS;
    }

    /**
     * Fetch all public repos for a user (handles pagination).
     *
     * @return array|null
     */
    private function fetchRepos(string $username, ?string $token): ?array
    {
        $headers = [
            'Accept' => 'application/vnd.github+json',
            'User-Agent' => 'portfolio-neon-import',
        ];
        if ($token) {
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        $all = [];
        $page = 1;
        $perPage = 100;

        while (true) {
            $url = sprintf(
                'https://api.github.com/users/%s/repos?per_page=%d&page=%d&sort=pushed&direction=desc',
                urlencode($username),
                $perPage,
                $page
            );

            $resp = Http::withHeaders($headers)->get($url);

            if ($resp->status() === 404) {
                $this->error("GitHub user '{$username}' not found (404).");
                return null;
            }
            if ($resp->status() === 403) {
                $this->error('GitHub API rate limit hit (403). Wait a bit or pass --token=<PAT>.');
                return null;
            }
            if (!$resp->successful()) {
                $this->error('GitHub API error: HTTP ' . $resp->status());
                return null;
            }

            $batch = $resp->json();
            if (!is_array($batch) || empty($batch)) {
                break;
            }
            foreach ($batch as $repo) {
                $all[] = $repo;
            }
            if (count($batch) < $perPage) {
                break;
            }
            $page++;
            if ($page > 10) {
                break; // safety cap (1000 repos)
            }
        }

        return $all;
    }

    private function technologiesFor(array $repo): array
    {
        $techs = [];
        if (!empty($repo['language'])) {
            $techs[] = $repo['language'];
        }
        if (!empty($repo['topics']) && is_array($repo['topics'])) {
            foreach ($repo['topics'] as $t) {
                if (count($techs) >= 6) {
                    break;
                }
                if (!in_array($t, $techs, true)) {
                    $techs[] = $t;
                }
            }
        }
        return array_slice($techs, 0, 6);
    }

    private function statusFor(array $repo): string
    {
        if (!empty($repo['archived'])) {
            return 'complete';
        }
        $pushed = strtotime($repo['pushed_at'] ?? '1970-01-01');
        $sixMonthsAgo = strtotime('-6 months');
        if ($pushed >= $sixMonthsAgo) {
            return 'in_progress';
        }
        return 'complete';
    }

    private function categoryFor(array $repo, array $techs): string
    {
        $lang = strtolower($repo['language'] ?? '');
        $all = implode(' ', array_map('strtolower', $techs));

        if (str_contains($all, 'react native') || str_contains($all, 'flutter') || str_contains($all, 'swift') || str_contains($all, 'kotlin')) {
            return 'Mobile App';
        }
        if (str_contains($all, 'docker') || str_contains($all, 'kubernetes') || str_contains($all, 'terraform') || str_contains($all, 'ansible')) {
            return 'DevOps Tool';
        }
        if ($lang === 'python' || str_contains($all, 'tensorflow') || str_contains($all, 'pytorch') || str_contains($all, 'machine learning')) {
            return 'AI / Data';
        }
        if (str_contains($all, 'unity') || str_contains($all, 'godot') || str_contains($all, 'unreal')) {
            return 'Game';
        }
        return 'Web Application';
    }

    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title);
        if (empty($base)) {
            $base = 'project';
        }
        $slug = $base;
        $i = 1;
        while (Project::where('slug', $slug)->exists()) {
            $slug = $base . '-' . (++$i);
        }
        return $slug;
    }
}
