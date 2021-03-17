@extends('admin.master')

@section('title', 'profile')

@section('body')

    <h2 class="mb-4">Admin Profile</h2>

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Admin Profile
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.profile')}}">
                @csrf

                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="sms_api" style="text-transform: uppercase;"><strong>Name</strong></label>
                        <input class="form-control form-control-lg {{ $errors->has('admin_name') ? ' is-invalid' : '' }}" value="{{$admin->name}}" name="admin_name">
                        @if ($errors->has('admin_name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('admin_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="sms_api" style="text-transform: uppercase;"><strong>Email</strong></label>
                        <input type="text" class="form-control form-control-lg {{ $errors->has('admin_email') ? ' is-invalid' : '' }}" value="{{$admin->email}}" name="admin_email">
                        @if ($errors->has('admin_email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-secondary btn-block btn-lg customs-btn-bd">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

@endsection