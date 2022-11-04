@section('title', 'Create a new account')

<div class="w-100">
    <div class="flex justify-center min-h-screen">
        <div class="flex items-center w-full max-w-3xl p-0 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full py-7">
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <a href="{{ route('home') }}">
                        <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
                    </a>
        
                    <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
                        Start your free trail
                    </h2>
        
                    <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                        Or
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            sign in to your account
                        </a>
                    </p>
                </div>
        
                <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                        <form wire:submit.prevent="register">
                            <x-text-input label="Name" type="text" wire:model="name" :required="true" class="mt-6" />

                            <x-text-input label="Email address" type="email" wire:model="email" :required="true" class="mt-6" />

                            <x-text-input label="Company" type="company" wire:model="company" :required="true" class="mt-6" />

                            <x-text-input label="Password" type="password" wire:model="password" :required="true" class="mt-6" />

                            <x-text-input label="Password" type="password" wire:model="password" :required="true" class="mt-6" />

                            <x-text-input label="Confirm Password" type="password" wire:model="passwordConfirmation" :required="true" class="mt-6" />

                            <div class="mt-6">
                                <span class="block w-full rounded-md shadow-sm">
                                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                        Register
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden bg-cover lg:block lg:w-3/5" style="background-image: url('https://images.unsplash.com/photo-1494621930069-4fd4b2e24a11?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=715&q=80')"></div>

    </div>
</div>
