@extends('layouts.app')

@section('title', 'Contact — Uprize Solutions')

@section('content')
    <section class="whiteSection contactSection" id="contact">
        <div class="contactSplit">
            <div class="contactCopy reveal">
                <p class="eyebrow dark">A conversation, not a ticket</p>
                <h1 class="header1">Let’s get your business in front of millions.</h1>
                <p class="paragraph">Tell us what you sell and who should find you. We’ll come back with a clear next step — site type, SEO, timeline.</p>
            </div>
            @include('partials.contact-form')
        </div>
    </section>
@endsection
