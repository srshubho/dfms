@extends('admin.layouts.default')

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
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->

            <!--DataTables example-->
            <div class="card">
                <div class="card-content">
                    {{-- <span class="card-title">Create Color</span> --}}

                    <div id="table-datatables">
                        <div class="row">
                            <div class="col">
                                <h4 class="header">Edit Color</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 s12 m8 l9">
                                <div class="row">
                                    <form class="col s12" action="{{ route('admin.color.update', $color->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input name="color_name" id="color_name" value="{{ $color->color_name }}" type="text" class="active">
                                                <label for="color_name">Color Name</label>
                                                @error('color_name')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit">Update Color</button>
                                    </form>
                                </div>
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
