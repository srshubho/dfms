@extends('website.layouts.default')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Feeditems
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create Feeditem
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('feedunit') }}" method="POST">
                {{ csrf_field() }}

                <h4 class="mb-4 text-lg text-center font-semibold text-gray-600 dark:text-gray-300">
                    {{ $feeditem->item_name }}
                </h4>

                <div class="flex justify-center items-center gap-6 items-end mb-6 md:grid-cols-3">
                    <div class="relative">
                        <input type="text" id="common_value"
                            class="block px-3 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder="" />
                        <label for="small_outlined"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0]  px-2 peer-focus:px-2 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">
                            Common Value
                        </label>
                    </div>
                    <button type="button" id="set"
                        class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Set
                    </button>
                </div>

                @if (!empty($cows))
                    <div class="border rounded my-4 p-4">
                        <p class="mb-4 text-base font-semibold text-gray-600 dark:text-gray-300">Cows</p>
                        <div class="grid gap-6 my-4 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($cows as $cow)
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">{{ $cow->name }}</span>
                                    <input type="text" name="item_unit_cow[{{ $cow->id }}]" id="item_name"
                                        value="{{ getItemUnitValue($feeditem->id, $cow->id, 'cow')->unit }}"
                                        class="common_value block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Enter value with unit" />
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (!empty($bulls))
                    <div class="border rounded my-4 p-4">
                        <p class="mb-4 text-base font-semibold text-gray-600 dark:text-gray-300">Bulls</p>
                        <div class="grid gap-6 my-4 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($bulls as $bull)
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">{{ $bull->name }}</span>
                                    <input type="text" name="item_unit_bull[{{ $bull->id }}]" id="item_name"
                                        value="{{ getItemUnitValue($feeditem->id, $bull->id, 'bull')->unit }}"
                                        class="common_value block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Enter value with unit" />
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (!empty($calves))
                    <div class="border rounded my-4 p-4">
                        <p class="mb-4 text-base font-semibold text-gray-600 dark:text-gray-300">Calf</p>
                        <div class="grid gap-6 my-4 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($calves as $calf)
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">{{ $calf->name }}</span>
                                    <input type="text" name="item_unit_calf[{{ $calf->id }}]" id="item_name"
                                        value="{{ getItemUnitValue($feeditem->id, $calf->id, 'calf')->unit }}"
                                        class="common_value block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Enter value with unit" />
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                <input type="hidden" name="feed_item_id" value="{{ $feeditem->id }}" />

                <div class="flex items-center justify-between ">
                    <div></div>
                    <button
                        class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <span>Create</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#set").click(function() {
            var val = $("#common_value").val();
            $(".common_value").val(val);
        })
    </script>
@endpush
