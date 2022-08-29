<form method="POST" enctype="multipart/form-data" wire:submit.prevent="saveData">
    {{ csrf_field() }}

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400"> Purchased or In-house </span>
        <span class="text-red-900 dark:text-red-500">*</span>
        <select wire:model="is_purchased" required
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="" selected>Choose type</option>
            <option value="1"> In-House </option>
            <option value="2"> Purchased </option>
        </select>
        @error('is_purchased')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input type="text" wire:model="name" id="name"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Enter cow name" />
        @error('name')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <div class="grid gap-6 mb-8 mt-4 md:grid-cols-2 xl:grid-cols-2">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Primary image</span>
            <input type="file" wire:model="primary_image" id="primary_image"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Select a primary image for cow" />
            @error('primary_image')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        @if ($prev_image)
            <img src="{{ $prev_image }}" alt="" class="w-52" id="preview-image" wire:ignore.self>
        @else
            <img src="http://via.placeholder.com/100" alt="" class="w-52" id="preview-image" wire:ignore.self>
        @endif
    </div>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Gallery</span>
        <input type="file" wire:model="images" id="images"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Select multiple images for this cow" multiple />
        @error('images')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
        <span class="text-xs text-gray-600 dark:text-gray-400">
            Add more image to gallery.
        </span>
    </label>


    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Date Of Production</span>
            <input type="date" wire:model="date_of_production" id="date_of_production"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            @error('date_of_production')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Date Of Birth</span>
            <input type="date" wire:model="date_of_birth" id="date_of_birth"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            @error('date_of_birth')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400"> Gender </span>
            <span class="text-red-900 dark:text-red-500">*</span>
            <select wire:model="gender" required
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" selected>Choose gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            @error('gender')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Estimated Live Weight</span>
            <input type="number" wire:model="estimated_live_weight" id="estimated_live_weight"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Enter cow estimated live weight" />
            @error('estimated_live_weight')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Breed percentage</span>
            <input type="number" wire:model="breed_percentage" id="breed_percentage"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Enter cow estimated live weight" />
            @error('breed_percentage')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Color
            </span>
            <select wire:model="color_id"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" selected>Choose color</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">
                        {{ $color->color_name }}
                    </option>
                @endforeach
            </select>
            @error('color_id')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Shade
                        </span>
                        <select name="shade_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" selected>Choose shade</option>
                            @foreach ($shades as $shade)
                                @if( $shade->shade_type && $shade->cowtype->type_name == "cow"  )
                                    <option value="{{ $shade->id }}" {{ old('shade_id') ? 'selected' : '' }}
                                        {{ $cow->shade_id == $shade->id ? 'selected' : '' }}>
                                        {{ $shade->shade_no }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('shade_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
    </div>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">

        @if ($purchased == 1)
            {{-- In-House --}}
            {{-- <p>1</p> --}}
        @elseif($purchased == 2)
            {{-- Purchased --}}
            {{-- <p>2</p> --}}
            <h3 class="text-gray-700 text-xl dark:text-gray-400"> Data for purchased cow</h3> <br>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Date Of Purchased</span>
                <input type="date" wire:model="date_of_purchased" id="date_of_purchased"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('date_of_purchased')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Purchased Price</span>
                <input type="number" wire:model="purchased_price" id="purchased_price"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Enter cow purchased price" />
                @error('purchased_price')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Labour Cost</span>
                <input type="number" wire:model="labour_cost" id="labour_cost"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Enter labour cost" />
                @error('labour_cost')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Transaction Cost</span>
                <input type="number" wire:model="transition_cost" id="transition_cost"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Enter cow transaction cost" />
                @error('transition_cost')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Supplier
                </span>
                <select wire:model="supplier_id"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="" selected>Choose Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">
                            {{ $supplier->supplier_name }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
        @endif

    </div>

    <div class="flex items-center justify-between ">
        <div></div>
        <button
            class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Update</span>
        </button>
    </div>
</form>
