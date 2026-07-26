<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index(Request $request)
    {
        $settings = \Illuminate\Support\Facades\Cache::remember('site_settings', 3600, function () {
            return SiteSetting::pluck('value', 'key');
        });
        $categories = \Illuminate\Support\Facades\Cache::remember('categories', 3600, function () {
            return Category::all();
        });

        $posts = Post::with('category')
            ->published()
            ->latest('published_at')
            ->when($request->category, function ($query, $category) {
                $query->whereHas('category', fn ($q) =>
                    $q->where('slug', $category)
                );
            })
            ->paginate(12)
            ->withQueryString();

        $activeCategory = $request->category;

        return view('pages.publikasi.index', compact(
            'settings', 'categories', 'posts', 'activeCategory'
        ));
    }

    public function show(string $slug)
    {
        $post = Post::with('category')
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Post::with('category')
            ->published()
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->limit(3)
            ->get();

        return view('pages.publikasi.show', compact('post', 'related'));
    }
}