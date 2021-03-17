@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.storeavailability')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Add Availability
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Add Availability
                        </div>
                        <div class="card-body ">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Foods Item</strong></label>
                                        <select class="form-control" name="fooditem_id" required>
                                            <option selected value="">Please select food item</option>
                                            @foreach($fooditems as $fooditem)
                                                <option value="{{$fooditem->id}}">{{$fooditem->food_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Availability Days</strong></label><br/>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="1"> Sunday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="2"> Monday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="3"> Thuesday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="4"> Wednesday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="5"> Thursday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="6"> Friday
                                        </label>
                                        <label class="checkbox-inline">
                                          <input type="checkbox" name="days[]" value="7"> Saturday
                                        </label>
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
    $('#foods li:nth-child(6)').addClass('active');
    $('#foods').addClass('show');
</script>
@endsection