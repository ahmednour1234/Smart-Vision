@php
    $activeSponsors = isset($sponsors) ? $sponsors->where('is_active', true) : collect();
    $groups = $activeSponsors->groupBy(function ($s) { return $s->section ?: __('Our Previous Clients'); });
@endphp
@if($groups->sum->count() > 0)
<section class="animate-in" data-direction="left">
    <div class="flex items-center gap-4 mb-6">
        <span class="h-px flex-1 bg-white/20"></span>
        <h2 class="text-3xl md:text-5xl font-semibold text-white text-center">{{ __('Sponsors') }}</h2>
        <span class="h-px flex-1 bg-white/20"></span>
    </div>
    @foreach($groups as $title => $items)
        <div class="mb-4 text-center">
            <span class="inline-flex items-center rounded-full bg-gradient-to-r from-red-600/70 via-black/70 to-red-700/70 px-4 py-1.5 text-sm md:text-base font-semibold text-white ring-1 ring-white/10 shadow">
                {{ $title }}
            </span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-12">
            @foreach($items as $sp)
                <div class="group rounded-3xl p-[1px] bg-gradient-to-r from-red-600/50 via-white/10 to-black/50 transition duration-300 hover:from-red-500/70 hover:to-black/70 hover:scale-[1.01]">
                    <div class="rounded-3xl bg-black/80 ring-1 ring-white/10 p-8 md:p-10 text-center shadow-xl transition duration-300 group-hover:ring-white/20">
                        @if($sp->url)
                            <a href="{{ $sp->url }}" target="_blank" rel="noopener" class="block focus:outline-none focus:ring-2 focus:ring-red-600/40 rounded-xl">
                                @if($sp->logo)
                                    <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300 filter grayscale group-hover:grayscale-0" loading="lazy" decoding="async"/>
                                @else
                                    <span class="text-white/85 text-lg">{{ $sp->name }}</span>
                                @endif
                                <div class="sr-only">{{ __('Visit sponsor') }}</div>
                            </a>
                        @else
                            <div>
                                @if($sp->logo)
                                    <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300 filter grayscale group-hover:grayscale-0" loading="lazy" decoding="async"/>
                                @else
                                    <span class="text-white/85 text-lg">{{ $sp->name }}</span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</section>
@endif


