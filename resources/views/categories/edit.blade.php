
{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>
  <h1>Testing edit page for admin users</h1>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Cat') }}
    </h2>
  </x-slot>
  <section>
    <form method="POST" action="{{route('categories.update', $category)}}" enctype="multipart/form-data" >
      @method('put')
      @csrf


      <div class="mb-6">

        <x-input-label for="name" :value="__('Name')" />

        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{($category->name)}}" required autofocus />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />

      </div>



      <button type="submit" class="">
        Submit

      </button>


    </form>

  </section>
</x-app-layout>
