<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--      {{ __('Categories Book') }}--}}
    </h2>
  </x-slot>


  <div class="flex">
    <p class="opacity-70">
      <strong>Created: </strong> {{ $category->created_at->diffForHumans() }}
    </p>
    <p class="opacity-70 ml-8">
      <strong>Updated at: </strong> {{ $category->updated_at->diffForHumans() }}
    </p>
    <a href="{{ route('books.edit', $category) }}" class="btn-link ml-auto">Edit Book</a>
    <form action="{{ route('books.destroy', $category) }}" method="POST">
      @method('delete')
      @csrf
      <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this book?')">Delete Book</button>

    </form>

  </div>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @foreach($category->books as $category)



      <div class="flex">
        <p class="opacity-70">


      </div>
      <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">


        <h2 class="font-bold text-2xl">
          Category title:
          {{ $category->name }}
        </h2>

        <p class="mt-2">
          Slug:
          {{ $category->slug }}
        </p>



      </div>
      @endforeach
    </div>

  </div>
</x-app-layout>
