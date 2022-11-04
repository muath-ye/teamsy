<!-- component -->
<div id="view" class="h-full w-screen flex flex-row" x-data="{ sidenav: true, isOpen: '{{url()->current()}}' }">
    <button @click="sidenav = true"
        class=" m-3 p-2 border-2 bg-white rounded-md border-gray-200 text-gray-500 focus:bg-indigo-500 focus:outline-none focus:text-white absolute top-0 left-0 "
        >
        <svg class="w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <div id="sidebar"
        class="bg-white h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out"
        x-show="sidenav" @click.away="sidenav = false">
        <div class="space-y-6 md:space-y-10 mt-10">
            <h1 class="text-indigo-600 uppercase font-bold text-4xl text-center md:hidden">
                T
            </h1>
            <h1 class="text-indigo-600 uppercase hidden md:block font-bold text-sm md:text-xl text-center">
                Teamsy
            </h1>
            <div id="profile" class="space-y-3">
                <x-muathye-logo class="w-3 md:w-16 rounded-full mx-auto" />
                {{-- <img src="https://avatars.githubusercontent.com/u/34031333?v=4" alt="Avatar user"
                    class="w-10 md:w-16 rounded-full mx-auto" /> --}}
                <div>
                    <h2 class="font-medium text-xs md:text-sm text-center text-indigo-500">
                        {{auth()->user()->name}}
                    </h2>
                    <p class="text-xs text-gray-500 text-center">{{auth()->user()->role ?? ''}}</p>
                </div>
            </div>
            
            <div id="menu" class="flex flex-col space-y-2">
                @if (Route::has('login'))
                @auth
                <a href="{{route('home')}}" 
                class="text-sm font-medium  py-2 px-2 hover:bg-indigo-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
                    :class="{ 'bg-indigo-500': isOpen === '{{route('home')}}', 'text-white': isOpen === '{{route('home')}}', 'text-gray-700': isOpen !== '{{route('home')}}'}">
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="">Dashboard</span>
                </a>
                <a href="{{route('users')}}"
                class="text-sm font-medium  py-2 px-2 hover:bg-indigo-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
                :class="{ 'bg-indigo-500': isOpen === '{{route('users')}}', 'text-white': isOpen === '{{route('users')}}', 'text-gray-700': isOpen !== '{{route('users')}}'}"
                >
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                    <span class="">Users</span>
                </a>
                <a href="{{route('company')}}"
                    class="text-sm font-medium  py-2 px-2 hover:bg-indigo-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
                    :class="{ 'bg-indigo-500': isOpen === '{{route('company')}}', 'text-white': isOpen === '{{route('company')}}', 'text-gray-700': isOpen !== '{{route('company')}}'}"
                    >
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z">
                        </path>
                    </svg>
                    <span class="">Company</span>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-gray-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                    
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                     </svg>
                    <span class="">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}" class="block w-full bg-gray-50 px-5 py-3 text-center font-medium text-indigo-600 hover:bg-gray-100">Log in</a>
                @endauth
                @endif
            </div>
        </div>
    </div>

</div>

<script src="js/graph.js" type="text/javascript"></script>
<script>
    var user = document.getElementById("user-chart").nodeName;
    var chart = new Graph({
        data: [1, 20, 5, 6, 8],
        target: document.querySelector(user),
    });
</script>
