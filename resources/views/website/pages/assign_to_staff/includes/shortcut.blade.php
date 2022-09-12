<p class="text-base font-semibold text-gray-600 dark:text-gray-300">{{ ucfirst($name) }}</p>
@foreach ($assignCowToStaff->assignLists as $list)
    @if ($list->type == $table_type)
        <span class="block">
            <a href="{{ route($name . '.show', $list->$name->id) }}" class="text-sm select-none ml-4 hover:underline">
                {{ $list->$name->name }}
            </a>
            (@if ($assignCowToStaff->getTime($assignCowToStaff->id, $list->$name->id, $name . '_id', $table_type, $date)->feeding_status == 1
                ? 'checked'
                : '')
                <i class="fa-solid fa-circle-check text-green-600"></i>
            @else
                <i class="fa-sharp fa-solid fa-circle-xmark text-red-600"></i>
            @endif
            <span class="text-xs font-thin text-gray-600 dark:text-white"> Feed: </span>
            <span class="displayInline">
                @include('website.pages.assign_to_staff.includes.time-show', [
                    'assign_id' => $assignCowToStaff->id,
                    'cow_id' => $list->$name->id,
                    'column_name' => $name . '_id',
                    'table_type' => $table_type,
                    'data_type' => 'feeding_time',
                ])
            </span>,
            @if ($assignCowToStaff->getTime($assignCowToStaff->id, $list->$name->id, $name . '_id', $table_type, $date))
                @if ($assignCowToStaff->getTime($assignCowToStaff->id, $list->$name->id, $name . '_id', $table_type, $date)->bath_status)
                    <i class="fa-solid fa-circle-check text-green-600"></i>
                @else
                    <i class="fa-sharp fa-solid fa-circle-xmark text-red-600"></i>
                @endif
            @else
                <i class="fa-sharp fa-solid fa-circle-xmark text-red-600"></i>
            @endif
            <span class="text-xs font-thin text-gray-600 dark:text-white"> Bath: </span> <span class="displayInline">
                @include('website.pages.assign_to_staff.includes.time-show', [
                    'assign_id' => $assignCowToStaff->id,
                    'cow_id' => $list->$name->id,
                    'column_name' => $name . '_id',
                    'table_type' => $table_type,
                    'data_type' => 'bath_time',
                ])
            </span>)
        </span>
    @endif
@endforeach
