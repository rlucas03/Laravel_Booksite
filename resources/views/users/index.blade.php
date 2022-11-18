<x-app-layout>
  <h1 class="pb-6">Admin user control panel. All Users for editing:</h1>

{{--{{dd($users)}}--}}
    @foreach($users as $user)
       <p> User:
         <a href="{{ route('users.show', $user) }}">

         {{ $user->name }}
         </a>
       </p>

    @endforeach


</x-app-layout>

