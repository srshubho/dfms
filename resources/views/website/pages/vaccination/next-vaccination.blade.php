@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Next Vaccination
        </h2>

        <!-- With actions -->
        <div class="flex items-center justify-between">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Next Vaccination List
            </h4>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Calf</th>
                                <th class="px-4 py-3">Calf age in month</th>
                                <th class="px-4 py-3">Vaccine</th>
                                <th class="px-4 py-3">Vaccine at first age</th>
                                <th class="px-4 py-3">Dose Count</th>
                                <th class="px-4 py-3">Dose Type</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($calves as $calf)
                                @php
                                    $calf_birth_date = \Carbon\Carbon::createFromFormat('Y-m-d', $calf->date_of_birth);
                                    $calf_age_in_month = $today->diffInMonths($calf_birth_date);
                                @endphp
                                @foreach ($vaccines as $vaccine)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        @if (firstDoseDone($calf->id, $vaccine->id))
                                            {{-- NEXT DOSE HERE --}}
                                            @if (getNextDose($calf->id, $vaccine->id))
                                                <td class="px-4 py-3 ">{{ $calf->name }} {{ $calf->id }}</td>
                                                <td class="px-4 py-3 ">{{ $calf_age_in_month }}</td>
                                                <td class="px-4 py-3 ">{{ $vaccine->vaccine_name }}</td>
                                                <td class="px-4 py-3 ">{{ $vaccine->age_of_first_dose }}</td>
                                                <td class="px-4 py-3 ">{{ getNextDose($calf->id, $vaccine->id)->vaccine_count }}</td>
                                                <td class="px-4 py-3 ">{{ str_ordinal(getNextDose($calf->id, $vaccine->id)->vaccine_count + 1) }}</td>
                                                <td class="px-4 py-3 ">
                                                    {{ Carbon\Carbon::parse(getNextDose($calf->id, $vaccine->id)->next_date)->format('d M y') }}
                                                </td>
                                            @endif
                                        @else
                                            {{-- FIRST DOSE HERE --}}
                                            @if ($calf_age_in_month >= $vaccine->age_of_first_dose)
                                                <td class="px-4 py-3">{{ $calf->name }} {{ $calf->id }}</td>
                                                <td class="px-4 py-3">{{ $calf_age_in_month }}</td>
                                                <td class="px-4 py-3">{{ $vaccine->vaccine_name }}</td>
                                                <td class="px-4 py-3">{{ $vaccine->age_of_first_dose }}</td>
                                                <td class="px-4 py-3">First Dose</td>
                                                <td class="px-4 py-3">First Dose</td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            @empty
                                <tr colspan="8">
                                    <p class="text-center text-white-100 dark:text-gray-400"> No vaccines found </p>
                                </tr>
                            @endforelse

                            <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                            @include('website.includes.delete_modal')
                            <!-- End of modal backdrop -->
                        </tbody>
                    </table>

                    {{-- {{ $vaccines->onEachSide(5)->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function dataDelete(id) {
            var data_id = $("#deleteButton" + id).data('value');
            let route = "{{ route('vaccine.destroy', ['vaccine' => ':id']) }}";
            route = route.replace(":id", id);

            $("#route").attr("action", route)
        }
    </script>
@endpush
