@extends('admin.master')

@section('title', 'Admin | Food Page Title')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.foodTitles')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Food Page Title
            </h2>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Feature Food
                        </div>
                        <div class="card-body ">
                            <div class="row">

                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>feature Title 1</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="featureTitle1"
                                               value="{{!empty($frontEndSetting->featureTitle1) ? $frontEndSetting->featureTitle1 : ''}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>feature Title 2</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="featureTitle2"
                                               value="{{!empty($frontEndSetting->featureTitle2) ? $frontEndSetting->featureTitle2 : ''}}" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            All Food Page
                        </div>
                        <div class="card-body ">
                            <div class="row">


                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Food Title 1</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="foodTitle1"
                                               value="{{!empty($frontEndSetting->foodTitle1) ? $frontEndSetting->foodTitle1 : ''}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Food Title 2</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="foodTitle2"
                                               value="{{!empty($frontEndSetting->foodTitle2) ? $frontEndSetting->foodTitle2 : ''}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Food Gallery Page
                        </div>
                        <div class="card-body ">
                            <div class="row">


                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Food gallery title 1</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="foodGalleryTitle1"
                                               value="{{!empty($frontEndSetting->foodGalleryTitle1) ? $frontEndSetting->foodGalleryTitle1 : ''}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Food gallery title 2</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="foodGalleryTitle2"
                                               value="{{!empty($frontEndSetting->foodGalleryTitle2) ? $frontEndSetting->foodGalleryTitle2 : ''}}" required>
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




    {{--dropdown active--}}
    <script>
        $('#foods li:nth-child(4)').addClass('active');
        $('#foods').addClass('show');
    </script>
@endsection