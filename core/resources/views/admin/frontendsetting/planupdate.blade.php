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

                                   <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Calories</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="number" min="1" name="plan_calories" value="{{$fooditems->plan_calories}}">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Description</strong></label>
                                        <textarea class="form-control form-control-lg mb-3" rows="3" name="plan_description" required>{{$fooditems->plan_description}}</textarea>
                                         <input class="form-control mb-3" type="hidden" name="counterval" id="counterval" value="">
                                        <input class="form-control mb-3" type="hidden" name="sizeof_totalfoods" id="sizeof_totalfoods" value="<?php echo sizeof($plancompostions); ?>">
                                    </div>
                                </div>

                                  <div id="dynamic_composition" style="width: 100%; padding: 10px;">
                                
                                @if(sizeof($plancompostions) > 0)
                                @foreach($plancompostions as $key => $compostions)
                                <?php ++$key; ?>

<div id="addional_row_{{$key}}" class="row">
    <div class="col-md-3 mb-3">
        <div class="form-group">
            <label for="header_subtitle"><strong>Typical Composition</strong></label><select class="form-control" name="nutrition[]" required>
                <option value="">Select Composition</option>
                <option value="1" @if($compostions->nutrition==1) selected @endif>Carbohydrates</option>
                <option value="2" @if($compostions->nutrition==2) selected @endif>Proteins</option>
                <option value="3" @if($compostions->nutrition==3) selected @endif>Fats</option>
                <option value="4" @if($compostions->nutrition==4) selected @endif>Sugar</option>
                <option value="5" @if($compostions->nutrition==5) selected @endif>Iron</option>
                <option value="6" @if($compostions->nutrition==6) selected @endif>Calcium</option>
            </select>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="form-group">
            <label for="header_subtitle"><strong>Unit</strong></label>
            <select class="form-control" name="unit[]" required>
                <option value="">Select Unit</option>
                <option value="1" @if($compostions->unit==1) selected @endif>Mg</option>
                <option value="2" @if($compostions->unit==2) selected @endif>g</option>
            </select>
        </div>
    </div>

    <div class="col-md-2 mb-3">
        <div class="form-group">
            <label for="header_subtitle"><strong>Unit Value</strong></label>
            <input class="form-control mb-3" type="number" name="gramvalue[]" min="0" value="{{$compostions->gramvalue}}">
        </div>
    </div>

    <div class="col-md-2 mb-3">
        <div class="form-group"><label for="header_subtitle"><strong>DM Valve %</strong></label>
            <input class="form-control mb-3" type="number" name="dmvalue[]" min="0" value="{{$compostions->dmvalue}}">
        </div>
    </div>

    <div class="col-md-2 mb-3"><br/>
        <button type="button" name="remove" id="{{$key}}" class="btn btn-danger btn_remove" style="margin-top:5px;">X</button>
    </div>
</div>


                                @endforeach
                                @endif
                                </div>

                                <div class="col-md-4 mb-3"></div>
                                    <div class="col-md-4 mb-3" style="text-align: center;">
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i> Add Typical Compostion</button>
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
           $('#dynamic_composition').append('<div id="addional_row_'+i+'" class="row"><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Typical Composition</strong></label><select class="form-control" name="nutrition[]" required><option selected value="">Select Composition</option><option value="1">Carbohydrates</option><option value="2">Proteins</option><option value="3">Fats</option><option value="4">Sugar</option><option value="5">Iron</option><option value="6">Calcium</option></select></div></div><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Unit</strong></label><select class="form-control" name="unit[]" required><option selected value="">Select Unit</option><option value="1">Mg</option><option value="2">g</option></select></div></div><div class="col-md-2 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Unit Value</strong></label><input class="form-control mb-3" type="number" value="0" name="gramvalue[]" min="0"></div></div><div class="col-md-2 mb-3"><div class="form-group"><label for="header_subtitle"><strong>DM Valve %</strong></label><input class="form-control mb-3" type="number" name="dmvalue[]" value="0" min="0"></div></div><div class="col-md-2 mb-3"><br/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:5px;">X</button></div></div>');
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