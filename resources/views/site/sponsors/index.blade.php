@extends('layouts.site')
@section('title', __('Sponsors'))

@section('content')
    <div class="space-y-10">
        <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-700/80 via-black/80 to-black/80 text-white p-8 md:p-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-semibold">{{ __('Sponsors') }}</h1>
                <p class="mt-3 text-white/80 text-base md:text-lg">{{ __('Our partners and sponsors who support Smart Vision Summit') }}</p>
            </div>
        </section>

        <section>
            @foreach($groups as $title => $items)
                <div class="mb-6 text-center">
                    <h2 class="text-xl md:text-2xl font-semibold text-orange-500 uppercase tracking-wide">{{ $title }}</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach($items as $sp)
                        <div class="rounded-2xl bg-white/5 ring-1 ring-white/10 p-10 text-center hover:ring-white/20 hover:-translate-y-0.5 transition shadow-xl">
                            @if($sp->url)
                                <a href="{{ $sp->url }}" target="_blank" rel="noopener">
                                    @if($sp->logo)
                                        <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain"/>
                                    @else
                                        <span class="text-white/80 text-lg">{{ $sp->name }}</span>
                                    @endif
                                </a>
                            @else
                                @if($sp->logo)
                                    <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain"/>
                                @else
                                    <span class="text-white/80 text-lg">{{ $sp->name }}</span>
                                @endif
                            @endif
                            <div class="mt-6 text-sm md:text-base text-orange-500 font-medium">OUR Previous Sponsors</div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>
    </div>
@endsection



