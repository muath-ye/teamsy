@extends('layouts.base')

@section('body')
    <div>
        @include('components.topbar')
        @include('components.sidebar')
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
