<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        $groups = Sponsor::query()
            ->where('is_active', true)
            ->orderBy('section')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy(function ($s) { return $s->section ?: __('Sponsors'); });

        return view('site.sponsors.index', compact('groups'));
    }
}


