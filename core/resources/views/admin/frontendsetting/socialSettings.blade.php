@extends('admin.master')

@section('title', 'Admin | Social settings')

@section('body')

    <div class="container-fluid">
        <h2 class="mb-4">Social settings</h2>
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Social icon list
                        <a href=""
                           class="btn btn-primary btn-md float-right customs_btn" data-toggle="modal"
                           data-target="#createsocial">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Link</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($socialSettings as $social)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$social->name}}</td>
                                    <td><i class="{{$social->icon}}"></i></td>
                                    <td>{{$social->link}}</td>

                                    <td class=" actions">
                                        <button type="submit" class="btn btn-info font-weight-bold"
                                                data-name="{{$social->name}}"
                                                data-icon="{{$social->icon}}"
                                                data-link="{{$social->link}}"
                                                data-id="{{$social->id}}"
                                                data-toggle="modal" data-target="#socialedit">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>

                                        <button type="submit" class="btn btn-danger font-weight-bold"
                                                data-id="{{$social->id}}"
                                                data-toggle="modal" data-target="#socialDelete"><i class="fa fa-trash"></i>
                                            Delete
                                        </button>
                                        {{--<a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$social->id}}"--}}
                                        {{--data-toggle="modal" data-target="#counterDelete">Remove</a>--}}
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



    {{--<!-- delete Alert Modal -->--}}
    <div class="modal modal-danger fade" id="socialDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($social->id) ? route('admin.social.delete','delete') : '#'}}"
                      method="post">
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

    {{--<!-- Create social Modal -->--}}
    <div class="modal modal-danger fade" id="createsocial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create social icon</h4>
                </div>
                <form action="{{route('admin.social.create')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Icon</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="icon"
                                       placeholder="fas fa-home" required>
                                <small class="text-info">For code visit : https://fontawesome.com/icons</small>

                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Link</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="link" required>
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


    {{--edir--}}
    <div class="modal modal-danger fade" id="socialedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create social icon</h4>
                </div>
                <form action="{{route('admin.social.update')}}" method="post">
                    @csrf

                    <input class="form-control" type="hidden" name="id" id="socialId">

                    <div class="modal-body">

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" id="name" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Icon</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="icon" id="icon"
                                       placeholder="fas fa-home" required>
                                <small class="text-info">For code visit : https://fontawesome.com/icons</small>

                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Link</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="link" id="link" required>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('scripts')

    {{--social edit--}}
    <script>
        $('#socialedit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);

            var name = button.data('name');
            var icon = button.data('icon');
            var link = button.data('link');
            var socialId = button.data('id');

            var modal = $(this);

            modal.find('#name').val(name);
            modal.find('#icon').val(icon);
            modal.find('#link').val(link);
            modal.find('#socialId').val(socialId);

        })
    </script>

    {{--script for modal Delete--}}
    <script>
        $('#socialDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection

{{--dropdown active--}}
<script>
    $('#frontEndSetting li:nth-child(6)').addClass('active');
    $('#frontEndSetting').addClass('show');
</script>
@endsection

