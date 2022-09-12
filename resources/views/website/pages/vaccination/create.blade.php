@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Vaccination
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create vaccination
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('vaccination.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="grid gap-6 my-4 md:grid-cols-2 xl:grid-cols-2">

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Calf
                        </span>
                        <span class="text-red-900 dark:text-red-500">*</span>
                        <select name="calf_id" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" selected>Choose Calf</option>
                            @foreach ($calves as $calf)
                                <option value="{{ $calf->id }}" {{ old('calf_id') == $calf->id ? 'selected' : '' }}>
                                    {{ $calf->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('calf_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Vaccine
                        </span>
                        <span class="text-red-900 dark:text-red-500">*</span>
                        <select name="vaccine_id" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" selected>Choose Vaccine</option>
                            @foreach ($vaccines as $vaccine)
                                <option value="{{ $vaccine->id }}" {{ old('vaccine_id') == $vaccine->id ? 'selected' : '' }}>
                                    {{ $vaccine->vaccine_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('vaccine_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Date Of vaccination</span>
                        <input type="date" name="date" id="date" value="{{ old('date') ? old('date') : '' }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        @error('date')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            You can keep this field empty. If empty today's date will be stored.
                        </p>
                    </label>

                </div>

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
