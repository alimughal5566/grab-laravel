@extends('admin.master')

@section('title', 'Admin | Food category')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            Plans Category
        </h2>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Plans Category
                        <button type="submit" class="btn btn-secondary float-right customs-btn-bd" data-toggle="modal"
                                data-target="#foodCategory">
                            Add New
                        </button>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plancategory as $category)
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <th scope="col"><img src="@if($category->category_image!=''){{asset('assets/user/images/plans/'.$category->category_image)}} @else {{asset('assets/user/images/meal/noimage.png')}} @endif" class="img-thumbnail" style="width:100px; height:100px;"></th>
                                    <th scope="col">{{$category->category_name}}</th>
                                    <th scope="col">
                                        <a href="" class="btn btn-info btn-sm btn-square"
                                           data-name="{{$category->category_name}}"
                                           data-id="{{$category->id}}"
                                           data-toggle="modal" data-target="#CategoryEdit"
                                        >Edit</a>

                                        <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$category->id}}"
                                           data-toggle="modal" data-target="#categoryDelete">Delete</a>
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

    <!-- Create Foods category Modal -->
    <div class="modal modal-danger fade" id="foodCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create Plans Category</h4>
                </div>
                <form action="{{route('admin.createplancategory')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Category Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="category_name" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="category_image" required>
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

    <!-- Edit Foods category Modal -->
    <div class="modal modal-danger fade" id="CategoryEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Update Plans Category</h4>
                </div>
                <form action="{{url('admin/updateplancat')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Category Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="food_category" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="category_image">
                            </div>
                        </div>

                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete Food category Alert Modal -->
    <div class="modal modal-danger fade" id="categoryDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation!</h4>
                </div>
                <form action="{{url('admin/delete_plancategory')}}" method="post">
                    @csrf
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

    {{--script for modal Category edit--}}
    <script>
        $('#CategoryEdit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var name = button.data('name')
            var id = button.data('id')

            var modal = $(this)

            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #id').val(id);

            modal.find('select[name=category_status]').val(status);

        })
    </script>

    {{--script for modal Category Delete--}}
    <script>
        $('#categoryDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>

@endsection


<script>
    $('#plansprogram li:nth-child(2)').addClass('active');
    $('#plansprogram').addClass('show');
</script>
@endsection