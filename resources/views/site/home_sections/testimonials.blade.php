@if(isset($testimonials) && $testimonials->count())
<section class="space-y-8 animate-in" data-direction="right">
    <div class="flex items-center gap-4 mb-2">
        <span class="h-px flex-1 bg-white/20"></span>
        <h2 class="text-3xl md:text-5xl font-semibold text-white text-center">{{ __('What People Say') }}</h2>
        <span class="h-px flex-1 bg-white/20"></span>
    </div>
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
</section>
@endif


