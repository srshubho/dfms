{{-- {{ $assignCowToStaff->getTime($assignCowToStaff->id, $list->cow->id, 'cow_id', 3)
    ? ($assignCowToStaff->getTime($assignCowToStaff->id, $list->cow->id, 'cow_id', 3)->bath_time
        ? $assignCowToStaff->getTime($assignCowToStaff->id, $list->cow->id, 'cow_id', 3)->bath_time
        : 'not set')
    : 'not set' }} --}}

@php
$notSet = '
            <span
                class="bg-red-700 hover:bg-red-800 p-0.5 focus:outline-none text-xs font-thin text-white  focus:ring-4 focus:ring-red-300 rounded-lg dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Not Set
            </span>';
@endphp

@if ($data_type == 'feeding_time')
    @if ($assignCowToStaff->getTime($assign_id, $cow_id, $column_name, $table_type, $date))
        @if ($assignCowToStaff->getTime($assign_id, $cow_id, $column_name, $table_type, $date)->feeding_time)
            <span
                class="bg-green-700 hover:bg-green-800 p-0.5 focus:outline-none text-xs font-thin text-white  focus:ring-4 focus:ring-green-300 rounded-lg dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                {{ Carbon\Carbon::parse($assignCowToStaff->getTime($assign_id, $cow_id, $column_name, $table_type, $date)->feeding_time)->format('h:i a') }}
            </span>
        @else
            {!! $notSet !!}
        @endif
    @else
        {!! $notSet !!}
    @endif
@elseif($data_type == 'bath_time')
    @if ($assignCowToStaff->getTime($assign_id, $cow_id, $column_name, $table_type, $date))
        @if ($assignCowToStaff->getTime($assign_id, $cow_id, $column_name, $table_type, $date)->bath_time)
            <span
                class="bg-green-700 hover:bg-green-800 p-0.5 focus:outline-none text-xs font-thin text-white  focus:ring-4 focus:ring-green-300 rounded-lg dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                {{ Carbon\Carbon::parse($assignCowToStaff->getTime($assign_id, $cow_id, $column_name, $table_type, $date)->bath_time)->format('h:i a') }}
            </span>
        @else
            {!! $notSet !!}
        @endif
    @else
        {!! $notSet !!}
    @endif
@endif
