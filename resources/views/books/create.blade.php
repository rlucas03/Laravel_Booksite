{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New book') }}
    </h2>
  </x-slot>
  <section>
          <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data" >
              @csrf


            <div>
              <x-input-label for="title" :value="__('Title')" />

              <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('name')" required autofocus />

              <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>


            <div class="mt-4">
              <x-input-label for="slug" :value="__('Slug')" />

              <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required autofocus />

              <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>


            <div class="mt-4">
              <x-input-label for="thumbnail" :value="__('Thumbnail')" />

              <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" required autofocus />

              <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
            </div>




            <div class="mt-4">
              <x-input-label for="description" :value="__('Description')" />

              <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />

              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>


            <div class="mt-4">
              <x-input-label for="Book" :value="__('Book')" />

              <x-text-input id="pdf" class="block mt-1 w-full" type="file" name="pdf" :value="old('pdf')" required autofocus />

              <x-input-error :messages="$errors->get('pdf')" class="mt-2" />
            </div>

              <div class="mt-4">
                  <label class="block mb-2 uppercase font-bold text-xs"
                         for="Category"
                  >
                      Category
                  </label>

                  <select name ="category_id" id="category_id">
                      @php
                          $categories = \App\Models\Category::all();
                      @endphp

              @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }} </option>
              @endforeach
                  </select>

                @error('category_id')
                  <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div class="mt-4">


                  <x-primary-button class="ml-3">
                    {{ __('Submit') }}
                  </x-primary-button>

                </div>

              </div>
          </form>

  </section>
</x-app-layout>
