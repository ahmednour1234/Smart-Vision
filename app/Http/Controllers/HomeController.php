<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\AboutUs;
use App\Models\Testimonial;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $nearest = Event::query()->current()->orderBy('start_at')->first()
            ?? Event::query()->upcoming()->orderBy('start_at')->first();
        $upcoming = Event::active()
            ->where('start_at', '>=', now())
            ->orderBy('start_at')
            ->take(6)
            ->get();

        $about = AboutUs::active();
        $testimonials = Testimonial::query()->where('is_active', true)->orderBy('sort_order')->orderBy('id')->take(12)->get();
        $faqs = Faq::query()->where('is_active', true)->orderBy('sort_order')->orderBy('id')->take(10)->get();

        return view('site.home', compact('nearest','upcoming','about','testimonials','faqs'));
    }
}
