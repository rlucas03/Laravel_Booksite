{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>
  {{--this file can perhaps be deleted..got books create already--}}
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Category') }}
    </h2>
  </x-slot>
  <section>
    <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" >
      @csrf

      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs"
               for="Name"
        >
          Name

        </label>

        <input class="border border-gray-400 p-2 w-full"
               type="text"
               name="name"
               id="name"
               value="{{ old('name') }}"
               required
        >

        @error('name')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

      </div>

{{--      <div class="mb-6">--}}
{{--        <label class="block mb-2 uppercase font-bold text-xs"--}}
{{--               for="Slug"--}}
{{--        >--}}
{{--          Slug--}}

{{--        </label>--}}

{{--        <input class="border border-gray-400 p-2 w-full"--}}
{{--               type="text"--}}
{{--               name="slug"--}}
{{--               id="slug"--}}
{{--               value="{{ old('slug') }}"--}}

{{--        >--}}

{{--        @error('slug')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}


          <button type="submit" class="">
            Submit

          </button>

        </div>

      </div>
    </form>

  </section>
</x-app-layout>
