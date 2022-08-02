@extends('admin.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Cows
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Cow
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.cow.update', $cow->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cow Name</span>
                    <input type="text" name="cow_name" id="cow_name" value="{{ old('cow_name') ? old('cow_name') : $cow->cow_name }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter Cow Name" />
                    @error('cow_name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <!-- Cards -->
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                    {{-- <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cow ID</span>
                        <span class="text-red-500 dark:text-red-100">*</span>
                        <input type="text" name="cow_id" id="cow_id" value="{{ old('cow_id') ? old('cow_id') : $cow->cow_id }}" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter Cow ID" />
                        @error('cow_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label> --}}

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cow Date Of Purchased</span>
                        <input type="date" name="cow_date_of_purchased" id="cow_date_of_purchased"
                            value="{{ old('cow_date_of_purchased') ? old('cow_date_of_purchased') : $cow->cow_date_of_purchased }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        @error('cow_date_of_purchased')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cow Date Of Production</span>
                        <input type="date" name="cow_date_of_production" id="cow_date_of_production"
                            value="{{ old('cow_date_of_production') ? old('cow_date_of_production') : $cow->cow_date_of_production }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        @error('cow_date_of_production')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cow Date Of Birth</span>
                        <input type="date" name="cow_date_of_birth" id="cow_date_of_birth"
                            value="{{ old('cow_date_of_birth') ? old('cow_date_of_birth') : $cow->cow_date_of_birth }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        @error('cow_date_of_birth')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Gender
                        </span>
                        <select name="cow_gender" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" disabled selected>Choose Gender</option>
                            <option value="1" {{ old('cow_gender') ? 'selected' : '' }}
                                {{ $cow->cow_gender == 1 ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="2" {{ old('cow_gender') ? 'selected' : '' }}
                                {{ $cow->cow_gender == 2 ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                        @error('cow_gender')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Estimated Live Weight</span>
                        <input type="number" name="cow_estimated_live_weight" id="cow_estimated_live_weight"
                            value="{{ old('cow_estimated_live_weight') ? old('cow_estimated_live_weight') : $cow->cow_estimated_live_weight }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter Cow Estimated Live Weight" />
                        @error('cow_estimated_live_weight')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cow Transaction Cost</span>
                        <input type="number" name="cow_transaction_cost" id="cow_transaction_cost"
                            value="{{ old('cow_transaction_cost') ? old('cow_transaction_cost') : $cow->cow_transaction_cost }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter Cow Transaction Cost" />
                        @error('cow_transaction_cost')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cow Labour Cost</span>
                        <input type="number" name="cow_labour_cost" id="cow_labour_cost"
                            value="{{ old('cow_labour_cost') ? old('cow_labour_cost') : $cow->cow_labour_cost }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter Cow Labour Cost" />
                        @error('cow_labour_cost')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Cow Status Type</span>
                        <input type="text" name="cow_status_type" id="cow_status_type"
                            value="{{ old('cow_status_type') ? old('cow_status_type') : $cow->cow_status_type }}" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter Cow Status Type" />
                        @error('cow_status_type')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Color
                        </span>
                        <select name="cow_color_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" disabled selected>Choose color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}" {{ old('cow_color_id') ? 'selected' : '' }}
                                    {{ $color->id == $cow->cow_color_id ? 'selected' : '' }}>
                                    {{ $color->color_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('cow_color_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Supplier
                        </span>
                        <select name="cow_supplier_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" disabled selected>Choose Supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ old('cow_supplier_id') ? 'selected' : '' }}
                                    {{ $supplier->id == $cow->cow_supplier_id ? 'selected' : '' }}>
                                    {{ $supplier->supplier_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('cow_supplier_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Cow Type
                        </span>
                        <select name="cow_type_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" disabled selected>Choose Type</option>
                            @foreach ($cowTypes as $cowType)
                                <option value="{{ $cowType->id }}" {{ old('cow_type_id') ? 'selected' : '' }}
                                    {{ $cowType->id == $cow->cow_type_id ? 'selected' : '' }}>
                                    {{ $cowType->cow_type_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('cow_type_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Shade
                        </span>
                        <select name="cow_shade_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" disabled selected>Choose shade</option>
                            @foreach ($shades as $shade)
                                <option value="{{ $shade->id }}" {{ old('cow_shade_id') ? 'selected' : '' }}
                                    {{ $shade->id == $cow->cow_shade_id ? 'selected' : '' }}>
                                    {{ $shade->shade_no }}
                                </option>
                            @endforeach
                        </select>
                        @error('cow_shade_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
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
