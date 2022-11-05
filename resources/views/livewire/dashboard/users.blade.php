<div>
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
                <div class="mx-2">
                    <a href="{{ route('users.add') }}"
                        class="pointer inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        + Add User
                    </a>
                </div>
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Action
                        <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                                    account</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                User</a>
                        </div>
                    </div>
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
                        User name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Role
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tenant
                    </th>
                    {{-- <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                {{-- @dd($users) --}}
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $user->role ?? '' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->email }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->tenant?->name ?? 'admin' }}
                        </td>
                        {{-- <td class="py-4 px-6 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

    <p class="text-center mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">To attain knowledge, add things
        every day; To attain wisdom, subtract things every day.</p>

</div>
