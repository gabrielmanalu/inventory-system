@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Customer</h4><br>
                    <form method="POST" action="{{ route('update.customer') }}" id="myForm" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $customer->id }}">

                    <div class="row mb-2">
                        <label for="name-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="name"class="form-control"id="name-input" value="{{ $customer->name }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="customer_image" class="col-sm-2 col-form-label">Image</label>
                        <div class="form-group col-sm-10">
                            <input type="file" name="customer_image"class="form-control" id="customer_image">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="showImage" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ asset($customer->customer_image) }}" alt="Card image cap">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="mobile_number-input" class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="mobile_number"class="form-control"id="mobile_number-input" value="{{ $customer->mobile_number }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="email"class="form-control"id="email-input" value="{{ $customer->email }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="address-input" class="col-sm-2 col-form-label">Address</label>
                        <div class="form-group col-sm-10">
                            <input type="text" name="address"class="form-control"id="address-input" value="{{ $customer->address }}">
                        </div>
                    </div>
                        <input type="submit" class="btn btn-success waves-effect waves-light" value="Edit Customer">
                    </form><!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>


</div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#customer_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
