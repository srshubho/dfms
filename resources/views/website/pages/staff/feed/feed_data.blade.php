@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700  dark:text-gray-200">
            Entry feed data for
            <span class="uppercase bg-purple-600 text-white p-2 rounded-lg">
                @if ($column == 'cow_id')
                    @if ($cow_data)
                        {{ $cow_data->cow->name }}
                    @endif
                @elseif ($column == 'bull_id')
                    @if ($cow_data)
                        {{ $cow_data->bull->name }}
                    @endif
                @elseif ($column == 'calf_id')
                    @if ($cow_data)
                        {{ $cow_data->calf->name }}
                    @endif
                @endif
            </span>
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Entry Feed Data
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- @livewire('staff.feed.create', [
                'cow_data' => $cow_data,
            ]) --}}
            <form action="{{ route('feedData.store', [$assign_id, $column, $table_type, $cow_id]) }}" method="POST">
                {{ csrf_field() }}

                @foreach ($feed_items as $item)
                    <div class="text-gray-400 md:flex md:items-center mb-4 w-1/2">
                        <div class="mb-1 md:mb-0 md:w-1/3">
                            <label for="forms-labelLeftInputCode">{{ $item->item_name }}</label>
                        </div>
                        <div class="md:w-2/3 md:flex-grow">
                            <input name="feeded[{{ $item->id }}]"
                                @if ($cow_data) value="{{ $cow_data->feedData($assign_id, $column, $cow_id, $table_type, $item->id, $date)
                                    ? ($cow_data->feedData($assign_id, $column, $cow_id, $table_type, $item->id, $date)->quantity
                                        ? $cow_data->feedData($assign_id, $column, $cow_id, $table_type, $item->id, $date)->quantity
                                        : '')
                                    : '' }}" @endif
                                class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text"
                                placeholder="Enter quantity with unit" id="forms-labelLeftInputCode" />
                        </div>
                    </div>
                @endforeach
                <input type="hidden" name="assign_id" value="{{ $assign_id }}">
                <input type="hidden" name="column" value="{{ $column }}">
                <input type="hidden" name="table_type" value="{{ $table_type }}">
                <input type="hidden" name="cow_id" value="{{ $cow_id }}">
                <input type="hidden" name="date" value="{{ $date }}">

                <div class="flex items-center justify-between ">
                    <div></div>
                    <button typ="submit" {{ count($feed_items) > 0 ? '' : 'disabled' }}
                        class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple {{ count($feed_items) > 0 ? '' : 'disabled cursor-not-allowed' }}">
                        <span>Entry</span>
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
