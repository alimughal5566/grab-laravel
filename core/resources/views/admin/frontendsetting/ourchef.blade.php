@extends('admin.master')

@section('title', 'Admin | our chef')

@section('body')

    <div class="container-fluid">
        <form action="{{route('admin.chefTitle')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Our chef Title 1</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="chefTitle1" value="{{!empty($frontEndSetting->chefTitle1) ? $frontEndSetting->chefTitle1 : ''}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Our chef Title 2</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="chefTitle2" value="{{!empty($frontEndSetting->chefTitle2) ? $frontEndSetting->chefTitle2 : ''}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">Save Changes
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </form>
    </div>


    <div class="container-fluid">
        <h2 class="mb-4">
            Our chef
            <button type="submit" class="btn btn-secondary float-right customs-btn-bd"
                    data-toggle="modal" data-target="#createChef">Add New
            </button>
        </h2>

            <div class="card mb-4">

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">designation</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($chefs as $chef)

                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$chef->name}}</td>
                                <td>{{$chef->designation}}</td>

                                <td class=" actions">
                                    <a href="" class="btn btn-info btn-sm btn-square"
                                       data-name="{{$chef->name}}"
                                       data-designation="{{$chef->designation}}"
                                       data-facebook="{{$chef->facebook}}"
                                       data-twitter="{{$chef->twitter}}"
                                       data-pinterest="{{$chef->pinterest}}"
                                       data-linkedin="{{$chef->linkedin}}"
                                       data-id="{{$chef->id}}"
                                       data-toggle="modal" data-target="#chefEdit">Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm btn-square" data-id="{{$chef->id}}" data-toggle="modal"
                                            data-target="#chefDelete">Delete
                                    </button>

                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>




    </div>

    {{--<!-- Create chef Modal -->--}}
    <div class="modal modal-danger fade" id="createChef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Add New Chef</h4>
                </div>
                <form action="{{route('admin.OurChefs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Chef Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Designation</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="designation" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Profile Photo</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="profile_photo" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>facebook</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="facebook" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>twitter</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="twitter" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>pinterest</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="pinterest" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>linkedin</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="linkedin" required>
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

    {{--<!-- Edit chef Modal -->--}}
    <div class="modal modal-danger fade" id="chefEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit Chef</h4>
                </div>
                <form action="{{route('admin.OurChefs.update','update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Chef Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" id="name" required>
                            </div>
                        </div>
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Designation</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="designation" id="designation" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Profile Photo</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="profile_photo">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>facebook</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="facebook" id="facebook" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>twitter</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="twitter" id="twitter" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>pinterest</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="pinterest" id="pinterest" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>linkedin</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="linkedin" id="linkedin" required>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete chef Alert Modal -->
    <div class="modal modal-danger fade" id="chefDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($chef->id) ? route('admin.OurChefs.destroy','delete') : '#'}}"
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
    {{--chef edit--}}
    <script>
        $('#chefEdit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);

            var name = button.data('name');
            var designation = button.data('designation');
            var facebook = button.data('facebook');
            var twitter = button.data('twitter');
            var pinterest = button.data('pinterest');
            var linkedin = button.data('linkedin');
            var id = button.data('id');


            var modal = $(this)

            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #designation').val(designation);
            modal.find('.modal-body #facebook').val(facebook);
            modal.find('.modal-body #twitter').val(twitter);
            modal.find('.modal-body #pinterest').val(pinterest);
            modal.find('.modal-body #linkedin').val(linkedin);
            modal.find('.modal-body #id').val(id);


        })
    </script>

    {{--Delete chef--}}
    <script>
        $('#chefDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection
    {{--dropdown active--}}
    <script>
        $('#frontEndSetting li:nth-child(4)').addClass('active');
        $('#frontEndSetting').addClass('show');
    </script>
@endsection