@extends('layouts.app')

@section('title', 'Portfolio — Uprize Solutions')

@section('content')
    <section class="pageIntro">
        <p class="eyebrow reveal">Selected work</p>
        <h1 class="header1 reveal">Portfolio</h1>
        <p class="paragraph reveal">Sites built to be found — landing pages, stores, portfolios, blogs, and more.</p>
    </section>
    <section class="listingSection">
        @if ($projects->isEmpty())
            <p class="paragraph">Projects will appear here soon.</p>
        @else
            <div class="listingGrid">
                @foreach ($projects as $project)
                    <a href="{{ route('portfolio.show', $project) }}" class="card listingCard reveal">
                        @if ($project->cover_image)
                            <div class="listingMedia">
                                <img src="{{ $project->coverUrl() }}" alt="{{ $project->title }}">
                            </div>
                        @endif
                        <div class="listingCardBody">
                            @if ($project->category)
                                <div class="meta">{{ $project->category }}</div>
                            @endif
                            <div class="header2">{{ $project->title }}</div>
                            <div class="paragraph">{{ $project->excerpt }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
@endsection
