@extends('website.layouts.default')

@push('css')
    <?php header('Access-Control-Allow-Origin: *'); ?>
@endpush

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Cow
        </h4>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{-- <livewire:admin.cow.edit /> --}}
            @livewire('admin.cow.edit', [
                'cow' => $cow,
                'colors' => $colors,
                'suppliers' => $suppliers,
                'shades' => $shades,
            ])
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
