@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.storeplanoptions_meal')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Plan With Options Meal
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Create Meal
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Name</strong></label>
                                        <input class="form-control form-control-md mb-3" type="text" name="plan_name" value="{{$planname}}" readonly>
                                        <input class="form-control mb-3" type="hidden" name="plan_id" value="{{$planid}}">
                                        <input class="form-control mb-3" type="hidden" name="counterval" id="counterval" value="">

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="plan_days"><strong>Meal Type</strong></label>
                                        <select class="form-control" name="meal_type" required>
                                            <option selected value="">Please select day</option>
                                            @foreach($mealstype as $mealtype)
                                                <option value="{{$mealtype->id}}">{{$mealtype->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Price</strong></label>
                                            <input class="form-control form-control-md mb-3" type="number" min="1" name="price" value="" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Image</strong></label>
                                            <input class="form-control form-control-md mb-3" type="file" name="single_img" required>
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3"></div>
                                    <div class="col-md-4 mb-3" style="text-align: center;">
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i> Add Food</button>
                                    </div>
                                    <div class="col-md-4 mb-3"></div>
                                </div>

                                <div id="dynamic_days" style="width: 100%; padding: 10px;"></div>

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
        var i=0;
        var k=0;  

        $('#add').click(function(){  
           i++;
           k++;  
           $('#dynamic_days').append('<div id="addional_row_'+i+'" class="row"><div class="col-md-4 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Food Item</strong></label><input class="form-control form-control-md mb-3" type="text" name="meal_name[]" style="height: 40px;" required></div></div><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Food Image</strong></label><input class="form-control form-control-md mb-3" type="file" name="meal_image[]" required></div></div><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Foods Type</strong></label><select class="form-control" name="food_type[]" style="height: 40px;" required><option selected value="">Please select food type</option><option value="1">Breakfast</option><option value="2">Lunch</option><option value="3">Snacks</option><option value="4">Dinner</option></select></div></div><div class="col-md-2 mb-3"><br/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:5px;">X</button></div></div>');
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
    $('#plansoptions li:nth-child(3)').addClass('active');
    $('#plansoptions').addClass('show');
</script>
@endsection