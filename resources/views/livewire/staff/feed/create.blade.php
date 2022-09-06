<form wire:submit.prevent="saveData" method="POST">
    {{ csrf_field() }}

    @foreach ($items as $item)
        <div class="text-gray-400 md:flex md:items-center mb-4 w-1/2">
            <div class="mb-1 md:mb-0 md:w-1/3">
                <label for="forms-labelLeftInputCode">{{ $item->item_name }}</label>
            </div>
            <div class="md:w-2/3 md:flex-grow">
                <input wire:model="feeded[{{ $item->id }}_]"
                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text"
                    placeholder="Enter quantity with unit" id="forms-labelLeftInputCode" />
            </div>
        </div>
    @endforeach

    <div class="flex items-center justify-between ">
        <div></div>
        <button
            class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <span>Entry</span>
        </button>
    </div>
</form>
