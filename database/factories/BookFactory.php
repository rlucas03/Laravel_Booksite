<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        use category factory to create 10 random categories upon seeding
        return [
            'user_id' => User::factory(),
//           'category_id' => Category::factory(),
            'category_id' => rand(1,10),
//            'category_id' => $this->faker->word,
            'slug' => $this->faker->word,
            'title' => $this->faker->sentence,
            'thumbnail' => $this->faker->word,
            'description' => $this->faker->sentence,
            'pdf' => $this->faker->word

        ];
    }
}


