@extends('admin.master')

@section('title', 'Sms Settings')

@section('body')

    <h2 class="mb-4">SMS Settings</h2>

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            SMS Settings
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CODE</th>
                    <th scope="col">DESCRIPTION</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><pre>&#123;&#123;message&#125;&#125;</pre></td>
                    <td>Details Text From Script</td>
                </tr>

                <tr style="background: #ECECEC;">
                    <th scope="row">2</th>
                    <td><pre>&#123;&#123;Number&#125;&#125;</pre></td>
                    <td>Destination Number</td>
                </tr>


                </tbody>
            </table>


            <form method="post" action="{{route('admin.SmsSettingsPro')}}">
                @csrf
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="sms_api" style="text-transform: uppercase;"><strong>Sms Api</strong></label>
                        <input class="form-control form-control-lg" value="{{!empty($basicSetting->sms_api) ? $basicSetting->sms_api : ''}}" name="sms_api" required>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary btn-block btn-lg customs-btn-bd">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    {{--dropdown active--}}
    <script>
        $('#sm_base li:nth-child(2)').addClass('active');
        $('#sm_base').addClass('show');
    </script>
@endsection