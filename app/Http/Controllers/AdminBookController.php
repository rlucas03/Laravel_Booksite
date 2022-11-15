<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index() {
      return view('admin.books.index', [
        'books' => Book::paginate(5)
      ]);
    }

    public function create() {
      return view('admin.books.create');
    }
}
