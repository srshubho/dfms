@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Vaccine
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit vaccine
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('vaccine.update', $vaccine) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Vaccine Name</span>
                    <span class="text-red-900 dark:text-red-500">*</span>
                    <input type="text" name="vaccine_name" id="vaccine_name"
                        value="{{ old('vaccine_name') ? old('vaccine_name') : $vaccine->vaccine_name }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter vaccine name" required />
                    @error('vaccine_name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <div class="grid gap-6 my-4 md:grid-cols-2 xl:grid-cols-2">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Age at first dose</span>
                        <input type="number" name="age_of_first_dose" id="age_of_first_dose"
                            value="{{ old('age_of_first_dose') ? old('age_of_first_dose') : $vaccine->age_of_first_dose }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter age of first dose" />
                        @error('age_of_first_dose')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                        <p id="helper-text-explanation" class="text-xs text-gray-500 dark:text-gray-400">
                            Enter age in month. Ex: 1 year=12
                        </p>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Booster Dose</span>
                        <input type="text" name="booster" id="booster" value="{{ old('booster') ? old('booster') : $vaccine->booster }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter booster" />
                        @error('booster')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    {{-- <div class="flex items-center mt-6">
                        <input id="checkbox-1" type="checkbox" value=""
                            class="w-8 h-8 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Booster Dose
                        </label>
                    </div> --}}

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Subsequent Dose</span>
                        <input type="text" name="subsequent_dose" id="subsequent_dose"
                            value="{{ old('subsequent_dose') ? old('subsequent_dose') : $vaccine->subsequent_dose }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter subsequent dose" />
                        @error('subsequent_dose')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <div class="flex items-center mt-6">
                        <input id="checkbox-1" type="checkbox" value="1" name="repeat" {{ $vaccine->repeat ? 'checked' : '' }}
                            class="w-8 h-8 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Repeat
                        </label>
                        @error('repeat')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Remarks</label>
                    <textarea id="notes" rows="4" name="remarks"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Keep a note">{{ old('remarks') ? old('remarks') : $vaccine->remarks }}</textarea>
                    @error('remarks')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

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
