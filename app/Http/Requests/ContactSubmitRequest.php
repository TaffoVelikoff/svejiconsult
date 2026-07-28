<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

class ContactSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
            'cf-turnstile-response' => ['required', new Turnstile()],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Вашето име',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'message' => 'Вашето съобщение',
            'cf-turnstile-response' => 'Проверка за сигурност',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Моля, въведете Вашето име.',
            'phone.required' => 'Моля, въведете телефон за връзка.',
            'email.required' => 'Моля, въведете валиден имейл адрес.',
            'email.email' => 'Въведеният имейл адрес не е валиден.',
            'message.required' => 'Моля, въведете Вашето съобщение.',
            'cf-turnstile-response.required' => 'Моля, потвърдете проверката за сигурност (Turnstile).',
        ];
    }

    /**
     * Get the URL to redirect to on a validation failure.
     */
    protected function getRedirectUrl(): string
    {
        $url = parent::getRedirectUrl();

        return str_contains($url, '#contact') ? $url : $url . '#contact';
    }
}
