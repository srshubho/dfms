@extends('website.layouts.default')

@push('css')
    <?php header('Access-Control-Allow-Origin: *'); ?>
@endpush

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Assign Cow To Staff
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Assign Cow To Staff
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- <livewire:admin.assign.create /> --}}
            @livewire('admin.assign.create', [
                'users' => $users,
                'cowTypes' => $cowTypes,
            ])

            {{-- <form action="{{ route('assign-cow-to-staff.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Cow
                    </span>
                    <select name="cow_id"
                        class="block w-full mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="" disabled selected>Choose cow</option>
                        @foreach ($cows as $cow)
                            <option value="{{ $cow->id }}" {{ old('cow_id') ? 'selected' : '' }}>
                                {{ $cow->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cow_id')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>
            </form> --}}

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
