<x-app-layout>
    {{--  MY BOOKS PAGE --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-flex mx-2 px-5">
            {{ __('My Books') }}
        </h2>
        <div class="text-center">
            @hasanyrole('Super-Admin|Admin')

            <x-admin-links></x-admin-links>
            @endrole
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{--          <p class="p-6 text-blue-800 underline">--}}
            {{--            <a href="{{ route('books.create') }}" class="text-blue-300">Upload new book</a>--}}
            {{--          </p>--}}

            {{--           @foreach($books as $book)--}}
            {{--            <a href="{{ route('books.show', $book) }}">--}}

            {{--              <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">--}}
            {{--                <img height="50" width="50" src="{{ asset('storage/'.$book->thumbnail) }}" class="rounded-xl">--}}

            {{--                <h2 class="font-bold text-2xl">--}}
            {{--                       Book Title:--}}
            {{--                       {{ $book->title }}--}}
            {{--                </h2>--}}
            {{--                   <p class="mt-2">--}}
            {{--                       Description:--}}
            {{--                       {{ Str::limit($book->description, 70) }}--}}
            {{--                   </p>--}}

            {{--                 <p class="mt-2">--}}
            {{--                   Category:--}}
            {{--                   {{ $book->category->name }}--}}
            {{--                 </p>--}}

            {{--                <p class="mt-2">--}}
            {{--                  Author:--}}
            {{--                  {{ $book->user->name }}--}}
            {{--                </p>--}}

            {{--                 <p class="mt-2">--}}
            {{--                   Pdf:--}}
            {{--                   <a href=" {{asset('storage/'.$book->pdf)}}" target="_blank" download="{{ $book->pdf }}">download</a>--}}
            {{--                 </p>--}}


            {{--                 <span class="block mt-4 text-sm opacity-70">{{ $book->updated_at->diffForHumans() }}</span>--}}
            {{--               </div>--}}
            {{--            </a>--}}

            {{--            @endforeach--}}
            {{--          --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

                {{--    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700--}}
                {{--    w-full mb-4 bg-gray-500">--}}

                @foreach($books as $book)
                    @include('books._cards')
                @endforeach
                {{--  </div>--}}

                {{--  main div--}}
            </div>

        </div>
    </div>


</x-app-layout>
