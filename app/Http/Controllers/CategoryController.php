<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function index()
    {
        // fetch books from the db & pass content to view to display them

//      using eloquent, get all the books of this logged in user and display them
        $books = Book::all();

//        return view('welcome')->with('books', $books);

             return view('welcome', [
            'books' => Book::latest()->paginate(5)
        ]);

//        return view('books.book')->with('books', $books);


    }


  public function mybooks()
  {
    // fetch books from the db & pass content to view to display them

//        using eloquent, get all the books of this logged in user and display them
    $books = Book::where('user_id',Auth::id() )->get();

    return view('books.index')->with('books', $books);


//        return view('books.book')->with('books', $books);

  }


  public function categories(Category $category) {
//    dd(\request()->all());
//    return view('books.categories', [
//        'books' => Book::latest('published_at')->with('category')->get(),
//        'category' => Category::all()
//    ]);
    return view('welcome',[
      'books' => $category->books,
      'categories' => Category::all()
    ]);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
//      $path = request()->file('thumbnail')->store('thumbnails');
//      $path = request()->file('pdf')->store('pdfs');
//      return 'done ' . $path;
//
//        dd(request()->all());
//      return \request()->all();

      $attributes = request()->validate([
        'title' => 'required',
        'thumbnail' => 'required|image',
        'slug' => 'required',
        'description' => 'required',
        'pdf' => 'required|mimes:pdf',
        'category_id' => ['required', Rule::exists('categories', 'id')]
      ]);
//        Yay
//      dd('success validation succeeded');


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
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

//    replace the primary key with the uuid of each book
//route model binding. changed $id to $uuid to Book $book
    public function show(Category $category)
    {
//      dd($category->books);
//      $book = Book::where('uuid', $uuid)->where('user_id', Auth::id())->firstOrFail();
//        if ($book->user_id != Auth::id()) {
//          return abort(403);
//        }
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    $id param changed to Book $book
    public function edit(Book $book)
    {
      if ($book->user_id != Auth::id()) {
          return abort(403);
        }

      return view('books.edit')->with('book', $book);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

//    $id param changed to Book $book
    public function update(Request $request, Book $book)
    {
//        dd($request);
//    if its the authorized user, all of this is done
      if ($book->user_id != Auth::id()) {
        return abort(403);
      }
      $attributes = request()->validate([
        'title' => 'required',
        'thumbnail' => 'required|image',
        'slug' => 'required',
        'description' => 'required',
        'pdf' => 'required|mimes:pdf',
        'category_id' => ['required', Rule::exists('categories', 'id')]
      ]);


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
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

//    $id param changed to Book $book because we are injecting the entire model
    public function destroy(Book $book)
    {
      if ($book->user_id != Auth::id()) {
        return abort(403);
      }

      $book->delete();
      return to_route('books.index')->with('success', 'Book deleted');
    }
}
