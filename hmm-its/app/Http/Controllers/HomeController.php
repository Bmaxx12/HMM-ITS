<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');

        $latestPosts = Post::with('category')
            ->published()
            ->limit(3)
            ->get();

        return view('pages.home', compact('settings', 'latestPosts'));
    }
}