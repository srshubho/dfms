@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Shades
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between ">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Shade Details
            </h4>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-solid fa-shutters"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Shade No
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $shade->shade_no }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-solid fa-shutters"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Shade Area
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $shade->shade_area }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-solid fa-shutters"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Shade Capacity
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $shade->shade_capacity }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-solid fa-shutters"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Shade Type
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $shade->cowtype->cow_type_name }}
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- With actions -->
        <div class="flex items-center justify-between mt-6">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Cows under this shade
            </h4>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                {{-- <th class="px-4 py-3">Cow ID</th> --}}
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Supplier</th>
                                <th class="px-4 py-3">Purchased / In-house</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($shade->cows as $cow)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{ $loop->index + 1 }}</td>
                                    {{-- <td class="px-4 py-3">{{ $cow->cow_id }}</td> --}}
                                    <td class="px-4 py-3">{{ $cow->cow_name }}</td>
                                    <td class="px-4 py-3">{{ $cow->supplier ? $cow->supplier->supplier_name : '' }}</td>
                                    <td class="px-4 py-3">
                                        @if ($cow->is_purchased == 1)
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                                In-House
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                Purchased
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr colspan="6">
                                    <p class="text-center text-white-100 dark:text-gray-400"> No cows found under this shade. </p>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
