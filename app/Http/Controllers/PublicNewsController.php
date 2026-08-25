<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;

class PublicNewsController extends Controller
{
    /**
     * Display a listing of all public news.
     */
    public function index(): View
    {
        $news = News::latest()->paginate(6);

        return view('news.index', compact('news'));
    }

    /**
     * Display the specified single news article.
     */
    public function show(string $slug): View
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('news.show', compact('news'));
    }
}
