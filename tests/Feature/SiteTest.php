<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use App\Models\Post;
use App\Models\Project;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_successful(): void
    {
        $this->get('/')->assertOk()->assertSee('Uprize Solutions');
    }

    public function test_portfolio_lists_published_projects(): void
    {
        $this->seed();

        $this->get('/portfolio')
            ->assertOk()
            ->assertSee('Harbor & Grain Bakery');
    }

    public function test_blog_lists_published_posts(): void
    {
        $this->seed();

        $this->get('/blog')
            ->assertOk()
            ->assertSee('Why your business still needs a website');
    }

    public function test_unpublished_project_returns_not_found(): void
    {
        $project = Project::query()->create([
            'title' => 'Hidden',
            'slug' => 'hidden',
            'excerpt' => 'Not public',
            'description' => 'Draft',
            'published_at' => null,
        ]);

        $this->get('/portfolio/'.$project->slug)->assertNotFound();
    }

    public function test_unpublished_post_returns_not_found(): void
    {
        $post = Post::query()->create([
            'title' => 'Draft',
            'slug' => 'draft',
            'excerpt' => 'Not public',
            'body' => 'Draft body',
            'published_at' => null,
        ]);

        $this->get('/blog/'.$post->slug)->assertNotFound();
    }

    public function test_contact_page_is_successful(): void
    {
        $this->get('/contact')->assertOk()->assertSee('Contact');
    }

    public function test_contact_form_sends_mail(): void
    {
        Mail::fake();

        $this->from('/contact')->post('/contact', [
            'firstname' => 'Jane',
            'lastname' => 'Smith',
            'email' => 'jane@example.com',
            'message' => 'I need a website for my shop.',
        ])->assertRedirect('/contact');

        Mail::assertSent(ContactMail::class);
    }

    public function test_contact_form_requires_fields(): void
    {
        $this->from('/contact')->post('/contact', [])
            ->assertRedirect('/contact')
            ->assertSessionHasErrors(['firstname', 'lastname', 'email', 'message']);
    }

    public function test_newsletter_stores_subscriber(): void
    {
        $this->from('/')->post('/newsletter', [
            'subscriber_email' => 'reader@example.com',
        ])->assertRedirect('/');

        $this->assertDatabaseHas(Subscriber::class, [
            'email' => 'reader@example.com',
        ]);
    }

    public function test_admin_login_is_accessible(): void
    {
        $this->get('/admin/login')->assertOk();
    }

    public function test_admin_requires_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_authenticated_user_can_open_admin(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk();
    }
}
