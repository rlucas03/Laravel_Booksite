<x-app-layout>
{{--    @include('components.header')--}}
    <x-slot name="header">
    </x-slot>

    <h1 class="mx-6 my-6 text-2xl text-center">Admin User control panel</h1>

    {{-- users index --}}

    {{--  new design--}}
    {{--    new design--}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="mx-auto w-4/5 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User Name
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
            @foreach ($users as $user)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route('users.edit', $user) }}">
                            {{ 'Edit' }}

                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
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
        {{ $users->links() }}
    </div>


    {{--    end new design
    --}}

    {{--    <div class="flex flex-col">--}}
    {{--        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
    {{--            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">--}}
    {{--                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}

    {{--                    <table class="w-2/5 divide-y divide-gray-200 mx-auto">--}}
    {{--                        <tbody class="bg-white divide-y divide-gray-200">--}}
    {{--                        <tr>--}}
    {{--                            <th scope="col" class="px-6 py-3">--}}
    {{--                                Users name--}}
    {{--                            </th>--}}
    {{--                            <th scope="col" class="px-6 py-3">--}}
    {{--                                Action--}}
    {{--                            </th>--}}
    {{--                            <th scope="col" class="px-6 py-3">--}}
    {{--                                Delete--}}
    {{--                            </th>--}}

    {{--                        </tr>--}}
    {{--                        @foreach ($users as $user)--}}

    {{--                            <tr>--}}
    {{--                                <td class="px-6 py-4 whitespace-nowrap">--}}
    {{--                                    <div class="flex items-center">--}}
    {{--                                        <div class="text-xl font-medium text-gray-900">--}}
    {{--                                            --}}{{--                                            <a href="{{ route('users.show', $user) }}">--}}
    {{--                                            {{ $user->name }}--}}

    {{--                                            --}}{{--                                            </a>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </td>--}}

    {{--                                <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">--}}
    {{--                                    <a href="{{ route('users.edit', $user) }}">--}}
    {{--                                        {{ 'Edit' }}--}}

    {{--                                    </a>--}}
    {{--                                </td>--}}

    {{--                                <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">--}}
    {{--                                    <form action="{{ route('users.destroy', $user) }}" method="POST">--}}
    {{--                                        @method('delete')--}}
    {{--                                        @csrf--}}
    {{--                                        <button type="submit" class="btn btn-danger ml-4"--}}
    {{--                                                onclick="return confirm('Are you sure you want to delete this book?')">--}}
    {{--                                            Delete User--}}
    {{--                                        </button>--}}

    {{--                                    </form>--}}

    {{--                                </td>--}}
    {{--                            </tr>--}}
    {{--                        @endforeach--}}

    {{--                        </tbody>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--                {{ $users->links() }}--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

</x-app-layout>

