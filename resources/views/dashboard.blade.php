<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  <p class="py-6 mx-auto">
    <a href="/" class="mx-auto">Home page</a>
  </p>


  @role('Super-Admin')
    <p>Admin is logged in</p>
  @else <p>Admin is not logged in</p>
  @endrole


  {{--          links just for admin to manage users --}}
{{--  @can('manage-users')--}}
    @role('Super-Admin')
{{--  @if  (auth()->user()?->name == 'Ryan' )--}}

    <p class="p-6 text-blue-800 underline">
      <a href="{{ route('books.create') }}" class="text-blue-300">Upload new book</a>
    </p>

    <p class="p-6 text-blue-800 underline">
      <a href="{{ route('users.index') }}" class="text-blue-300">Admin section for users</a>
    </p>

    <p class="p-6 text-blue-800 underline">
{{--      <a href="admin/books" class="text-blue-300">Admin section for books</a>--}}
      <a href="{{ route('admin-books') }}" class="text-blue-300">Admin section for books</a>
    </p>

    <p class="p-6 text-blue-800 underline">
      <a href="{{ route('categories.create') }}" class="text-blue-300">Admin section for Creating Categories</a>
    </p>

    <p class="p-6 text-blue-800 underline">
      <a href="{{ route('categories.index') }}" class="text-blue-300">Admin section for Editing Categories</a>
    </p>

    @endrole

{{--  @endif--}}
{{--  @endcan--}}


  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('my-books') }}" class="hover:text-blue-400 underline">View My Books</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
