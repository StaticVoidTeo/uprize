<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::query()->where('slug', 'website-and-marketing-belong-together')->delete();

        $posts = [
            [
                'title' => 'Why your business still needs a website',
                'slug' => 'why-your-business-still-needs-a-website',
                'excerpt' => 'Social profiles come and go. A website you own is still the most reliable way to be found — and to earn from it.',
                'body' => <<<'MD'
If your business is only on Instagram or Facebook, you are renting space on someone else’s platform. Algorithms change, accounts get limited, and customers who search your name often land nowhere useful.

A website is the place you control. It can explain what you do, show proof, and give people a way to contact you at 11 p.m. on a Sunday. Paired with SEO, it is how millions of people who have never heard of you can still find you.

## What a good site actually does

- Shows up when someone searches for your service
- Answers the questions a first-time visitor has
- Makes it obvious how to get in touch or buy
- Looks like a real business, not a placeholder

You do not need a huge site. You need a clear one that can be found. We build that so you can stay focused on the work you already do.
MD,
                'cover_image' => 'images/main_pic.png',
                'published_at' => now()->subDays(40),
            ],
            [
                'title' => 'A website nobody can find does not earn',
                'slug' => 'a-website-nobody-can-find-does-not-earn',
                'excerpt' => 'Design without search visibility is a locked room. SEO is how customers who are already looking arrive.',
                'body' => <<<'MD'
Plenty of companies will design a homepage and walk away. The site looks fine. Nobody arrives. Revenue does not move.

That is not a “marketing” problem in the ads-and-campaigns sense. It is a visibility problem. People type what they need into search every day. If your pages are slow, unstructured, or invisible to search engines, those people buy from someone else.

## What we actually do

1. Build a site that is fast, clear, and ready to convert.
2. Structure it so search engines can understand the business.
3. Use titles, headings, and pages that match how people search.
4. Launch it on the internet — a property you own.

We do not run ads or social campaigns. We help businesses earn more revenue by making them visible to millions of people already looking online.
MD,
                'cover_image' => 'images/shopping2.png',
                'published_at' => now()->subDays(22),
            ],
            [
                'title' => 'How long a website actually takes',
                'slug' => 'how-long-a-website-actually-takes',
                'excerpt' => 'Most sites land in two to four weeks. Here is what stretches a timeline, and what we lock in before we start.',
                'body' => <<<'MD'
The honest answer is: it depends on the scope, but it should never be a mystery.

For a typical business or landing site we plan **2–4 weeks**. A store, a news-like publication, or a more custom build often lands in **4–8 weeks**. We give you a timeline before work starts so you know what to expect.

## What keeps a project on track

- A clear list of pages and features before design begins
- Content (words, photos, logo) arriving when we ask for it
- One person on your side who can approve decisions
- No surprise feature list in week three

## What we handle so you don’t have to

The build, the SEO foundations, and getting the site onto the internet. You should not need to learn a control panel just to get found.

If you are unsure where your project sits, get in touch with a short description. We will tell you what it likely involves and how long it should take.
MD,
                'cover_image' => 'images/calendar2.png',
                'published_at' => now()->subDays(8),
            ],
        ];

        foreach ($posts as $post) {
            Post::query()->updateOrCreate(
                ['slug' => $post['slug']],
                $post,
            );
        }
    }
}
