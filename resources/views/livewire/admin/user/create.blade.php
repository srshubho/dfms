<form wire:submit.prevent="saveUser">
    {{ csrf_field() }}

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <span class="text-red-900 dark:text-red-500">*</span>
        <input type="text" wire:model="name" id="name"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Enter name" required />
        @error('name')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <span class="text-red-900 dark:text-red-500">*</span>
        <input type="email" wire:model="email" id="email"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Enter email" required />
        @error('email')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Contact</span>
        <span class="text-red-900 dark:text-red-500">*</span>
        <input type="number" wire:model="contact" id="contact"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Enter contact number" required />
        @error('contact')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400"> User Type </span>
        <span class="text-red-900 dark:text-red-500">*</span>
        <select wire:model="user_type" required
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="" selected>User Type</option>
            <option value="1"> Admin </option>
            <option value="2"> Staff </option>
        </select>
        @error('user_type')
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
