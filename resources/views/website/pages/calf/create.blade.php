@extends('website.layouts.default')

@push('css')
    <?php header('Access-Control-Allow-Origin: *'); ?>
@endpush

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Calfs
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create Calf
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('calf.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : '' }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter name" />
                    @error('name')
                        <span class="text-xs text-red-600 dark:text-red-400">
                            {{ $message }}
                        </span>
                    @enderror
                </label>

                <div class="grid gap-6 my-2 md:grid-cols-2 xl:grid-cols-2">

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Images</span>
                        <input type="file" name="primary_image" id="primary_image"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Select calf primary" />
                        @error('primary_image')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <img src="http://via.placeholder.com/400" alt="" class="w-48" id="preview-image">
                </div>

                <!-- Cards -->
                <div class="grid gap-6 mb-2 md:grid-cols-3 xl:grid-cols-3">

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Date Of Birth</span>
                        <span class="text-red-900 dark:text-red-500">*</span>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') ? old('date_of_birth') : '' }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        @error('date_of_birth')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400"> Gender </span>
                        <span class="text-red-900 dark:text-red-500">*</span>
                        <select name="gender" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" selected>Choose Gender</option>
                            <option value="1" {{ old('gender') ? 'selected' : '' }}>Male</option>
                            <option value="2" {{ old('gender') ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Estimated Live Weight</span>
                        <input type="number" name="estimated_live_weight" id="estimated_live_weight"
                            value="{{ old('estimated_live_weight') ? old('estimated_live_weight') : '' }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter calf estimated live weight" />
                        @error('estimated_live_weight')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Color
                        </span>
                        <select name="color_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" selected>Choose color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}" {{ old('color_id') ? 'selected' : '' }}>
                                    {{ $color->color_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Shade
                        </span>
                        <select name="shade_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" selected>Choose shade</option>
                            @foreach ($shades as $shade)
                                <option value="{{ $shade->id }}" {{ old('shade_id') ? 'selected' : '' }}>
                                    {{ $shade->shade_no }}
                                </option>
                            @endforeach
                        </select>
                        @error('shade_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Insemination Id
                        </span>
                        <select name="insemination_id"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="" selected>Choose iznsemination</option>
                            @foreach ($inseminations as $insemination)
                                <option value="{{ $insemination->id }}" {{ old('insemination_id') ? 'selected' : '' }}>
                                    Mother: {{ $insemination->cow->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('insemination_id')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Breed Percentage</span>
                        <input type="number" name="breed_percentage" id="breed_percentage"
                            value="{{ old('breed_percentage') ? old('breed_percentage') : '' }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Enter calf breed percentage" />
                        @error('breed_percentage')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>

                </div>

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
