@extends('admin.master')

@section('title', 'Admin | About')

@section('body')

    <div class="container-fluid">
        <form action="{{route('admin.aboutSettings')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                About Settings
            </h2>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header bg-white font-weight-bold">
                            About Settings
                        </div>
                        <div class="card-body">

                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>About Title 1</strong></label>
                                    <input class="form-control form-control-lg mb-3" type="text" name="about_title1"
                                           value="{{!empty($aboutSetting->about_title1) ? $aboutSetting->about_title1 : ''}}"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>About Title 2</strong></label>
                                    <input class="form-control form-control-lg mb-3" type="text" name="about_title2"
                                           value="{{!empty($aboutSetting->about_title2) ? $aboutSetting->about_title2 : ''}}"
                                           required>
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>About Text</strong></label>
                                    <textarea class="form-control form-control-lg" rows="8" name="about_text"
                                              required>{{!empty($aboutSetting->about_text) ? $aboutSetting->about_text : ''}}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>About image</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="file" name="about_image">
                                        <small class="text-danger">(Image will be resized into 800 x 800px)</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <img style="width: 200px; height:200px;" class="rounded"
                                             src="{{asset('assets/user/images/frontEnd/about_image.jpg')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">Save
                                    Changes
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    {{--code for nicedit--}}
@section('scripts')

@endsection


{{--dropdown active--}}
<script>
    $('#frontEndSetting li:nth-child(2)').addClass('active');
    $('#frontEndSetting').addClass('show');
</script>
@endsection