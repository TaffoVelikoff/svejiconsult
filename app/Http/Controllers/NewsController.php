<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index(): Response
    {
        return Inertia::render('news/Index', [
            'news' => News::latest()->get(),
        ]);
    }

    /**
     * Store a newly created news in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        News::create($validated);

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Новината беше добавена успешно.',
        ]);

        return back();
    }

    /**
     * Update the specified news in storage.
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news->update($validated);

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Новината беше редактирана успешно.',
        ]);

        return back();
    }

    /**
     * Remove the specified news from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Новината беше изтрита успешно.',
        ]);

        return back();
    }
}
