<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
        return view('users.index', [
//        'users' => User::paginate(50)
            'users' => $this->getUsers(),
        ]);

    }


    public function getUsers()
    {
        return User::paginate(20);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

//    replace the primary key with the uuid of each book
//route model binding. changed $id to $uuid to Book $book to User $user
    public function show(User $user)
    {


        $data['user'] = $user;
        return view('users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
//    $id param changed to Book $book
    public function edit(User $user)
    {
        $data['user'] = $user;

        return view('users.edit')->with('user', $user);
//    return view('users.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

//    $id param changed to Book $book
    public function update(Request $request, User $user)
    {
//        dd($request);

//      if ($book->user_id != Auth::id()) {
//        return abort(403);
//      }

        $attributes = request()->validate([
            'name' => 'required',
//            'current_password' => ['required', new MatchOldPassword],
            'password' => ['confirmed'],
//            'new_confirm_password' => ['same:new_password'],
            'email' => 'required',

        ]);

//        $attributes = request()->validate([
//            'name' => 'required',
//            'password' => 'required',
//            'email' => 'required',
//        ]);
        if ($attributes['password'] == null) {
            $attributes['password'] = $user->password;
        } else {
            $attributes['password'] = Hash::make($attributes['password']);
        }

//      $attributes['uuid'] = Str::uuid();
//      $attributes['user_id'] = auth()->id();
//      $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
//      $attributes['pdf'] = \request()->file('pdf')->store('pdfs');

        $user->update($attributes);
        return to_route('users.index', $user)->with('success', 'User updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

//    $id param changed to Book $book because we are injecting the entire model
    public function destroy(User $user)
    {
//      if ($book->user_id != Auth::id()) {
//        return abort(403);
//      }

        $user->delete();
        return to_route('users.index')->with('success', 'User deleted');
    }
}
