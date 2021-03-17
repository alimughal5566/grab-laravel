@extends('admin.master')

@section('title', 'Admin | create event')

@section('body')

    <h2 class="mb-4" style="text-transform: uppercase;"> New Event
        <a href="{{route('admin.events.index')}}" class="btn btn-primary btn-md float-right customs_btn">
            <i class="fa fa-list"></i> View Event List
        </a>
    </h2>

    <div class="container-fluid">

        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                Add Event
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.events.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label><strong>Event Title</strong></label>
                        <input type="text" name="event_title"
                               class="form-control form-control-lg" value="{{ old('event_title') }}" required>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><strong>Event Date</strong></label>
                                <input type="date" name="event_date"
                                       class="form-control form-control-lg" required>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Event Time Duration</strong></label>
                                <input type="text" name="event_duration" placeholder="Ex: 7pm - 10pm"
                                       class="form-control form-control-lg" required>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><strong>Event Image</strong></label>
                        <input type="file" name="event_image" class="form-control form-control-lg" value="{{ old('event_image') }}" required>
                        <small class="text-danger">[Image will be resize: 1000 X 870 px]</small>

                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Description</strong></label>
                        <textarea id="NicEditor" class="form-control form-control-lg" name="Description"
                                  rows="10" required>{{ old('Description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">CREATE</button>
                    </div>


                </form>
            </div>

        </div>
    </div>
@section('scripts')

    {{--dropdown active--}}
    <script>
        $('#Events li:nth-child(2)').addClass('active');
        $('#Events').addClass('show');
    </script>
@endsection

@endsection


