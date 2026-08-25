<?php

namespace App\Models;

use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['title', 'content'])]
class News extends Model
{
    /** @use HasFactory<NewsFactory> */
    use HasFactory;

    /**
     * Boot the model.
     */
    protected static function booted(): void
    {
        static::saving(function (News $news) {
            if (empty($news->slug) || $news->isDirty('title')) {
                $slug = Str::slug(self::transliterate($news->title));

                // Ensure uniqueness
                $originalSlug = $slug;
                $count = 1;
                while (static::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
                    $slug = "{$originalSlug}-{$count}";
                    $count++;
                }

                $news->slug = $slug;
            }
        });
    }

    /**
     * Transliterate Bulgarian Cyrillic to Latin.
     */
    public static function transliterate(string $text): string
    {
        $map = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p',
            'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sht', 'ъ' => 'a', 'ь' => 'y', 'ю' => 'yu', 'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P',
            'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'Ts', 'Ч' => 'Ch',
            'Ш' => 'Sh', 'Щ' => 'Sht', 'Ъ' => 'A', 'Ь' => 'Y', 'Ю' => 'Yu', 'Я' => 'Ya',
        ];

        return strtr($text, $map);
    }
}
