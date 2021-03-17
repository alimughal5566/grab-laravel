@extends('admin.master')

@section('title', 'Admin | Footer')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.footerSettings')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Footer
            </h2>

            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Footer Text</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="footerText"
                                               value="{{!empty($frontEndSetting->footerText) ? $frontEndSetting->footerText : ''}}">
                                    <label for="header_subtitle"><strong>Phone</strong></label>
                                    <input type="text" name="phone" class="form-control"   value="{{!empty($frontEndSetting->phone) ? $frontEndSetting->phone : ''}}">

                                    <label for="header_subtitle"><strong>Address</strong></label>
                                    <input type="text" name="address" class="form-control"   value="{{!empty($frontEndSetting->address) ? $frontEndSetting->address : ''}}">

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
      $('#staffteam li:nth-child(6)').addClass('active');
        $('#staffteam').addClass('show');
    </script>
@endsection

@endsection