@section('title', 'Users')
@section('content')

    <div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Your tenant users
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users of current tenant
                        designed to help you work and play, stay organized, keep in touch, grow your business, and more.</p>
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
                    @foreach($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$user->name}}
                        </th>
                        <td class="py-4 px-6">
                            {{$user->role ?? ''}}
                        </td>
                        <td class="py-4 px-6">
                            {{$user->email}}
                        </td>
                        <td class="py-4 px-6">
                            {{$user->tenant?->name ?? 'admin'}}
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

        <p class="text-center mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">To attain knowledge, add things every day; To attain wisdom, subtract things every day.</p>

    </div>
@endsection
