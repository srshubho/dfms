@extends('admin.layouts.default')

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
                Shades List
            </h4>

            <a class="p-2 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="{{ route('admin.shade.create') }}">
                <span>Create &RightArrow;</span>
            </a>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Shade No</th>
                                <th class="px-4 py-3">Shade Area</th>
                                <th class="px-4 py-3">Shade Capacity</th>
                                <th class="px-4 py-3">Shade Type</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($shades as $shade)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{ $loop->index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $shade->shade_no }}</td>
                                    <td class="px-4 py-3">{{ $shade->shade_area }}</td>
                                    <td class="px-4 py-3">{{ $shade->shade_capacity }}</td>
                                    <td class="px-4 py-3">{{ $shade->cowtype->cow_type_name }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <a href="{{ route('admin.shade.edit', $shade->id) }}">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                    style="color: rgb(95, 69, 224)">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray deleteButton"
                                                aria-label="Delete" id="deleteButton{{ $shade->id }}" data-id="{{ $shade->id }}"
                                                onclick="dataDelete({{ $shade->id }})" @click="openModal({{ $shade->id }})">
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
                                    <p class="text-center text-white-100 dark:text-gray-400"> No shades found </p>
                                </tr>
                            @endforelse

                            <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                                <!-- Modal -->
                                <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal"
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
                                            Delete Confirmation
                                        </p>
                                        <!-- Modal description -->
                                        <p class="text-sm text-gray-700 dark:text-gray-400">
                                            Are you sure?
                                        </p>
                                    </div>
                                    <footer
                                        class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                        <button @click="closeModal"
                                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                            Cancel
                                        </button>
                                        <form action="" method="post" id="route">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button
                                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Delete
                                            </button>
                                        </form>
                                    </footer>
                                </div>
                            </div>
                            <!-- End of modal backdrop -->
                        </tbody>
                    </table>

                    {{ $shades->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function dataDelete(id) {
            var data_id = $("#deleteButton" + id).data('value');
            let route = "{{ route('admin.shade.destroy', ['shade' => ':id']) }}";
            route = route.replace(":id", id);

            $("#route").attr("action", route)
        }
    </script>
@endpush
