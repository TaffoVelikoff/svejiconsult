<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_title' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'activity' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'working_hours' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'intro_badge' => ['required', 'string', 'max:255'],
            'intro_heading' => ['required', 'string', 'max:255'],
            'intro_description' => ['required', 'string'],
            'about_heading' => ['required', 'string', 'max:255'],
            'about_description' => ['required', 'string'],
            'about_card_1_emoji' => ['required', 'string', 'max:255'],
            'about_card_1_title' => ['required', 'string', 'max:255'],
            'about_card_1_text' => ['required', 'string', 'max:255'],
            'about_card_2_emoji' => ['required', 'string', 'max:255'],
            'about_card_2_title' => ['required', 'string', 'max:255'],
            'about_card_2_text' => ['required', 'string', 'max:255'],
            'about_card_3_emoji' => ['required', 'string', 'max:255'],
            'about_card_3_title' => ['required', 'string', 'max:255'],
            'about_card_3_text' => ['required', 'string', 'max:255'],
            'about_card_4_emoji' => ['required', 'string', 'max:255'],
            'about_card_4_title' => ['required', 'string', 'max:255'],
            'about_card_4_text' => ['required', 'string', 'max:255'],
            'advantages_badge' => ['required', 'string', 'max:255'],
            'advantages_heading' => ['required', 'string', 'max:255'],
            'advantages_description' => ['required', 'string'],
            'advantages_card_1_emoji' => ['required', 'string', 'max:255'],
            'advantages_card_1_title' => ['required', 'string', 'max:255'],
            'advantages_card_1_text' => ['required', 'string', 'max:255'],
            'advantages_card_2_emoji' => ['required', 'string', 'max:255'],
            'advantages_card_2_title' => ['required', 'string', 'max:255'],
            'advantages_card_2_text' => ['required', 'string', 'max:255'],
            'advantages_card_3_emoji' => ['required', 'string', 'max:255'],
            'advantages_card_3_title' => ['required', 'string', 'max:255'],
            'advantages_card_3_text' => ['required', 'string', 'max:255'],
            'advantages_card_4_emoji' => ['required', 'string', 'max:255'],
            'advantages_card_4_title' => ['required', 'string', 'max:255'],
            'advantages_card_4_text' => ['required', 'string', 'max:255'],
            'stats_1_value' => ['required', 'string', 'max:255'],
            'stats_1_label' => ['required', 'string', 'max:255'],
            'stats_2_value' => ['required', 'string', 'max:255'],
            'stats_2_label' => ['required', 'string', 'max:255'],
            'stats_3_value' => ['required', 'string', 'max:255'],
            'stats_3_label' => ['required', 'string', 'max:255'],
            'stats_4_value' => ['required', 'string', 'max:255'],
            'stats_4_label' => ['required', 'string', 'max:255'],
            'services_heading' => ['required', 'string', 'max:255'],
            'services_description' => ['required', 'string'],
            'services_item_1_emoji' => ['required', 'string', 'max:255'],
            'services_item_1_title' => ['required', 'string', 'max:255'],
            'services_item_1_description' => ['required', 'string'],
            'services_item_1_list' => ['required', 'string'],
            'services_item_2_emoji' => ['required', 'string', 'max:255'],
            'services_item_2_title' => ['required', 'string', 'max:255'],
            'services_item_2_description' => ['required', 'string'],
            'services_item_2_list' => ['required', 'string'],
            'services_item_3_emoji' => ['required', 'string', 'max:255'],
            'services_item_3_title' => ['required', 'string', 'max:255'],
            'services_item_3_description' => ['required', 'string'],
            'services_item_3_list' => ['required', 'string'],
            'services_item_4_emoji' => ['required', 'string', 'max:255'],
            'services_item_4_title' => ['required', 'string', 'max:255'],
            'services_item_4_description' => ['required', 'string'],
            'services_item_4_list' => ['required', 'string'],
            'services_item_5_emoji' => ['required', 'string', 'max:255'],
            'services_item_5_title' => ['required', 'string', 'max:255'],
            'services_item_5_description' => ['required', 'string'],
            'services_item_5_list' => ['required', 'string'],
            'process_badge' => ['required', 'string', 'max:255'],
            'process_heading' => ['required', 'string', 'max:255'],
            'process_description' => ['required', 'string'],
            'process_step_1_title' => ['required', 'string', 'max:255'],
            'process_step_1_description' => ['required', 'string'],
            'process_step_2_title' => ['required', 'string', 'max:255'],
            'process_step_2_description' => ['required', 'string'],
            'process_step_3_title' => ['required', 'string', 'max:255'],
            'process_step_3_description' => ['required', 'string'],
            'process_step_4_title' => ['required', 'string', 'max:255'],
            'process_step_4_description' => ['required', 'string'],
            'faq_heading' => ['required', 'string', 'max:255'],
            'faq_description' => ['required', 'string'],
            'faq_items' => ['nullable', 'array'],
            'faq_items.*.question' => ['required', 'string', 'max:255'],
            'faq_items.*.answer' => ['required', 'string'],
        ];
    }
}
