@extends('admin.master')

@section('title', 'admin | Testimonial')

@section('body')
    <div class="container-fluid">
        <h2 class="mb-4">Testimonial</h2>
        <div class="row ">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Testimonial list
                        <a href="{{route('admin.testimonial.create')}}"
                           class="btn btn-primary btn-md float-right customs_btn" data-toggle="modal"
                           data-target="#create">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Message</th>
                                <th scope="col" style="width: 100px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($testimonials as $testimonial)

                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <th scope="row">{{$testimonial->name}}</th>
                                <td>{{$testimonial->designation}}</td>
                                <td class="text-justify text-muted">{{$testimonial->message}}</td>

                                <td class=" actions">
                                    <a href="" class="btn btn-icon btn-pill btn-primary"
                                       data-name="{{$testimonial->name}}" data-id="{{$testimonial->id}}"
                                       data-designation="{{$testimonial->designation}}" data-message="{{$testimonial->message}}"
                                       data-toggle="modal" data-target="#testimobialEdit"><i
                                                class="fa fa-fw fa-edit"></i></a>

                                    <a href="" class="btn btn-icon btn-pill btn-danger" data-id="{{$testimonial->id}}"
                                       data-toggle="modal" data-target="#testimobialDelete"><i class="fa fa-fw fa-trash"></i></a>

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


    {{--<!-- Create Testimonial Modal -->--}}
    <div class="modal modal-danger fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create Testimonial</h4>
                </div>
                <form action="{{route('admin.testimonial.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Person Name</strong></label>
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
                                <label for="header_subtitle"><strong>message</strong></label>
                                <textarea class="form-control" rows="5" name="message" required></textarea>
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


    {{--<!-- Edit Testimonial Modal -->--}}
    <div class="modal modal-danger fade" id="testimobialEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit Testimonial</h4>
                </div>
                <form action="{{route('admin.testimonial.update','t')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Person Name</strong></label>
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
                                <label for="header_subtitle"><strong>message</strong></label>
                                <textarea class="form-control" rows="5" name="message" id="message" required></textarea>
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

    <!-- delete service Alert Modal -->
    <div class="modal modal-danger fade" id="testimobialDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($testimonial->id) ? route('admin.testimonial.destroy','delete') : '#'}}"
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

    {{--script for modal testimonial edit--}}
    <script>
        $('#testimobialEdit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var name = button.data('name');
            var designation = button.data('designation');
            var message = button.data('message');
            var id = button.data('id');


            var modal = $(this)

            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #designation').val(designation);
            modal.find('.modal-body #message').val(message);
            modal.find('.modal-body #id').val(id);


        })
    </script>

    {{--script for modal testimonial Delete--}}
    <script>
        $('#testimobialDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection


    {{--dropdown active--}}
    <script>
        $('#frontEndSetting li:nth-child(3)').addClass('active');
        $('#frontEndSetting').addClass('show');
    </script>
@endsection
