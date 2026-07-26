<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $settings = \Illuminate\Support\Facades\Cache::remember('site_settings', 3600, function () {
            return SiteSetting::pluck('value', 'key');
        });

        $latestPosts = Post::with('category')
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('pages.home', compact('settings', 'latestPosts'));
    }
}