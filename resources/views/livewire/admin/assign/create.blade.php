<form wire:submit.prevent="saveData" method="POST">
    {{ csrf_field() }}

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400"> Staff </span>
        <span class="text-red-900 dark:text-red-500">*</span>
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

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400"> Cow </span>
        <span class="text-red-900 dark:text-red-500">*</span>
        <select wire:model="cow" multiple
            class="block w-full h-52 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="" selected>Choose cow</option>
            <option disabled class="mt-2">Cows</option>
            @if (!empty($cows))
                @foreach ($cows as $cow)
                    <option value="1{{ $cow->id }}">
                        {{ $cow->name }}
                    </option>
                @endforeach
            @endif
            <option disabled class="mt-2">Bulls</option>
            @if (!empty($bulls))
                @foreach ($bulls as $bull)
                    <option value="2{{ $bull->id }}">
                        {{ $bull->name }}
                    </option>
                @endforeach
            @endif
            <option disabled class="mt-2">Calves</option>
            @if (!empty($calves))
                @foreach ($calves as $calf)
                    <option value="3{{ $calf->id }}">
                        {{ $calf->name }}
                    </option>
                @endforeach
            @endif
        </select>
        @error('cow')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <div class="flex items-center justify-between ">
        <div></div>
        <button
            class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Assign</span>
        </button>
    </div>
</form>
