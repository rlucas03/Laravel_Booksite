<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BookController extends Controller
{

  /**
   * Create the controller instance.
   *
   * @return void
   */

  public function __construct()
  {
    $this->authorizeResource(Book::class, 'book');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */


  public function index()
  {
    // fetch books from the db & pass content to view to display them
//      using eloquent, get all the books of this logged in user and display them

//      dd('index');

    if (isAdmin())
        return $this->adminDashboard();

    return $this->welcome();
  }

  public function adminDashboard() {
      return view('admin.books.index', [
          'books' => Book::paginate(50)
      ]);
  }

  public function welcome()
  {
    return view('welcome', [
      'books' => Book::showOnHomePage(12),
      'categories' => Category::all()
    ]);
  }


  public function myBooks()
  {

    // fetch books from the db & pass content to view to display them
//        using eloquent, get all the books of this logged in user and display them
//    $books = Book::where('user_id',Auth::id() )->get();
    $books = \auth()->user()->books;
    return view('books.index')->with('books', $books);

  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function create()
  {
    return view('books.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
//      $path = request()->file('thumbnail')->store('thumbnails');
//      $path = request()->file('pdf')->store('pdfs');
//      return 'done ' . $path;
//
//        dd(request()->all());

    $attributes = request()->validate([
      'title' => 'required',
      'thumbnail' => 'required|image',
//        'slug' => 'required',
      'description' => 'required',
      'pdf' => 'required|mimes:pdf',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);
//      dd('success validation succeeded');

    $attributes['slug'] = Str::slug($request->title);
    $attributes['uuid'] = Str::uuid();
    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
    $attributes['pdf'] = \request()->file('pdf')->store('pdfs');

    Book::create($attributes);

//      return $this->create($attributes);

    return redirect('/');
  }


  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */

//    replace the primary key with the uuid of each book
//route model binding. changed $id to $uuid to Book $book
  public function show(Book $book)
  {

    return view('books.show')->with('book', $book);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
//    $id param changed to Book $book
  public function edit(Request $request, Book $book)
  {

//      if ($book->user_id != Auth::id() && auth()->user()?->name !== 'Super Admin'
//          && auth()->user()?->name !== 'Admin' ) {
//            return abort(403);
//        }


    return view('books.edit')->with('book', $book);

  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */

//    $id param changed to Book $book
  public function update(Request $request, Book $book)
  {


//    if its the authorized user, all of this is done


//      if ($book->user_id != Auth::id()) {
//        return abort(403);
//      }

//      if ($request->user()->cannot('update', $book)) {
//        abort(403);
//      }

    $attributes = request()->validate([
      'title' => 'required',
      'thumbnail' => 'required|image',
//        'slug' => 'required',
      'description' => 'required',
      'pdf' => 'required|mimes:pdf',
      'category_id' => ['required', Rule::exists('categories', 'id')]
    ]);

    $attributes['slug'] = Str::slug($request->title);
    $attributes['uuid'] = Str::uuid();
    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
    $attributes['pdf'] = \request()->file('pdf')->store('pdfs');

    $book->update($attributes);
    return to_route('books.show', $book)->with('success', 'Book updated');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */


  public function destroy(Request $request, Book $book)
  {

    $book->delete();
    return to_route('books.index')->with('success', 'Book deleted');


    //      if ($book->user_id != Auth::id()) {
//        return abort(403);
//      }


//      if ($book->user_id != Auth::id() && auth()->user()?->name !== 'Super Admin'
//        && auth()->user()?->name !== 'Admin' ) {
//        return abort(403);
//      }

  }
}
