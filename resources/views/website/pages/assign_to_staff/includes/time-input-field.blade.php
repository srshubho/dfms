<div class="relative mb-6">
    <label for="input-group-1" class="block mb-2 text-sm font-medium text-black dark:text-gray-300">
        {{ $title }}
    </label>
    <div class="flex absolute top-6 bottom-0 left-0 items-center pl-3 pointer-events-none">
        <x-clock />
    </div>
    <input type="time" id="input-group-1" name="{{ $name }}" value="{{ $time ? $time : '' }}"
        class="bg-gray-50 border border-gray-300 text-black  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="">
</div>
