@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Cows
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between ">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Cow Details
            </h4>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="flex justify-center my-4">
                        <img src="{{ $cow->primary_image }}" alt="" class="w-52 justify-items-center">
                    </div>

                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Purchased / In-house
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    @if ($cow->is_purchased == 1)
                                        In-House
                                    @else
                                        Purchased
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Name
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->name }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Gender
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    @if ($cow->gender == 1)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Date Of Birth
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->date_of_birth }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Shade
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->shade ? $cow->shade->shade_no : '' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Color
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->color ? $cow->color->color_name : '' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Estimated Live Weight
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->estimated_live_weight }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Status
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->status_type }}
                                </p>
                            </div>
                        </div>

                    </div>

                    @if ($cow->is_purchased == 2)
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Purchased Data</h4>

                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <i class="fa-thin fa-cow"></i>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Purchased Price
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $cow->purchased_price }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <i class="fa-thin fa-cow"></i>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Labour cost
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $cow->labour_cost }} &#2547;
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <i class="fa-thin fa-cow"></i>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Transition
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $cow->transition_cost }} &#2547;
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <i class="fa-thin fa-cow"></i>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Supplier
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $cow->supplier ? $cow->supplier->supplier_name : '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Gallery</h4>
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                        @forelse ($cow->cowImages as $image)
                            <!-- Card -->
                            <div class="flex flex-wrap justify-center items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                                <img src="{{ $image->image }}" alt="">
                                <button
                                    class="focus:outline-none text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-2 dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    aria-label="Delete" id="deleteButton{{ $image->id }}" data-id="{{ $image->id }}"
                                    onclick="dataDelete({{ $image->id }})" @click="openModal">
                                    Delete
                                </button>
                            </div>
                        @empty
                            <p class="mb-4 text-center font-semibold text-gray-600 dark:text-gray-300">
                                No Images Found
                            </p>
                        @endforelse
                    </div>


                    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                    @include('website.includes.delete_modal')
                    <!-- End of modal backdrop -->

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function dataDelete(id) {
            var data_id = $("#deleteButton" + id).data('value');
            let route = "{{ route('deleteImage', ['cowImage' => ':id']) }}";
            route = route.replace(":id", id);

            $("#route").attr("action", route)
        }
    </script>
@endpush
