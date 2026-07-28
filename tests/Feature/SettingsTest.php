<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Valuestore\Valuestore;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    protected Valuestore $valuestore;

    protected function setUp(): void
    {
        parent::setUp();

        $this->valuestore = Valuestore::make(storage_path('app/settings.json'));
        $this->valuestore->flush();
    }

    protected function tearDown(): void
    {
        if (file_exists(storage_path('app/settings.json'))) {
            unlink(storage_path('app/settings.json'));
        }

        parent::tearDown();
    }

    public function test_guests_cannot_view_settings()
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_view_settings_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
    }

    public function test_authenticated_users_can_update_settings()
    {
        $user = User::factory()->create();

        $data = [
            'site_title' => 'Updated Site Title',
            'company_name' => 'Updated Company Name',
            'email' => 'updated@svejiconsult.com',
            'activity' => 'Updated Activity Description',
            'phone' => '+359 888 888 888',
            'working_hours' => "Mon - Fri\n09:00 - 18:00",
            'address' => "New Address Line 1\nNew Address Line 2",
            'intro_badge' => '● New Badge Text',
            'intro_heading' => 'New Heading Word Count Test',
            'intro_description' => 'New Description Text Content',
            'about_heading' => 'New About Heading',
            'about_description' => "Para 1\n\nPara 2",
            'about_card_1_emoji' => '🌟',
            'about_card_1_title' => 'T1',
            'about_card_1_text' => 'D1',
            'about_card_2_emoji' => '🚀',
            'about_card_2_title' => 'T2',
            'about_card_2_text' => 'D2',
            'about_card_3_emoji' => '🏆',
            'about_card_3_title' => 'T3',
            'about_card_3_text' => 'D3',
            'about_card_4_emoji' => '💡',
            'about_card_4_title' => 'T4',
            'about_card_4_text' => 'D4',
            'stats_1_value' => '100%',
            'stats_1_label' => 'Stat 1',
            'stats_2_value' => '24/7',
            'stats_2_label' => 'Stat 2',
            'stats_3_value' => '100%',
            'stats_3_label' => 'Stat 3',
            'stats_4_value' => 'SJC',
            'stats_4_label' => 'Stat 4',
            'advantages_badge' => '● Adv Badge',
            'advantages_heading' => 'Adv Heading',
            'advantages_description' => 'Adv Description',
            'advantages_card_1_emoji' => '⏱️',
            'advantages_card_1_title' => 'Adv T1',
            'advantages_card_1_text' => 'Adv D1',
            'advantages_card_2_emoji' => '💻',
            'advantages_card_2_title' => 'Adv T2',
            'advantages_card_2_text' => 'Adv D2',
            'advantages_card_3_emoji' => '📈',
            'advantages_card_3_title' => 'Adv T3',
            'advantages_card_3_text' => 'Adv D3',
            'advantages_card_4_emoji' => '👥',
            'advantages_card_4_title' => 'Adv T4',
            'advantages_card_4_text' => 'Adv D4',
            'services_heading' => 'Services Heading',
            'services_description' => 'Services Description',
            'services_item_1_emoji' => '📊',
            'services_item_1_title' => 'Service 1',
            'services_item_1_description' => 'Desc 1',
            'services_item_1_list' => "Sub 1\nSub 2",
            'services_item_2_emoji' => '👥',
            'services_item_2_title' => 'Service 2',
            'services_item_2_description' => 'Desc 2',
            'services_item_2_list' => 'Sub 1',
            'services_item_3_emoji' => '💰',
            'services_item_3_title' => 'Service 3',
            'services_item_3_description' => 'Desc 3',
            'services_item_3_list' => 'Sub 1',
            'services_item_4_emoji' => '📑',
            'services_item_4_title' => 'Service 4',
            'services_item_4_description' => 'Desc 4',
            'services_item_4_list' => 'Sub 1',
            'services_item_5_emoji' => '🏢',
            'services_item_5_title' => 'Service 5',
            'services_item_5_description' => 'Desc 5',
            'services_item_5_list' => 'Sub 1',
        ];

        $response = $this->actingAs($user)
            ->from(route('dashboard'))
            ->put(route('dashboard.update'), $data);

        $response->assertRedirect(route('dashboard'));
        $response->assertSessionHasNoErrors();

        $this->assertEquals('Updated Site Title', $this->valuestore->get('site_title'));
        $this->assertEquals('Updated Company Name', $this->valuestore->get('company_name'));
        $this->assertEquals('updated@svejiconsult.com', $this->valuestore->get('email'));
        $this->assertEquals("Mon - Fri\n09:00 - 18:00", $this->valuestore->get('working_hours'));
        $this->assertEquals("New Address Line 1\nNew Address Line 2", $this->valuestore->get('address'));
        $this->assertEquals('● New Badge Text', $this->valuestore->get('intro_badge'));
        $this->assertEquals('New Heading Word Count Test', $this->valuestore->get('intro_heading'));
        $this->assertEquals('New Description Text Content', $this->valuestore->get('intro_description'));
        $this->assertEquals('New About Heading', $this->valuestore->get('about_heading'));
        $this->assertEquals("Para 1\n\nPara 2", $this->valuestore->get('about_description'));
        $this->assertEquals('🌟', $this->valuestore->get('about_card_1_emoji'));
        $this->assertEquals('T1', $this->valuestore->get('about_card_1_title'));
        $this->assertEquals('D1', $this->valuestore->get('about_card_1_text'));
        $this->assertEquals('100%', $this->valuestore->get('stats_1_value'));
        $this->assertEquals('Stat 1', $this->valuestore->get('stats_1_label'));
        $this->assertEquals('Services Heading', $this->valuestore->get('services_heading'));
        $this->assertEquals("Sub 1\nSub 2", $this->valuestore->get('services_item_1_list'));
    }

    public function test_validation_rules_are_enforced()
    {
        $user = User::factory()->create();

        // Submit invalid email and missing required fields
        $response = $this->actingAs($user)
            ->from(route('dashboard'))
            ->put(route('dashboard.update'), [
                'site_title' => '', // Required
                'company_name' => '', // Required
                'email' => 'invalid-email', // Email validation
                'phone' => '', // Required
                'address' => '', // Required
                'intro_badge' => '', // Required
                'intro_heading' => '', // Required
                'intro_description' => '', // Required
                'about_heading' => '', // Required
                'about_description' => '', // Required
                'about_card_1_emoji' => '', // Required
                'about_card_1_title' => '', // Required
                'about_card_1_text' => '', // Required
                'stats_1_value' => '', // Required
                'stats_1_label' => '', // Required
            ]);

        $response->assertRedirect(route('dashboard'));
        $response->assertSessionHasErrors([
            'site_title', 'company_name', 'email', 'phone', 'address',
            'intro_badge', 'intro_heading', 'intro_description',
            'about_heading', 'about_description', 'about_card_1_emoji',
            'about_card_1_title', 'about_card_1_text', 'stats_1_value',
            'stats_1_label',
        ]);
    }

    public function test_public_landing_page_renders_with_seeded_valuestore_settings()
    {
        $this->valuestore->put([
            'site_title' => 'Custom Website Title',
            'company_name' => 'Custom Company LLC',
            'email' => 'custom@company.com',
            'activity' => 'Consulting Services',
            'phone' => '+359 111 222 333',
            'working_hours' => 'Mon - Fri',
            'address' => 'Custom Address',
        ]);

        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Custom Website Title');
        $response->assertSee('Custom Company LLC');
        $response->assertSee('+359 111 222 333');
    }
}
