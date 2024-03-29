<x-app-layout>
    <x-slot name="header">

    </x-slot>


    {{--this view is for individual books link from home page--}}

    @if(session('success'))
        <div class="mb-4 px-4 bg-green-100 border border-green-200 text-green-700 rounded-md">
            {{session('success')}}
        </div>
    @endif


    <div class="flex">
        <p class="opacity-70">
            <strong>Created: </strong> {{ $book->created_at->diffForHumans() }}
        </p>
        <p class="opacity-70 ml-8">
            <strong>Updated at: </strong> {{ $book->updated_at->diffForHumans() }}
        </p>
        @auth
            <a href="{{ route('books.edit', $book) }}" class="btn-link ml-auto">Edit Book</a>
            <form action="{{ route('books.destroy', $book) }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger ml-4"
                        onclick="return confirm('Are you sure you want to delete this book?')">Delete Book
                </button>
            </form>
        @endauth
    </div>
    <h2 class="mt-1 font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Individual Book') }}
    </h2>
    <div class="my-6 p-6 bg-slate-200 border-b border-gray-200 shadow-sm sm:rounded-lg">
        <img height="50" width="50" src="{{ asset('storage/'.$book->thumbnail) }}" class="rounded-xl">

        <h2 class="font-bold text-2xl">
            Book title:
            {{ Str::limit($book->title, 15) }}
        </h2>
        <p class="mt-2">
            Description:
            {{ Str::limit($book->description, 15) }}
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
            @auth
                Pdf:
                <a class="hover:bg-blue-500" href=" {{asset('storage/'.$book->pdf)}}" target="_blank"
                   download="{{ $book->pdf }}">download</a>
            @else
                <a href="{{ route('login') }}" class="underline">Log in to download</a>
            @endauth                </p>
    </div>

</x-app-layout>
