<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

//  protected $fillable = ['title', 'user_id', 'category_id', 'description'];

    protected $guarded = [];

//    do i need this slug code?
//    public static function find($slug) {
//
//    }

// for searching books
    public function scopeFilter($query) {
      if (request('search')) {
        $query
          ->where('title', 'like', '%' . request('search') . '%')
          ->orWhere('description', 'like', '%' . request('search') . '%')
          ->orWhere('category_id', 'like', '%' . request('search') . '%');
//          ->orWhere('user_id', 'like', '%' . request('search') . '%');
      }
    }

    public function getRouteKeyName() {
      return 'uuid';
}

// a book belongs to a category
    public function category() {

        return $this->belongsTo(Category::class,  'category_id');
    }

//    with this method, we can access the user of the book
//  like any other property of the book model.. a book belongs to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function showOnHomePage($no_of_books = 5) {
      return Book::latest()->filter()->paginate($no_of_books);
    }
}


