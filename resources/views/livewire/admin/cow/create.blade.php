<form method="POST" enctype="multipart/form-data" wire:submit.prevent="saveData">
    {{ csrf_field() }}

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400"> Purchased or In-house </span>
        <span class="text-red-900 dark:text-red-500">*</span>
        <select wire:model="is_purchased" required
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="" selected>Choose Type</option>
            <option value="1"> In-House </option>
            <option value="2"> Purchased </option>
        </select>
        @error('is_purchased')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    @if ($purchased)
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Cow Name</span>
            <input type="text" wire:model="cow_name" id="cow_name"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Enter Cow Name" />
            @error('cow_name')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
    @else
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Name
            </span>
            <select wire:model="cow_shade_id"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" selected>Choose name</option>
                @foreach ($cows as $cow)
                    <option value="{{ $cow->id }}">
                        {{ $cow->shade_no }}
                    </option>
                @endforeach
            </select>
            @error('cow_shade_id')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
    @endif

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Cow Images</span>
        <input type="file" wire:model="cow_images[]" id="cow_images"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Select cow images" multiple />
        @error('cow_images')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Cow Date Of Purchased</span>
            <input type="date" wire:model="cow_date_of_purchased" id="cow_date_of_purchased"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            @error('cow_date_of_purchased')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Cow Date Of Production</span>
            <input type="date" wire:model="cow_date_of_production" id="cow_date_of_production"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            @error('cow_date_of_production')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Cow Date Of Birth</span>
            <input type="date" wire:model="cow_date_of_birth" id="cow_date_of_birth"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            @error('cow_date_of_birth')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400"> Gender </span>
            <span class="text-red-900 dark:text-red-500">*</span>
            <select wire:model="cow_gender" required
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" disabled selected>Choose Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            @error('cow_gender')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Estimated Live Weight</span>
            <input type="number" wire:model="cow_estimated_live_weight" id="cow_estimated_live_weight"
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
            <input type="number" wire:model="cow_transaction_cost" id="cow_transaction_cost"
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
            <input type="number" wire:model="cow_labour_cost" id="cow_labour_cost"
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
            <span class="text-red-900 dark:text-red-500">*</span>
            <input type="text" wire:model="cow_status_type" id="cow_status_type" required
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
            <select wire:model="cow_color_id"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" disabled selected>Choose color</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">
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
            <select wire:model="cow_supplier_id"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" disabled selected>Choose Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">
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
            <select wire:model="cow_type_id"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" disabled selected>Choose Type</option>
                @foreach ($cowTypes as $cowType)
                    <option value="{{ $cowType->id }}">
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
            <select wire:model="cow_shade_id"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" disabled selected>Choose shade</option>
                @foreach ($shades as $shade)
                    <option value="{{ $shade->id }}">
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
