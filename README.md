# Jesse de Vries — Portfolio

Laravel 12 + Livewire 4 portfolio site with Tailwind CSS v4 and Vite.

## Requirements

- PHP 8.3+
- Composer
- Node.js 18+
- [Laravel Herd](https://herd.laravel.com) (recommended for local development)

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

Or use the setup script:

```bash
composer run setup
```

## Local development

With Laravel Herd, the site is available at `https://website.test` (or your project folder name in kebab-case).

To run the full dev stack (server, queue, logs, Vite):

```bash
composer run dev
```

## Commands

| Command | Description |
|--------|-------------|
| `composer run setup` | Install deps, env, key, migrate, npm build |
| `composer run dev` | Start server, queue, Pail, and Vite |
| `composer run test` | Run Pint (lint check), then Pest |
| `composer run review` | Pint, Rector, PHPStan, Pest |
| `composer run pint` | Format code with Laravel Pint |
| `composer run pest` | Run tests |
| `composer run rector` | Run Rector |
| `npm run dev` | Vite dev server |
| `npm run build` | Production assets |
