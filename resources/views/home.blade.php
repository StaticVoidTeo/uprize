@extends('layouts.app')

@section('title', 'Uprize Solutions')

@section('content')
    <section id="mainSection">
        <div class="leftSide reveal">
            <p class="eyebrow">Websites + SEO</p>
            <h1 class="header1">Get visible to <em>millions</em>. Earn more from it.</h1>
            <p class="paragraph">
                We help businesses earn more revenue by making them visible to millions of people on the internet. We build the site. We set it up to be found. You get in front of customers who are already looking.
            </p>
            <div class="heroActions">
                <a href="#contact" class="circleButton whiteButton">Get in contact</a>
                <a href="{{ route('portfolio.index') }}" class="circleButton ghostButton">See the work</a>
            </div>
            <div class="heroStats">
                <div>
                    <strong>2–4 wks</strong>
                    <span>Typical launch</span>
                </div>
                <div>
                    <strong>SEO built in</strong>
                    <span>Found, not hidden</span>
                </div>
                <div>
                    <strong>Any site type</strong>
                    <span>Shop, studio, news, more</span>
                </div>
            </div>
        </div>
        <div class="rightSide reveal" id="screenshots">
            <div class="heroVisual">
                <div class="heroGlow"></div>
                <img id="mainPic" class="heroShot" src="{{ asset('images/main_pic.png') }}" width="560" alt="Website preview">
            </div>
        </div>
    </section>

    <section id="servicesMarquee" class="marqueeSection" aria-hidden="true">
        <div class="marqueeTrack">
            <div class="header1">Websites — SEO — E-commerce — Landing pages — Portfolios — Blogs — News —</div>
            <div class="header1">Websites — SEO — E-commerce — Landing pages — Portfolios — Blogs — News —</div>
        </div>
    </section>

    <section class="whiteSection" id="the-cost">
        <div class="sectionContent">
            <div class="sectionHeading reveal">
                <p class="eyebrow dark">The real problem</p>
                <h2 class="header1">If people cannot find you, they buy from someone they can.</h2>
            </div>
            <div class="opportunities">
                <div class="opportunity reveal">
                    <span class="index">No website</span>
                    <div class="header1">You are invisible</div>
                    <div class="paragraph">Search, maps, and word of mouth all dead-end. The sale goes to the business that shows up.</div>
                </div>
                <div class="opportunity reveal">
                    <span class="index">A site nobody finds</span>
                    <div class="header1">Pretty, and empty</div>
                    <div class="paragraph">A page that is not built for search is a billboard in a locked room. Design without visibility does not pay.</div>
                </div>
                <div class="opportunity reveal">
                    <span class="index">Social only</span>
                    <div class="header1">You are renting</div>
                    <div class="paragraph">Feeds change. Accounts get limited. A website you own is the place customers can always reach.</div>
                </div>
            </div>
        </div>
    </section>

    <section id="what-we-offer">
        <div class="wideInner">
            <div class="sectionHeading reveal">
                <p class="eyebrow">What we offer</p>
                <h2 class="header1">Two jobs. One outcome: more revenue.</h2>
                <p class="paragraph sectionLead">We do not run ads or social campaigns. We build websites and SEO so your business can be found by millions of people already on the internet — and so those visits can turn into money.</p>
            </div>
            <div class="offerPair">
                <div class="offerPanel reveal">
                    <span class="index">01</span>
                    <h3 class="header2">Website development</h3>
                    <p class="paragraph">Custom sites that load fast, look like a real business, and make it obvious how to inquire, book, or buy. From a single landing page to a full store or newsroom.</p>
                </div>
                <div class="offerPanel reveal">
                    <span class="index">02</span>
                    <h3 class="header2">SEO</h3>
                    <p class="paragraph">Structure, speed, titles, and content shaped so search engines can understand you — and so the right people land on the right page. Visibility is the product.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="whiteSection" id="site-types">
        <div class="sectionContent">
            <div class="sectionHeading reveal">
                <p class="eyebrow dark">What we build</p>
                <h2 class="header1">The site that matches how you earn.</h2>
            </div>
            <div class="typeOfWebsites lightCards">
                <div class="card reveal">
                    <i class="fa-solid fa-flag"></i>
                    <div class="header2">Landing &amp; business sites</div>
                    <div class="paragraph">A clear first impression: who you are, what you sell, and what to do next. Built to convert a search into a call or a form.</div>
                </div>
                <div class="card reveal">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div class="header2">E-commerce</div>
                    <div class="paragraph">A store that sells while you sleep — catalog, cart, checkout, and product pages that can rank.</div>
                </div>
                <div class="card reveal">
                    <i class="fa-solid fa-briefcase"></i>
                    <div class="header2">Portfolio sites</div>
                    <div class="paragraph">Work first. Fast galleries and a simple path to book or hire you.</div>
                </div>
                <div class="card reveal">
                    <i class="fa-solid fa-pen-nib"></i>
                    <div class="header2">Blog sites</div>
                    <div class="paragraph">A place to publish, get found for real questions, and send readers toward your offer.</div>
                </div>
                <div class="card reveal">
                    <i class="fa-solid fa-book-open"></i>
                    <div class="header2">Informational sites</div>
                    <div class="paragraph">Guides, resources, and explainers that make you the obvious authority in your field.</div>
                </div>
                <div class="card reveal">
                    <i class="fa-solid fa-newspaper"></i>
                    <div class="header2">News-like sites</div>
                    <div class="paragraph">Timely publishing, categories, and reading pages built for frequent updates and search.</div>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works">
        <div class="wideInner">
            <div class="sectionHeading reveal">
                <p class="eyebrow">The process</p>
                <h2 class="header1">From invisible to live — without the chaos.</h2>
            </div>
            <ol class="process">
                <li class="reveal">
                    <span class="index">01</span>
                    <h3 class="header2">We learn the business</h3>
                    <p class="paragraph">Who you serve, what a sale looks like, and which searches should lead to you. That brief drives the whole build.</p>
                </li>
                <li class="reveal">
                    <span class="index">02</span>
                    <h3 class="header2">We design and develop</h3>
                    <p class="paragraph">Pages, structure, and a site that is fast on a phone. You see it, you approve it, we keep moving.</p>
                </li>
                <li class="reveal">
                    <span class="index">03</span>
                    <h3 class="header2">We build it to be found</h3>
                    <p class="paragraph">SEO is not a plugin we toggle at the end. Titles, headings, speed, and internal links are part of the build.</p>
                </li>
                <li class="reveal">
                    <span class="index">04</span>
                    <h3 class="header2">You go live</h3>
                    <p class="paragraph">The site is on the internet, ready for customers. We hand you a clear picture of what exists and what to do next.</p>
                </li>
            </ol>
        </div>
    </section>

    <section class="whiteSection" id="seo">
        <div class="sectionContent seoSplit">
            <div class="reveal">
                <p class="eyebrow dark">Search visibility</p>
                <h2 class="header1">SEO is how millions of people find a business they have never heard of.</h2>
            </div>
            <div class="seoBody reveal">
                <p class="paragraph">People type what they need into Google every day. If your site is slow, unclear, or invisible to search engines, those people never become customers. We build websites that search engines can read — and that visitors trust once they arrive.</p>
                <ul class="checkList">
                    <li>Pages structured around the services you actually sell</li>
                    <li>Titles, headings, and copy that match how people search</li>
                    <li>Fast loads and mobile layouts — both ranking factors and conversion factors</li>
                    <li>A site you own, not a rented social profile</li>
                </ul>
                <p class="paragraph">We do not sell ads, funnels, or social media management. Visibility through the website and through search is the work.</p>
            </div>
        </div>
    </section>

    <section id="included">
        <div class="wideInner">
            <div class="sectionHeading reveal">
                <p class="eyebrow">What’s in the work</p>
                <h2 class="header1">A launch that is ready to earn.</h2>
            </div>
            <div class="features">
                <div class="feature reveal">
                    <i class="fa-solid fa-bolt"></i>
                    <div class="header2">Fast by default</div>
                    <div class="paragraph">Built to load quickly so visitors stay — and so search engines take you seriously.</div>
                </div>
                <div class="feature reveal">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <div class="header2">SEO in the foundation</div>
                    <div class="paragraph">Not a bolt-on report. The site is structured to be found from the first version.</div>
                </div>
                <div class="feature reveal">
                    <i class="fa-solid fa-mobile-screen"></i>
                    <div class="header2">Mobile-first</div>
                    <div class="paragraph">Most people will find you on a phone. The site is designed for that, not squeezed into it.</div>
                </div>
                <div class="feature reveal">
                    <i class="fa-solid fa-gem"></i>
                    <div class="header2">A look that holds up</div>
                    <div class="paragraph">Professional, memorable design so the first visit feels like a real business.</div>
                </div>
                <div class="feature reveal">
                    <i class="fa-solid fa-scale-balanced"></i>
                    <div class="header2">Scoped and affordable</div>
                    <div class="paragraph">Custom work without a bloated agency process. You know the timeline before we start.</div>
                </div>
                <div class="feature reveal">
                    <i class="fa-solid fa-headset"></i>
                    <div class="header2">A human on the other side</div>
                    <div class="paragraph">Questions, tweaks, and launch support — you are not left with a login and a shrug.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="whiteSection" id="who-its-for">
        <div class="sectionContent">
            <div class="sectionHeading reveal">
                <p class="eyebrow dark">Who this is for</p>
                <h2 class="header1">If revenue depends on being found, this is for you.</h2>
            </div>
            <div class="audienceGrid">
                <div class="opportunity reveal">
                    <div class="header2">Local and service businesses</div>
                    <div class="paragraph">When someone nearby searches for what you do, your site should be the answer — not a competitor with a louder page.</div>
                </div>
                <div class="opportunity reveal">
                    <div class="header2">Shops that want to sell online</div>
                    <div class="paragraph">E-commerce that is more than a catalog: product pages built to rank, and checkout that does not leak sales.</div>
                </div>
                <div class="opportunity reveal">
                    <div class="header2">Studios and specialists</div>
                    <div class="paragraph">Portfolios and landing sites that make the work obvious and the next step easy.</div>
                </div>
                <div class="opportunity reveal">
                    <div class="header2">Publishers and experts</div>
                    <div class="paragraph">Blogs, informational hubs, and news-like sites that grow an audience through search, then point it at an offer.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="ctaBand" id="mid-cta">
        <div class="ctaBandInner reveal">
            <p class="eyebrow">Right now</p>
            <h2 class="header1">Someone is searching for what you sell.</h2>
            <p class="paragraph">If your business is not there, the revenue goes elsewhere. Let’s put you in front of them.</p>
            <a href="#contact" class="circleButton whiteButton">Get visible</a>
        </div>
    </section>

    <section id="why-us">
        <p class="eyebrow reveal">Why us</p>
        <h2 class="header1 reveal">We obsess over one thing: being found.</h2>
        <div class="whyUsRule"></div>
        <p class="paragraph whyUsCopy reveal">
            Uprize Solutions is a web development and SEO studio. We build the sites businesses actually need — landing pages, stores, portfolios, blogs, informational hubs, news-like publications — and we build them so search engines and people can find them. We are not a marketing agency. We will not sell you ads. We will make your business visible to millions of people on the internet, and we will make that visibility something you can earn from. That is the whole job.
        </p>
    </section>

    <section id="faq">
        <div class="sectionHeading reveal">
            <p class="eyebrow">Answers</p>
            <h2 class="header1">FAQs</h2>
        </div>
        <div class="faqs">
            <div class="faq reveal">
                <div class="question">
                    <div class="header2">Do you do marketing?</div>
                    <div class="plusSign"><div class="hl"></div><div class="vl"></div></div>
                </div>
                <div class="answer">
                    <div class="paragraph">
                        No. We do not run ads, social campaigns, or retainers for “marketing.” We build websites and SEO so your business can be found on the internet and can turn that visibility into revenue.
                    </div>
                </div>
            </div>
            <div class="faq reveal">
                <div class="question">
                    <div class="header2">What kinds of websites do you build?</div>
                    <div class="plusSign"><div class="hl"></div><div class="vl"></div></div>
                </div>
                <div class="answer">
                    <div class="paragraph">
                        Website development across the board: landing and business sites, e-commerce, portfolios, blogs, informational sites, and news-like publications — plus SEO so those sites can be discovered.
                    </div>
                </div>
            </div>
            <div class="faq reveal">
                <div class="question">
                    <div class="header2">How long does a project take?</div>
                    <div class="plusSign"><div class="hl"></div><div class="vl"></div></div>
                </div>
                <div class="answer">
                    <div class="paragraph">
                        Most websites are ready within 2–4 weeks. Stores and more complex builds often take 4–8 weeks. We give you a timeline before we start so you know what to expect.
                    </div>
                </div>
            </div>
            <div class="faq reveal">
                <div class="question">
                    <div class="header2">When will SEO start working?</div>
                    <div class="plusSign"><div class="hl"></div><div class="vl"></div></div>
                </div>
                <div class="answer">
                    <div class="paragraph">
                        Search visibility compounds. You get a site that is ready to be indexed on day one. Rankings for competitive terms take longer. We are honest about that — and we still build every page as if it has to earn its place in search.
                    </div>
                </div>
            </div>
            <div class="faq reveal">
                <div class="question">
                    <div class="header2">How do you accept payment?</div>
                    <div class="plusSign"><div class="hl"></div><div class="vl"></div></div>
                </div>
                <div class="answer">
                    <div class="paragraph">
                        We require full payment upfront to get started. That keeps your project prioritized and moving. Payments can be made by online bank transfer or credit/debit card.
                    </div>
                </div>
            </div>
            <div class="faq reveal">
                <div class="question">
                    <div class="header2">Do I need to handle anything complicated?</div>
                    <div class="plusSign"><div class="hl"></div><div class="vl"></div></div>
                </div>
                <div class="answer">
                    <div class="paragraph">
                        No. You bring the business, the photos, and the decisions. We handle the build, the SEO foundations, and getting the site onto the internet.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="whiteSection contactSection" id="contact">
        <div class="contactSplit">
            <div class="contactCopy reveal">
                <p class="eyebrow dark">Start a project</p>
                <h2 class="header1">Tell us what should be found.</h2>
                <p class="paragraph">What you sell, who should find you, and what kind of site you need. The more specific you are, the faster we can map a timeline and a price.</p>
            </div>
            @include('partials.contact-form')
        </div>
    </section>
@endsection
