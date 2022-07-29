@livewireScripts

<!-- jQuery Library -->
<script type="text/javascript" src="{{ asset('admin/js/plugins/jquery-1.11.2.min.js') }}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{ asset('admin/js/materialize.min.js') }}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{ asset('admin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

@stack('scripts1')

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{ asset('admin/js/plugins.min.js') }}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{ asset('admin/js/custom-script.js') }}"></script>
<!-- Toast Notification -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{-- Toast Notification --}}
@include('admin.includes.alert')

@stack('scripts2')
