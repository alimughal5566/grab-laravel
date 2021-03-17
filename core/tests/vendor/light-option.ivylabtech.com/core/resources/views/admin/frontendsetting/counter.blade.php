@extends('admin.master')

@section('title', 'Admin | Counter')

@section('body')

    <div class="container-fluid">
        <h2 class="mb-4">Counter</h2>
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Counter list
                        <a href=""
                           class="btn btn-primary btn-md float-right customs_btn" data-toggle="modal"
                           data-target="#createCounter">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">icon</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($counter as $c)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$c->counter_title}}</td>
                                    <td><i class="{{$c->counter_icon}}"></i></td>
                                    <td>{{$c->counter_quantity}}</td>

                                    <td class=" actions">
                                        <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$c->id}}"
                                           data-toggle="modal" data-target="#counterDelete">Remove</a>
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

    <div class="container-fluid mt-4">
        <form action="{{route('admin.counter-image')}}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        counter background image
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>image</strong></label>
                                    <input class="form-control form-control-lg mb-3" type="file"
                                           name="counter_image">
                                    <small class="text-danger">(Image will be resized into 1920 x 1280px)</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <img style=" width: 1800px; height:485px;" class="img-fluid"
                                         src="{{asset('assets/user/images/frontEnd/counter_image.jpg')}}">
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">Save Changes
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
        </form>
    </div>


    {{--<!-- delete service Alert Modal -->--}}
    <div class="modal modal-danger fade" id="counterDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($c->id) ? route('admin.counter.delete','delete') : '#'}}"
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

    <!-- Create category Modal -->
    <div class="modal modal-danger fade" id="createCounter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create Counter</h4>
                </div>
                <form action="{{route('admin.counter.create')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Counter Title</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="title" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Counter </strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="quantity" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Counter icon</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="icon" required
                                       placeholder="fas fa-home">
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
    {{--script for modal Category Delete--}}
    <script>
        $('#counterDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection

{{--dropdown active--}}
<script>
    $('#frontEndSetting li:nth-child(7)').addClass('active');
    $('#frontEndSetting').addClass('show');
</script>
@endsection

