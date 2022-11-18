<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        use fake data for everything except the pdf field

//        Book::factory(5)->create([
//            'pdf' => 'test.pdf'
//        ]);



//        calling additional seed classes
//        $this->call([
//            CategorySeeder::class,
//            UserSeeder::class,
//            BookSeeder::class,
//        ]);


//        manually insert category
//        DB::table('categories')->insert([
//            'name' => Str::random(10),
//            'slug' => Str::random(7)
//        ]);

//        insert 10 categories to db
//        $fiction = Category::create([
//           'name' => 'Fiction',
//           'slug' => 'fiction'
//        ]);
//
//        $fiction = Category::create([
//           'name' => 'Classics',
//           'slug' => 'classics'
//        ]);
//
//        $fiction = Category::create([
//           'name' => 'History',
//           'slug' => 'history'
//        ]);
//        $fiction = Category::create([
//           'name' => 'Modern',
//           'slug' => 'modern'
//        ]);
//        $fiction = Category::create([
//           'name' => 'Crime',
//           'slug' => 'crime'
//        ]);
//        $fiction = Category::create([
//           'name' => 'Fantasy',
//           'slug' => 'fantasy'
//        ]);
//        $fiction = Category::create([
//           'name' => 'Manga',
//           'slug' => 'manga'
//        ]);
//
//        $fiction = Category::create([
//           'name' => 'Food',
//           'slug' => 'food'
//        ]);
//        $fiction = Category::create([
//           'name' => 'Humour',
//           'slug' => 'humour'
//        ]);
//        $fiction = Category::create([
//           'name' => 'Health',
//           'slug' => 'health'
//        ]);

      // create a new user that has between 0-3 books associated with them
//      $user = User::factory()
//        ->has(Book::factory()->count(rand(0,3)))
//        ->create();




//
//        this creates a corresponding book, category and user
        Book::factory(2)->create();
//
//
//        $books = Book::factory()
//            ->count(3)
//            ->for($user)
//            ->create();
//
//
//        User::factory()
//            ->count(2)
//            ->hasBooks(1)
//            ->create();
//
//         \App\Models\User::factory()->create();

//        $user = \App\Models\User::factory(10)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
