<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmitRequest;
use App\Mail\ContactSubmissionMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Spatie\Valuestore\Valuestore;

class ContactController extends Controller
{
    /**
     * Handle incoming contact form submission.
     */
    public function store(ContactSubmitRequest $request): RedirectResponse
    {
        $settingsPath = storage_path('app/settings.json');
        $recipientEmail = 'office@svejiconsult.com';

        if (file_exists($settingsPath)) {
            $valuestore = Valuestore::make($settingsPath);
            $recipientEmail = $valuestore->get('email', 'office@svejiconsult.com');
        }

        Mail::to($recipientEmail)->send(new ContactSubmissionMail($request->validated()));

        $previousUrl = url()->previous();
        $redirectUrl = str_contains($previousUrl, '#contact') ? $previousUrl : $previousUrl . '#contact';

        return redirect()->to($redirectUrl)->with('success', 'Благодарим Ви! Вашето съобщение беше изпратено успешно.');
    }
}
