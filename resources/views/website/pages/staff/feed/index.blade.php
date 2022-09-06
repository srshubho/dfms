@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Assigned Data
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between ">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Assigned Data
            </h4>
        </div>

        <div class="w-full overflow-hidden my-4 rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="my-8 text-base text-center font-light text-gray-600 dark:text-gray-300">
                        Assigning data for
                        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            {{ $date->format('d M Y') }}
                        </span>
                        <span class="block">
                            <span class="text-white bg-green-600 p-1 m-2 rounded">
                                Hint:
                            </span>
                            <i class="fa-solid fa-circle-check text-green-600"></i> -> Feed Done <br>
                            <i class="fa-sharp fa-solid fa-circle-xmark text-red-600"></i> -> Feed not done <br>
                            <input id="checkbox-1" type="checkbox" checked disabled
                                class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            -> Bath done <br>
                            <input id="checkbox-1" type="checkbox" disabled
                                class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            -> Bath not done
                            <br>
                        </span>
                    </h4>

                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Name </th>
                                <th class="px-4 py-3">Feed</th>
                                <th class="px-4 py-3">Bath</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr class="text-gray-700 dark:text-gray-400">
                                @include('website.pages.staff.feed.assigned_date', [
                                    'name' => 'cow',
                                    'table_type' => 1,
                                ])
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                @include('website.pages.staff.feed.assigned_date', [
                                    'name' => 'bull',
                                    'table_type' => 2,
                                ])
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-400">
                                @include('website.pages.staff.feed.assigned_date', [
                                    'name' => 'calf',
                                    'table_type' => 3,
                                ])
                            </tr>
                        </tbody>
                    </table>
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
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "changeBathStatus",
                        data: {
                            'status': status,
                            'id': id
                        },
                        success: function(data) {
                            console.log(data.success);
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
