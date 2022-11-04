@extends('layouts.base')

@section('body')
    <div class="">
        <div class="m-0 p-0 z-30 fixed">
            @include('components.topbar')
        </div>
        <br class="">
        <div class="flex pt-12">

            @include('components.sidebar')
            
            <div class="w-full z-10">
                <main class="p-4">
                    @include('components.breadcrumb')
                    @yield('content')
                </main>

                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>

        </div>
    </div>
@endsection
