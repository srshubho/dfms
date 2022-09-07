@php
$not_set = '<span class="p-2 focus:outline-none text-xs font-thin text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Not set
            </span>';
@endphp

<td class="px-4 py-3  w-1/2">
    {{ ucfirst($name) }}
</td>
<td class="px-4 py-3 w-full">
    @if (!empty($assigned) && $assigned != null)
        @forelse ($assigned->assignLists as $list)
            @if ($list->type == $table_type)
                <span class="block py-2">
                    {{-- <a href="{{ route('cow.show', $list->cow->id) }}" class="text-sm select-none ml-4 hover:underline"> --}}
                    {{ $list->$name->name }}
                    {{-- </a> --}}
                </span>
            @endif
        @empty
            <span>No data found</span>
        @endforelse
    @endif
</td>
<td class="px-4 py-3 w-full">
    @if (!empty($assigned) && $assigned != null)
        @forelse ($assigned->assignLists as $list)
            @if ($list->type == $table_type)
                <span class="block py-2">
                    @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date))
                        @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->feeding_time)
                            <span
                                class="p-2 focus:outline-none text-xs font-thin text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 rounded-lg dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                {{ Carbon\Carbon::parse($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->feeding_time)->format('h:i a') }}
                            </span>
                        @else
                            {!! $not_set !!}
                        @endif
                    @else
                        {!! $not_set !!}
                    @endif
                    <span>
                        @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date))
                            @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->feeding_time)
                                @if (feed_done($assigned->id, $name . '_id', $list->$name->id, $table_type, $date))
                                    <i class="fa-solid fa-circle-check text-green-600 ml-2"></i>
                                @else
                                    <i class="fa-sharp fa-solid fa-circle-xmark text-red-600 ml-2"></i>
                                @endif
                                <a href="{{ route('feedData', [$assigned->id, $name . '_id', $table_type, $list->$name->id, $date]) }}">
                                    <i class="fa-solid fa-memo-pad text-green-400 ml-2"></i>
                                </a>
                            @endif
                        @endif
                    </span>
                </span>
            @endif
        @empty
            no assigned data)
        @endforelse
    @else
        no assigned data
    @endif
</td>
<td class="px-4 py-3 w-full">
    @if (!empty($assigned) && $assigned != null)
        @forelse ($assigned->assignLists as $list)
            @if ($list->type == $table_type)
                <span class="block py-2">
                    @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date))
                        @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->bath_time)
                            <span
                                class="p-2 focus:outline-none text-xs font-thin text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 rounded-lg dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                {{ Carbon\Carbon::parse($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->bath_time)->format('h:i a') }}
                            </span>
                        @else
                            {!! $not_set !!}
                        @endif
                    @else
                        {!! $not_set !!}
                    @endif
                    <span>
                        @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date))
                            @if ($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->bath_time)
                                @php
                                    $bath_time = strtotime($assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->bath_time);
                                    $current_time = time();
                                    $diff = $current_time - $bath_time;
                                    if ($diff >= 0) {
                                        $can_entry = true;
                                    } else {
                                        $can_entry = false;
                                    }
                                @endphp
                                <input type="checkbox" {{ $list->bath_status ? 'checked' : '' }} {{ $can_entry ? '' : 'disabled' }}
                                    {{ $assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->bath_status ? 'checked' : '' }}
                                    id="single-col-{{ $assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->id }}"
                                    data-id="{{ $assigned->getTime($assigned->id, $list->$name->id, $name . '_id', $table_type, $date)->id }}"
                                    class="customControlInput ml-2 w-6 h-6 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @endif
                        @endif
                    </span>
                </span>
            @endif
        @empty
            no assigned data
        @endforelse
    @endif
</td>
