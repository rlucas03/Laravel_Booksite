<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
//        $users = DB::select('select * from users');
//        dd($users);

//        Eloquent ORM
//        $users = User::all();
//        foreach ($users as $user) {
//            echo $user->name ."<br>";

//      dd($users);
//        }

//        Eloquent ORM
//        echo out each book to the view


//        $books = Book::all();
//
//        return view('welcome', [
//            'books' => Book::latest()->paginate(5)
//        ]);

//        return view('welcome')->with('books', $books);

//        insert a new user row into DB using Eloquent ORM
//        $user = new User();
//        $user->name ='New';
//        $user->email = 'email@email.com';
//        $user->password = bcrypt('password');
//        $user->save();

    }

    public function create() {

//        form for new book
//        return view('books.create');
    }

    public function store() {
//            ddd(\request()->all());
//
//      $attributes = \request()->validate([
//        'title' => 'required',
//        'description' => 'required',
//        'category' => 'required'
//
//      ]);


    }

}
