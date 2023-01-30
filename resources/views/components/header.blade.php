{{--@if(Auth::guest())--}}

@guest
    <nav>
        <ul class="sm:block md:inline-flex lg:inline-flex flex-wrap align-content-center">
            <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
                <a href="{{ route('welcome') }}" class="text-green-900 text-center hover:bg-purple-500">Home</a>
            </li>
        </ul>
    </nav>
@endguest

@hasanyrole('Super-Admin|Admin')
<div class="text-center">


    <x-admin-links></x-admin-links>

</div>
@endrole


@if(!Auth::guest())
    <ul class="sm:block md:inline-flex lg:inline-flex flex-wrap align-content-center">
{{--        <li class="text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">--}}
{{--            <a href="{{ route('welcome') }}" class="text-green-900 text-center hover:bg-purple-500">Home</a>--}}
{{--        </li>--}}

        <li class=" text-2xl sm:text-2xl mx-4 italic lg:text-3xl xl:text-3xl">
            <a href="{{ route('books.create') }}" class="text-green-900 text-center hover:bg-purple-500">Upload</a>
        </li>
    </ul>
@endif
