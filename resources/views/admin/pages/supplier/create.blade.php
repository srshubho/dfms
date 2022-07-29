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
                            <h5 class="breadcrumbs-title">Suppliers</h5>
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
                                <h4 class="header">Create Supplier</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 s12 m8 l9">
                                <div class="row">
                                    <form class="col s12" action="{{ route('admin.supplier.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input name="supplier_name" id="supplier_name" type="text"
                                                    value="{{ old('supplier_name') ? old('supplier_name') : '' }}" class="active" required>
                                                <label for="supplier_name">Supplier Name</label>
                                                @error('supplier_name')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="supplier_phone" id="supplier_phone" type="tel"
                                                    value="{{ old('supplier_phone') ? old('supplier_phone') : '' }}" class="active" required>
                                                <label for="supplier_phone">Supplier Phone</label>
                                                @error('supplier_phone')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="supplier_address" id="supplier_address"
                                                    type="text"value="{{ old('supplier_address') ? old('supplier_address') : '' }}" class="active"
                                                    required>
                                                <label for="supplier_address">Supplier Address</label>
                                                @error('supplier_address')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="primary-background-color text-white" type="submit">Add Supplier</button>
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
