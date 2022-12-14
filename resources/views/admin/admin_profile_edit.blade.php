@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Profile Page</h4>
                    <form method="POST" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                        @csrf

                    <div class="row mb-2">
                        <label for="name-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name"class="form-control"
                             value="{{ $editData->name }}"id="name-input">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email"class="form-control"
                             value="{{ $editData->email }}"id="email-input">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="username-input" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username"class="form-control"
                             value="{{ $editData->username }}"id="username-input">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="profile-image-input" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input id="image" type="file" name="profile_image"class="form-control" id="profile-image-input">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="showImage" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image))?url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                        </div>
                    </div>
                        <input type="submit" class="btn btn-success waves-effect waves-light" value="Update Profile">
                    </form><!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>


</div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
