@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            calves
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between ">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                calf Details
            </h4>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="flex justify-center my-4">
                        <img src="{{ $calf->primary_image }}" alt="" class="w-52 justify-items-center">
                    </div>

                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">



                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Name
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $calf->name }}
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
                                    @if ($calf->gender == 1)
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
                                    {{ $calf->date_of_birth }}
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
                                    {{ $calf->shade ? $calf->shade->shade_no : '' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Father 
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $calf->insemination_id ? $calf->insemination->bull->name : '' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Mother 
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $calf->insemination_id ? $calf->insemination->cow->cow_name : '' }}
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
                                    {{ $calf->color ? $calf->color->color_name : '' }}
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
                                    {{ $calf->estimated_live_weight }}
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
                                    {{  $calf->status_type ?? " "  }}
                                </p>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
