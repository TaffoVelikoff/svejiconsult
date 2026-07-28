<?php

namespace Tests\Feature;

use App\Mail\ContactSubmissionMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use RyanChandler\LaravelCloudflareTurnstile\Facades\Turnstile;
use Spatie\Valuestore\Valuestore;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Turnstile::fake();
    }

    public function test_contact_form_requires_turnstile_and_all_fields()
    {
        Turnstile::fake()->fail();

        $response = $this->from(route('home') . '#contact')
            ->post(route('contact.submit'), [
                'name' => '',
                'phone' => '',
                'email' => 'invalid-email',
                'message' => '',
                'cf-turnstile-response' => 'invalid-token',
            ]);

        $response->assertRedirect(route('home') . '#contact');
        $response->assertSessionHasErrors([
            'name',
            'phone',
            'email',
            'message',
            'cf-turnstile-response',
        ]);
    }

    public function test_successful_contact_form_submission_sends_email()
    {
        Mail::fake();
        Turnstile::fake();

        $valuestore = Valuestore::make(storage_path('app/settings.json'));
        $valuestore->put('email', 'admin@svejiconsult.com');

        $response = $this->from(route('home') . '#contact')
            ->post(route('contact.submit'), [
                'name' => 'Иван Иванов',
                'phone' => '0888123456',
                'email' => 'ivan@example.com',
                'message' => 'Здравейте, искам оферта за счетоводство.',
                'cf-turnstile-response' => Turnstile::dummy(),
            ]);

        $response->assertRedirect(route('home') . '#contact');
        $response->assertSessionHas('success', 'Благодарим Ви! Вашето съобщение беше изпратено успешно.');

        Mail::assertSent(ContactSubmissionMail::class, function ($mail) {
            return $mail->hasTo('admin@svejiconsult.com') &&
                   $mail->data['name'] === 'Иван Иванов' &&
                   $mail->data['email'] === 'ivan@example.com';
        });

        if (file_exists(storage_path('app/settings.json'))) {
            unlink(storage_path('app/settings.json'));
        }
    }
}
