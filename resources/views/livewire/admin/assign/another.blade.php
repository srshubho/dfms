<form wire:submit="saveData">
    {{ csrf_field() }}

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Staff
        </span>
        <select wire:model="staff_id"
            class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="" selected>Choose staff</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('staff_id')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3">
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Type
            </span>
            <select wire:model="cowType.0"
                class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" selected>Choose type</option>
                <option value="1">Cow</option>
                <option value="2">Bull</option>
                <option value="3">Calf</option>
                {{-- @foreach ($cowTypes as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->type_name }}
                    </option>
                @endforeach --}}
            </select>
            @error('cowType.0')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Cow
            </span>
            <select wire:model="cow.0" wire:ignore.self
                class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="" selected>Choose cow</option>
                @if (!empty($cows))
                    @foreach ($cows as $cow)
                        <option value="{{ $cow->id }}" {{ old('cow_id') ? 'selected' : '' }} wire:ignore.self>
                            {{ $cow->name }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('cow.0')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Add more
            </span>
            <button type="button" wire:click.prevent="add({{ $i }})"
                class="w-10 h-10 block text-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <i class="fa-solid fa-plus"></i>
            </button>
        </label>

    </div>

    @foreach ($inputs as $key => $value)
        <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3">
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Type
                </span>
                <select wire:model="cowType.{{ $value }}"
                    class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="" selected>Choose type</option>
                    <option value="1">Cow</option>
                    <option value="2">Bull</option>
                    <option value="3">Calf</option>
                </select>
                @error('cowType.' . $value)
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Cow
                </span>
                <select wire:model="cow.{{ $value }}" wire:ignore.self
                    class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="" selected>Choose cow</option>
                    @if (!empty($cows))
                        @foreach ($cows as $cow)
                            <option value="{{ $cow->id }}" {{ old('cow_id') ? 'selected' : '' }} wire:ignore.self>
                                {{ $cow->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('cow.' . $value)
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Remove
                </span>
                <button type="button" wire:click.prevent="remove({{ $key }})"
                    class="w-10 h-10 block text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <i class="fa-solid fa-minus"></i>
                </button>
            </label>

        </div>
    @endforeach

    <div class="flex items-center justify-between ">
        <div></div>
        <button
            class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Assign</span>
        </button>
    </div>
</form>
