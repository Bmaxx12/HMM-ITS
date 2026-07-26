<?php

namespace App\Http\Controllers;

use App\Models\CabinetUnit;
use App\Models\SiteSetting;

class AboutController extends Controller
{
    public function index()
    {
        $settings = \Illuminate\Support\Facades\Cache::remember('site_settings', 3600, function () {
            return SiteSetting::pluck('value', 'key');
        });

        $units = CabinetUnit::with(['members' => function ($query) {
                $query->orderBy('order_number');
            }])
            ->whereNull('parent_unit_id')
            ->orderBy('order_number')
            ->get()
            ->groupBy('tier');

        return view('pages.about', compact('settings', 'units'));
    }
}