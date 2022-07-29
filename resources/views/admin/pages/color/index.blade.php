@extends('admin.layouts.default')

@push('css')
    <style>
        .modal {
            width: 25% !important;
        }

        .modal .modal-footer {
            width: 95% !important;
        }
    </style>

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('admin/js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('admin/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('admin/js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('admin/js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
@endpush

@section('content')
    <div class="container">
        <div class="section">

            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper">
                <!-- Search for small screen -->
                <div class="header-search-wrapper grey hide-on-large-only">
                    <i class="mdi-action-search active"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <h5 class="breadcrumbs-title">Colors</h5>
                            {{-- <ol class="breadcrumbs">
                                <li>
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">UI Elements</a>
                                </li>
                                <li class="active">Cards</li>
                            </ol> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->

            <!--DataTables example-->
            <div class="card">
                <div class="card-content">
                    {{-- <span class="card-title">Colors</span> --}}

                    <div id="table-datatables">
                        <div class="row">
                            <div class="col">
                                <h4 class="header">Colors list</h4>
                            </div>
                            <div class="col">
                                <h4 class="header">
                                    <a href="{{ route('admin.color.create') }}">
                                        <i class="fa-solid fa-square-plus" style="color: rgb(46 101 108)"></i>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 s12 m8 l9">
                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Color Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Color Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        @forelse ($colors as $color)
                                            <tr>
                                                <td>{{ $color->color_name }}</td>
                                                <td>{{ $color->color_code }}</td>
                                                <td>
                                                    <a href="{{ route('admin.color.edit', $color->id) }}">
                                                        <i class="far fa-edit" style="color: rgb(85, 75, 158);"></i>
                                                    </a>
                                                    <a class="modal-trigger" href="#modal3">
                                                        <i class="far fa-trash-alt" style="color: red;"></i>
                                                    </a>
                                                    <div id="modal3" class="modal">
                                                        <div class="modal-content red white-text">
                                                            <p>Are you sure want to delete?</p>
                                                        </div>
                                                        <div class="modal-footer teal lighten-3">
                                                            <form action="{{ route('admin.color.destroy', $color->id) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="waves-effect waves-green red lighten-2 btn-flat">
                                                                    Agree
                                                                </button>
                                                            </form>
                                                            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">
                                                                Disagree
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr colspan="3">No colors found</tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="divider"></div>
        </div>
    </div>
@endsection

@push('scripts1')
    <!-- data-tables -->
    <script type="text/javascript" src="{{ asset('admin/js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/data-tables/data-tables-script.js') }}"></script>
    <script type="text/javascript">
        /*Show entries on click hide*/
        // $(document).ready(function() {
        //     $(".dropdown-content.select-dropdown li").on("click", function() {
        //         var that = this;
        //         setTimeout(function() {
        //             if ($(that).parent().hasClass('active')) {
        //                 $(that).parent().removeClass('active');
        //                 $(that).parent().hide();
        //             }
        //         }, 100);
        //     });
        // });
    </script>
@endpush
