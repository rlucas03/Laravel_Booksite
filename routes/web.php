<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index']);
//Route::get('/', [BookController::class, 'index']);
Route::get('/', [BookController::class, 'index']);


// Todo - naming conventions are important. All methods should be camel-cased and all URIs should be dashed
// Todo - make sure all routes are named and there are no hard-coded urls in the views
Route::get('/my-books', [BookController::class, 'myBooks'])->name('my-books');

Route::get('test', [\App\Http\Controllers\TestController::class, 'index'])->name('test');

// admin route
Route::get('admin/books', [AdminBookController::class, 'index'])->middleware('admin')->name('admin-books');
Route::get('admin/books/create', [AdminBookController::class, 'create'])->middleware('admin')->name('admin-create');
Route::get('admin/books/{book}/edit', [AdminBookController::class, 'edit'])->middleware('admin')->name('admin-edit');

// Todo - the following is unnecessary. Figure out why the destroy method for users is not working
//Route::delete('users/{user}', [UserController::class, 'destroy'])->middleware('admin');

// display users for admin control/ edit delete ect
//Route::get('admin/users', [AdminUserController::class, 'index'])->middleware('admin');


Route::resource('users', UserController::class)->middleware('admin');

Route::resource('books', BookController::class)->middleware('auth');

// Todo - non-admins should not have access to create/update/delete
Route::resource('categories', CategoryController::class)->middleware('auth');

// to create a new book
//Route::get('books/create', [BookController::class, 'create'])->middleware('auth');
//Route::post('books/create', [BookController::class, 'store'])->middleware('auth');



Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';


//
//Route::get('/', function () {
//    return view('welcome');
//});


// route to display a single individual book. {book} will be unique id in the url
//Route::get('books/{book}', function($slug) {
////    find a book by its slug and return it to a view called book
//    $book = Book::find($slug);
//    return view('book', [
//        'book' => $book // in book view now have access to book
//    ]);
//});



// all of Routes commented out below are handled by different methods of the same controller
// assigns the typical create, read, update, and delete ("CRUD")
// routes to a controller with a single line of code

// list all the books of the logged in user
//Route::get('/books');
// display a single individual book where {book} is the unique id in the url
//Route::get('/books/{book}');

// Display the form to create a note
//Route::get('/books/create');

// post route to save the created note
//Route::post('/');


// edit
// update
// destroy

// this route can only be accessed by logged in users. Breeze created it
