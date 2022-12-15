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



// old home route
//Route::get('/', [BookController::class, 'index'])->name('home');

Route::get('/my-books', [BookController::class, 'myBooks'])->name('my-books');

//Route::get('test', [TestController::class, 'index'])->name('test');

// admin route

// route group for admin only sections
Route::group(['middleware' => ['can:manage-users']], function () {
  Route::resource('users', UserController::class);
  Route::resource('categories', CategoryController::class);

});
//Route::group(['middleware' => ['auth']], function () {

  Route::resource('books', BookController::class); // was can:edit-books
//  Route::get('/', [BookController::class, 'index'])->name('home')->can('manage-books', 'book');
//  Route::get('/', [BookController::class, 'index'])->name('home');


  Route::get('/', [BookController::class, 'welcome'])->name('welcome');

//});



//Route::resource('users', UserController::class)->middleware('can:manage-users'); //admin before in middleware


//Route::resource('categories', CategoryController::class)->middleware('can:manage-categories'); // middleware = auth before change to roles and permissions



Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
