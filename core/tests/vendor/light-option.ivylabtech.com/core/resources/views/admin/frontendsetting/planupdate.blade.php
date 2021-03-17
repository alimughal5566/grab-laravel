@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{url('admin/plan_update',['id' => $id])}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <h2 class="mb-4">
                PLans
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Update PLan
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Name</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="plan_name" value="{{$fooditems->plan_name}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Category</strong></label>
                                        <select class="form-control form-control-lg" name="category_id" required>
                                            <option selected value="">Please select category</option>
                                            @foreach($plancategory as $category)
                                                <option value="{{$category->id}}" @if($category->id==$fooditems->category_id) selected @endif>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Price</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="plan_price" value="{{$fooditems->plan_price}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Image</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="file" name="plan_image">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Description</strong></label>
                                        <textarea class="form-control form-control-lg mb-3" rows="3" name="plan_description" required>{{$fooditems->plan_description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary float-right  customs-btn-bd">Update</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
<script>
    $('#plansprogram li:nth-child(1)').addClass('active');
    $('#plansprogram').addClass('show');
</script>
@endsection