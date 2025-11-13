@extends('layouts.site')
@section('title', __('Home'))

@section('content')
    <div class="space-y-16">
        <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-700/80 via-black/80 to-black/80 text-white p-6 md:p-16">
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-red-600/30 blur-3xl"></div>
                <div class="absolute -bottom-24 -right-24 h-96 w-96 rounded-full bg-white/10 blur-3xl"></div>
            </div>
            <div class="flex flex-col items-center text-center gap-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-semibold leading-tight">Smart Vision Summit</h1>
                    <p class="mt-4 text-white/90 text-lg md:text-2xl">Connecting Financial Markets Across Borders</p>
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



        <section>
            <div class="flex items-center gap-4 mb-6">
                <span class="h-px flex-1 bg-white/20"></span>
                <h2 class="text-2xl md:text-4xl font-semibold text-white text-center">{{ __('Find Upcoming Events') }}</h2>
                <span class="h-px flex-1 bg-white/20"></span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($upcoming as $event)
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
                            <a href="{{ route('events.show', $event->slug) }}" class="inline-flex items-center justify-center w-full sm:w-auto rounded-xl bg-white/10 text-white px-3 py-2 text-sm md:text-base hover:bg-white/15 ring-1 ring-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/30 transition">{{ __('Details') }}</a>
                            <a href="{{ $event->website_url ?? route('events.show', $event->slug) }}" class="inline-flex items-center justify-center w-full sm:w-auto rounded-xl bg-red-600 text-white px-4 py-2 text-sm md:text-base hover:bg-red-500 shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/30 transition">
                                {{ __('Join Now') }}
                                <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-gray-500">{{ __('No events yet.') }}</div>
                @endforelse
            </div>
        </section>

        @if($about)
            <section class="space-y-8 text-center">
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

        <section class="reveal-on-scroll">
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
        // Reveal on scroll
        (function () {
            const els = document.querySelectorAll('.reveal-on-scroll');
            els.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(16px)';
                el.style.transition = 'opacity .6s ease, transform .6s ease';
            });
            if ('IntersectionObserver' in window) {
                const obs = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.2 });
                els.forEach(el => obs.observe(el));
            } else {
                els.forEach(el => { el.style.opacity = '1'; el.style.transform = 'none'; });
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
        });
    </script>
@endsection


