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
                                <h4 class="header">Edit Supplier</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 s12 m8 l9">
                                <div class="row">
                                    <form class="col s12" action="{{ route('admin.supplier.update', $supplier->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        @method('PUT')
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input name="supplier_name" id="supplier_name"
                                                    value="{{ old('supplier_name') ? old('supplier_name') : $supplier->supplier_name }}" type="text"
                                                    required>
                                                <label for="color_name">Supplier Name</label>
                                                @error('supplier_name')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="supplier_phone" id="supplier_phone"
                                                    value="{{ old('supplier_phone') ? old('supplier_phone') : $supplier->supplier_phone }}" type="tel"
                                                    required>
                                                <label for="color_name">Supplier Phone</label>
                                                @error('supplier_phone')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="supplier_address" id="supplier_address"
                                                    value="{{ old('supplier_address') ? old('supplier_address') : $supplier->supplier_address }}"
                                                    type="text" required>
                                                <label for="color_name">Supplier Address</label>
                                                @error('supplier_address')
                                                    <p style="color:red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="primary-background-color text-white" type="submit">Update Supplier</button>
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
