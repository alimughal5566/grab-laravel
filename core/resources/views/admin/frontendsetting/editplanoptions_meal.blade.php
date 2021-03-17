@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.updateplanoptions_meal')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Plan With Options Meal
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Update Meal
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Name</strong></label>
                                        <input class="form-control form-control-md mb-3" type="text" name="plan_name" value="{{$planname}}" readonly>
                                        <input class="form-control mb-3" type="hidden" name="planid" value="{{$planid}}">
                                        <input class="form-control mb-3" type="hidden" name="counterval" id="counterval" value="">
                                        <input class="form-control mb-3" type="hidden" name="mealtype" id="mealtype" value="{{$mealstype}}">
                                        <input class="form-control mb-3" type="hidden" name="sizeof_totalfoods" id="sizeof_totalfoods" value="{{$sizeOfTotalFoods}}">

                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="plan_days"><strong>Meal Type</strong></label>
                                        <input class="form-control mb-3" type="text" name="meal_type" value="@foreach($planoptmealslist as $mealoptlist)@if($mealoptlist->id==$mealstype){{$mealoptlist->category_name}}@endif @endforeach" readonly> 
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3" style="text-align: left;">
                                    @if($single_img!='') 
                                    <img src="{{asset('assets/user/images/planoptions/'.$single_img)}}" class="img-thumbnail" width="100" height="100">
                                    @else
                                    <img src="{{asset('assets/user/images/meal/noimage.png')}}" class="img-thumbnail" width="100" height="100">
                                    @endif
                                    
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Image</strong></label>
                                            <input class="form-control form-control-md mb-3" type="file" name="single_img">
                                        </div>
                                    </div>
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="plan_days"><strong>Price</strong></label>
                                        <input class="form-control mb-3" type="number" min="1" name="price" id="price" value="{{$specific_price}}" style="height: 39px;">
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-3" style="border-bottom: 2px solid #ddd;"></div>


                                <div id="dynamic_days" style="width: 100%; padding: 10px;">
                                @foreach($planoptdetails as $key => $day_sch)
                                <?php ++$key; ?>
                                <div id="addional_row_{{$key}}" class="row">
                                    
                                    <div class="col-md-2 mb-3" style="text-align: center;">
                                        @if($day_sch->food_image!='')
                                            <img src="{{asset('assets/user/images/planoptions/'.$day_sch->food_image)}}" class="img-thumbnail" width="100" height="100">
                                        @else
                                        <img src="{{asset('assets/user/images/meal/noimage.png')}}" class="img-thumbnail" width="100" height="100">
                                        @endif
                                            <input type="hidden" name="prime_id_<?php echo $key;?>" value="{{$day_sch->id}}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Foods Item</strong></label>
                                            <input class="form-control form-control-md mb-3" type="text" name="meal_name[]" value="{{$day_sch->food_name}}" style="height: 40px;" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Food Image</strong></label>
                                            <input class="form-control form-control-md mb-3" type="file" name="meal_image[]" value="{{$day_sch->food_image}}">
                                        </div>
                                    </div>


                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Foods Type</strong></label>
                                            <select class="form-control" name="food_type[]" style="height: 40px;" required>
                                                <option value="">Please select food type</option>
                                                <option value="1" @if($day_sch->food_type == 1) selected @endif>Breakfast</option>
                                                <option value="2" @if($day_sch->food_type == 2) selected @endif>Lunch</option>
                                                <option value="3" @if($day_sch->food_type == 3) selected @endif>Snacks</option>
                                                <option value="4" @if($day_sch->food_type == 4) selected @endif>Dinner</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-1 mb-3"><br/><button type="button" name="remove" id="{{$key}}" ros-id="{{$day_sch->id}}" plan-id="{{$planid}}" mealtype-id="{{$mealstype}}" class="btn btn-danger btn_remove_add" style="margin-top:5px;">X</button>
                                    </div></div>


                                @endforeach
                                </div>

                                <div class="col-md-4 mb-3"></div>
                                <div class="col-md-4 mb-3" style="text-align: center;">
                                    <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i> Add Food</button>
                                </div>
                                <div class="col-md-4 mb-3"></div>

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




@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){ 
        var i=$('#sizeof_totalfoods').val();
        var k=$('#sizeof_totalfoods').val();
          

        $('#add').click(function(){  
           i++;
           k++;  
           $('#dynamic_days').append('<div id="addional_row_'+i+'" class="row"><div class="col-md-4 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Foods Item</strong></label><input class="form-control form-control-md mb-3" type="text" name="meal_name[]" style="height: 40px;" required></div></div><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Food Image</strong></label><input class="form-control form-control-md mb-3" type="file" name="meal_image[]" required></div></div><div class="col-md-4 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Foods Type</strong></label><select class="form-control" name="food_type[]" style="height: 40px;" required><option selected value="">Please select food type</option><option value="1">Breakfast</option><option value="2">Lunch</option><option value="3">Snacks</option><option value="4">Dinner</option></select></div></div><div class="col-md-1 mb-3"><br/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:5px;">X</button></div></div>');
           $('#counterval').val(k);
        });


        $(document).on('click', '.btn_remove', function(){  
            k--;
           var button_id = $(this).attr("id");   
           $('#addional_row_'+button_id+'').remove();  
           $('#counterval').val(k);
        }); 


        $(document).on('click', '.btn_remove_add', function(){  
            


            var button_id= $(this).attr("id");  
            var rowId=$(this).attr("ros-id"); 
            var planId=$(this).attr("plan-id"); 
            var mealtypeId=$(this).attr("mealtype-id"); 

            $.ajax({
                url:'{{route("admin.planoptionmealdelete")}}',
                type: 'GET',
                dataType: 'JSON',
                data:{rowId:rowId},
                success: function(data){
                    console.log(data);
                    if(data.result=='true'){
                        k--;
                        $('#addional_row_'+button_id+'').remove();  
                        $('#counterval').val(k);
                        window.location.reload();
                    }
                }
            });

           
        }); 

    });
</script> 
@endsection

<script>
    $('#plansoptions li:nth-child(3)').addClass('active');
    $('#plansoptions').addClass('show');
</script>
@endsection