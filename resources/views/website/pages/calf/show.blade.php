@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Calves
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between ">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Calf Details
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

        <div class="flex items-center justify-between mt-4">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Vaccination info
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
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Primary Image</th>
                                <th class="px-4 py-3">Date Of Birth</th>
                                <th class="px-4 py-3">Estimated Live Weight</th>
                                <th class="px-4 py-3">Gender</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            {{-- @forelse ($calfs as $calf)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{ $loop->index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $calf->name }}</td>
                                    <td class="px-4 py-3">
                                        @if ($calf->primary_image)
                                            <img src="{{ $calf->primary_image }}" alt=""
                                                class="w-24 bg-white rounded-lg shadow-xs dark:bg-gray-700">
                                        @else
                                            <p class="text-xs select-none">No image</p>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $calf->date_of_birth }}</td>
                                    <td class="px-4 py-3">{{ $calf->estimated_live_weight }}</td>
                                    <td class="px-4 py-3">{{ $calf->gender ? "female" : "male" }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <a href="{{ route('calf.edit', $calf->id) }}">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                    style="color: rgb(95, 69, 224)">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('calf.show', $calf->id) }}">
                                                <i class="fa-solid fa-eye" style="color: rgb(78, 180, 221)"></i>
                                            </a>
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray deleteButton"
                                                aria-label="Delete" id="deleteButton{{ $calf->id }}" data-id="{{ $calf->id }}"
                                                onclick="dataDelete({{ $calf->id }})" @click="openModal">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                    style="color: rgb(230, 82, 82)">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr colspan="6">
                                    <p class="text-center text-white-100 dark:text-gray-400"> No calves found </p>
                                </tr>
                            @endforelse --}}
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
