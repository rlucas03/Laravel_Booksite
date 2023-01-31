{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>

    <x-slot name="header">


    </x-slot>
    <h2 class="py-1 font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Cat') }}
    </h2>
    <section class="mx-7">
        <form class="rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('categories.update', $category)}}"
              enctype="multipart/form-data">
            @method('put')
            @csrf


            <div class="mb-6">

                <x-input-label for="name" :value="__('Name')"/>

                <x-text-input id="name" class="block w-7/12 mt-1" type="text" name="name" value="{{($category->name)}}"
                              required autofocus/>

                <x-input-error :messages="$errors->get('name')" class="mt-2"/>

            </div>
            <x-primary-button class="">
                {{ __('Submit') }}
            </x-primary-button>
        </form>

        <form action="{{ route('categories.destroy', $category) }}" method="POST">
            @method('delete')
            @csrf
            <button type="submit"
                    onclick="return confirm('WARNING, are you sure you want to delete this Category? This may cause errors on the website')"
                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800
                      focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm
                       px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white
                        dark:hover:bg-red-600 dark:focus:ring-red-900 ml-6"
            >
                DELETE CATEGORY
            </button>
        </form>




    </section>
</x-app-layout>
