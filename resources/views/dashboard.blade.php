<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight inline-flex mx-2 text-black">
            {{ __('Dashboard') }}
        </h2>

        {{--      <h2 class="font-semibold text-xl text-green-900 inline-flex items-center mx-2">--}}
        {{--        <a href="{{ route('welcome') }}" class="text-green-900 text-center">Home</a>--}}
        {{--        </h2>--}}

        {{--      @auth--}}
        {{--      <h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">--}}
        {{--        <a href="{{ route('books.create') }}" class="text-green-900 text-center">Upload</a>--}}
        {{--      </h2>--}}
        {{--      @endauth--}}

        <div class="text-center">

            @hasanyrole('Super-Admin|Admin')
            <x-admin-links></x-admin-links>

            @endrole
        </div>

    </x-slot>




    {{--          links just for admin to manage users --}}
    {{--    @hasanyrole('Super-Admin|Admin')--}}

    {{--    <p class="p-6 text-blue-800 underline">--}}
    {{--      <a href="{{ route('books.create') }}" class="text-blue-300">Upload new book</a>--}}
    {{--    </p>--}}

    {{--    <p class="p-6 text-blue-800 underline">--}}
    {{--      <a href="{{ route('users.index') }}" class="text-blue-300">Admin section for users</a>--}}
    {{--    </p>--}}

    {{--    <p class="p-6 text-blue-800 underline">--}}
    {{--      <a href="admin/books/index" class="text-blue-300">Admin section for books</a>--}}
    {{--      <a href="{{ route('books.index') }}" class="text-blue-300">Admin section for books</a>--}}
    {{--    </p>--}}

    {{--    <p class="p-6 text-blue-800 underline">--}}
    {{--      <a href="{{ route('categories.create') }}" class="text-blue-300">Admin section for Creating Categories</a>--}}
    {{--    </p>--}}

    {{--    <p class="p-6 text-blue-800 underline">--}}
    {{--      <a href="{{ route('categories.index') }}" class="text-blue-300">Admin section for Editing Categories</a>--}}
    {{--    </p>--}}

    {{--    @endrole--}}

    {{--  @endif--}}
    {{--  @endcan--}}


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Welcome {{ auth()->user()->name }}, you are logged in.</p>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('my-books') }}" class="hover:text-blue-400 underline">View My Books</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
