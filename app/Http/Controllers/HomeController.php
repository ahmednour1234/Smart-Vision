<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\AboutUs;

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

        return view('site.home', compact('nearest','upcoming','about'));
    }
}
