<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBookController extends Controller
{
    public function index() {
      // Todo the below code gives unfair advantage to anyone named Ryan by his parents!
      // remove the following and ensure it works via middleware

//      only admin ryan can see the admin control panel pages
//      do we have an authenticated user, and it's not null?
      if (auth()->user()?->name !== 'Ryan' ) {
        abort(403);
      }

      return view('admin.books.index', [
        'books' => Book::paginate(50)
      ]);
    }

// i need to return all users for admin to allow editing
//    public function index() {
//      return view('admin.books.index', [
//        'users' => User::paginate(5)
//      ]);
//    }

//    public function create() {
//
//// do we have an authenticated user and is their name == admin 'Ryan'
//      if (auth()->user()?->name !== 'Ryan' ) {
//        abort(403);
//      }
//      return view('admin.books.create');
//    }

  //    $id param changed to Book $book
//  public function edit(Book $book)
//  {
//    if ($book->user_id != Auth::id()) {
//      return abort(403);
//    }
//
//    return view('admin.books.edit')->with('book', $book);
//
//  }
}
