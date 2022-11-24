<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
  public function index()
  {

    $users = User::whereDoesntHave('books')->get();
    dd($users);

//    select users that  have 0 books and show them


    // fetch books from the db & pass content to view to display them
//      using eloquent, get all the books of this logged in user and display them

    //Todo - make the controllers slimmer and models fatter
    return view('test', [
      'books' => Book::showOnHomePage(4),
      'categories' => Category::all()
    ]);
  }
}
