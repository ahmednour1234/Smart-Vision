@php
    $activeSponsors = isset($sponsors) ? $sponsors->where('is_active', true) : collect();
    $groups = $activeSponsors->groupBy(function ($s) { return $s->section ?: __('Sponsors'); });
@endphp
@if($groups->sum->count() > 0)
<section class="animate-in" data-direction="left">
    <div class="flex items-center gap-4 mb-6">
        <span class="h-px flex-1 bg-white/20"></span>
        <h2 class="text-3xl md:text-5xl font-semibold text-white text-center">{{ __('Sponsors') }}</h2>
        <span class="h-px flex-1 bg-white/20"></span>
    </div>
    @foreach($groups as $title => $items)
        <div class="mb-3 text-center text-orange-500 font-semibold uppercase tracking-wide">{{ $title }}</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @foreach($items as $sp)
                <div class="rounded-2xl bg-white/5 ring-1 ring-white/10 p-8 md:p-10 text-center hover:ring-white/20 hover:-translate-y-0.5 transition shadow-xl">
                    @if($sp->url)
                        <a href="{{ $sp->url }}" target="_blank" rel="noopener" class="block focus:outline-none focus:ring-2 focus:ring-red-600/40 rounded-xl">
                            @if($sp->logo)
                                <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain"/>
                            @else
                                <span class="text-white/80 text-lg">{{ $sp->name }}</span>
                            @endif
                            <div class="mt-6 text-sm md:text-base text-orange-500 font-medium">OUR Previous Sponsors</div>
                        </a>
                    @else
                        <div>
                            @if($sp->logo)
                                <img src="{{ asset($sp->logo) }}" alt="{{ $sp->name }}" class="mx-auto h-14 md:h-16 w-auto object-contain"/>
                            @else
                                <span class="text-white/80 text-lg">{{ $sp->name }}</span>
                            @endif
                            <div class="mt-6 text-sm md:text-base text-orange-500 font-medium">OUR Previous Sponsors</div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</section>
@endif


