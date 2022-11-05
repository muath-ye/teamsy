@if (session()->has('impersonate'))
    <div class="relative bg-indigo-600 my-3 rounded-lg">
        <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                    <span class="md:hidden">
                        You are impersonating
                        <span class="px-2 py-1 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ auth()->user()->name }}
                        </span>
                    </span>
                    <span class="hidden md:inline">
                        You are impersonating
                        <span class="px-2 py-1 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ auth()->user()->name }}
                        </span>
                    </span>
                    <span class="block sm:ml-2 sm:inline-block">
                        <a href="{{ route('leave-impersonation') }}" class="text-white font-bold underline">
                            Leave Impersonation &rarr;
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>
@endif
