{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit book') }}
    </h2>
  </x-slot>
  <section>
    <form method="POST" action="{{route('books.update', $book )}}" enctype="multipart/form-data" >
      @method('put')
      @csrf

      <div>
        <x-input-label for="title" :value="__('Title')" />

        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{old('title', $book->title)}}" required autofocus />

        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>


      <div class="mb-6">

        <x-input-label for="thumbnail" :value="__('Thumbnail')" />

        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail"  required autofocus />

        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />


      </div>

      <div class="mb-6">

        <x-input-label for="description" :value="__('Description')" />

        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{old('description', $book->description)}}" required autofocus />

        <x-input-error :messages="$errors->get('description')" class="mt-2" />


      </div>

      <div class="mb-6">
        <x-input-label for="book" :value="__('Book')" />

        <x-text-input id="pdf" class="block mt-1 w-full" type="file" name="pdf"  required autofocus />

        <x-input-error :messages="$errors->get('pdf')" class="mt-2" />



      </div>

      <div class="mb-6">
{{--        <label class="block mb-2 uppercase font-bold text-xs"--}}
{{--               for="Category"--}}
{{--        >--}}
{{--          Category--}}
{{--        </label>--}}
        <x-input-label for="Category" :value="__('Category')" />


        <select name ="category_id" id="category_id">
          @php
            $categories = \App\Models\Category::all();
          @endphp

          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
            >{{ $category->name }} </option>
          @endforeach
        </select>


        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

        {{--        @error('category_id')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}

        <div class="mb-6">

          <button type="submit" class="">
            Submit

          </button>

        </div>

      </div>
    </form>

  </section>
</x-app-layout>
