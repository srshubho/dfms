@extends('admin.layouts.default')

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
                    <h2 class="mb-4 text-center font-semibold text-gray-600 dark:text-gray-300">
                        {{ $cow->cow_id }}
                    </h2>

                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Name
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_name }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Date Of Purchased
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_date_of_purchased }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Date Of Production
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_date_of_production }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Date Of Birth
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_date_of_birth }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Gender
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    @if ($cow->cow_gender == 1)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Estimated Live Weight
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_estimated_live_weight }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Transaction
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_transaction_cost }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Labour
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_labour_cost }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Status
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->cow_status_type }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
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

                        <!-- Card -->
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

                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <i class="fa-thin fa-cow"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Type
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $cow->type ? $cow->type->cow_type_name : '' }}
                                </p>
                            </div>
                        </div>

                        <!-- Card -->
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

                        <!-- Card -->
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

                    </div>

                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Gallery</h4>

                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">

                        @forelse ($cow->cowImages as $image)
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                                <img src="{{ $image->image }}" alt="">
                            </div>
                        @empty
                            <p class="mb-4 text-center font-semibold text-gray-600 dark:text-gray-300">
                                No Images Found
                            </p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Cow ID</th>
                            <th class="px-4 py-3">Cow Name</th>
                            <th class="px-4 py-3">Cow Date Of Purchased</th>
                            <th class="px-4 py-3">Cow Date Of Production</th>
                            <th class="px-4 py-3">Cow Date Of Birth</th>
                            <th class="px-4 py-3">Cow Gender</th>
                            <th class="px-4 py-3">Cow Estimated Live Weight</th>
                            <th class="px-4 py-3">Cow Transaction Cost</th>
                            <th class="px-4 py-3">Cow Labour Cost</th>
                            <th class="px-4 py-3">Cow Status Type</th>
                            <th class="px-4 py-3">Cow Color Id</th>
                            <th class="px-4 py-3">Cow Supplier Id</th>
                            <th class="px-4 py-3">Cow Type Id</th>
                            <th class="px-4 py-3">Cow Shade Id</th>
                            <th class="px-4 py-3">Purchased / In-house</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($cows as $cow)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">{{ $loop->index + 1 }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_id }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_name }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_date_of_purchased }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_date_of_production }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_date_of_birth }}</td>
                                <td class="px-4 py-3">
                                    @if ($cow->cow_gender == 1)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $cow->cow_estimated_live_weight }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_transaction_cost }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_labour_cost }}</td>
                                <td class="px-4 py-3">{{ $cow->cow_status_type }}</td>
                                <td class="px-4 py-3">{{ $cow->color ? $cow->color->color_name : '' }}</td>
                                <td class="px-4 py-3">{{ $cow->supplier ? $cow->supplier->supplier_name : '' }}</td>
                                <td class="px-4 py-3">{{ $cow->type ? $cow->type->cow_type_name : '' }}</td>
                                <td class="px-4 py-3">{{ $cow->shade ? $cow->shade->shade_no : '' }}</td>
                                <td class="px-4 py-3">
                                    @if ($cow->is_purchased == 1)
                                        In-House
                                    @else
                                        Purchased
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('admin.cow.edit', $cow->id) }}">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.cow.show', $cow->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <button @click="openModal"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="red" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                                        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                            <!-- Modal -->
                                            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                                                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                                                @keydown.escape="closeModal"
                                                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                                                role="dialog" id="modal">
                                                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                                <header class="flex justify-end">
                                                    <button
                                                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                                        aria-label="close" @click="closeModal">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                                            <path
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </header>
                                                <!-- Modal body -->
                                                <div class="mt-4 mb-6">
                                                    <!-- Modal title -->
                                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                                                        Modal header {{ $loop->index }}
                                                    </p>
                                                    <!-- Modal description -->
                                                    <p class="text-sm text-gray-700 dark:text-gray-400">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                                                        eligendi repudiandae voluptatem tempore!
                                                    </p>
                                                </div>
                                                <footer
                                                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                                    <button @click="closeModal"
                                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                                        Cancel
                                                    </button>
                                                    <button
                                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                        Accept
                                                    </button>
                                                </footer>
                                            </div>
                                        </div>
                                        <!-- End of modal backdrop -->
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr colspan="3">No colors found</tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
@endsection

@push('scripts1')
@endpush
