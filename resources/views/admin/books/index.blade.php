{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <h1 class="mx-6 my-6 text-2xl text-center">Admin Edit all Books</h1>

    {{--    new design--}}
    <div class="relative overflow-x-auto ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Book Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{ route('books.show', $book) }}">
                            {{ $book->title }}

                        </a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route('books.edit', $book) }}" class="btn-link ml-auto">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger ml-4"
                                    onclick="return confirm('Are you sure you want to delete this book?')">
                                Delete
                            </button>

                        </form>


                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>


        {{ $books->links() }}

    </div>


    {{--    end new design--}}

    {{--    <div class="flex flex-col">--}}
    {{--        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
    {{--            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">--}}
    {{--                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}
    {{--                    <table class="w-2/5 divide-y divide-gray-200">--}}
    {{--                        <tbody class="bg-white divide-y divide-gray-200">--}}
    {{--                        <tr>--}}
    {{--                            <th scope="col" class="px-6 py-3">--}}
    {{--                                Book name--}}
    {{--                            </th>--}}
    {{--                            <th scope="col" class="px-6 py-3">--}}
    {{--                                Action--}}
    {{--                            </th>--}}
    {{--                            <th scope="col" class="px-6 py-3">--}}
    {{--                                Delete--}}
    {{--                            </th>--}}

    {{--                        </tr>--}}
    {{--                        @foreach ($books as $book)--}}
    {{--                            <tr>--}}
    {{--                                <td class="px-6 py-4 whitespace-nowrap">--}}
    {{--                                    <div class="flex items-center">--}}
    {{--                                        <div class="text-xl font-medium text-gray-900">--}}
    {{--                                            <a href="{{ route('books.show', $book) }}">--}}
    {{--                                                {{ $book->title }}--}}

    {{--                                            </a>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </td>--}}

    {{--                                <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">--}}
    {{--                                    <a href="{{ route('books.edit', $book) }}" class="btn-link ml-auto">Edit</a>--}}
    {{--                                </td>--}}

    {{--                                <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">--}}
    {{--                                    <form action="{{ route('books.destroy', $book) }}" method="POST">--}}
    {{--                                        @method('delete')--}}
    {{--                                        @csrf--}}
    {{--                                        <button type="submit" class="btn btn-danger ml-4"--}}
    {{--                                                onclick="return confirm('Are you sure you want to delete this book?')">--}}
    {{--                                            Delete--}}
    {{--                                        </button>--}}

    {{--                                    </form>--}}

    {{--                                </td>--}}
    {{--                            </tr>--}}
    {{--                        @endforeach--}}

    {{--                        </tbody>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--                {{ $books->links() }}--}}
    {{--            </div>--}}
    {{--        </div>--}}
    </div>
</x-app-layout>

