@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Supplier</h4><br>
                    <form method="POST" action="{{ route('store.supplier') }}" id="myForm">
                        @csrf


                    <div class="row mb-2">
                        <label for="name-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="name"class="form-control"id="name-input">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="mobile_number-input" class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="mobile_number"class="form-control"id="mobile_number-input">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="email"class="form-control"id="email-input">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="address-input" class="col-sm-2 col-form-label">Address</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="address"class="form-control"id="address-input">
                        </div>
                    </div>
                        <input type="submit" class="btn btn-success waves-effect waves-light" value="Add Supplier">
                    </form><!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>


</div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#portfolio_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                mobile_number: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Supplier`s Name',
                },
                mobile_number: {
                    required : 'Please Enter Supplier`s Mobile Number',
                },
                email: {
                    required : 'Please Enter Supplier`s Email',
                },
                address: {
                    required : 'Please Enter Supplier`s Address',
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
