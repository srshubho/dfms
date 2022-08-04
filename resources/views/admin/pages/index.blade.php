@extends('admin.layouts.default')

@push('css')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_w4iaicn5.json" background="transparent" speed="1"
                        style="width: 1000px; height: 700px;" loop autoplay></lottie-player>
                </div>
            </div>
        </div>
    </div>
@endsection
