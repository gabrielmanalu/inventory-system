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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="example-text-input" class=" form-label">Date</label>
                                 <input class="form-control example-date-input" name="date" type="date"  id="date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="purchase_no" class="form-label">Purchase No</label>
                                <input class="form-control" name="purchase_no" type="text" id="purchase_no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="supplier_id" class="form-label">Supplier Name</label>
                                <select id="supplier_id" name="supplier_id" class="form-select" aria-label="Default select example">
                                    <option selected="" value="">Select Supplier</option>
                                    @foreach ( $suppliers as $supp )
                                    <option value="{{$supp->id}}"> {{$supp->name}} </option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="category_id" class="form-label">Category Name</label>
                                <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">
                                    <option selected="" value="">Open this to select menu</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="product_id" class="form-label">Product Name</label>
                                <select id="product_id" name="product_id" class="form-select" aria-label="Default select example">
                                    <option selected="" value="">Open this to select menu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="add_more" class="form-label" style="margin-top: 40px"></label>
                                <input value="Add More" class="btn btn-secondary btn-rounded waves-effect waves-light" type="submit" id="add_more">
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->

                </div> <!-- End card-body -->
            </div>
        </div> <!-- end col -->
    </div>


</div>
</div>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{ route('get-category') }}",
                type: "GET",
                data:{supplier_id:supplier_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.category_id+' "> '+v.category.name+'</option>';
                    });
                    $('#category_id').html(html);
                }
            })
        });
    });
</script>

@endsection
