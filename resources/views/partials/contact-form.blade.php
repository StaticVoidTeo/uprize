<form id="contactForm" class="reveal" action="{{ route('contact.store') }}" method="POST">
    @unless (request()->routeIs('home'))
        <p class="eyebrow dark">Start a project</p>
        <div class="header1">Contact</div>
        <div class="paragraph">What you sell, who should find you, and the kind of site you need.</div>
    @else
        <div class="header1 contactFormTitle">Contact</div>
        <div class="paragraph">What you sell, who should find you, and the kind of site you need.</div>
    @endunless
    @if (session('success'))
        <p class="alert alertSuccess">{{ session('success') }}</p>
    @endif
    <div class="namePart">
        <div class="labelAndInput">
            <label for="firstname">First name</label>
            <input name="firstname" id="firstname" type="text" value="{{ old('firstname') }}" placeholder="Jane" required>
            @error('firstname')
                <span class="fieldError">{{ $message }}</span>
            @enderror
        </div>
        <div class="labelAndInput">
            <label for="lastname">Last name</label>
            <input name="lastname" id="lastname" type="text" value="{{ old('lastname') }}" placeholder="Smith" required>
            @error('lastname')
                <span class="fieldError">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="labelAndInput">
        <label for="email">Email address</label>
        <input name="email" id="email" type="email" value="{{ old('email') }}" placeholder="youremail@gmail.com" required>
        @error('email')
            <span class="fieldError">{{ $message }}</span>
        @enderror
    </div>
    <div class="labelAndInput">
        <label for="textarea">Your message</label>
        <textarea name="message" rows="6" id="textarea" placeholder="What you sell, who should find you, and the site you need..." required>{{ old('message') }}</textarea>
        @error('message')
            <span class="fieldError">{{ $message }}</span>
        @enderror
    </div>
    <button class="submitBtn" type="submit">Submit</button>
</form>
