@extends('admin.master')

@section('title', 'Admin | Foods')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            Foods
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Food Items
                        <button type="submit" class="btn btn-secondary float-right customs-btn-bd" data-toggle="modal"
                                data-target="#foodItem">
                            Add New
                        </button>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped"  id="customerslisting">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Food name</th>
                                <th scope="col">Food Price</th>
                                <th scope="col">Category name</th>
                                {{--<th scope="col">Image</th>--}}
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($foodItems as $foodItem)
                            <tr>
                                <th scope="col">{{$loop->iteration}}</th>
                                <th scope="col">{{$foodItem->food_name}}</th>
                                <th scope="col">{{$foodItem->food_price}}</th>
                                <th scope="col">{{$foodItem->FoodCategory->food_category_name}}</th>
                                {{--<th scope="col">{{$foodItem->food_image}}</th>--}}
                                {{--<th scope="col">--}}
                                {{--<img src="{{asset('assets/user/images/portfolio/'.$p_image->portfolio_image)}}"--}}
                                {{--alt="service img"--}}
                                {{--height="50" width="50">--}}
                                {{--</th>--}}
                                <th scope="col">
                                    <a href="" class="btn btn-info btn-sm btn-square"
                                       data-food_name="{{$foodItem->food_name}}"
                                       data-food_price="{{$foodItem->food_price}}"
                                       data-food_category_id="{{$foodItem->food_category_id}}"
                                       data-food_food_type="{{$foodItem->food_type}}"
                                       data-food_description="{{$foodItem->food_description}}"
                                       data-food_image="{{$foodItem->food_image}}"
                                       data-id="{{$foodItem->id}}"
                                       data-toggle="modal" onclick="open_foodedit_modal(this)" 
                         data-target="#foodEdit"
                                    >Edit</a>

                                    <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$foodItem->id}}"
                                       data-toggle="modal" data-target="#foodDelete">Delete</a>
                                </th>

                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Create Foods item Modal -->
    <div class="modal modal-danger fade" id="foodItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create Foods Item</h4>
                </div>
                <form action="{{route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="food_name" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Foods category</strong></label>
                                <select class="form-control" id="" name="food_category_id" required>
                                    <option selected value="">Category</option>
                                @foreach($foodCategoryForItem as $category)
                                  <option value="{{$category->id}}">{{$category->food_category_name}}</option>
                                 @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Foods type</strong></label>
                                <select class="form-control" name="food_type" required>
                                    <option selected value="">Please select food type</option>
                                    <option value="1">Breakfast</option>
                                    <option value="2">Lunch</option>
                                    <option value="3">Snacks</option>
                                    <option value="4">Dinner</option>
                                </select>
                            </div>
                        </div>


                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food Price</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="food_price" required>
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Calories</strong> </label>
                                  
                                  <div class="row">
                                <div class="col-md-6">
                                <input class="form-control mb-3" type="text" name="calories" required>
                                </div>

                                <div class="col-md-6">
                                <button class="btn btn-success" id="typicalcomp">Add Typical Composition</button>
                                </div>


                                </div>
                            </div>
                        </div>


                        <div id="food">
                            </div>

                       {{--  <div class="col-md-12 mb-3">
                            <div class="form-group">                          
                                  <div class="row">
                                <div class="col-md-3">
                                <select class="form-control" id="food_type" name="food_type" required>
                                    <option selected value="">Select Nutrition</option>
                                    <option value="1">Calories</option>
                                    <option value="2">Carbohydrates</option>
                                    <option value="3">Proteins</option>
                                    <option value="4">Fats</option>
                                    <option value="5">Sugar</option>
                                    <option value="6">Iron</option>
                                    <option value="7">Calcium</option>
                                </select>                             
                                </div>

                                <div class="col-md-3">
                                <select class="form-control" id="" name="unit" required>
                                    <option selected value="">Select Unit</option>
                                    <option value="1">Mg</option>
                                    <option value="2">g</option> 
                                </select>
                                </div>

                                <div class="col-md-3">
                                <input class="form-control mb-3" type="text" name="dmvalue" required>
                                </div>

                                <div class="col-md-2">
                                <input class="form-control mb-3" type="text" name="dmvalue" required>
                                </div>

                                <div class="col-md-1">
                                    <button class="btn btn-danger">X</button>
                                </div>

                                </div>
                            </div>
                        </div> --}}


                          
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="food_image[]" multiple required>
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food description</strong></label>
                                <textarea class="form-control form-control-lg mb-3" rows="3" name="food_description" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Foods item Modal -->
    <div class="modal modal-danger fade" id="foodEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit Foods Item</h4>
                </div>
                <form action="{{route('admin.foods.update','update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="food_name" id="food_names">
                            </div>
                        </div>
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Foods category</strong></label>
                                <select class="form-control" id="catid" name="food_category_id" required>
                                    <option selected value="">Category</option>
                                    @foreach($foodCategoryForItem as $category)
                                        <option value="{{$category->id}}">{{$category->food_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="ids" id="foodid">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Foods type</strong></label>
                                <select class="form-control" id="food_type" name="food_type" required>
                                    <option selected value="">Please select food type</option>
                                    <option value="1">Breakfast</option>
                                    <option value="2">Lunch</option>
                                    <option value="3">Snacks</option>
                                    <option value="4">Dinner</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food Price</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="food_price" id="food_price" required>
                            </div>
                        </div>



                            <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Calories</strong> </label>
                                  
                                  <div class="row">
                                <div class="col-md-6">
                                <input class="form-control mb-3" type="text" name="calories" id="calories">
                                </div>

                                <div class="col-md-6">
                                <button class="btn btn-success" id="edittypicalcomp">Add Typical Composition</button>
                                </div>


                                </div>
                            </div>
                        </div>


                         <div id="editfood">
                            </div>


                        <div id="compositionlist">
                            </div>

                       {{--    <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Nutrition Facts</strong></label>
                                <select class="form-control" id="food_type" name="food_type" required>
                                    <option selected value="">Select Nutrition</option>
                                    <option value="1">Calories</option>
                                    <option value="2">Carbohydrates</option>
                                    <option value="3">Proteins</option>
                                    <option value="4">Fats</option>
                                    <option value="5">Sugar</option>
                                    <option value="6">Iron</option>
                                    <option value="7">Calcium</option>
                                </select>
                            </div>
                        </div>
 --}}

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="food_image[]" id="image1" multiple>
                            </div>
                        </div>




                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Food description</strong></label>
                                <textarea class="form-control form-control-lg mb-3" rows="3" name="food_description" id="food_description" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete Food Alert Modal -->
    <div class="modal modal-danger fade" id="foodDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($foodItem->id) ? route('admin.foods.destroy','delete') : '#'}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <h4 class="text-center">Are you sure ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('scripts')



    {{--Edit Food--}}
 

    {{--script for modal Category Delete--}}
    <script>
        $('#foodDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection


{{--dropdown active--}}
<script>
    $('#foods li:nth-child(2)').addClass('active');
    $('#foods').addClass('show');
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var i=1;
         $('#typicalcomp').click(function(){
        i++;
$('#food').append('<div class="extrarow_for_acadamic'+i+'"><div class="col-md-12 mb-3"><div class="form-group"><div class="row"><div class="col-md-3"><select class="form-control" id="food_type" name="nutrition[]" required><option selected value="">Choose</option><option value="1">Carbohydrates</option><option value="2">Proteins</option><option value="3">Fats</option><option value="4">Sugar</option><option value="5">Iron</option><option value="6">Calcium</option></select></div><div class="col-md-3"><select class="form-control" id="" name="unit[]" required><option selected value="">Select Unit</option><option value="1">Mg</option><option value="2">g</option></select></div><div class="col-md-3"><input class="form-control mb-3" type="text" name="gmvalue[]" placeholder="gram value" required></div><div class="col-md-2"><input class="form-control mb-3" type="number" name="dmvalue[]" placeholder="dmvalue" required></div><div class="col-md-1"><button class="btn btn-danger btn_remove" id="'+i+'">X</button></div></div></div></div></div>');
    })

    })

  $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");  
           $('.extrarow_for_acadamic'+button_id+'').remove();  

        }); 
   
