@extends('layouts.app')

@section('title', $project->title.' — Uprize Solutions')

@section('content')
    <section class="pageIntro detailIntro">
        <a href="{{ route('portfolio.index') }}" class="backLink reveal">Back to portfolio</a>
        <p class="eyebrow reveal">{{ $project->category }}</p>
        <h1 class="header1 reveal">{{ $project->title }}</h1>
        <div class="meta reveal">
            @if ($project->client){{ $project->client }}@endif
            @if ($project->year) · {{ $project->year }}@endif
            @if ($project->category) · {{ $project->category }}@endif
        </div>
    </section>
    <section class="whiteSection" id="detailSection">
        <div class="sectionContent detailContent">
            @if ($project->cover_image)
                <img class="detailCover" src="{{ $project->coverUrl() }}" alt="{{ $project->title }}">
            @endif
            <div class="markdown">
                {!! $project->htmlDescription() !!}
            </div>
            @if ($project->url)
                <a href="{{ $project->url }}" class="circleButton blueButton" target="_blank" rel="noopener noreferrer">Visit site</a>
            @endif
        </div>
    </section>
@endsection
