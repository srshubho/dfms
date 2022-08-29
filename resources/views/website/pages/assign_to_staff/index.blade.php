@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Assign Cow To Staffs
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between ">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Assign Cow To Staffs List
            </h4>

            <a class="p-2 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="{{ route('assign-cow-to-staff.create') }}">
                <span>Assign &RightArrow;</span>
            </a>
        </div>

        <div class="w-full overflow-hidden my-4 rounded-lg shadow-xs">

            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <p class="mb-4 text-base font-semibold text-gray-600 dark:text-gray-300">
                        Check for specific date
                    </p>
                    <div class="flex justify-between ">
                        <form class="flex justify-center" action="{{ route('assign-cow-to-staff.index') }}">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-96">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="date" id="simple-search" name="check" value="{{ $check ? $date->format('Y-m-d') : '' }}"
                                    class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search" required>
                            </div>
                            <button type="submit"
                                class="p-2.5 ml-2 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                    </path>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>

                        <a href={{ route('assign-cow-to-staff.index') }}
                            class="text-black bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Today
                            <span class="sr-only">Search</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full overflow-hidden my-4 rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="my-8 text-base text-center font-light text-gray-600 dark:text-gray-300">
                        Assigning data for
                        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                            {{ $date->format('d M Y') }}
                        </span>
                    </h4>

                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Staff</th>
                                <th class="px-4 py-3">Cow</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($assignCowToStaffs as $assignCowToStaff)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{ $loop->index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $assignCowToStaff->user->name }}</td>

                                    <td class="px-4 py-3">
                                        <p class="text-base font-semibold text-gray-600 dark:text-gray-300">Cow</p>
                                        @foreach ($assignCowToStaff->assignList as $list)
                                            @if ($list->type == 1)
                                                <a href="{{ route('cow.show', $list->cow->id) }}" class="text-sm block select-none ml-4 hover:underline">
                                                    {{ $list->cow->name }}
                                                </a>
                                            @endif
                                        @endforeach
                                        <p class="mt-4 text-base font-semibold text-gray-600 dark:text-gray-300">Bull</p>
                                        @foreach ($assignCowToStaff->assignList as $list)
                                            @if ($list->type == 2)
                                                <a href="{{ route('bull.show', $list->bull->id) }}"
                                                    class="text-sm block select-none ml-4 hover:underline">
                                                    {{ $list->bull->name }}
                                                </a>
                                            @endif
                                        @endforeach
                                        <p class="mt-4 text-base font-semibold text-gray-600 dark:text-gray-300">Calf</p>
                                        @foreach ($assignCowToStaff->assignList as $list)
                                            @if ($list->type == 3)
                                                <a href="{{ route('calf.show', $list->calf->id) }}"
                                                    class="text-sm block select-none ml-4 hover:underline">
                                                    {{ $list->calf->name }}
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <a href="{{ route('assign-cow-to-staff.edit', $assignCowToStaff->id) }}">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                    style="color: rgb(95, 69, 224)">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            {{-- <a href="{{ route('assign-cow-to-staff.show', $assignCowToStaff->id) }}">
                                                <i class="fa-solid fa-eye" style="color: rgb(78, 180, 221)"></i>
                                            </a> --}}
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray deleteButton"
                                                aria-label="Delete" id="deleteButton{{ $assignCowToStaff->id }}" data-id="{{ $assignCowToStaff->id }}"
                                                onclick="dataDelete({{ $assignCowToStaff->id }})" @click="openModal">
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
                                    <p class="text-center text-white-100 dark:text-gray-400"> No data found </p>
                                </tr>
                            @endforelse

                            <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                            @include('website.includes.delete_modal')
                            <!-- End of modal backdrop -->
                        </tbody>
                    </table>

                    {{-- {{ $assignCowToStaffs->onEachSide(5)->links() }} --}}

                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function dataDelete(id) {
            var data_id = $("#deleteButton" + id).data('value');
            let route = "{{ route('assign-cow-to-staff.destroy', ['assign_cow_to_staff' => ':id']) }}";
            route = route.replace(":id", id);

            $("#route").attr("action", route)
        }
    </script>
@endpush
