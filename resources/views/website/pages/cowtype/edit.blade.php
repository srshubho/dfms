@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Cow Types
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Cow Type
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('cow-type.update', $cowType->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cow Type Name</span>
                    <input type="text" name="type_name" id="type_name"
                        value="{{ old('type_name') ? old('type_name') : $cowType->type_name }}" required
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter Cow Type Name" />
                    @error('type_name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
                <div class="flex items-center justify-between ">
                    <div></div>
                    <button
                        class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <span>Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
