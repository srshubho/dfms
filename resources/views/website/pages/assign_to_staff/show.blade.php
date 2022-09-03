@extends('website.layouts.default')

@push('css')
    <style>
        input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(48%) sepia(13%) saturate(3207%) hue-rotate(130deg) brightness(95%) contrast(80%);
        }
    </style>
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Assign Cow To Staff
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between ">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Assign Cow To Staff Details
            </h4>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="flex justify-center my-4">
                        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                            {{ $assignCowToStaff->user->name }}
                        </h4>
                    </div>

                    <form action="{{ route('assigntask', $assignCowToStaff) }}" method="POST">
                        {{ csrf_field() }}
                        <p class="text-base font-semibold text-gray-600 dark:text-gray-300">Cow</p>

                        <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3 border-2 border-gray-700 p-4 rounded-md ">
                            @foreach ($assignCowToStaff->assignLists as $list)
                                @if ($list->type == 1)
                                    <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                                        {{ $list->cow->name }}
                                    </p>
                                    @include('website.pages.assign_to_staff.includes.time-input-field', [
                                        'title' => 'Set feed time',
                                        'name' => 'cow[feed' . $list->cow->id . ']',
                                        'time' => $assignCowToStaff->getTime($assignCowToStaff->id, $list->cow->id, 'cow_id', 1)
                                            ? $assignCowToStaff->getTime($assignCowToStaff->id, $list->cow->id, 'cow_id', 1)->feeding_time
                                            : '',
                                    ])
                                    @include('website.pages.assign_to_staff.includes.time-input-field', [
                                        'title' => 'Set bath time',
                                        'name' => 'cow[bath' . $list->cow->id . ']',
                                        'time' => $assignCowToStaff->getTime($assignCowToStaff->id, $list->cow->id, 'cow_id', 1)
                                            ? $assignCowToStaff->getTime($assignCowToStaff->id, $list->cow->id, 'cow_id', 1)->bath_time
                                            : '',
                                    ])
                                    <input type="hidden" name="cowids[{{ $list->cow->id }}]" value="{{ $list->cow->id }}">
                                @endif
                            @endforeach
                        </div>

                        <p class="mt-4 text-base font-semibold text-gray-600 dark:text-gray-300">Bull</p>

                        <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3 border-2 border-gray-700 p-4 rounded-md ">
                            @foreach ($assignCowToStaff->assignLists as $list)
                                @if ($list->type == 2)
                                    <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                                        {{ $list->bull->name }}
                                    </p>
                                    @include('website.pages.assign_to_staff.includes.time-input-field', [
                                        'title' => 'Set feed time',
                                        'name' => 'bull[feed' . $list->bull->id . ']',
                                        'time' => $assignCowToStaff->getTime($assignCowToStaff->id, $list->bull->id, 'bull_id', 2)
                                            ? $assignCowToStaff->getTime($assignCowToStaff->id, $list->bull->id, 'bull_id', 2)->feeding_time
                                            : '',
                                    ])
                                    @include('website.pages.assign_to_staff.includes.time-input-field', [
                                        'title' => 'Set bath time',
                                        'name' => 'bull[bath' . $list->bull->id . ']',
                                        'time' => $assignCowToStaff->getTime($assignCowToStaff->id, $list->bull->id, 'bull_id', 2)
                                            ? $assignCowToStaff->getTime($assignCowToStaff->id, $list->bull->id, 'bull_id', 2)->bath_time
                                            : '',
                                    ])
                                    <input type="hidden" name="bullids[{{ $list->bull->id }}]" value="{{ $list->bull->id }}">
                                @endif
                            @endforeach
                        </div>

                        <p class="mt-4 text-base font-semibold text-gray-600 dark:text-gray-300">Calf</p>

                        <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3 border-2 border-gray-700 p-4 rounded-md ">
                            @foreach ($assignCowToStaff->assignLists as $list)
                                @if ($list->type == 3)
                                    <p class="text-base font-semibold text-gray-600 dark:text-gray-300">
                                        {{ $list->calf->name }}
                                    </p>
                                    @include('website.pages.assign_to_staff.includes.time-input-field', [
                                        'title' => 'Set feed time',
                                        'name' => 'calf[feed' . $list->calf->id . ']',
                                        'time' => $assignCowToStaff->getTime($assignCowToStaff->id, $list->calf->id, 'calf_id', 3)
                                            ? $assignCowToStaff->getTime($assignCowToStaff->id, $list->calf->id, 'calf_id', 3)->feeding_time
                                            : '',
                                    ])
                                    @include('website.pages.assign_to_staff.includes.time-input-field', [
                                        'title' => 'Set bath time',
                                        'name' => 'calf[bath' . $list->calf->id . ']',
                                        'time' => $assignCowToStaff->getTime($assignCowToStaff->id, $list->calf->id, 'calf_id', 3)
                                            ? $assignCowToStaff->getTime($assignCowToStaff->id, $list->calf->id, 'calf_id', 3)->bath_time
                                            : '',
                                    ])
                                    <input type="hidden" name="calfids[{{ $list->calf->id }}]" value="{{ $list->calf->id }}">
                                @endif
                            @endforeach
                        </div>

                        <div class="flex items-center justify-between ">
                            <div></div>
                            <button
                                class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Assign Task
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
