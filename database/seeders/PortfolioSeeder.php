<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Post;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedProjects();
        $this->seedExperiences();
        $this->seedEducation();
        $this->seedSkills();
        $this->seedPosts();
    }

    private function seedProjects(): void
    {
        Project::truncate();

        $projects = [
            [
                'title' => 'UNFLOW',
                'slug' => 'unflow',
                'description' => "Application mobile React Native conçue pour fluidifier l'expérience utilisateur autour d'un parcours ciblé. Architecture frontend modulaire, gestion d'état rigoureuse et UI soignée.",
                'technologies' => ['React Native', 'JavaScript', 'API REST'],
                'category' => 'Mobile App',
                'link_live' => null,
                'link_github' => 'https://github.com/ke2007-st',
                'status' => 'in_progress',
                'project_date' => '2026-06-15',
                'order_index' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'QUIZDASHBOARD',
                'slug' => 'quizdashboard',
                'description' => "Tableau de bord de quiz développé en PHP : création de quiz, gestion des questions, score et feedback. Logique serveur propre + UI dynamique côté client.",
                'technologies' => ['PHP', 'JavaScript', 'HTML', 'CSS'],
                'category' => 'Web Application',
                'link_live' => null,
                'link_github' => 'https://github.com/ke2007-st/QUIZDASHBOARD',
                'status' => 'complete',
                'project_date' => '2026-06-09',
                'order_index' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'Bibliothèque',
                'slug' => 'bibliotheque',
                'description' => "Application web de gestion d'une bibliothèque : catalogue, recherche, gestion des emprunts. JavaScript côté client pour l'interactivité.",
                'technologies' => ['JavaScript', 'HTML', 'CSS'],
                'category' => 'Web Application',
                'link_live' => null,
                'link_github' => 'https://github.com/ke2007-st/bibliotheque',
                'status' => 'complete',
                'project_date' => '2026-06-24',
                'order_index' => 3,
                'is_featured' => true,
            ],
            [
                'title' => 'API REST Flask',
                'slug' => 'api-rest-flask',
                'description' => "API REST développée avec Python/Flask : authentification, CRUD, gestion des erreurs et documentation des endpoints. Servie derrière Docker pour la reproductibilité.",
                'technologies' => ['Python', 'Flask', 'REST API', 'Docker'],
                'category' => 'Web Application',
                'link_live' => null,
                'link_github' => 'https://github.com/ke2007-st',
                'status' => 'complete',
                'project_date' => '2026-02-20',
                'order_index' => 4,
                'is_featured' => false,
            ],
            [
                'title' => 'Compteur électrique intelligent',
                'slug' => 'compteur-electrique-intelligent',
                'description' => "Projet système / IoT : concept de compteur électrique intelligent avec collecte de données, traitement et visualisation de la consommation. Réflexion sur l'architecture matérielle + logicielle.",
                'technologies' => ['Python', 'Systèmes', 'IoT'],
                'category' => 'System / IoT',
                'link_live' => null,
                'link_github' => null,
                'status' => 'in_progress',
                'project_date' => '2026-03-10',
                'order_index' => 5,
                'is_featured' => false,
            ],
            [
                'title' => 'Portfolio web interactif',
                'slug' => 'portfolio-web-interactif',
                'description' => "Portfolio web interactif avec curseur atomic/ionique (canvas), réseau de particules néon en arrière-plan, animations et UI néon moderne. Développé en Laravel + TailwindCSS.",
                'technologies' => ['Laravel', 'TailwindCSS', 'JavaScript', 'Canvas'],
                'category' => 'Web Application',
                'link_live' => null,
                'link_github' => 'https://github.com/ke2007-st',
                'status' => 'live',
                'project_date' => '2026-07-07',
                'order_index' => 6,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }

    private function seedExperiences(): void
    {
        Experience::truncate();

        $experiences = [
            [
                'title' => 'Stage Fullstack Developer (3 mois)',
                'company' => 'DKBS Solutions SA',
                'location' => 'Abidjan, Côte d\'Ivoire',
                'start_date' => '2026',
                'end_date' => null,
                'is_current' => false,
                'description' => "Stage de trois mois en développement fullstack chez DKBS Solutions SA, entreprise spécialisée dans les services de signature électronique. Découverte d'un environnement professionnel réel : contraintes de production, collaboration en équipe, intégration d'APIs et standards de qualité.",
                'highlights' => [
                    "Développement fullstack en environnement réel (contraintes production, code reviews, collaboration).",
                    "Intégration et consommation d'APIs REST côté frontend et backend.",
                    "Découverte du secteur de la signature électronique et de ses exigences techniques.",
                ],
                'order_index' => 1,
            ],
            [
                'title' => 'Développeur indépendant — Projets personnels',
                'company' => 'Freelance / Projets perso',
                'location' => 'Abidjan, Côte d\'Ivoire',
                'start_date' => '2025',
                'end_date' => null,
                'is_current' => true,
                'description' => "Conception et développement complet de plusieurs applications web, mobiles et systèmes : de l'architecture à l'UI/UX, en passant par la logique métier et l'intégration d'APIs. Stack principale : Laravel, React, React Native, Python/Flask.",
                'highlights' => [
                    "Applications complètes (frontend + backend + mobile) de bout en bout.",
                    "Architecture d'application, UI/UX travaillée, logique métier rigoureuse.",
                    "Déploiement sur Render / Railway, conteneurisation Docker pour certains projets.",
                ],
                'order_index' => 2,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }

    public function seedEducation(): void
    {
        Education::truncate();

        $education = [
            [
                'school' => 'Université Félix Houphouët-Boigny (UFHB)',
                'degree' => 'Licence MIAGE — Méthodes Informatiques Appliquées à la Création d\'Entreprise (Licence 2)',
                'start_year' => '2026',
                'end_year' => null,
                'description' => "Formation en informatique appliquée à l'entrepreneuriat : algorithmique, structures de données, génie logiciel, bases de données et conception de produits numériques.",
                'location' => 'Abidjan, Côte d\'Ivoire',
                'order_index' => 1,
            ],
        ];

        foreach ($education as $edu) {
            Education::create($edu);
        }
    }

    private function seedSkills(): void
    {
        Skill::truncate();

        $skills = [
            // Backend
            ['name' => 'Laravel', 'category' => 'backend', 'order_index' => 1],
            ['name' => 'PHP', 'category' => 'backend', 'order_index' => 2],
            ['name' => 'NestJS', 'category' => 'backend', 'order_index' => 3],
            ['name' => 'Next.js', 'category' => 'backend', 'order_index' => 4],
            ['name' => 'Python', 'category' => 'backend', 'order_index' => 5],
            ['name' => 'Flask', 'category' => 'backend', 'order_index' => 6],
            ['name' => 'Java & POO', 'category' => 'backend', 'order_index' => 7],
            ['name' => 'API REST', 'category' => 'backend', 'order_index' => 8],

            // Frontend
            ['name' => 'JavaScript', 'category' => 'frontend', 'order_index' => 1],
            ['name' => 'React', 'category' => 'frontend', 'order_index' => 2],
            ['name' => 'HTML5', 'category' => 'frontend', 'order_index' => 3],
            ['name' => 'CSS3', 'category' => 'frontend', 'order_index' => 4],
            ['name' => 'TailwindCSS', 'category' => 'frontend', 'order_index' => 5],
            ['name' => 'UI / UX Design', 'category' => 'frontend', 'order_index' => 6],

            // Mobile
            ['name' => 'React Native', 'category' => 'mobile', 'order_index' => 1],

            // Database
            ['name' => 'SQL', 'category' => 'database', 'order_index' => 1],
            ['name' => 'MySQL', 'category' => 'database', 'order_index' => 2],
            ['name' => 'PostgreSQL', 'category' => 'database', 'order_index' => 3],
            ['name' => 'MongoDB', 'category' => 'database', 'order_index' => 4],
            ['name' => 'SQLite', 'category' => 'database', 'order_index' => 5],
            ['name' => 'MariaDB', 'category' => 'database', 'order_index' => 6],
            ['name' => 'Modélisation de données', 'category' => 'database', 'order_index' => 7],

            // Outils & DevOps
            ['name' => 'Git', 'category' => 'outils', 'order_index' => 1],
            ['name' => 'GitHub', 'category' => 'outils', 'order_index' => 2],
            ['name' => 'Docker', 'category' => 'outils', 'order_index' => 3],
            ['name' => 'Render', 'category' => 'outils', 'order_index' => 4],
            ['name' => 'Railway', 'category' => 'outils', 'order_index' => 5],
            ['name' => 'Vercel', 'category' => 'outils', 'order_index' => 6],
            ['name' => 'Netlify', 'category' => 'outils', 'order_index' => 7],
            ['name' => 'Cloudflare', 'category' => 'outils', 'order_index' => 8],
            ['name' => 'VS Code', 'category' => 'outils', 'order_index' => 9],
            ['name' => 'JetBrains', 'category' => 'outils', 'order_index' => 10],

            // Systèmes & fundamentals
            ['name' => 'Windows', 'category' => 'systèmes', 'order_index' => 1],
            ['name' => 'Linux (Arch)', 'category' => 'systèmes', 'order_index' => 2],
            ['name' => 'Algorithmique', 'category' => 'systèmes', 'order_index' => 3],
            ['name' => 'Structures de données', 'category' => 'systèmes', 'order_index' => 4],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }

    private function seedPosts(): void
    {
        Post::truncate();

        $posts = [
            [
                'title' => 'Construire un portfolio qui sert vraiment',
                'slug' => 'construire-un-portfolio-qui-sert-vraiment',
                'excerpt' => "Un portfolio n'est pas une liste de projets. C'est une histoire cohérente qui montre votre capacité à résoudre des problèmes réels — voici ce que j'ai appris en construisant le mien.",
                'content' => "<p>Quand on est étudiant en licence et qu'on commence à chercher un stage, tout le monde vous dit la même chose : « il faut un portfolio ». Alors on ouvre un template, on liste ses projets de TP, on met un titre en gradient néon, et on envoie. Résultat ? Un site qui ne distingue pas grand-chose d'un autre.</p>

<h2>Le piège du portfolio-vitrine</h2>
<p>Le portfolio-vitrine, c'est celui qui énumère. « Projet 1 : site e-commerce. Projet 2 : application météo. Projet 3 : todo list en React. » Le visiteur passe trois secondes dessus et ressort. Pourquoi ? Parce qu'il n'y a <em>aucune histoire</em>. On ne sait pas quel problème le projet résolvait, ni ce que vous avez personnellement construit, ni ce que vous avez appris.</p>
<p>Un bon portfolio répond à trois questions, dans cet ordre :</p>
<ul>
<li><strong>Quel problème réel ce projet résout-il ?</strong></li>
<li><strong>Quelle a été votre part technique ?</strong> (pas celle de l'équipe, la vôtre)</li>
<li><strong>Qu'avez-vous appris, y compris en échouant ?</strong></li>
</ul>

<h2>Choisir ses projets</h2>
<p>Quand j'ai commencé le mien, je voulais tout mettre. Mes scripts Python de scraping, mes TP de fac, un vieux projet de quiz, une app mobile en cours… Mauvaise idée. Un portfolio n'est pas un GitHub : il doit raconter une trajectoire, pas être un dépôt d'archives.</p>
<p>J'ai gardé cinq projets. Pas plus. Chacun illustre une compétence différente : <strong>UNFLOW</strong> pour le mobile (React Native), <strong>ilawers</strong> pour l'IA appliquée au juridique, une <strong>API REST en Flask</strong> pour le backend propre, un <strong>quiz web</strong> pour la logique frontend pure, et le <strong>portfolio lui-même</strong> comme démonstration de capacité front/design.</p>

<h2>Montrer la sueur, pas seulement le résultat</h2>
<p>Le morceau que j'ai le plus travaillé, c'est la description. Pas le design. Pour chaque projet, je commence par le contexte (en une phrase), puis le problème technique, puis ce que j'ai choisi de faire et pourquoi. Si j'ai cassé quelque chose en route, je le dis. Les recruteurs techniques adorent ça : ça prouve que vous avez réellement mis les mains dans le code.</p>
<p>Exemple concret : sur l'API Flask, j'ai initialement tout mis dans un seul fichier <code>app.py</code>. Ça marchait. Puis j'ai voulu ajouter une authentification — et tout est devenu illisible. J'ai refactorisé en blueprint, c'est-à-dire que j'ai coupé le code en modules. C'est ce genre de moment que vous devez raconter. Pas « j'ai fait une API REST ».</p>

<h2>Le design doit servir, pas briller</h2>
<p>Mon portfolio est néon, sombre, avec un curseur en canvas qui orbite. C'est joli. Mais si demain j'enlevais toutes les animations, le contenu devrait continuer à se tenir. Le design est la couche supplémentaire qui fait dire « ce mec soigne le détail », pas celle qui cache un vide de contenu.</p>
<p>Si vous hésitez entre un template sexy et un site plat mais avec de vraies descriptions de projets : prenez le second. Tous les recruteurs vous diront la même chose.</p>

<h2>Ce que je referais différemment</h2>
<p>Trois choses. D'abord, <strong>écrire les descriptions avant de coder le site</strong>. On se rend compte très vite que certains projets ne méritent pas d'y figurer. Ensuite, <strong>mesurer l'impact</strong> — combien d'utilisateurs, quel gain de temps, même approximatif. Enfin, <strong>garder une version courte</strong> de chaque projet pour la lecture rapide, et une version longue accessible au clic. Je n'ai pas encore fait cette dernière, c'est ma prochaine itération.</p>

<p>En résumé : un portfolio n'est pas une liste, c'est une trajectoire. Choisissez peu de projets, expliquez-les honnêtement, et le design suivra.</p>",
                'reading_time' => 4,
                'published_at' => '2026-06-02',
                'is_published' => true,
            ],
            [
                'title' => 'Docker pour les développeurs juniors : ce que j\'aurais aimé savoir',
                'slug' => 'docker-pour-les-developpeurs-juniors',
                'excerpt' => "Docker m'a fait peur pendant six mois. Voici comment j'ai fini par l'utiliser vraiment — sans devenir devops, juste pour arrêter de casser mon environnement.",
                'content' => "<p>La première fois qu'on m'a parlé de Docker, j'ai fait ce que font beaucoup d'étudiants : j'ai ouvert la doc, j'ai vu des mots comme « cgroups », « namespaces », « union filesystem » — et j'ai refermé l'onglet. Six mois plus tard, j'ai croisé Docker dans un projet pro et je n'ai plus pu faire semblant. Voici le récit de ce passage, et les quelques principes qui m'auraient fait gagner du temps.</p>

<h2>Pourquoi on en a besoin, concrètement</h2>
<p>Le problème que Docker résout, ce n'est pas « déployer dans le cloud ». C'est <strong>« ça marche sur ma machine »</strong>. Vous installez PostgreSQL 16 chez vous, vous codez contre, vous poussez sur GitHub. Votre collègue tire le code, installe PostgreSQL 14, et rien ne marche. Docker coupe court à ça : vous décrivez votre environnement dans un fichier, et tout le monde obtient la même chose.</p>
<p>Pour un junior, le bénéfice est immédiat. Vous n'installez plus rien sur votre machine hôte. Vous ne corruptionnez plus votre Windows avec cinq versions de Python. Vous lancez un <code>docker compose up</code>, et la base, l'API, le frontend tournent.</p>

<h2>Les trois commandes qui changent tout</h2>
<p>Je m'étais noyé dans la doc. En réalité, pour démarrer, trois commandes suffisent :</p>
<pre><code>docker build -t mon-app .            # construire l'image
docker run -p 8080:80 mon-app         # lancer un conteneur
docker compose up                     # lancer tout un stack</code></pre>
<p>Avec ça, vous êtes opérationnel. Le reste (volumes, networks, multi-stage builds) vient quand vous en avez besoin — pas avant.</p>

<h2>L'erreur classique du débutant</h2>
<p>La première image que j'ai écrite faisait 1,4 Go. J'avais pris une image de base Ubuntu complète, j'avais installé Python avec apt, puis mes dépendances, puis mon code. Ça marchait. C'était monstrueux.</p>
<p>La règle : <strong>partez d'une image alpine</strong>. Pour Python, <code>python:3.12-slim</code> ou <code>python:3.12-alpine</code>. Pour Node, <code>node:20-alpine</code>. Vous passez de 1,4 Go à 120 Mo. Et vous réduisez la surface d'attaque en production, ce que les devs seniors vous reprocheront toujours de ne pas faire.</p>

<h2>Le <code>Dockerfile</code> minimal que j'utilise tout le temps</h2>
<pre><code>FROM python:3.12-slim

WORKDIR /app

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

CMD [\"python\", \"app.py\"]</code></pre>
<p>Rien de sorcier. Et c'est <em>exactement</em> ce qu'il faut pour 80% des projets étudiants. Les 20% restants (multi-stage, cache, build args) sont des optimisations, pas des prérequis.</p>

<h2><code>docker compose</code> : le moment déclic</h2>
<p>Le déclic, c'est quand j'ai compris que <code>docker compose</code> n'était pas une variante de Docker mais <strong>un orchestrateur de plusieurs conteneurs</strong>. Vous décrivez, dans un fichier YAML, votre API + votre base + votre frontend, et un seul <code>up</code> lance tout, dans le bon ordre, avec les bonnes variables d'environnement.</p>
<pre><code>services:
  api:
    build: .
    ports:
      - \"8000:8000\"
    environment:
      DATABASE_URL: postgresql://user:pass@db:5432/app
    depends_on:
      - db
  db:
    image: postgres:16-alpine
    environment:
      POSTGRES_PASSWORD: pass
    volumes:
      - db-data:/var/lib/postgresql/data

volumes:
  db-data:</code></pre>
<p>C'est ce fichier qui m'a fait passer de « j'installe des trucs » à « je décris mon système ». Et ça, c'est un vrai changement de mentalité — pas seulement une nouvelle commande.</p>

<h2>Le piège caché : les volumes</h2>
<p>On ne vous le dit pas tout de suite, mais si vous ne mettez pas de volume sur votre base, <strong>vous perdez toutes vos données à chaque <code>down</code></strong>. J'ai appris ça en perdant trois jours de données de test. Depuis, la ligne <code>volumes: - db-data:/var/lib/postgresql/data</code> est la première que j'ajoute. Toujours.</p>

<h2>Bref</h2>
<p>Docker n'est pas un sujet de devops. C'est un outil de propreté. Pour un junior, l'apprendre tôt, c'est arrêter de pourrir sa machine et commencer à livrer un environnement reproductible. Les concepts avancés viendront. Commencez par les trois commandes, et vous en saurez déjà plus que la moyenne des L2.</p>",
                'reading_time' => 5,
                'published_at' => '2026-05-15',
                'is_published' => true,
            ],
            [
                'title' => 'Laravel + React Native : brancher un frontend mobile sur une API REST',
                'slug' => 'laravel-react-native-api-rest',
                'excerpt' => "Comment faire dialoguer une API Laravel et une app React Native sans s'emmêler les pinceaux : CORS, tokens, gestion d'erreur et pièges classiques.",
                'content' => "<p>Quand j'ai commencé à travailler sur UNFLOW (une app React Native), j'ai vite eu besoin d'un backend. J'ai choisi Laravel, parce que c'est la stack que je connais le mieux côté serveur. La première fois qu'on met les deux en regard, on tombe sur trois problèmes bêtes qui vous font perdre une après-midi. Voici lesquels et comment les court-circuiter.</p>

<h2>Problème 1 : le CORS qui bloque tout</h2>
<p>Symptôme : votre app React Native appelle <code>http://localhost:8000/api/...</code>, et vous obtenez une erreur réseau incompréhensible. Le fetch ne renvoie rien. Vous soupçonnez un bug dans le téléphone. C'est en réalité <strong>CORS</strong> — Laravel bloque les requêtes venant d'une autre origine par défaut.</p>
<p>Solution : dans Laravel, installez le package officiel <code>fruitcake/laravel-cors</code> (ou utilisez le middleware CORS natif depuis Laravel 10+), et configurez <code>config/cors.php</code> :</p>
<pre><code>'paths' => ['api/*'],
'allowed_methods' => ['*'],
'allowed_origins' => ['*'],
'allowed_headers' => ['*'],
'supports_credentials' => true,</code></pre>
<p>En développement, <code>'*'</code> suffira. En production, remplacez par l'origine exacte de votre app.</p>

<h2>Problème 2 : <code>localhost</code> ne marche pas depuis un téléphone</h2>
<p>C'est le piège que tout le monde rencontre une fois. Votre téléphone n'a pas accès à <code>localhost</code> de votre PC, parce que pour lui, <code>localhost</code>, c'est lui-même. Solution : utilisez l'IP locale de votre machine sur le réseau Wi-Fi :</p>
<pre><code>const API_URL = __DEV__
  ? 'http://192.168.1.42:8000/api'
  : 'https://api.monsite.com';</code></pre>
<p>Pour trouver l'IP : <code>ipconfig</code> sur Windows, <code>ifconfig</code> sur macOS/Linux. Le téléphone et le PC doivent être sur le même réseau. Et n'oubliez pas de lancer Laravel avec <code>php artisan serve --host=0.0.0.0</code> pour qu'il accepte les connexions externes.</p>

<h2>Problème 3 : l'authentification</h2>
<p>Le scénario classique : votre app doit authentifier un utilisateur. Trois options s'offrent à vous :</p>
<ul>
<li><strong>Sanctum</strong> (recommandé pour une app mobile) : tokens par utilisateur, stockés côté mobile.</li>
<li><strong>JWT</strong> : tokens signés, sans état côté serveur. Plus standard, mais plus de plomberie.</li>
<li><strong>Session + cookies</strong> : déconseillé pour du mobile, conçu pour du web.</li>
</ul>
<p>Pour UNFLOW, j'ai utilisé Sanctum. La création d'un token se résume à :</p>
<pre><code>// routes/api.php
Route::post('/login', function (Request \$request) {
    \$user = User::where('email', \$request->email)->first();
    if (!Hash::check(\$request->password, \$user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    \$token = \$user->createToken('mobile-app')->plainTextToken;
    return response()->json(['token' => \$token]);
});</code></pre>
<p>Côté React Native, stockez le token avec <code>expo-secure-store</code> (pas <code>AsyncStorage</code> — les tokens en clair dans AsyncStorage sont une faille). Puis envoyez-le en header :</p>
<pre><code>fetch(API_URL + '/me', {
  headers: { Authorization: 'Bearer ' + token }
});</code></pre>

<h2>Gérer les erreurs proprement</h2>
<p>Le réflexe du débutant : attraper le 200 et ignorer le reste. En production mobile, ce qui compte, c'est ce qui se passe quand le réseau coupe, quand le serveur renvoie 500, quand le token expire. Voici le wrapper que j'utilise :</p>
<pre><code>async function apiCall(path, options = {}) {
  const res = await fetch(API_URL + path, {
    ...options,
    headers: {
      'Content-Type': 'application/json',
      Authorization: token ? 'Bearer ' + token : '',
      ...options.headers,
    },
  });
  if (res.status === 401) {
    // rediriger vers login
  }
  if (!res.ok) {
    const error = await res.json().catch(() => ({}));
    throw new Error(error.message || 'Erreur réseau');
  }
  return res.json();
}</code></pre>
<p>Une fonction, et toutes vos routes passent par là. Vous centralisez la gestion d'erreur, le header d'auth, et le parse JSON. Trois sources de bugs en moins.</p>

<h2>Le détail qui fait la différence : <code>loading</code> et <code>refreshing</code></h2>
<p>Vos utilisateurs n'attendent pas seulement que les données arrivent ; ils veulent <em>voir</em> que ça charge. Sur une <code>FlatList</code>, utilisez <code>refreshing</code> sur le <code>RefreshControl</code>. Sur les écrans, un <code>ActivityIndicator</code> quand <code>loading</code> est true. Ça paraît bête, mais c'est ce qui sépare une app qui fait pro d'une app qui fait étudiante.</p>

<h2>En résumé</h2>
<p>Laravel + React Native, c'est une stack très saine une fois qu'on a passé les trois écueils : CORS, <code>localhost</code>, et auth. Tout le reste, c'est de la discipline : un wrapper de fetch, des états de chargement explicites, et une gestion d'erreur centralisée. Pas de magie — juste de la méthode.</p>",
                'reading_time' => 6,
                'published_at' => '2026-04-08',
                'is_published' => true,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
