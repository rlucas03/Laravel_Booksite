<x-app-layout>
    <x-slot name="header">
        {{--        <h2 class="font-semibold text-xl leading-tight inline-flex mx-2 text-black">--}}
        {{--            {{ __('Dashboard') }}--}}
        {{--        </h2>--}}

        {{--      <h2 class="font-semibold text-xl text-green-900 inline-flex items-center mx-2">--}}
        {{--        <a href="{{ route('welcome') }}" class="text-green-900 text-center">Home</a>--}}
        {{--        </h2>--}}

        {{--      @auth--}}
        {{--      <h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">--}}
        {{--        <a href="{{ route('books.create') }}" class="text-green-900 text-center">Upload</a>--}}
        {{--      </h2>--}}
        {{--      @endauth--}}

    </x-slot>
    <h2 class="font-semibold text-xl leading-tight inline-flex mx-2 text-black">
        {{ __('Dashboard') }}
    </h2>
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
