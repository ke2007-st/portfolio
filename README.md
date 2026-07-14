# Portfolio Neon — Laravel + MySQL + Tailwind

Portfolio dynamique au design **dark tech / futuriste** (noir, cyan néon, violet électrique), inspiré du thème Solar Forge. Construit avec **Laravel 13**, **MySQL**, **Tailwind CSS 4** et **Alpine.js**, déployable sur **Laragon / Apache**.

## Stack technique

| Couche | Technologie |
|--------|-------------|
| Framework | Laravel 13 (PHP 8.3) |
| Base de données | MySQL 8.4 (via Laragon) |
| Frontend | Blade + Tailwind CSS 4 + Alpine.js |
| Fonts | Inter (corps) + Orbitron (titres) |
| Build | Vite 8 |

## Palette de couleurs

- Noir fond : `#050505`
- Surface : `#0a0a0f`
- Cartes : `#111118`
- Cyan néon : `#00f0ff`
- Bleu néon : `#0066ff`
- Violet électrique : `#8b5cf6`

## Structure

```
app/
├── Http/Controllers/PortfolioController.php
└── Models/
    ├── Project.php
    ├── Experience.php
    ├── Education.php
    ├── Skill.php
    ├── Post.php
    └── Message.php

database/
├── migrations/
│   ├── create_projects_table.php
│   ├── create_experiences_table.php
│   ├── create_education_table.php
│   ├── create_skills_table.php
│   ├── create_messages_table.php
│   └── create_posts_table.php
└── seeders/PortfolioSeeder.php

resources/views/
├── layouts/app.blade.php
└── portfolio/
    ├── index.blade.php
    └── partials/
        ├── navbar.blade.php
        └── footer.blade.php
```

## Sections du portfolio

- **Hero** : nom, statut "Open to work", CTA et liens sociaux
- **À propos** : description et statistiques
- **Expérience** : timeline verticale alternée avec glow néon
- **Projets** : grille de cartes avec badges de statut et technologies
- **Éducation** : cartes avec icône diplôme et dégradé violet
- **Compétences** : badges organisés par catégorie
- **Activité GitHub** : heatmap simulé en cyan néon
- **Blog** : 3 derniers articles publiés
- **Contact** : formulaire qui enregistre dans MySQL

## Installation

### Prérequis

- Laragon (Apache + MySQL + PHP 8.3)
- Composer
- Node.js / npm

### Étapes

```bash
# 1. Démarrer MySQL via Laragon

# 2. Créer la base de données
mysql -u root -e "CREATE DATABASE portfolio_neon CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 3. Installer les dépendances PHP
composer install

# 4. Installer les dépendances JS
npm install

# 5. Configurer .env (DB_DATABASE=portfolio_neon, DB_USERNAME=root, DB_PASSWORD=)

# 6. Migrations + seeders
php artisan migrate:fresh --seed

# 7. Compiler les assets
npm run build   # production
npm run dev     # développement (hot reload)

# 8. Servir en local
php artisan serve
# → http://127.0.0.1:8000
```

## Déploiement sur Apache (Laragon)

1. Placer le projet dans `C:\laragon\www\portfolio-neon` (déjà fait)
2. Le `DocumentRoot` doit pointer vers `public/`
3. Activer `mod_rewrite` dans Apache
4. Accès via `http://portfolio-neon.test` (Laragon auto-virtualhosts) ou `http://localhost/portfolio-neon/public`
5. Sur le serveur de production, régler `APP_ENV=production` et `APP_DEBUG=false` dans `.env`

## Comptes de test

- Email admin : `admin@portfolio.test` (créé par le DatabaseSeeder)

## Routes

| Méthode | URL | Description |
|---------|-----|-------------|
| GET | `/` | Page principale du portfolio |
| POST | `/contact` | Soumission du formulaire de contact |

## Personnalisation

- **Couleurs** : `resources/css/app.css` (section `@theme`)
- **Données** : modifier en base via un admin (à venir) ou via les seeders
- **Polices** : `vite.config.js`
