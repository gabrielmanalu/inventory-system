@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Product</h4><br>
                    <form method="POST" action="{{ route('store.product') }}" id="myForm">
                        @csrf


                    <div class="row mb-2">
                        <label for="name-input" class="col-sm-2 col-form-label">Product Name</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="name"class="form-control"id="name-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Supplier Name</label>
                        <div class="col-sm-10">
                            <select name="supplier_id" class="form-select" aria-label="Default select example">
                                <option selected="" value="">Select Supplier</option>
                                @foreach ( $suppliers as $supp )
                                <option value="{{$supp->id}}"> {{$supp->name}} </option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Unit Name</label>
                        <div class="col-sm-10">
                            <select name="unit_id" class="form-select" aria-label="Default select example">
                                <option selected="" value="">Select Unit</option>
                                @foreach ( $units as $unit )
                                <option value="{{$unit->id}}"> {{$unit->name}} </option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-select" aria-label="Default select example">
                                <option selected="" value="">Select Category</option>
                                @foreach ( $categories as $cat )
                                <option value="{{$cat->id}}"> {{$cat->name}} </option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                        <input type="submit" class="btn btn-success waves-effect waves-light" value="Add Product">
                    </form><!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                supplier_id: {
                    required : true,
                },
                unit_id: {
                    required : true,
                },
                category_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Product`s Name',
                },
                supplier_id: {
                    required : 'Please Select Supplier',
                },
                unit_id: {
                    required : 'Please Select Unit',
                },
                category_id: {
                    required : 'Please Select Category',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

@endsection
