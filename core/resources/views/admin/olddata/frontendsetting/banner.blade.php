@extends('admin.master')

@section('title', 'Admin | Banner')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.banner')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Banner
            </h2>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Logo
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Logo image</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="file" name="logo_image">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <img style=" max-width: 100px; max-height:100px;" class="img-fluid"
                                         src="{{asset('assets/user/images/frontEnd/logo.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Icon
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Logo image</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="file" name="icon_image">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-4">
                                    <img style=" max-width: 100px; max-height:100px;" class="img-fluid"
                                         src="{{asset('assets/user/images/frontEnd/icon.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Banner
                        </div>
                        <div class="card-body ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>Banner image</strong></label>
                                    <input class="form-control form-control-lg mb-3" type="file" name="banner_image">
                                    <small class="text-danger">(Image will be resized into 1920 x 1280px)</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <img style=" max-width: 458px; max-height:485px;" class="img-fluid"
                                         src="{{asset('assets/user/images/frontEnd/banner.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Banner text
                        </div>
                        <div class="card-body ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>Text 1</strong></label>
                                    <input class="form-control form-control-lg mb-3" type="text" name="banner_text1"
                                           value="{{!empty($frontEndSetting->banner_text1) ? $frontEndSetting->banner_text1 : ''}}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>Text 2</strong></label>
                                    <input class="form-control form-control-lg mb-3" type="text" name="banner_text2"
                                           value="{{!empty($frontEndSetting->banner_text2) ? $frontEndSetting->banner_text2 : ''}}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>Text 3</strong></label>
                                    <input class="form-control form-control-lg mb-3" type="text" name="banner_text3"
                                           value="{{!empty($frontEndSetting->banner_text3) ? $frontEndSetting->banner_text3 : ''}}" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">Save Changes
                    </button>
                </div>

            </div>
        </form>
    </div>


    {{--dropdown active--}}
    <script>
        $('#frontEndSetting li:nth-child(1)').addClass('active');
        $('#frontEndSetting').addClass('show');
    </script>
@endsection