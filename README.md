# Uprize Solutions

Laravel site for Uprize Solutions — website development and SEO. We help businesses earn more revenue by making them visible on the internet.

## Requirements

- PHP 8.2+
- Composer

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Open http://localhost:8000

## Admin

Open http://localhost:8000/admin

After seeding, log in with:

- Email: `admin@uprize.test`
- Password: `password`

Change that password before using this on a live server.

## ImageKit

Project and blog cover images are stored on ImageKit when `IMAGEKIT_PRIVATE_KEY` is set in `.env`. Copy the placeholders from `.env.example` and fill in your public key, private key, and URL endpoint.

Without those keys, uploads fall back to local `storage/app/public`. Seeded demo images in `public/images` still load from the app.

## Pages

- `/` home
- `/portfolio` and `/portfolio/{slug}` work
- `/blog` and `/blog/{slug}` posts
- `/contact` contact form

Portfolio and blog content is stored in SQLite and loaded from database seeders. Add or edit rows there, then run `php artisan db:seed`.

## Mail

Contact messages use the `log` mailer by default (see `storage/logs/laravel.log`). Set `MAIL_TO_ADDRESS` in `.env` to the inbox that should receive them. Switch `MAIL_MAILER` to `smtp` when you have real credentials.
