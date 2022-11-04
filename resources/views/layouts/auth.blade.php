@extends('layouts.base')

@section('body')
    <div class="flex flex-col justify-center min-h-screen py-0 bg-gray-50 p-0 m-0">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
