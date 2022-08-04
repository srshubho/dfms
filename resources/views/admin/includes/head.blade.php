<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="msapplication-tap-highlight" content="no" />
<meta name="description" content="DFMS ">
<meta name="keywords" content="DFMS" />
<title>DFMS</title>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{-- <!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script> --}}

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind.output.css') }}" />
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="{{ asset('admin/assets/js/init-alpine.js') }}"></script>
<!-- You need focus-trap.js to make the modal accessible -->
<script src="{{ asset('admin/assets/js/focus-trap.js') }}" defer></script>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">

@livewireStyles

@stack('css')
