<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login(): void
    {
        $response = $this->get(route('news.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_view_news_index(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $newsItem = News::factory()->create();

        $response = $this->get(route('news.index'));
        $response->assertOk();
        $response->assertSee($newsItem->title);
    }

    public function test_authenticated_users_can_create_news(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('news.store'), [
            'title' => 'Test News Title',
            'content' => 'Test News Content',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('news', [
            'title' => 'Test News Title',
            'content' => 'Test News Content',
        ]);
    }

    public function test_create_news_validation(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('news.store'), [
            'title' => '',
            'content' => '',
        ]);

        $response->assertSessionHasErrors(['title', 'content']);
    }

    public function test_authenticated_users_can_update_news(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $news = News::factory()->create();

        $response = $this->put(route('news.update', $news), [
            'title' => 'Updated News Title',
            'content' => 'Updated News Content',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('news', [
            'id' => $news->id,
            'title' => 'Updated News Title',
            'content' => 'Updated News Content',
        ]);
    }

    public function test_authenticated_users_can_delete_news(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $news = News::factory()->create();

        $response = $this->delete(route('news.destroy', $news));

        $response->assertRedirect();
        $this->assertDatabaseMissing('news', [
            'id' => $news->id,
        ]);
    }

    public function test_slug_is_automatically_generated_and_transliterated(): void
    {
        $news = News::create([
            'title' => 'Нова новина на кирилица за 2026 година',
            'content' => 'Content',
        ]);

        $this->assertEquals('nova-novina-na-kirilitsa-za-2026-godina', $news->slug);

        // Test uniqueness
        $duplicateNews = News::create([
            'title' => 'Нова новина на кирилица за 2026 година',
            'content' => 'Content 2',
        ]);

        $this->assertEquals('nova-novina-na-kirilitsa-za-2026-godina-1', $duplicateNews->slug);
    }

    public function test_guests_can_view_public_news_list(): void
    {
        $newsItem = News::factory()->create([
            'title' => 'Тест новина',
        ]);

        $response = $this->get(route('public.news.index'));
        $response->assertOk();
        $response->assertSee('Тест новина');
    }

    public function test_guests_can_view_public_news_detail(): void
    {
        $newsItem = News::factory()->create([
            'title' => 'Статия за данъци',
        ]);

        $response = $this->get(route('public.news.show', $newsItem->slug));
        $response->assertOk();
        $response->assertSee('Статия за данъци');
    }
}
