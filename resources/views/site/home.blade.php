@extends('layouts.site')
@section('title', __('Home'))

@section('content')
    <div class="space-y-16">
        <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-700/80 via-black/80 to-black/80 text-white p-6 md:p-16 animate-in" data-direction="up">
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-red-600/30 blur-3xl"></div>
                <div class="absolute -bottom-24 -right-24 h-96 w-96 rounded-full bg-white/10 blur-3xl"></div>
                <div class="absolute inset-0 opacity-[.04]" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,.9) 1px, transparent 1px); background-size: 6px 6px;"></div>
            </div>
            <div class="flex flex-col items-center text-center gap-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-semibold leading-tight">Smart Vision Summit</h1>
                    <p class="mt-4 text-white/90 text-lg md:text-2xl">Connecting Financial Markets Across Borders</p>
                    <div class="mx-auto h-0.5 w-16 bg-red-500/60 rounded-full mt-3"></div>
                </div>
                <div class="w-full max-w-5xl">
                    <div class="relative bg-gradient-to-r from-red-700 to-red-500 p-[6px] rounded-2xl shadow-2xl">
                        <div class="relative rounded-2xl overflow-hidden min-h-[20rem] md:min-h-[28rem]"
                             style="background-image: url('{{ $nearest && ($nearest->cover_image ?? $nearest->image) ? asset($nearest->cover_image ?? $nearest->image) : '' }}'); background-size: cover; background-position: center;">
                            <div class="absolute inset-0 bg-black/60"></div>
                            <div class="relative px-6 py-12 md:px-16 md:py-20 text-white h-full flex items-center">
                                <div class="absolute top-4 left-4">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs md:text-sm uppercase tracking-wide text-white/90 ring-1 ring-white/20 backdrop-blur">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-400 animate-pulse"></span>
                                    Next in line
                                    </span>
                                </div>
                                <div class="relative w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                                    <div class="pointer-events-none absolute inset-x-0 top-1/2 h-px bg-white/20 md:hidden"></div>
                                    <div class="pointer-events-none absolute inset-y-0 left-1/2 w-px bg-white/20 hidden md:block"></div>

                                    @if($nearest && ($nearest->row_image ?? false))
                                        <div class="md:pr-8">
                                            <div class="rounded-xl bg-black/40 p-2 shadow-xl">
                                                <img src="{{ asset($nearest->row_image) }}" alt="{{ $nearest->name }}" class="w-full h-auto max-h-72 object-contain">
                                            </div>
                                        </div>
                                    @endif
                                        <div class="text-center md:text-left md:pl-8">
                                        @if($nearest)
                                            <div class="mt-3 text-2xl md:text-5xl font-semibold">{{ $nearest->name }}</div>
                                            <div class="mt-4 inline-flex items-center gap-3 text-white/90 text-xl md:text-4xl font-semibold tracking-wide whitespace-nowrap">
                                                @if($nearest->start_at)
                                                    <span>{{ $nearest->start_at->format('F d') }}</span>
                                                    @if($nearest->end_at)
                                                        <span class="h-5 w-px bg-white/60"></span>
                                                        <span>{{ $nearest->end_at->format('d, Y') }}</span>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="mt-10 flex items-center justify-center md:justify-start gap-3 md:gap-4 w-full">
                                                <a class="inline-flex items-center justify-center w-full md:w-auto rounded-2xl bg-red-600 text-white px-5 md:px-8 py-3 md:py-4 text-base md:text-xl font-semibold shadow-lg hover:bg-red-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/40 transition will-change-transform hover:-translate-y-0.5"
                                                   href="{{ $nearest->website_url ?? route('events.show', $nearest->slug) }}">
                                                    Join Us
                                                </a>
                                                <a class="inline-flex items-center justify-center w-full md:w-auto rounded-2xl bg-white/10 text-white px-5 md:px-8 py-3 md:py-4 text-base md:text-xl font-semibold hover:bg-white/15 ring-1 ring-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/40 transition"
                                                   href="{{ route('about') }}">
                                                    Learn More
                                                </a>
                                            </div>
                                        @else
                                            <div class="mt-3 text-white/80">No upcoming event yet.</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-center">
                <span class="inline-flex items-center gap-2 text-white/70 text-sm">
                    <span class="h-1 w-1 rounded-full bg-white/60 animate-bounce"></span>
                    Scroll
                </span>
            </div>
        </section>



        <section class="animate-in" data-direction="left">
            <div class="flex items-center gap-4 mb-3">
                <span class="h-px flex-1 bg-white/20"></span>
                <h2 class="text-2xl md:text-4xl font-semibold text-white text-center">{{ __('Find Upcoming Events') }}</h2>
                <span class="h-px flex-1 bg-white/20"></span>
            </div>
            <div class="flex justify-center mb-6">
                <span class="inline-block h-0.5 w-12 bg-red-500/60 rounded-full"></span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($upcoming as $event)
                    <div class="rounded-3xl p-[1px] bg-gradient-to-r from-red-600/40 via-white/10 to-transparent transition hover:scale-[1.01]">
                    <div class="relative rounded-3xl overflow-hidden bg-black/90 border border-white/10 shadow-2xl ring-1 ring-white/5 transition hover:-translate-y-1 hover:shadow-[0_18px_60px_rgba(0,0,0,0.8)] min-h-[18rem] md:min-h-[22rem] flex flex-col">
                        @if($event->cover_image ?? $event->image)
                            <div class="absolute inset-0">
                                <div class="w-full h-full bg-cover bg-center opacity-30"
                                     style="background-image: url('{{ asset(($event->cover_image ?? $event->image) ?? '') }}');">
                                </div>
                            </div>
                        @endif
                        <div class="relative p-4 md:p-4 grow">
                            <div class="text-white">
                                <h3 class="text-base md:text-lg font-semibold">{{ $event->name }}</h3>
                                <div class="mt-1 text-white/60 text-sm md:text-base">
                                    @if($event->start_at)
                                        {{ $event->start_at->format('F d') }} @if($event->end_at) - {{ $event->end_at->format('d, Y') }} @endif
                                    @endif
                                </div>
                            </div>
                            @if(!empty($event->row_image))
                                <div class="mt-4 rounded-xl  h-20 md:h-24 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset($event->row_image) }}" alt="{{ $event->name }}" class="max-h-full w-auto object-contain opacity-95">
                                </div>
                            @endif
                        </div>
                        <div class="relative border-t border-white/10 p-4 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
                            <a href="{{ route('events.show', $event->slug) }}" class="inline-flex items-center justify-center w-full sm:w-auto rounded-xl bg-white/10 text-white px-3 py-2 text-sm md:text-base hover:bg-white/15 ring-1 ring-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/30 transition hover:-translate-y-0.5">{{ __('Details') }}</a>
                            <a href="{{ $event->website_url ?? route('events.show', $event->slug) }}" class="inline-flex items-center justify-center w-full sm:w-auto rounded-xl bg-red-600 text-white px-4 py-2 text-sm md:text-base hover:bg-red-500 shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/30 transition hover:-translate-y-0.5">
                                {{ __('Join Now') }}
                                <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"/></svg>
                            </a>
                        </div>
                    </div>
                    </div>
                @empty
                    <div class="col-span-full text-gray-500">{{ __('No events yet.') }}</div>
                @endforelse
            </div>
        </section>

        @if($about)
            <section class="space-y-8 text-center animate-in" data-direction="right">
                <div>
                    <div class="flex items-center gap-4 mb-4">
                        <span class="h-px flex-1 bg-white/20"></span>
                        <h2 class="text-3xl md:text-5xl font-semibold text-white text-center">{{ __('About SVS') }}</h2>
                        <span class="h-px flex-1 bg-white/20"></span>
                    </div>
                    <p class="mt-4 text-white/80 text-lg md:text-2xl">{{ \Illuminate\Support\Str::limit(strip_tags($about->content), 380) }}</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 text-center">
                    <div class="text-white rounded-2xl bg-white/[0.06] backdrop-blur p-6 ring-1 ring-white/10 hover:ring-white/20 transition">
                        <div class="text-5xl md:text-6xl font-extrabold leading-none text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-white drop-shadow">
                            <span class="counter" data-target="5000">0</span><span class="text-red-500">+</span>
                        </div>
                        <div class="mt-2 text-white/70 text-sm md:text-base">{{ __('Attendance') }}</div>
                    </div>
                    <div class="text-white rounded-2xl bg-white/[0.06] backdrop-blur p-6 ring-1 ring-white/10 hover:ring-white/20 transition">
                        <div class="text-5xl md:text-6xl font-extrabold leading-none text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-white drop-shadow">
                            <span class="counter" data-target="200">0</span><span class="text-red-500">+</span>
                        </div>
                        <div class="mt-2 text-white/70 text-sm md:text-base">{{ __('Speakers') }}</div>
                    </div>
                    <div class="text-white rounded-2xl bg-white/[0.06] backdrop-blur p-6 ring-1 ring-white/10 hover:ring-white/20 transition">
                        <div class="text-5xl md:text-6xl font-extrabold leading-none text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-white drop-shadow">
                            <span class="counter" data-target="80">0</span>
                        </div>
                        <div class="mt-2 text-white/70 text-sm md:text-base">{{ __('Sponsors') }}</div>
                    </div>
                </div>
            </section>
        @endif



        <section class="space-y-8 animate-in" data-direction="right">
            <div class="flex items-center gap-4 mb-2">
                <span class="h-px flex-1 bg-white/20"></span>
                <h2 class="text-3xl md:text-5xl font-semibold text-white text-center">{{ __('What People Say') }}</h2>
                <span class="h-px flex-1 bg-white/20"></span>
            </div>
            @if(isset($testimonials) && $testimonials->count())
                <style>
                    .tcard { opacity: .5; transform: scale(.96); transition: opacity .5s ease, transform .5s ease; }
                    .tcard.is-center { opacity: 1; transform: scale(1); }
                </style>
                <div id="testimonials-slider" class="relative overflow-hidden rounded-2xl ring-1 ring-white/10 bg-white/5">
                    <div class="slider-track flex transition-transform duration-500 ease-out" style="will-change: transform;">
                        @foreach($testimonials as $idx => $t)
                            <div class="shrink-0 w-full md:w-1/3 p-4 md:p-5">
                                <div class="tcard h-full rounded-2xl ring-1 ring-white/10 bg-black/50 p-5 md:p-6 text-white/90 relative flex flex-col items-center text-center">
                                    @if(!empty($t->avatar))
                                        <div class="relative -mt-10 mb-3">
                                            <div class="h-16 w-16 md:h-20 md:w-20 rounded-full ring-2 ring-white/20 bg-white/10 overflow-hidden shadow-lg mx-auto">
                                                <img src="{{ asset($t->avatar) }}" alt="{{ $t->name }}" class="h-full w-full object-cover">
                                            </div>
                                        </div>
                                    @endif
                                    <p class="text-sm md:text-base leading-relaxed">“{{ $t->quote }}”</p>
                                    <div class="mt-3 text-white/60 text-xs md:text-sm">— {{ $t->name }} @if(!empty($t->role)) · <span class="text-white/50">{{ $t->role }}</span>@endif</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="absolute inset-x-0 bottom-2 flex items-center justify-center gap-2">
                        @for($i=0; $i<$testimonials->count(); $i++)
                            <span class="dot h-1.5 w-1.5 rounded-full bg-white/30"></span>
                        @endfor
                    </div>
                </div>
            @endif
        </section>

        <section class="rounded-2xl bg-gradient-to-r from-red-700/70 via-black/70 to-black/80 ring-1 ring-white/10 p-6 md:p-10 text-white animate-in" data-direction="left">
            <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6">
                <div class="text-center md:text-left">
                    <h3 class="text-2xl md:text-3xl font-semibold">{{ __('Ready to join Smart Vision Summit?') }}</h3>
                    <p class="mt-1 text-white/80 text-sm md:text-base">{{ __('Become a sponsor or register for upcoming events today.') }}</p>
                </div>
                <div class="mt-3 md:mt-0 md:ml-auto flex items-center gap-3">
                    <a href="{{ route('contact') }}" class="inline-flex items-center rounded-xl bg-white text-black px-4 md:px-5 py-2 md:py-2.5 text-sm md:text-base font-semibold hover:bg-zinc-100 transition">{{ __('Become Sponsor') }}</a>
                    <a href="{{ route('events.index') }}" class="inline-flex items-center rounded-xl bg-red-600 text-white px-4 md:px-5 py-2 md:py-2.5 text-sm md:text-base font-semibold hover:bg-red-500 transition">{{ __('Register Now') }}</a>
                </div>
            </div>
        </section>

        <section class="animate-in" data-direction="right">
            <div class="flex items-center gap-4 mb-6">
                <span class="h-px flex-1 bg-white/20"></span>
                <h2 class="text-3xl md:text-5xl font-semibold text-white text-center">{{ __('FAQ') }}</h2>
                <span class="h-px flex-1 bg-white/20"></span>
            </div>
            @if(isset($faqs) && $faqs->count())
                <div class="space-y-3">
                    @foreach($faqs as $faq)
                        <details class="group rounded-2xl ring-1 ring-white/10 bg-white/5 p-4 md:p-5 text-white/90 overflow-hidden">
                            <summary class="cursor-pointer text-sm md:text-base font-semibold flex items-center gap-3">
                                <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-red-600 text-white text-xs ring-1 ring-white/10">?</span>
                                <span>{{ $faq->question }}</span>
                                <span class="ml-auto h-5 w-5 rounded-full bg-white/10 ring-1 ring-white/10 inline-flex items-center justify-center transition group-open:rotate-45">+</span>
                            </summary>
                            <div class="mt-3 text-white/70 text-sm md:text-base leading-relaxed">
                                {!! nl2br(e($faq->answer)) !!}
                            </div>
                        </details>
                    @endforeach
                </div>
            @endif
        </section>
        <section class="animate-in" data-direction="left">
            <div class="flex items-center gap-4 mb-4">
                <span class="h-px flex-1 bg-white/20"></span>
                <h2 class="text-3xl md:text-5xl font-semibold text-white text-center">{{ __('Past Events Gallery') }}</h2>
                <span class="h-px flex-1 bg-white/20"></span>
            </div>
            <div class="mt-4 columns-2 md:columns-3 lg:columns-4 gap-x-4 md:gap-x-6">
                @php
                    $dir = public_path('uploads/media');
                    $files = [];
                    if (is_dir($dir)) {
                        foreach (glob($dir . DIRECTORY_SEPARATOR . '*') as $path) {
                            if (is_file($path)) $files[] = 'uploads/media/' . basename($path);
                        }
                    }
                    $files = array_slice($files, 0, 8);
                @endphp
                @forelse($files as $path)
                    <div class="mb-4 break-inside-avoid">
                        <a href="{{ asset($path) }}" target="_blank" rel="noopener" class="group relative block rounded-xl overflow-hidden bg-white/5 ring-1 ring-white/10 hover:ring-white/20 backdrop-blur-sm">
                            <img class="w-full h-auto object-contain transition-transform duration-300 group-hover:scale-[1.02]" src="{{ asset($path) }}" alt="" loading="lazy" decoding="async">
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-gray-500">{{ __('No media uploaded yet.') }}</div>
                @endforelse
            </div>
        </section>
    </div>
    <script>
        // Animate-in on scroll (from left/right/up)
        (function () {
            const els = document.querySelectorAll('.animate-in');
            els.forEach((el) => {
                const dir = el.getAttribute('data-direction') || 'up';
                el.style.opacity = '0';
                if (dir === 'left') {
                    el.style.transform = 'translateX(-24px)';
                } else if (dir === 'right') {
                    el.style.transform = 'translateX(24px)';
                } else {
                    el.style.transform = 'translateY(16px)';
                }
                el.style.transition = 'opacity .6s ease, transform .6s ease';
            });
            const reveal = (target) => {
                target.style.opacity = '1';
                target.style.transform = 'translateX(0) translateY(0)';
            };
            if ('IntersectionObserver' in window) {
                const obs = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            reveal(entry.target);
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.2 });
                els.forEach(el => obs.observe(el));
            } else {
                els.forEach(reveal);
            }
        })();
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.counter');
            const animateCounter = (el) => {
                const target = parseInt(el.getAttribute('data-target') || '0', 10);
                const duration = 1200;
                const steps = 60;
                const increment = Math.max(1, Math.ceil(target / steps));
                let current = 0;
                const interval = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(interval);
                    }
                    el.textContent = current.toLocaleString();
                }, duration / steps);
            };
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateCounter(entry.target);
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.4 });
                counters.forEach(el => observer.observe(el));
            } else {
                counters.forEach(animateCounter);
            }

            // Testimonials slider
            const slider = document.getElementById('testimonials-slider');
            if (slider) {
                const track = slider.querySelector('.slider-track');
                const slides = Array.from(track.children);
                const dots = Array.from(slider.querySelectorAll('.dot'));
                let index = 0;
                const itemsPerView = () => window.matchMedia('(min-width: 768px)').matches ? 3 : 1;
                const update = () => {
                    const perView = itemsPerView();
                    const cardWidth = slider.clientWidth / perView;
                    // ensure left-most index so that center is highlighted on md+
                    let leftIndex = index - (perView === 3 ? 1 : 0);
                    leftIndex = Math.max(0, Math.min(leftIndex, Math.max(0, slides.length - perView)));
                    const offset = -leftIndex * cardWidth;
                    track.style.transform = `translateX(${offset}px)`;
                    // highlight center and dim sides
                    slides.forEach((slide, i) => {
                        slide.querySelector('.tcard')?.classList.remove('is-center');
                    });
                    const centerIdx = Math.max(0, Math.min(index, slides.length - 1));
                    const centerSlide = slides[centerIdx];
                    if (centerSlide) centerSlide.querySelector('.tcard')?.classList.add('is-center');
                    // dots
                    dots.forEach((d, i) => {
                        d.style.backgroundColor = i === centerIdx ? 'rgba(255,255,255,.9)' : 'rgba(255,255,255,.3)';
                    });
                };
                const next = () => {
                    index = (index + 1) % slides.length;
                    update();
                };
                let timer = setInterval(next, 4000);
                window.addEventListener('resize', update);
                update();
                // Pause on hover
                slider.addEventListener('mouseenter', () => clearInterval(timer));
                slider.addEventListener('mouseleave', () => { timer = setInterval(next, 4000); });
                // Touch swipe
                let startX = 0;
                slider.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; clearInterval(timer); }, { passive: true });
                slider.addEventListener('touchend', (e) => {
                    const dx = e.changedTouches[0].clientX - startX;
                    if (Math.abs(dx) > 30) {
                        if (dx < 0) next(); else { index = (index - 1 + slides.length) % slides.length; update(); }
                    }
                    timer = setInterval(next, 4000);
                });
            }
        });
    </script>
@endsection


