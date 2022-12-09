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
      // remove the following and ensure it works via middleware

//      only admin ryan can see the admin control panel pages
//      do we have an authenticated user, and it's not null?
//      if (auth()->user()?->name !== 'Ryan' ) {
//        abort(403);
//      }

      return view('admin.books.index', [
        'books' => Book::paginate(50)
      ]);
    }



}
