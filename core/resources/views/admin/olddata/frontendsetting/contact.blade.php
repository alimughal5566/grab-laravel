@extends('admin.master')

@section('title', 'Admin | Contact')

@section('body')

    <div class="container-fluid">
        <form action="{{route('admin.contact')}}" method="post">
            @csrf
            <h2 class="mb-4">
                Contact Settings
            </h2>

            <div class="row ">
                    <div class="col-md-12">
                        <div class="card mb-4">
                        <div class="card-header bg-white font-weight-bold">
                            Contact Settings
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Contact Title 1</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="contact_title1"
                                               value="{{!empty($contactSetting->contact_title1) ? $contactSetting->contact_title1 : ''}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Contact Title 2</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text" name="contact_title2"
                                               value="{{!empty($contactSetting->contact_title2) ? $contactSetting->contact_title2 : ''}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Contact Title 3</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="contact_title3"
                                               value="{{!empty($contactSetting->contact_title3) ? $contactSetting->contact_title3 : ''}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Map Code</strong>
                                            <small class="text-info">( insert "pb id" form google map iframe )</small>
                                        </label>
                                        <textarea class="form-control" rows="5"
                                                  name="contact_map" required>{{!empty($contactSetting->contact_map) ? $contactSetting->contact_map : ''}}
                                </textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Address</strong>
                                            <small class="text-info">For multiple entry separate by comma (,)</small>
                                        </label>
                                        <textarea class="form-control" rows="4"
                                                  name="address" required>{{!empty($contactSetting->address) ? $contactSetting->address : ''}}</textarea>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Phone</strong>
                                            <small class="text-info">For multiple entry separate by comma (,)</small>
                                        </label>
                                        <textarea class="form-control" rows="4"
                                                  name="contact_phone" required>{{!empty($contactSetting->contact_phone) ? $contactSetting->contact_phone : ''}}</textarea>

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Email</strong>
                                            <small class="text-info">For multiple entry separate by comma (,)</small>
                                        </label>
                                        <textarea class="form-control" rows="4"
                                                  name="contact_mail" required>{{!empty($contactSetting->contact_mail) ? $contactSetting->contact_mail : ''}}</textarea>

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
        </form>
    </div>



    {{--dropdown active--}}
    <script>
        $('#frontEndSetting li:nth-child(5)').addClass('active');
        $('#frontEndSetting').addClass('show');
    </script>


@endsection