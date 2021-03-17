@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')


@section('content')
<style type="text/css">
     @font-face { font-family: rockstaralt-regular; src: url('assets/user/fonts/rockstaralt-regular.otf'); }

        @font-face { font-family: Choplin Medium; src: url('assets/user/fonts/Choplin Medium.otf'); }

    .display-3 { font-family: rockstaralt-regular;}
    .lead{font-family: Choplin Medium !important;}
</style>


<!------ Include the above in your HEAD tag ---------->


    <!--Start Page Content-->
    <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">@lang('Food Gallery')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Gallery')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->
<section class="main_content_area">


<div class="jumbotron text-center" style="background-color:#fff !important">
  <h1 class="display-3" style="cursive;color:#a84d38">Thank You!</h1>
  <p class="lead" style="color: #000;margin-top: 70px">We will get started on your order right away.<br>
    you will receive an order confirmation shortly.<br>
  Please review your profile.</p>

</div>



    </section>


    </section>




        </div>






    <!--End Page Content-->


@endsection
