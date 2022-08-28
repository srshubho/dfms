@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Insemination
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create Insemination
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('insemination.store') }}" method="POST">
                {{ csrf_field() }}

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cow</span>
                    <span class="text-red-900 dark:text-red-500">*</span>
                    <select name="cow_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                        <option value="" selected>Choose cow</option>
                        @foreach ($cows as $cow)
                            <option value="{{ $cow->id }}" {{ old('cow_id') ? 'selected' : '' }}>
                                {{ $cow->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cow_id')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Bull</span>
                    <span class="text-red-900 dark:text-red-500">*</span>
                    <select name="bull_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                        <option value="" selected>Choose bull</option>
                        @foreach ($bulls as $bull)
                            <option value="{{ $bull->id }}" {{ old('bull_id') ? 'selected' : '' }}>
                                {{ $bull->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('bull_id')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Insemination Date</span>
                    <span class="text-red-900 dark:text-red-500">*</span>
                    <input type="date" name="insemination_date" id="insemination_date"
                        value="{{ old('insemination_date') ? old('insemination_date') : '' }}" required
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter insemination date" />
                    @error('insemination_date')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <div class="flex items-center justify-between ">
                    <div></div>
                    <button
                        class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <span>Create</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection