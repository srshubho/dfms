@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700  dark:text-gray-200">
            Entry feed data for
            <span class="uppercase bg-purple-600 text-white p-2 rounded-lg">
                @if ($column == 'cow_id')
                    @if ($cow_data)
                        {{ $cow_data->cow->name }} cow
                    @endif
                @elseif ($column == 'bull_id')
                    @if ($cow_data)
                        {{ $cow_data->bull->name }} bull
                    @endif
                @elseif ($column == 'calf_id')
                    @if ($cow_data)
                        {{ $cow_data->calf->name }} calf
                    @endif
                @endif
            </span>
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Entry Feed Data
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @foreach ($feed_items as $item)
                <div class="text-gray-400 md:flex md:items-center mb-4 w-1/2">
                    <div class="mb-1 md:mb-0 md:w-1/3">
                        <label for="forms-labelLeftInputCode">{{ $item->item_name }}</label>
                    </div>
                    <div class="md:w-2/3 md:flex-grow">
                        <input name="feeded[{{ $item->id }}]" disabled
                            @if ($cow_data) value="{{ $cow_data->feedData($item->id, $cow_id, $column)
                                ? ($cow_data->feedData($item->id, $cow_id, $column)->unit
                                    ? $cow_data->feedData($item->id, $cow_id, $column)->unit
                                    : '')
                                : '' }}" @endif
                            class="w-full h-10 px-3 text-base text-black dark:text-white placeholder-gray-600 border rounded-lg focus:shadow-outline" />
                    </div>
                </div>
            @endforeach
            <div class="flex items-center justify-center mt-4">
                <div class="flex items-center pl-4 mt-4 rounded border-2 border-gray-200 dark:border-gray-500">
                    <input type="checkbox" id="single-col-{{ $assigned->getTime($assign_id, $cow_id, $column, $table_type, $date)->id }}"
                        {{ $assigned->getTime($assigned->id, $cow_id, $column, $table_type, $date)->feeding_status == 1 ? 'checked' : '' }}
                        data-id="{{ $assigned->getTime($assign_id, $cow_id, $column, $table_type, $date)->id }}"
                        class="customControlInput w-8 h-8 text-blue-600 bg-gray-300 rounded border-gray-200 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="single-col-{{ $assigned->getTime($assign_id, $cow_id, $column, $table_type, $date)->id }}"
                        class="p-8 ml-2 w-full text-xl text-gray-500 font-medium text-gray-900 dark:text-gray-300 select-none">
                        Feed Status
                    </label>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.customControlInput').change(function() {
                if (confirm("Do you want to change the status?")) {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var id = $(this).data('id');
                    console.log(status, id);
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "/changeFeedStatus",
                        data: {
                            'status': status,
                            'id': id
                        },
                        success: function(data) {
                            console.log(data.success);
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                } else {
                    if ($("#single-col-" + $(this).data('id')).prop("checked") == true) {
                        $("#single-col-" + $(this).data('id')).prop('checked', false);
                    } else if ($("#single-col-" + $(this).data('id')).prop("checked") == false) {
                        $("#single-col-" + $(this).data('id')).prop('checked', true);
                    }
                }
            })
        })
    </script>
@endpush
