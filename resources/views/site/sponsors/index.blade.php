@extends('layouts.site')
@section('title', __('Sponsors'))

@section('content')
    <div class="space-y-10">
        <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-700/80 via-black/80 to-black/80 text-white p-8 md:p-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-semibold">{{ __('Sponsors') }}</h1>
                <p class="mt-3 text-white/80 text-base md:text-lg">{{ __('Our Previous Clients') }}</p>
            </div>
        </section>

        <section>
            @foreach($groups as $title => $items)
                <div class="mb-6 text-center">
                    <span class="inline-flex items-center rounded-full bg-gradient-to-r from-red-600/70 via-black/70 to-red-700/70 px-4 py-1.5 text-base md:text-lg font-semibold text-white ring-1 ring-white/10 shadow">
                        {{ $title }}
                    </span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-12">
                    @foreach($items as $sp)
                        <div class="group rounded-3xl p-[1px] bg-gradient-to-r from-red-600/50 via-white/10 to-black/50 transition duration-300 hover:from-red-500/70 hover:to-black/70 hover:scale-[1.01]">
                            <div class="rounded-3xl bg-black/80 ring-1 ring-white/10 p-10 text-center shadow-xl transition duration-300 group-hover:ring-white/20">
                            @if($sp->url)
                                <a href="{{ $sp->url }}" target="_blank" rel="noopener" class="block focus:outline-none focus:ring-2 focus:ring-red-600/40 rounded-xl">
                                    @if($sp->logo)
                                        <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300 filter grayscale group-hover:grayscale-0" loading="lazy" decoding="async"/>
                                    @else
                                        <span class="text-white/80 text-lg">{{ $sp->name }}</span>
                                    @endif
                                </a>
                            @else
                                @if($sp->logo)
                                    <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300 filter grayscale group-hover:grayscale-0" loading="lazy" decoding="async"/>
                                @else
                                    <span class="text-white/80 text-lg">{{ $sp->name }}</span>
                                @endif
                            @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>
    </div>
@endsection



