@extends('admin.master')

@section('title', 'Admin | Reservation')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.reservation')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Reservation
            </h2>

            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Title 1</strong></label>
                                            <input class="form-control form-control-lg mb-3" type="text"
                                                   name="reservation_title1"
                                                   value="{{!empty($frontEndSetting->reservation_title1) ? $frontEndSetting->reservation_title1 : ''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Title 2</strong></label>
                                            <input class="form-control form-control-lg mb-3" type="text"
                                                   name="reservation_title2"
                                                   value="{{!empty($frontEndSetting->reservation_title2) ? $frontEndSetting->reservation_title2 : ''}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="header_subtitle"><strong>Opening Time</strong>  <small class="text-info">For multiple entry separate by comma (,)</small></label>
                                            <textarea class="form-control" rows="5"
                                                      name="reservation_openingTime" required>{{!empty($frontEndSetting->reservation_openingTime) ? $frontEndSetting->reservation_openingTime : ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
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

@section('scripts')

    {{--dropdown active--}}
    <script>
        $('#reservation li:nth-child(2)').addClass('active');
        $('#reservation').addClass('show');
    </script>
@endsection

@endsection

