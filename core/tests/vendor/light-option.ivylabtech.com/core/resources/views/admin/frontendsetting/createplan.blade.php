@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{url('admin/storeplan')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                PLans
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Create PLan
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Name</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="plan_name" required>
                                        <input class="form-control form-control-lg mb-3" type="hidden" name="total_days" value="0">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Category</strong></label>
                                        <select class="form-control form-control-lg" name="category_id" required>
                                            <option selected value="">Please select category</option>
                                            @foreach($plancategory as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Price</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="plan_price" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Image</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="file" name="plan_image" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Description</strong></label>
                                        <textarea class="form-control form-control-lg mb-3" rows="3" name="plan_description" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary float-right  customs-btn-bd">Create</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection