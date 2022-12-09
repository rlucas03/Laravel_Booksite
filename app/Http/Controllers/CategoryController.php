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
          return view('categories.index', [
        'categories' => $this->getCategories()
      ]);

    }

  public function getCategories() {
    return Category::all();
  }


  public function categories(Category $category) {
//    dd(\request()->all());

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
      return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $attributes = request()->validate([
        'name' => 'required'
    ]);

      $attributes['slug'] = Str::slug($request->name);

//      dd('success validation succeeded');



      Category::create($attributes);

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

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
//    $id param changed to Book $book
    public function edit(Category $category)
    {
          return view('categories.edit')->with('category', $category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

//    $id param changed to Book $book
    public function update(Request $request, Category $category)
    {

//      if ($book->user_id != Auth::id() && auth()->user()?->name !== 'Ryan' ) {
//        return abort(403);
//      }

//      $title = $this->faker->unique()->word;
//      $slug = Str::slug($title);

      $attributes = request()->validate([
        'name' => 'required'

      ]);

      $attributes['slug'] = Str::slug($request->name);

      $category->update($attributes);
      return to_route('categories.index', $category)->with('success', 'Category updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

//    $id param changed to Book $book because we are injecting the entire model
    public function destroy(Category $category)
    {
      $category->delete();
    }
}
