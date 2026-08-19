@extends('layouts.app')

@section('title', $post->title.' — Uprize Solutions')

@section('content')
    <section class="pageIntro detailIntro">
        <a href="{{ route('blog.index') }}" class="backLink reveal">Back to blog</a>
        <p class="eyebrow reveal">Journal</p>
        <h1 class="header1 reveal">{{ $post->title }}</h1>
        @if ($post->published_at)
            <div class="meta reveal">{{ $post->published_at->format('F j, Y') }}</div>
        @endif
    </section>
    <section class="whiteSection" id="detailSection">
        <div class="sectionContent detailContent">
            @if ($post->cover_image)
                <img class="detailCover" src="{{ $post->coverUrl() }}" alt="{{ $post->title }}">
            @endif
            <div class="markdown">
                {!! $post->htmlBody() !!}
            </div>
        </div>
    </section>
@endsection