</script>

<script type="text/javascript">
     function open_foodedit_modal(e)
    {

        var id= e.getAttribute("data-id");
        $.ajax({
            url:'{{url("admin/foodeditmodal")}}',
            type: 'GET',
            dataType: 'JSON',
            data: { id:id},
            success: function(data){

            console.log(data);
//            console.log(data.result1[0].id);
            $('#food_names').val(data.result1[0].food_name);
             $('#foodid').val(data.result1[0] .id);
            $('#food_price').val(data.result1[0].food_price);
            $('#food_description').val(data.result1[0].food_description);
            $('#calories').val(data.result1[0].calories);
            $('#catid').val(data.result1[0].food_category_id );
            $('#food_type').val(data.result1[0].food_type );
            $('#image1').html(data.result1[0].food_image );



            $.each(data.result, function(i, item) {
       // console.log(item);return false;
    // alert(data[i].food_name);
        // $('#food_name').html(data[i].food_name);
    var eq='<div class="editextrarow_for_acadamic'+i+'"><div class="col-md-12 mb-3"><div class="form-group"><div class="row"><div class="col-md-3"><select class="form-control" id="food_type" name="nutrition[]"><option selected value="">Choose</option><option value="1"' +(item.type==1 ? 'selected' : '')+'>Carbohydrates</option><option value="2"' +(item.type==2 ? 'selected' : '')+'>Proteins</option><option value="3"' +(item.type==3 ? 'selected' : '')+'>Fats</option><option value="4"' +(item.type==4 ? 'selected' : '')+'>Sugar</option><option value="5"' +(item.type==5 ? 'selected' : '')+'>Iron</option><option value="6"' +(item.type==6 ? 'selected' : '')+'>Calcium</option></select></div><div class="col-md-3"><select class="form-control" id="" name="unit[]" required><option selected value="">Select Unit</option><option value="1"' +(item.unit==1 ? 'selected' : '')+'>Mg</option><option value="2"' +(item.unit==2 ? 'selected' : '')+'>g</option></select></div><div class="col-md-3"><input class="form-control mb-3" type="text" name="gmvalue[]" placeholder="gram" value="'+item.gramvalue+'" required></div><div class="col-md-2"><input class="form-control mb-3" type="number" name="dmvalue[]" placeholder="dmvalue"  value="'+item.dmvalue+'" required></div><div class="col-md-1"><button class="btn btn-danger btn_removeedit" id="'+i+'">X</button></div></div></div></div></div>';
        $('#compositionlist').append(eq);
                        });
                 
        $('#foodEdit').modal('show'); 

                  // $('#emp_id').html(data.user);
                  // $('#permitted_id').html(data.user);
                  // $('#leavtype').html(data.leave);
                  // $('#add_grantloan').modal('show');
               
            }
        });
    }






