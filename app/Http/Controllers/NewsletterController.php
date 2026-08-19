<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterRequest;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    public function store(StoreNewsletterRequest $request): RedirectResponse
    {
        Subscriber::query()->firstOrCreate([
            'email' => $request->validated('subscriber_email'),
        ]);

        return back()->with('newsletter_success', 'You are subscribed to our newsletter.');
    }
}
