@extends('admin.master')

@section('title', 'Announcement category')

@section('body')

    <div class="container-fluid">
        <h2 class="mb-4">Announcement Category</h2>
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Category list
                        <a href="{{route('admin.blogCategory.create')}}"
                           class="btn btn-primary btn-md float-right customs_btn" data-toggle="modal"
                           data-target="#create">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($blogCategories as $blogCategory)

                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$blogCategory->name}}</td>

                                    <td>
                                        @if ($blogCategory->status==1)
                                            <button class="btn btn-success btn-sm">Active</button>
                                        @else
                                            <button class="btn btn-danger btn-sm">Inactive</button>
                                        @endif
                                    </td>

                                    <td class=" actions">
                                        <a href="" class="btn btn-info btn-sm btn-square"
                                           data-name="{{$blogCategory->name}}"
                                           data-status="{{$blogCategory->status}}"
                                           data-id="{{$blogCategory->id}}"
                                           data-toggle="modal" data-target="#categoryUpdate"
                                        >Edit</a>

                                        <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$blogCategory->id}}"
                                           data-toggle="modal" data-target="#CategoryDelete">Delete</a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- delete service Alert Modal -->
    <div class="modal modal-danger fade" id="CategoryDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($blogCategory->id) ? route('admin.blogCategory.destroy','delete') : '#'}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <h4 class="text-center">Delete all Announcement, if you delete this ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Create category Modal -->
    <div class="modal modal-danger fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create Announcement</h4>
                </div>
                <form action="{{route('admin.blogCategory.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Announcement Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" id="name"
                                       value="" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Announcement Status</strong></label>
                                <select class="form-control" id="" name="status" required>
                                    <option selected value="">Category</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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

    <!-- Edit category Modal -->
    <div class="modal modal-danger fade" id="categoryUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit</h4>
                </div>
                <form action="{{route('admin.blogCategory.update','update')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name"
                                       id="name" required>
                            </div>
                        </div>
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Status</strong></label>
                                <select class="form-control" id="status" name="status" required>
                                    <option selected value="">Category</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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



@section('scripts')
    {{--script for modal Category edit--}}
    <script>
        $('#categoryUpdate').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var name = button.data('name')
            var status = button.data('status')
            var id = button.data('id')


            var modal = $(this)

            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #id').val(id);

            modal.find('select[name=category_status]').val(status);

        })
    </script>

    {{--script for modal Category Delete--}}
    <script>
        $('#CategoryDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection
    {{--dropdown active--}}
    <script>
        $('#blog li:nth-child(1)').addClass('active');
        $('#blog').addClass('show');
    </script>
@endsection

