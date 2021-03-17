@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{url('admin/update_availability',['id' => $id])}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <h2 class="mb-4">
                Availability
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Update Availability
                        </div>
                        <div class="card-body ">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Foods Item</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="food_item" value="{{$fooditems->food_name}}" readonly>
                                    </div>
                                </div>

                                <?php 
                                    $availabilities=explode(',',$fooditems->availability);
                                    $days= [];

                                ?>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Availability Days</strong></label><br/>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                        <input type="checkbox" name="days[]" value="1"
                                        <?php
                                            foreach ($availabilities as $key => $availability) {
                                                if($availability==1)
                                                {
                                                    echo 'checked';
                                                }
                                            }
                                        ?>
                                        > Sunday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="2"
                                          <?php
                                            foreach ($availabilities as $key => $availability) {
                                                if($availability==2)
                                                {
                                                    echo 'checked';
                                                }
                                            }
                                        ?>
                                          > Monday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="3"
                                          <?php
                                            foreach ($availabilities as $key => $availability) {
                                                if($availability==3)
                                                {
                                                    echo 'checked';
                                                }
                                            }
                                        ?>
                                          > Thuesday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="4"
                                        <?php
                                            foreach ($availabilities as $key => $availability) {
                                                if($availability==4)
                                                {
                                                    echo 'checked';
                                                }
                                            }
                                        ?>
                                          > Wednesday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="5"
                                          <?php
                                            foreach ($availabilities as $key => $availability) {
                                                if($availability==5)
                                                {
                                                    echo 'checked';
                                                }
                                            }
                                        ?>
                                          > Thursday
                                        </label>
                                        <label class="checkbox-inline" style="margin-right: 10px;">
                                          <input type="checkbox" name="days[]" value="6"
                                          <?php
                                            foreach ($availabilities as $key => $availability) {
                                                if($availability==6)
                                                {
                                                    echo 'checked';
                                                }
                                            }
                                        ?>
                                          > Friday
                                        </label>
                                        <label class="checkbox-inline">
                                          <input type="checkbox" name="days[]" value="7"
                                          <?php
                                            foreach ($availabilities as $key => $availability) {
                                                if($availability==7)
                                                {
                                                    echo 'checked';
                                                }
                                            }
                                        ?>
                                          > Saturday
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

@endsection