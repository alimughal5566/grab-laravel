@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.assign_newaddon')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Assign Add-Ons
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Assign Add-Ons
                        </div>
                        <div class="card-body ">
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Food Items </strong></label>
                                        <select class="form-control" name="fooditem_id" required>
                                            <option selected value="">Please select food item</option>
                                            @foreach($fooditems as $fooditem)
                                                <option value="{{$fooditem->id}}">{{$fooditem->food_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Add-ons </strong></label>
                                        <select class="form-control" name="addon_id" required>
                                            <option selected value="">Please select add-ons</option>
                                            @foreach($addons as $addon)
                                                <option value="{{$addon->id}}">{{$addon->addon_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Addon Category </strong></label>
                                        <select class="form-control" name="addon_category" required>
                                            <option selected value="">Please select addon category</option>
                                            @foreach($addoncats as $addoncat)
                                                <option value="{{$addoncat->id}}">{{$addoncat->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Addon Type </strong></label>
                                        <select class="form-control" name="addon_type" required>
                                            <option selected value="">Please select addon type</option>
                                            <option value="1">Single</option>
                                            <option value="2">Multiple</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary float-right  customs-btn-bd">Assign</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
<script>
    $('#foods li:nth-child(4)').addClass('active');
    $('#foods').addClass('show');
</script>
@endsection