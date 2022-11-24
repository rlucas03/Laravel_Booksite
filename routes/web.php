<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
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



Route::get('/', [BookController::class, 'index']);


// Todo - naming conventions are important. All methods should be camel-cased and all URIs should be dashed
// Todo - make sure all routes are named and there are no hard-coded urls in the views
Route::get('/my-books', [BookController::class, 'myBooks'])->name('my-books');

Route::get('test', [TestController::class, 'index'])->name('test');

// admin route
Route::get('admin/books', [AdminBookController::class, 'index'])->middleware('admin')->name('admin-books');

//Route::get('admin/books/create', [AdminBookController::class, 'create'])->middleware('admin')->name('admin-create');
//Route::get('admin/books/{book}/edit', [AdminBookController::class, 'edit'])->middleware('admin')->name('admin-edit');


Route::resource('users', UserController::class)->middleware('admin');

// Todo use the slug to access a book resource instead of ID
Route::resource('books', BookController::class)->middleware('auth');

// Todo - non-admins should not have access to create/update/delete
Route::resource('categories', CategoryController::class)->middleware('auth');



Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
