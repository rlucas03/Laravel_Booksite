<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      User::factory()
        ->times(100)->create()
        ->each(function ($user){
          $user->books()->saveMany(
            Book::factory()->times(random_int(0, 5))->make()
          );
        });

//      for ($i = 0; $i < 20; $i++) {
//
//        $user = User::factory(1)
//          ->has(Book::factory()->count(rand(0, 5)))
//          ->create();
//      }

    }
}
