<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Categories Book') }}
    </h2>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @foreach($category->books as $book)



      <div class="flex">
        <p class="opacity-70">


      </div>
      <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
{{--        <img height="50" width="50" src="{{ asset('storage/'.$category->thumbnail) }}" class="rounded-xl">--}}


        <h2 class="font-bold text-2xl">
          Book title:
          {{ $category->title }}
        </h2>
        <p class="mt-2">
          Description:
          {{ Str::limit($category->description, 70) }}
        </p>

        <p class="mt-2">
          Category:
          {{ $category->name }}
        </p>

        <p class="mt-2">
          Author:
{{--          {{ $category->books->user->name }}--}}
        </p>

        <p class="mt-2">
          Pdf:
          {{ $category->pdf }}
        </p>


      </div>
      @endforeach
    </div>

  </div>
</x-app-layout>