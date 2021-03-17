@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')

@section('content')
<style type="text/css">
  .pb-100 {
    padding-bottom: 100px;
}
.pt-95 {
    padding-top: 95px;
}

.ml-auto, .mx-auto {
    margin-left: auto!important;
}
.mr-auto, .mx-auto {
    margin-right: auto!important;
}

.login-register-tab-list {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}
.login-register-tab-list.nav a {
    position: relative;
}
a, button, input {
    outline: medium none;
    color: #242424;
}
.login-register-tab-list.nav a::before {
    background-color: #454545;
    bottom: 5px;
    content: "";
    height: 18px;
    margin: 0 auto;
    position: absolute;
    right: -2px;
    transition: all 0.4s ease 0s;
    width: 1px;
}
.login-register-tab-list.nav a.active h4, .login-register-tab-list.nav a h4:hover {
    color: #2f333a;
}
.login-register-tab-list.nav a h4 {
    font-size: 25px;
    font-weight: 700;
    margin: 0 20px;
    text-transform: capitalize;
    transition: all 0.3s ease 0s;
}
h4 {
    font-size: 22px;
}
h1, h2, h3, h4, h5, h6 {
    font-family: 'Rubik', sans-serif;
    color: #2f333a;
    margin-top: 0px;
    font-style: normal;
    font-weight: 400;
}

.login-form-container {
    background: transparent none repeat scroll 0 0;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
    padding: 80px;
    text-align: left;
}
.login-form-container input {
    background-color: transparent;
    border: 1px solid #ebebeb;
    color: #666;
    font-size: 14px;
    height: 50px;
    margin-bottom: 30px;
    padding: 0 15px;
}
.login-toggle-btn {
    padding: 10px 0 19px;
}
.login-form-container input[type="checkbox"] {
    height: 15px;
    margin: 0;
    position: relative;
    top: 1px;
    width: 17px;
}
.login-form-container input {
    background-color: transparent;
    border: 1px solid #ebebeb;
    color: #666;
    font-size: 14px;
    height: 50px;
    margin-bottom: 30px;
    padding: 0 15px;
}
.login-form-container label {
    color: #242424;
    font-size: 15px;
    font-weight: 400;
}
.login-toggle-btn>a {
    color: #242424;
    float: right;
    font-size: 15px;
    transition: all 0.3s ease 0s;
}
a, button, input {
    outline: medium none;
    color: #242424;
}
.button-box button {
   background: #a84d38;
    color: #ffffff;
    border: medium none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    line-height: 1;
    padding: 11px 30px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}
.login-form-container {
    background: transparent none repeat scroll 0 0;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
    padding: 80px;
    text-align: left;
}

.button-box button:hover {
    background-color: #a84d38 !important;
    color: #ffffff !important;
}



</style>
    <!--Start Page Content-->
    <section class="page-content fix">
        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">Account</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">Account</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->


       <div class="login-register-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4 style="color: #a84d38 !important;"> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2" class="">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active" style="border-top: 6px solid #a84d38;">
                                    <div class="login-form-container" style="padding: 40px 80px;">
                                        <div class="login-register-form">
                                           <!--  <form method="POST" action="{{ url('login-user') }}">
 -->
                                        <h3 style="text-align: center; margin-bottom: 35px; font-weight: 700; color: #a84d38 !important;">Login to your account</h3>
                                        <form method="POST" action="{{ url('userlogin')}}">
                                                     @csrf
                                                <input type="text" class="form-control" name="email" placeholder="Email">

                                               <input type="password" name="password" class="form-control" placeholder="Password">


                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="{{url('/forgot')}}">Forgot Password?</a>
                                                    </div>

                            <button type="submit" class="btn btn-block">
                                    <span>{{ __('Login') }}</span>
                                </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane" style="border-top: 6px solid #2f333a;">
                                    <div class="login-form-container" style="padding: 40px 80px;">
                                        <div class="login-register-form" >
                                            <h3 style="text-align: center; margin-bottom: 35px; font-weight: 700;">Register your account</h3>
                                            <form action="{{ url('registeruser') }}" method="POST">
                                                @csrf
                                                <input id="name" type="text" name="fname" class="form-control" placeholder="First Name" required>
                                                 <input id="name" type="text" name="lname" class="form-control"  placeholder="Last Name" required>
                                                 <input id="name" type="text" name="phone" class="form-control"  placeholder="Phone" required>

                                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                <div class="button-box">
                                                    <button type="submit" class="btn btn-block"><span>Register</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>

        </div>

        <!--End Gallery Wrap-->
    </section>
    <!--End Page Content-->


@endsection
