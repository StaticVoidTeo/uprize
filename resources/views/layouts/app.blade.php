<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Uprize Solutions')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=Outfit:wght@300;400;500;600&family=Syne:wght@500;600;700;800&display=swap">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <noscript><style>.reveal{opacity:1;transform:none}</style></noscript>
    <script src="https://kit.fontawesome.com/96e370b9f1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="atmosphere" aria-hidden="true">
        <div class="orb orb-a"></div>
        <div class="orb orb-b"></div>
        <div class="orb orb-c"></div>
        <div class="gridOverlay"></div>
        <div class="noise"></div>
    </div>
    <header>
        <div class="headerContent">
            <a href="{{ route('home') }}" class="logoLink">
                <img src="{{ asset('images/uprize_logo_white.png') }}" width="120" alt="Uprize Solutions">
            </a>
            <div class="menuAndBtn">
                <nav class="headerMenu">
                    <a href="{{ route('home') }}" class="menuItem {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('portfolio.index') }}" class="menuItem {{ request()->routeIs('portfolio.*') ? 'active' : '' }}">Portfolio</a>
                    <a href="{{ route('blog.index') }}" class="menuItem {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a>
                    <a href="{{ route('contact') }}" class="menuItem {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    <a href="{{ route('home') }}#what-we-offer" class="menuItem">Services</a>
                    <a href="{{ route('home') }}#how-it-works" class="menuItem">Process</a>
                    <a href="{{ route('home') }}#why-us" class="menuItem">Why us</a>
                    <a href="{{ route('home') }}#faq" class="menuItem">FAQ</a>
                </nav>
                <a href="{{ request()->routeIs('home') ? '#contact' : route('contact') }}" class="circleButton whiteButton">Get Started</a>
                <div class="menuIcon" role="button" aria-label="Open menu">
                    <div id="line1" class="hl"></div>
                    <div id="line2" class="hl"></div>
                    <div id="line3" class="hl"></div>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="footerGlow" aria-hidden="true"></div>
        <div class="newsLetterPart">
            <p class="eyebrow">Stay close</p>
            <div class="header1">Notes on websites, SEO, and getting found</div>
            @if (session('newsletter_success'))
                <p class="alert alertSuccess">{{ session('newsletter_success') }}</p>
            @endif
            <form class="newsLetter" action="{{ route('newsletter.store') }}" method="POST">
                @csrf
                <input name="subscriber_email" type="email" value="{{ old('subscriber_email') }}" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
            </form>
            @error('subscriber_email')
                <p class="fieldError">{{ $message }}</p>
            @enderror
        </div>
        <div class="footerBar">
            <p>&copy; {{ date('Y') }} Uprize Solutions. All rights reserved.</p>
            <nav class="footerNav">
                <a href="{{ route('home') }}#what-we-offer">Services</a>
                <a href="{{ route('home') }}#seo">SEO</a>
                <a href="{{ route('portfolio.index') }}">Portfolio</a>
                <a href="{{ route('blog.index') }}">Blog</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
