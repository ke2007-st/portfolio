<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Post;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->get();
        $experiences = Experience::ordered()->get();
        $educations = Education::ordered()->get();
        $skills = Skill::ordered()->get();
        $posts = Post::published()->take(3)->get();

        $skillsByCategory = $skills->groupBy('category');

        return view('portfolio.index', compact(
            'projects',
            'experiences',
            'educations',
            'skills',
            'skillsByCategory',
            'posts'
        ));
    }

    public function blogIndex()
    {
        $posts = Post::published()->get();

        return view('portfolio.blog.index', compact('posts'));
    }

    public function showPost(string $slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();

        $related = Post::published()->where('id', '!=', $post->id)->take(2)->get();

        return view('portfolio.blog.show', compact('post', 'related'));
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'content' => 'required|string|max:5000',
        ]);

        \App\Models\Message::create($validated);

        return back()->with('success', 'Votre message a été envoyé avec succès. Je vous répondrai bientôt !');
    }
}
