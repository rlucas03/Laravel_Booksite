<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

//    $category->books // get multiple
//   A category has many books
// on the flip side a book belongs to a category
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