</script>
<script type="text/javascript">
    $(document).ready(function(){
        var i=2;
         $('#edittypicalcomp').click(function(){
        i++;
$('#editfood').append('<div class="editextrarow_for_acadamic'+i+'"><div class="col-md-12 mb-3"><div class="form-group"><div class="row"><div class="col-md-3"><select class="form-control" id="food_type" name="nutrition[]" required><option selected value="">Choose</option><option value="1">Carbohydrates</option><option value="2">Proteins</option><option value="3">Fats</option><option value="4">Sugar</option><option value="5">Iron</option><option value="6">Calcium</option></select></div><div class="col-md-3"><select class="form-control" id="" name="unit[]" required><option selected value="">Select Unit</option><option value="1">Mg</option><option value="2">g</option></select></div><div class="col-md-3"><input class="form-control mb-3" type="text" name="gmvalue[]" placeholder="gram value" required></div><div class="col-md-2"><input class="form-control mb-3" type="number" name="dmvalue[]" placeholder="dmvalue" required></div><div class="col-md-1"><button class="btn btn-danger btn_removeedit" id="'+i+'">X</button></div></div></div></div></div>');
    })

    })


    $(document).on('click', '.btn_removeedit', function(){  
           var button_id = $(this).attr("id");  
           $('.editextrarow_for_acadamic'+button_id+'').remove();  

        }); 

</script>
<script type="text/javascript">
    $(document).ready(function(){

    $('#customerslisting').DataTable({
        "pageLength": 10
    });
    });

   
</script>

@endsection