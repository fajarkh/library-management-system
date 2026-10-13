<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $kategori = [
            'Fiksi',
            'Non-Fiksi',
            'Sains & Teknologi',
            'Sejarah',
            'Biografi',
            'Pendidikan',
            'Agama',
            'Komik & Grafis',
            'Anak-anak',
            'Bisnis & Ekonomi',
            'Hukum',
            'Kesehatan',
            'Seni & Fotografi',
            'Travel',
            'Masak & Makanan',
        ];

        return [
            'cat_title' => $this->faker->randomElement($kategori),
        ];
    }
}