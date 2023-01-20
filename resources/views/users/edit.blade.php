
{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit user') }}
    </h2>
  </x-slot>
  <section class="mx-7">
    <form class="rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('users.update', $user)}}" enctype="multipart/form-data" >
      @method('put')
      @csrf

      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs"
               for="Name"
        >
          Name

        </label>

        <input class="border border-gray-400 p-2 w-7/12"
               type="text"
               name="name"
               id="name"
               value="{{ ($user->name) }}"
               required
        >

        @error('name')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

      </div>

      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs"
               for="Password"
        >
          Password

        </label>

        <input class="border border-gray-400 p-2 w-7/12"
               type="text"
               name="password"
               id="password"
               value="{{ ($user->password) }}"

               required
        >

        @error('password')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

      </div>


      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs"
               for="Email"
        >
          Email

        </label>

        <input class="border border-gray-400 p-2 w-7/12"
               type="text"
               name="email"
               id="email"
               value="{{ ($user->email) }}"


        >

        @error('email')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

      </div>



          <button type="submit" class="">
            Submit

          </button>

        </div>

      </div>
    </form>

  </section>
</x-app-layout>
