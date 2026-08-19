<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Harbor & Grain Bakery',
                'slug' => 'harbor-grain-bakery',
                'excerpt' => 'A warm business site that lets a neighborhood bakery take orders and tell its story.',
                'description' => <<<'MD'
Harbor & Grain needed more than a Facebook page. We built a fast business website with a clear menu, seasonal specials, and a simple way for customers to get in touch.

## What we delivered

- Homepage and about pages that match the shop’s in-store look
- Mobile-first layout for customers searching on the go
- Contact form routed to the owner’s inbox
- Ongoing updates when the menu changes

The site is now the bakery’s main storefront online, and people who search for what they sell can actually find it.
MD,
                'client' => 'Harbor & Grain',
                'year' => 2025,
                'category' => 'Business Website',
                'cover_image' => 'images/shopping2.png',
                'url' => null,
                'published_at' => now()->subMonths(8),
            ],
            [
                'title' => 'Northline Outfitters',
                'slug' => 'northline-outfitters',
                'excerpt' => 'A secure store for outdoor gear, built to sell year-round without extra staff.',
                'description' => <<<'MD'
Northline Outfitters wanted to sell packs, layers, and trail accessories without standing behind a counter all day. We designed and launched an e-commerce site that handles catalog, checkout, and order email.

## What we delivered

- Product catalog with categories and search
- Secure checkout and payment flow
- Order confirmation emails
- Training so the team can add products themselves

The shop now takes orders around the clock, including weekends when the physical store is closed.
MD,
                'client' => 'Northline Outfitters',
                'year' => 2025,
                'category' => 'E-Commerce',
                'cover_image' => 'images/calendar2.png',
                'url' => null,
                'published_at' => now()->subMonths(5),
            ],
            [
                'title' => 'Elena Voss Photography',
                'slug' => 'elena-voss-photography',
                'excerpt' => 'A portfolio that puts the work first and makes it easy to book a session.',
                'description' => <<<'MD'
Elena needed a portfolio that loaded quickly and felt as considered as her photographs. We built a gallery-first site with collections, a short about page, and a booking inquiry form.

## What we delivered

- Full-width galleries with fast image loading
- Separate collections for weddings, portraits, and editorial
- Inquiry form with session type and date
- Hosting and image optimization

Clients now find the work, understand the process, and reach out without a long email chain.
MD,
                'client' => 'Elena Voss',
                'year' => 2024,
                'category' => 'Portfolio',
                'cover_image' => 'images/portfolio2.png',
                'url' => null,
                'published_at' => now()->subMonths(11),
            ],
            [
                'title' => 'Field Notes Studio',
                'slug' => 'field-notes-studio',
                'excerpt' => 'A blog and resource hub for a small studio that publishes weekly writing.',
                'description' => <<<'MD'
Field Notes Studio wanted a home for essays, project notes, and a mailing list. We built a blog with readable typography, categories, and a newsletter signup in the footer.

## What we delivered

- Article listing and long-form reading pages
- Categories and simple search
- Newsletter capture connected to their list
- Maintenance so publishing stays easy

The studio now publishes on a regular cadence and uses the site as the front door to new client work.
MD,
                'client' => 'Field Notes Studio',
                'year' => 2026,
                'category' => 'Blog',
                'cover_image' => 'images/blog2.png',
                'url' => null,
                'published_at' => now()->subMonths(2),
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->updateOrCreate(
                ['slug' => $project['slug']],
                $project,
            );
        }
    }
}
