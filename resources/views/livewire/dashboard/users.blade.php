<div>
    @if (session()->has('success'))
        <x-alert type="success" message="{{ session('success') }}" />
    @endif
    @if (session()->has('fail'))
        <x-alert type="fail" message="{{ session('fail') }}" />
    @endif
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="flex justify-between items-center px-4 py-4 bg-white dark:bg-gray-800">
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search-users"
                    class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for users">
            </div>
            <div class="flex flex-row justify-start">
                
                @if ($super)
                <div>
                    <div class="flex justify-center">
                        <div x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }
                        
                                this.$refs.button.focus()
                        
                                this.open = true
                            },
                            close(focusAfter) {
                                if (!this.open) return
                        
                                this.open = false
                        
                                focusAfter && focusAfter.focus()
                            }
                        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']" class="relative">
                            <!-- Button -->
                            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                :aria-controls="$id('dropdown-button')" type="button"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Choose Tenant

                                <!-- Heroicon: chevron-down -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Panel -->
                            <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                style="display: none;" class="absolute left-0 mt-2 w-40 rounded-md bg-white dark:bg-gray-600 ">
                                @foreach ($tenants as $key => $tenant)
                                <button wire:click="filterTenant({{$key}})"
                                    class="w-full text-start py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:hover:text-white">
                                    {{$tenant}}
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="mx-2">
                    <a href="{{ route('users.add') }}"
                        class="pointer inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        + Add User
                    </a>
                </div>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Your tenant users
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users of
                    current
                    tenant
                    designed to help you work and play, stay organized, keep in touch, grow your business, and more.
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Title
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Role
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Application
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tenant
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex justify-start items-center">
                                @if ($user->avatarUrl())
                                    <div class="flex-shrink-0 h-10 w-10 mr-3">
                                        <img class="h-10 w-10 rounded-full" src="{{ $user->avatarUrl() }}"
                                            alt="" loading="lazy">
                                    </div>
                                @else
                                    <svg class="h-10 w-10 text-gray-300 rounded-full" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                @endif
                                <div class="px-6 py-4 whitespace-no-wrap">
                                    <div>
                                        <div class="leading-5">
                                            <span
                                                class="text-sm leading-5 font-medium inline text-gray-900 dark:text-white">{{ $user->name }}</span>
                                            @if ($super && $user->id != auth()->id())
                                                <a wire:click="impersonate({{ $user->id }})" href="#"
                                                    class="inline px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">Impersonate</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-sm leading-5 text-gray-500 dark:text-gray-400">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>
                            @if ($user->status)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Inactive
                                </span>
                            @endif
                        </th>
                        <td class="py-4 px-6">
                            <div class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900 dark:text-white">{{ $user->title ?? '' }}
                                </div>
                                <div class="text-sm leading-5 text-gray-500 dark:text-gray-400">
                                    {{ $user->department ?? '' }}</div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->role ?? '' }}
                        </td>
                        <td class="py-4 px-6">
                            @if ($application = $user->documents->where('type', 'application')->first())
                                <div class="flex-shrink-0 h-10 w-10 mr-3">
                                    <a class="text-green-800" href="{{ $user->applicationUrl() }}" target="_blank">
                                        <svg class="text-green-800" width="48" height="48" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 21H17C18.1046 21 19 20.1046 19 19V9.41421C19 9.149 18.8946 8.89464 18.7071 8.70711L13.2929 3.29289C13.1054 3.10536 12.851 3 12.5858 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21Z"
                                                stroke="#4A5568" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            @else
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 21H17C18.1046 21 19 20.1046 19 19V9.41421C19 9.149 18.8946 8.89464 18.7071 8.70711L13.2929 3.29289C13.1054 3.10536 12.851 3 12.5858 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21Z"
                                        stroke="#4A5568" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->tenant?->name ?? 'admin' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

    <p class="text-center mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">To attain knowledge, add things
        every day; To attain wisdom, subtract things every day.</p>

</div>
