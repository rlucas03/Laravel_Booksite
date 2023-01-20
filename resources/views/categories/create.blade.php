{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>
  {{--this file can perhaps be deleted..got books create already--}}
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Category') }}
    </h2>
  </x-slot>
  <section class="mx-7">
    <form class="rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" >
      @csrf

      <div class="mb-6">

        <x-input-label for="name" :value="__('Name')" />

        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />


{{--        <label class="block mb-2 uppercase font-bold text-xs"--}}
{{--               for="Name"--}}
{{--        >--}}
{{--          Name--}}

{{--        </label>--}}

{{--        <input class="border border-gray-400 p-2 w-full"--}}
{{--               type="text"--}}
{{--               name="name"--}}
{{--               id="name"--}}
{{--               value="{{ old('name') }}"--}}
{{--               required--}}
{{--        >--}}

{{--        @error('name')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}

      </div>

      <x-primary-button class="">
        {{ __('Submit') }}
      </x-primary-button>

    </form>

  </section>
</x-app-layout>
