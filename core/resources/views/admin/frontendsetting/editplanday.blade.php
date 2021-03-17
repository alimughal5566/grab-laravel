@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{url('admin/update_plandayrecord',['id' => $planid])}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <h2 class="mb-4">
                Plan Day
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Update Day Schedule
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Name</strong></label>
                                        <input class="form-control form-control-md mb-3" type="text" name="plan_name" value="{{$planname}}" readonly>
                                        <input class="form-control mb-3" type="hidden" name="plan_id" value="{{$planid}}">
                                        <input class="form-control mb-3" type="hidden" name="counterval" id="counterval" value="">
                                        <input class="form-control mb-3" type="hidden" name="selected_day" id="selected_day" value="{{$day}}">
                                        <input class="form-control mb-3" type="hidden" name="sizeof_totalfoods" id="sizeof_totalfoods" value="{{$sizeof_totalfoods}}">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="plan_days"><strong>Day</strong></label>
                                        <input class="form-control form-control-md mb-3" type="text" name="day_name" 
                                        <?php

                                        if($day==1)
                                        {
                                            echo 'value="Sunday"';
                                        }
                                        if($day==2)
                                        {
                                            echo 'value="Monday"';
                                        }
                                        if($day==3)
                                        {
                                            echo 'value="Thuesday"';
                                        }
                                        if($day==4)
                                        {
                                            echo 'value="Wednesday"';
                                        }
                                        if($day==5)
                                        {
                                            echo 'value="Thursday"';
                                        }
                                        if($day==6)
                                        {
                                            echo 'value="Friday"';
                                        }
                                        if($day==7)
                                        {
                                            echo 'value="Saturday"';
                                        }
                                        ?>
                                        readonly>
                                    </div>
                                </div>


                                <div id="dynamic_days" style="width: 100%; padding: 10px;">
                                @foreach($day_schedule as $key => $day_sch)
                                <?php ++$key; ?>
                                <div id="addional_row_{{$key}}" class="row">
                                    <div class="col-md-5 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Foods Item</strong></label>
                                        <select class="form-control" name="fooditem[]" required>
                                        <option value="">Please select food item</option>
                                            @foreach($fooditems as $fooditem)
                                            <option value="{{$fooditem->id}}" @if($day_sch->food_item_id == $fooditem->id) selected @endif>{{$fooditem->food_name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Foods Type</strong></label>
                                            <select class="form-control" name="food_type[]" required>
                                                <option value="">Please select food type</option>
                                                <option value="1" @if($day_sch->food_type_id == 1) selected @endif>Breakfast</option>
                                                <option value="2" @if($day_sch->food_type_id == 2) selected @endif>Lunch</option>
                                                <option value="3" @if($day_sch->food_type_id == 3) selected @endif>Snacks</option>
                                                <option value="4" @if($day_sch->food_type_id == 4) selected @endif>Dinner</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-3"><br/><button type="button" name="remove" id="{{$key}}" class="btn btn-danger btn_remove" style="margin-top:5px;">X</button>
                                    </div></div>


                                @endforeach
                                </div>

                                <div class="col-md-4 mb-3"></div>
                                <div class="col-md-4 mb-3" style="text-align: center;">
                                    <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i> Add Food</button>
                                </div>
                                <div class="col-md-4 mb-3"></div>

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




@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){ 
        var i=$('#sizeof_totalfoods').val();
        var k=$('#sizeof_totalfoods').val();
          

        $('#add').click(function(){  
           i++;
           k++;  
           $('#dynamic_days').append('<div id="addional_row_'+i+'" class="row"><div class="col-md-5 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Foods Item</strong></label><select class="form-control" name="fooditem[]" required><option selected value="">Please select food item</option>@foreach($fooditems as $fooditem)<option value="{{$fooditem->id}}">{{$fooditem->food_name}}</option>@endforeach</select></div></div><div class="col-md-5 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Foods Type</strong></label><select class="form-control" name="food_type[]" required><option selected value="">Please select food type</option><option value="1">Breakfast</option><option value="2">Lunch</option><option value="3">Snacks</option><option value="4">Dinner</option></select></div></div><div class="col-md-2 mb-3"><br/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:5px;">X</button></div></div>');
           $('#counterval').val(k);
        });


        $(document).on('click', '.btn_remove', function(){  
            k--;
           var button_id = $(this).attr("id");   
           $('#addional_row_'+button_id+'').remove();  
           $('#counterval').val(k);
        }); 

    });
</script> 
@endsection

<script>
    $('#plansprogram li:nth-child(1)').addClass('active');
    $('#plansprogram').addClass('show');
</script>
@endsection