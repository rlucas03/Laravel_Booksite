<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
//    public function index(User $user) {
////      only admin ryan can see the admin control panel pages
////      do we have an authenticated user, and it's not null?
//      if (auth()->user()?->name !== 'Ryan' ) {
//        abort(403);
//      }
//
//
////      if (auth()->user()->name !== 'Ryan' ) {
////        abort(403);
////      }
//
//      return view('admin.users.index')->with('users', $user);
//
//    }

// i need to return all users for admin to allow editing
//    public function index() {
//      return view('admin.books.index', [
//        'users' => User::paginate(5)
//      ]);
//    }

//    public function create() {
//
//// only admin ryan can access admin/books/create form
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