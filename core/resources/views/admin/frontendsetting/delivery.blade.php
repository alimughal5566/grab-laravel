@extends('admin.master')

@section('title', 'Admin | Footer')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.deliverysave')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Delivery Charges
            </h2>

            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Delivery Charges</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="text" name="deliverycharges"
                                               value="{{!empty($frontEndSetting->deliverycharges) ? $frontEndSetting->deliverycharges : ''}}">
                                  
                                  

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
        $('#staffteam li:nth-child(4)').addClass('active');
        $('#staffteam').addClass('show');
    </script>
@endsection

@endsection