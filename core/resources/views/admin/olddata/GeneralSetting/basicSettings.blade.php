@extends('admin.master')

@section('title', 'Basic Settings')

@section('body')



    <h2 class="mb-4">Basic Settings</h2>

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Basic Settings
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('admin.basicSettingsPro')}}">
                @csrf

                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label for="validationServer01"><strong>WebSite Title</strong></label>
                        <input type="text" name="websiteTitle" class="form-control form-control-lg"  value="{{!empty($basicSetting->websiteTitle) ? $basicSetting->websiteTitle : ''}}" required>

                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="validationServer01"><strong>Site base color code</strong></label>
                        <input type="text" name="colorCode" class="form-control form-control-lg"  value="{{!empty($basicSetting->colorCode) ? $basicSetting->colorCode : ''}}"  style="background: #{{!empty($basicSetting->colorCode) ? $basicSetting->colorCode : ''}};" required>

                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="validationServer02"><strong>Base Currency text</strong></label>
                        <input type="text" name="currencyText" class="form-control form-control-lg" value="{{!empty($basicSetting->currencyText) ? $basicSetting->currencyText : ''}}" required>

                    </div>

                </div>


                <div class="form-row">


                    <div class="col-md-4 mb-3">
                        <label for="validationServer02"><strong>Base Currency symbol</strong></label>
                        <input type="text" name="currencySymbol" class="form-control form-control-lg" value="{{!empty($basicSetting->currencySymbol) ? $basicSetting->currencySymbol : ''}}" required>

                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="validationServer02"><strong>Receive Email</strong></label>
                        <input type="text" name="receiveEmail" class="form-control form-control-lg" value="{{!empty($basicSetting->receiveEmail) ? $basicSetting->receiveEmail : ''}}" required>

                    </div>


                </div>




                <div class="card-footer bg-white ">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">Save Changes</button>
                </div>



            </form>
        </div>

    </div>

    {{--dropdown active--}}
    <script>
        $('#sm_base li:nth-child(1)').addClass('active');
        $('#sm_base').addClass('show');
    </script>
@endsection