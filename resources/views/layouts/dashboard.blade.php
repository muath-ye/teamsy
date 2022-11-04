@extends('layouts.base')

@section('body')
    <div>
        <nav wire:ignore class="bg-indigo-600 border-b border-gray-200 fixed  w-full">
            <div class="py-1"></div>
         </nav>
        @include('components.sidebar')
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
