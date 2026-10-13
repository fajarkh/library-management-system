<?php

namespace Database\Factories;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    protected $model = Borrow::class;

    public function definition(): array
    {
        $statuses = ['Pending', 'Approved', 'Rejected', 'Returned'];

        return [
            'book_id' => Book::inRandomOrder()->first()?->id ?? Book::factory(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}