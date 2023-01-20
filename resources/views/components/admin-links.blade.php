{{--<div class="text-center">--}}

<nav>
    <ul class="inline-flex align-content-center ">
        <li class="mx-4 text-xl italic text-3xl">
            <a href="{{ route('welcome') }}" class="text-green-900 text-center hover:bg-purple-500">Home</a>
        </li>
        <li class="mx-4 text-xl italic text-3xl">
            <a href="{{ route('users.index') }}" class="text-green-900 text-center hover:bg-purple-500">Users</a>
        </li>
        <li class="mx-4 text-xl italic text-3xl">
            <a href="{{ route('books.index') }}" class="text-green-900 text-center hover:bg-purple-500">Books</a>
        </li>
        <li class="mx-4 text-xl italic text-3xl">
            <a href="{{ route('categories.create') }}" class="text-green-900 text-center hover:bg-purple-500">New Cat</a>
        </li>
        <li class="mx-4 text-xl italic text-3xl">
            <a href="{{ route('categories.index') }}" class="text-green-900 text-center hover:bg-purple-500">Categories</a>
        </li>


        @auth
            <li class="mx-4 text-xl italic text-3xl">
                <a href="{{ route('books.create') }}" class="text-green-900 text-center hover:bg-purple-500">Upload</a>
            </li>
        @endauth
    </ul>
</nav>

{{--<h2 class="font-semibold text-xl text-green-900 inline-flex items-center mx-2">--}}
{{--    <a href="{{ route('welcome') }}" class="text-green-900 text-center">Home</a>--}}
{{--</h2>--}}

{{--  <h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">--}}
{{--    <a href="{{ route('books.create') }}" class="text-green-900 text-center">Upload</a>--}}
{{--  </h2>--}}

{{--<h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">--}}
{{--    <a href="{{ route('users.index') }}" class="text-green-900 text-center">Users</a>--}}
{{--</h2>--}}

{{--<h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">--}}
{{--    <a href="{{ route('books.index') }}" class="text-green-900 text-center">Books</a>--}}
{{--</h2>--}}

{{--<h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">--}}
{{--    <a href="{{ route('categories.create') }}" class="text-green-900 text-center">New Cat</a>--}}
{{--</h2>--}}

{{--<h2 class="font-semibold text-xl text-green-900 leading-tight inline-flex mx-2">--}}
{{--    <a href="{{ route('categories.index') }}" class="text-green-900 text-center">Categories</a>--}}
{{--</h2>--}}
{{--</div>--}}


{{--<nav class="text-2xl">--}}
{{--  <ul class="flex justify-between items-center mx-7 my-4">--}}
{{--    <li>--}}
{{--      <a href="{{ route('welcome') }}" class="text-green-900 text-center">Home</a>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--      <a href="{{ route('books.create') }}" class="text-green-900 text-center">Upload</a>--}}
{{--    </li>--}}
{{--    <li>--}}
{{--      <a href="{{ route('users.index') }}" class="text-green-900 text-center">Users</a>--}}
{{--    </li>--}}

{{--    <li>--}}
{{--      <a href="{{ route('books.index') }}" class="text-green-900 text-center">Books</a>--}}
{{--    </li>--}}

{{--    <li>--}}
{{--      <a href="{{ route('categories.create') }}" class="text-green-900 text-center">New Cat</a>--}}

{{--    </li>--}}
{{--    <li>--}}
{{--      <a href="{{ route('categories.index') }}" class="text-green-900 text-center">Categories</a>--}}
{{--    </li>--}}
{{--  </ul>--}}
{{--</nav>--}}
