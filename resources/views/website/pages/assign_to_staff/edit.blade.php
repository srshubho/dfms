@extends('website.layouts.default')

@push('css')
@endpush

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Assign Cow To Staff
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Assign Cow To Staff
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- <livewire:admin.assign.create /> --}}

            <form wire:submit.prevent="saveData" method="POST">
                {{ csrf_field() }}

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Staff </span>
                    <span class="text-red-900 dark:text-red-500">*</span>
                    <select name="staff_id"
                        class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="" selected>{{ $assignCowToStaff->user->name }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('staff_id')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Cow </span>
                    <span class="text-red-900 dark:text-red-500">*</span>
                    <p class="text-xs text-gray-700 dark:text-gray-400"> To select multiple: ctrl + right mouse </p>
                    <select name="cow" multiple
                        class="block w-full h-52 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="" selected>Choose cow</option>
                        <option disabled class="mt-2">Cows</option>
                        {{-- @foreach ($assignCowToStaff->assignLists as $assignList)
                            <option value="{{ $assignList->id }}">{{ $assignList->cow->name }}</option>
                        @endforeach --}}
                        @if (!empty($cows))
                            @foreach ($cows as $cow)
                                <option value="1{{ $cow->id }}">
                                    {{ $cow->name }}
                                </option>
                            @endforeach
                        @endif
                        <option disabled class="mt-2">Bulls</option>
                        @if (!empty($bulls))
                            @foreach ($bulls as $bull)
                                <option value="2{{ $bull->id }}">
                                    {{ $bull->name }}
                                </option>
                            @endforeach
                        @endif
                        <option disabled class="mt-2">Calves</option>
                        @if (!empty($calves))
                            @foreach ($calves as $calf)
                                <option value="3{{ $calf->id }}">
                                    {{ $calf->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('cow')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <div class="flex items-center justify-between ">
                    <div></div>
                    <button
                        class="mt-6 flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <span>Assign</span>
                    </button>
                </div>
            </form>


        </div>


    </div>
@endsection


@push('scripts')
    <script type="text/javascript">
        $('#primary_image').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endpush
