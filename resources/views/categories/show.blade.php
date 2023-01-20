<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Category ' . $category->name) }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{--            @foreach($category->books as $category)--}}
            {{--                @include('books._cards')--}}
            {{--            @endforeach--}}

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

            @foreach($category->books as $book)

{{--                <div class="flex">--}}
{{--                    <p class="opacity-70">--}}

{{--                </div>--}}
{{--                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">--}}


{{--                    <h2 class="font-bold text-2xl">--}}
{{--                        Category name:--}}
{{--                        {{ $book->category->name }}--}}
{{--                    </h2>--}}

{{--                    <p class="mt-2">--}}
{{--                        Slug:--}}
{{--                        {{ $book->category->slug }}--}}
{{--                    </p>--}}
{{--                    <p class="mt-2">--}}
{{--                        Category name:--}}
{{--                        {{ $book->category->id }}--}}
{{--                    </p>--}}
{{--                </div>--}}

                @include('books._cards')
            @endforeach
            </div>


        </div>

    </div>
</x-app-layout>
