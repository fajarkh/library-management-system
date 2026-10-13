<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        $judulBuku = [
            'Laskar Pelangi',
            'Bumi Manusia',
            'Negeri 5 Menara',
            'Ayat-Ayat Cinta',
            'Perahu Kertas',
            'Sang Pemimpi',
            'Edensor',
            'Ronggeng Dukuh Paruk',
            'Cantik Itu Luka',
            'Manusia Setengah Salmon',
            'Filosofi Teras',
            'Atomic Habits',
            'Rich Dad Poor Dad',
            'The Psychology of Money',
            'Sapiens',
            'Homo Deus',
            '21 Lessons for the 21st Century',
            'The Power of Habit',
            'Thinking Fast and Slow',
            'Deep Work',
        ];

        $penulis = [
            'Andrea Hirata',
            'Pramoedya Ananta Toer',
            'Ahmad Fuadi',
            'Habiburrahman El Shirazy',
            'Dewi Lestari',
            'Andrea Hirata',
            'Andrea Hirata',
            'Ahmad Tohari',
            'Eka Kurniawan',
            'Raditya Dika',
            'Henry Manampiring',
            'James Clear',
            'Robert Kiyosaki',
            'Morgan Housel',
            'Yuval Noah Harari',
            'Yuval Noah Harari',
            'Yuval Noah Harari',
            'Charles Duhigg',
            'Daniel Kahneman',
            'Cal Newport',
        ];

        $penerbit = [
            'Gramedia Pustaka Utama',
            'Bentang Pustaka',
            'Mizan Pustaka',
            'Republika',
            'GagasMedia',
            'Kepustakaan Populer Gramedia',
            'Erlangga',
            'Penerbit Buku Kompas',
            'Nuansa',
            'PT Gramedia Widiasarana Indonesia',
        ];

        return [
            'title' => $this->faker->randomElement($judulBuku) . ' ' . $this->faker->unique()->numberBetween(1, 999),
            'auther_name' => $this->faker->randomElement($penulis),
            'price' => $this->faker->numberBetween(50000, 200000),
            'description' => $this->faker->paragraphs(3, true),
            'quantity' => $this->faker->numberBetween(1, 20),
            'book_img' => 'books/default-book.jpg',
            'auther_img' => 'authors/default-author.jpg',
            'book_code' => 'BK-' . strtoupper($this->faker->unique()->bothify('??####')),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
        ];
    }
}