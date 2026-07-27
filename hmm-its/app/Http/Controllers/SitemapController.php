<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::published()->get();

        $content = view('sitemap', compact('posts'));

        return response($content, 200)->header('Content-Type', 'text/xml');
    }
}
