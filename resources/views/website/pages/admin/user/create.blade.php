@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Users
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create User
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <p class="py-4">
                <span class="text-red-600 dark:text-red-300">NB: </span>
                <span class="text-gray-600 dark:text-gray-300">Password: <span class="px-3 bg-green-100 dark:bg-green-700">123456</span> </span>
            </p>

            @livewire('admin.user.create')
        </div>
    </div>
@endsection
