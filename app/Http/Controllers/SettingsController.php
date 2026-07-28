<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\SettingsUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Valuestore\Valuestore;

class SettingsController extends Controller
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
     * Show the landing page settings form.
     */
    public function edit(): Response
    {
        return Inertia::render('Dashboard', [
            'settings' => $this->valuestore->all(),
        ]);
    }

    /**
     * Update the landing page settings.
     */
    public function update(SettingsUpdateRequest $request): RedirectResponse
    {
        $this->valuestore->put($request->validated());

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => 'Настройките са запазени успешно.',
        ]);

        return back();
    }
}
