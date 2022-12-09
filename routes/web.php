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

//Route::get('/', function () {
//  if (auth()->user()) {
//        auth()->user()->assignRole('admin');
//  }
//  return view('home');
//});




Route::get('/', [BookController::class, 'index'])->name('home');


// Todo - naming conventions are important. All methods should be camel-cased and all URIs should be dashed
// Todo - make sure all routes are named and there are no hard-coded urls in the views
Route::get('/my-books', [BookController::class, 'myBooks'])->name('my-books');

Route::get('test', [TestController::class, 'index'])->name('test');

// admin route

//Route::get('admin/books/create', [AdminBookController::class, 'create'])->middleware('admin')->name('admin-create');
//Route::get('admin/books/{book}/edit', [AdminBookController::class, 'edit'])->middleware('admin')->name('admin-edit');

// route group for admin only sections
Route::group(['middleware' => ['can:manage-users']], function () {
  Route::resource('users', UserController::class);
  Route::resource('categories', CategoryController::class);
  Route::get('admin/books', [AdminBookController::class, 'index'])->name('admin-books'); // admin middleware b4

});

Route::resource('books', BookController::class)->middleware('auth');

//Route::resource('users', UserController::class)->middleware('can:manage-users'); //admin before in middleware


//Route::resource('categories', CategoryController::class)->middleware('can:manage-categories'); // middleware = auth before change to roles and permissions



Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
