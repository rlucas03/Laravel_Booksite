<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Category::truncate();
      Category::factory(10)->create();


//       insert 10 categories to db
//        $fiction = Category::create([
//           'name' => 'Fiction',
//           'slug' => 'fiction'
//        ]);
//
    }
}


