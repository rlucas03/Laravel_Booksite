{{--<script src="https://cdn.tailwindcss.com"></script>--}}
<x-app-layout>
  <h1>Show page Admin controls user page</h1>

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
{{--            @foreach ($data['user'] as $user)--}}
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900">
                      <a href="{{ route('users.show', $data['user']) }}">
                        {{ $data['user']->name }}

                      </a>

                      <a href="{{ route('users.edit', $data['user']) }}">
                        {{ 'edit' }}

                      </a>

                      <form method="POST" action="{{ route('users.destroy', $data['user']) }}">
                        @csrf
                        @method('DELETE')
{{--                        <a href="{{ route('users.destroy', $data['user']) }}">--}}
{{--                          {{ 'delete' }}--}}

{{--                        </a>--}}
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
{{--                  <a href="{{ route('admin.users.edit', $user) }}" class="btn-link ml-auto">Edit</a>--}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
{{--                  <form action="{{ route('books.destroy', $user) }}" method="POST">--}}
{{--                    @method('delete')--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this book?')">Delete Book</button>--}}

{{--                  </form>--}}

                </td>
              </tr>
{{--            @endforeach--}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

