<x-app-layout>
  <h1 class="pb-6">Admin user control panel. All Users for editing:</h1>
{{-- users index --}}
{{--{{dd($users)}}--}}
{{--    @foreach($users as $user)--}}
{{--       <p> User:--}}
{{--         <a href="{{ route('users.show', $user) }}">--}}

{{--         {{ $user->name }}--}}
{{--         </a>--}}
{{--       </p>--}}

{{--    @endforeach--}}





{{--  new design--}}

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="text-sm font-medium text-gray-900">
                      <a href="{{ route('users.show', $user) }}">
                        {{ 'User: ' . $user->name }}

                      </a>
                    </div>
                  </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{ route('users.edit', $user) }}">
                    {{ 'Edit' }}

                  </a>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <form action="{{ route('users.destroy', $user) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this book?')">Delete User</button>

                  </form>

                </td>
              </tr>
            @endforeach

            </tbody>
          </table>
        </div>
        {{ $users->links() }}
      </div>
    </div>
  </div>

</x-app-layout>

