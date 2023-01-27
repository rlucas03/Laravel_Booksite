<nav class="my-3">
    <ul class="sm:block md:inline-flex lg:inline-flex flex-wrap align-content-center ">
        <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
            <a href="{{ route('welcome') }}" class="text-green-900 text-center hover:bg-purple-500">Home</a>
        </li>
        <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
            <a href="{{ route('users.index') }}" class="text-green-900 text-center hover:bg-purple-500">Users</a>
        </li>
        <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
            <a href="{{ route('books.index') }}" class="text-green-900 text-center hover:bg-purple-500">Books</a>
        </li>
        <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
            <a href="{{ route('categories.index') }}"
               class="text-green-900 text-center hover:bg-purple-500">Categories</a>
        </li>
        <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
            <a href="{{ route('categories.create') }}" class="text-green-900 text-center hover:bg-purple-500">New
                Cat</a>
        </li>
        @auth
            <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
                <a href="{{ route('books.create') }}" class="text-green-900 text-center hover:bg-purple-500">Upload</a>
            </li>
        @endauth
    </ul>
</nav>
