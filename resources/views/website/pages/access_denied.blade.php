@extends('website.layouts.default')

@push('css')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-red-700">
            You are not authorized
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="grid justify-items-center content-center p-4 shadow-xs">
                    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_lmr9omcw.json" background="transparent" speed="1"
                        style="width: 400px; height: 400px;" loop autoplay></lottie-player>
                </div>
            </div>
        </div>
    </div>
@endsection
