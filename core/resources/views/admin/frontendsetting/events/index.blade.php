@extends('admin.master')

@section('title', 'Admin | event list')

@section('body')

    <div class="container-fluid">
        <form action="{{route('admin.EventTitle')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Event Title 1</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="eventTitle1" value="{{!empty($frontEndSetting->eventTitle1) ? $frontEndSetting->eventTitle1 : ''}}" required>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Event Title 2</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="eventTitle2" value="{{!empty($frontEndSetting->eventTitle2) ? $frontEndSetting->eventTitle2 : ''}}" required>
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


    <h2 class="mb-4" style="text-transform: uppercase;">
        event List
        <a href="{{route('admin.events.create')}}" class="btn btn-primary btn-md float-right customs_btn">
            <i class="fa fa-plus"></i> ADD NEW
        </a>
    </h2>


    <div class="card mb-4">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($events as $event)

                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$event->event_title}}</td>
                        <td>{{$event->event_date}}</td>
                        <td>{{$event->event_duration}}</td>

                        <td class=" actions">

                            <a href="{{route('admin.events.edit',$event->id)}}" class="btn btn-icon btn-pill btn-primary"
                               data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a>

                            <a href="" class="btn btn-icon btn-pill btn-danger"
                               data-original-title="Delete" data-id="{{$event->id}}"
                               data-toggle="modal" data-target="#postDelete"><i
                                        class="fa fa-fw fa-trash"></i></a>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>

        </div>
    </div>

    <!-- delete category Alert Modal -->
    <div class="modal modal-danger fade" id="postDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($event->id) ? route('admin.events.destroy','delete') : '#'}}"
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

    {{-- post Delete--}}
    <script>
        $('#postDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>

    {{--dropdown active--}}
    <script>
        $('#Events li:nth-child(1)').addClass('active');
        $('#Events').addClass('show');
    </script>
@endsection

@endsection

