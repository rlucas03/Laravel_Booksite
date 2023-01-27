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

});
// TODO take categories out of group midddleware and make a category policy so guest users can browse all books
Route::resource('categories', CategoryController::class);

//Route::group(['middleware' => ['auth']], function () {

Route::resource('books', BookController::class); // was can:edit-books
//  Route::get('books/slug', [BookController::class, 'show'])->middleware('guest');
//  Route::get('/', [BookController::class, 'index'])->name('home');


Route::get('/', [BookController::class, 'welcome'])->name('welcome');

//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__ . '/auth.php';
