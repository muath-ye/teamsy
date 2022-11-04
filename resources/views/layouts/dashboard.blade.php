@extends('layouts.base')

@section('body')
    <div>
        <div class="m-0 p-0 z-30 block">
            @include('components.topbar')
        </div>
        <br class="bg-sky-200">
        <div class="flex pt-12">

            @include('components.sidebar')

            <div class="bg-sky-50 w-full -z-10">
                <main>
                    @yield('content')
                </main>

                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>

        </div>
    </div>
@endsection
