@extends('user.master')
@section('title',$gs->websiteTitle.' | page not found')

@section('content')

    <!--Start Page Content-->
    <section class="page-content fix">

        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">NOT FOUND</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Notfound Wrap-->
        <div class="notfound-wrap default-padding">
            <!--Start Container-->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="notfound-content text-center">
                            <h2>404</h2>
                            <h3>Not Found</h3>
                            <p>The Page You Are Looking Is Not Found!</p>
                            <a href="{{route('user.home')}}">Back To Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Container-->
        </div>
        <!--End Notfound Wrap-->
    </section>
    <!--End Page Content-->

@endsection




