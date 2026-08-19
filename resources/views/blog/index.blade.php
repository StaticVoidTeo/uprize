@extends('layouts.app')

@section('title', 'Blog — Uprize Solutions')

@section('content')
    <section class="pageIntro">
        <p class="eyebrow reveal">Field notes</p>
        <h1 class="header1 reveal">Blog</h1>
        <p class="paragraph reveal">Notes on websites, SEO, and earning from being found.</p>
    </section>
    <section class="listingSection">
        @if ($posts->isEmpty())
            <p class="paragraph">Posts will appear here soon.</p>
        @else
            <div class="listingGrid">
                @foreach ($posts as $post)
                    <a href="{{ route('blog.show', $post) }}" class="card listingCard reveal">
                        @if ($post->cover_image)
                            <div class="listingMedia">
                                <img src="{{ $post->coverUrl() }}" alt="{{ $post->title }}">
                            </div>
                        @endif
                        <div class="listingCardBody">
                            @if ($post->published_at)
                                <div class="meta">{{ $post->published_at->format('M j, Y') }}</div>
                            @endif
                            <div class="header2">{{ $post->title }}</div>
                            <div class="paragraph">{{ $post->excerpt }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
@endsection
