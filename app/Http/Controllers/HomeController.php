<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Spatie\Valuestore\Valuestore;

class HomeController extends Controller
{
    protected Valuestore $valuestore;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->valuestore = Valuestore::make(storage_path('app/settings.json'));
    }

    /**
     * Show the public landing page.
     */
    public function __invoke(): View
    {
        return view('home', [
            'settings' => $this->valuestore->all(),
            'latestNews' => \App\Models\News::latest()->first(),
        ]);
    }
}
