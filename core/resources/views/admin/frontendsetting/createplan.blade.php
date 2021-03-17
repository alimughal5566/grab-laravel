@extends('admin.master')

@section('title', 'Admin | Create - Plans')

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

                                 <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Calories</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="number" min="1" name="plan_calories" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Plan Description</strong></label>
                                        <textarea class="form-control form-control-lg mb-3" rows="3" name="plan_description" required></textarea>
                                    </div>
                                </div>

                                  <div class="col-md-4 mb-3"></div>
                                    <div class="col-md-4 mb-3" style="text-align: center;">
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i> Add Typical Compostion</button>
                                    </div>
                                    <div class="col-md-4 mb-3"></div>

                                      <div id="dynamic_composition" style="width: 100%; padding: 10px;">
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){ 
        var i=0;
        var k=0;  

        $('#add').click(function(){  
           i++;
           k++;  
           $('#dynamic_composition').append('<div id="addional_row_'+i+'" class="row"><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Typical Composition</strong></label><select class="form-control" name="nutrition[]" required><option selected value="">Select Composition</option><option value="1">Carbohydrates</option><option value="2">Proteins</option><option value="3">Fats</option><option value="4">Sugar</option><option value="5">Iron</option><option value="6">Calcium</option></select></div></div><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Unit</strong></label><select class="form-control" name="unit[]" required><option selected value="">Select Unit</option><option value="1">Mg</option><option value="2">g</option></select></div></div><div class="col-md-2 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Unit Value</strong></label><input class="form-control mb-3" type="number" value="0" name="gmvalue[]" min="0"></div></div><div class="col-md-2 mb-3"><div class="form-group"><label for="header_subtitle"><strong>DM Valve %</strong></label><input class="form-control mb-3" type="number" name="dmvalue[]" value="0" min="0"></div></div><div class="col-md-2 mb-3"><br/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:5px;">X</button></div></div>');
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