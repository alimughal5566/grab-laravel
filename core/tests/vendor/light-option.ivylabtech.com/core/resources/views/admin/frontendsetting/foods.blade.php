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
                        <table class="table table-striped">
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
                                       data-toggle="modal" data-target="#foodEdit"
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
        <div class="modal-dialog" role="document">
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
        <div class="modal-dialog" role="document">
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
                                <input class="form-control form-control-lg mb-3" type="text" name="food_name" id="food_name" required>
                            </div>
                        </div>
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">

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
                                <label for="header_subtitle"><strong>Food image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="food_image[]" id="" multiple>
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
    <script>
        $('#foodEdit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);

            var food_name = button.data('food_name');
            var food_price = button.data('food_price');
            var food_category_id = button.data('food_category_id');
            var food_food_type = button.data('food_food_type');
            var food_description = button.data('food_description');
            var food_image = button.data('food_image');
            var id = button.data('id');


            var modal = $(this);

            modal.find('.modal-body #food_name').val(food_name);
            modal.find('.modal-body #food_price').val(food_price);
            modal.find('.modal-body #food_category_id').val(food_category_id);
            modal.find('.modal-body #food_description').val(food_description);
            modal.find('.modal-body #food_image').val(food_image);
            modal.find('select[name=food_category_id]').val(food_category_id);
            modal.find('select[name=food_type]').val(food_food_type);
            modal.find('.modal-body #id').val(id);

        })
    </script>

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
@endsection