<x-app-layout>
{{--  MY BOOKS PAGE --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex mx-2">
            {{ __('My Books') }}
        </h2>


      <h2 class="font-semibold text-xl  inline-flex">
        <a href="{{ route('welcome') }}" class="text-green-900 ">Home</a>
      </h2>

      <h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">
        <a href="{{ route('books.create') }}" class="text-green-900 text-center">Upload</a>
      </h2>

      @hasanyrole('Super-Admin|Admin')

      <x-admin-links></x-admin-links>
      @endrole

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <p class="p-6 text-blue-800 underline">
            <a href="{{ route('books.create') }}" class="text-blue-300">Upload new book</a>
          </p>


{{--          @can('manage-users')--}}

{{--          <p class="p-6 text-blue-800 underline">--}}
{{--              <a href="{{ route('users.index') }}" class="text-blue-300">Admin section for Users</a>--}}
{{--            </p>--}}

{{--            <p class="p-6 text-blue-800 underline">--}}
{{--              <a href="{{ route('books.index') }}" class="text-blue-300">Admin section for Books</a>--}}
{{--            </p>--}}

{{--            <p class="p-6 text-blue-800 underline">--}}
{{--              <a href="{{ route('categories.create') }}" class="text-blue-300">Admin section for Creating Categories</a>--}}
{{--            </p>--}}

{{--            <p class="p-6 text-blue-800 underline">--}}
{{--              <a href="{{ route('categories.index') }}" class="text-blue-300">Admin section for Editing Categories</a>--}}
{{--            </p>--}}
{{--          @endcan--}}

{{--          @endif--}}





           @foreach($books as $book)
            <a href="{{ route('books.show', $book) }}">

              <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <img height="50" width="50" src="{{ asset('storage/'.$book->thumbnail) }}" class="rounded-xl">

                <h2 class="font-bold text-2xl">
                       Book Title:
                       {{ $book->title }}
                </h2>
                   <p class="mt-2">
                       Description:
                       {{ Str::limit($book->description, 70) }}
                   </p>

                 <p class="mt-2">
                   Category:
                   {{ $book->category->name }}
                 </p>

                <p class="mt-2">
                  Author:
                  {{ $book->user->name }}
                </p>

                 <p class="mt-2">
                   Pdf:
                   {{ $book->pdf }}
                 </p>


                 <span class="block mt-4 text-sm opacity-70">{{ $book->updated_at->diffForHumans() }}</span>
               </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
