@extends('user.master')
@section('title',$gs->websiteTitle.' | About Us')

@section('content')

    <!--Start Page Content-->
    <section class="page-content fix">

        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/banner.png')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="text-upper">@lang('About Us')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('About')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start About Wrap-->
        <div class="about-wrap">
            <!--Start About-->
            <div class="about">
                <!--Start Container-->
                <div class="container">
                    <!--Start Row-->
                    <div class="row">
                        <!--Start About Image-->
                        <div class="col-md-6">
                            <div class="about-img fix">
                                <img src="{{asset('assets/user/images/frontEnd/about_image.jpg')}}" class="img-responsive" alt="Image">
                            </div>
                        </div>
                        <!--End About Image-->

                        <!--Start About Content-->
                        <div class="col-md-6">
                            <div class="about-content">
                                <h3 class="font-2 m-0">{{!empty($aboutSetting->about_title1) ? __($aboutSetting->about_title1) : ''}}</h3>
                                <h2 class="text-upper">{{!empty($aboutSetting->about_title2) ? __($aboutSetting->about_title2) : ''}}</h2>
                                <p>
                                    {{ !empty($aboutSetting->about_text) ?  __($aboutSetting->about_text) : '' }}
                                </p>
                            </div>
                        </div>
                        <!--End About Content-->
                    </div>
                    <!--End Row-->
                </div>
                <!--End Container-->
            </div>
            <!--End About-->

            <!--Start Counter-->
            <div class="counter position-relative bg-cover" style="background-image: url({{asset('assets/user/images/frontEnd/counter_image.jpg')}});">
                <div class="overlay"></div>
                <!--Start Container-->
                <div class="container">
                    <!--Start Row-->
                    <div class="row">
                    @foreach($counter as $c)
                        <!--Start Counter Single-->
                        <div class="col-sm-3">
                            <div class="counter-single text-center">
                                <i class="{{$c->counter_icon}}"></i>
                                <h2>{{$c->counter_quantity}}</h2>
                                <h5>{{$c->counter_title}}</h5>
                            </div>
                        </div>
                        <!--Start Counter Single-->
                        @endforeach

                    </div>
                    <!--End Row-->
                </div>
                <!--End Container-->
            </div>
            <!--End Counter-->

            <!--Start Chefs-->
            <div class="chefs default-padding">
                <!--Start Container-->
                <div class="container">
                    <!--Start Heading-->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="page-heading text-center">
                                <h3 class="font-2 color-main">{{ !empty($frontEndSetting->chefTitle1) ?  __($frontEndSetting->chefTitle1) : '' }}</h3>
                                <h2>{{ !empty($frontEndSetting->chefTitle2) ?  __($frontEndSetting->chefTitle2) : '' }}</h2>
                            </div>
                        </div>
                    </div>
                    <!--End Heading-->

                    <!--Start Row-->
                    <div class="row">

                    @foreach($chefs as $chef)
                        <!--Start Chef Single-->
                            <div class="col-md-3 col-sm-6">
                                <div class="chef-single text-center position-relative">
                                    <img src="{{asset('assets/user/images/chefs/'.$chef->profile_photo)}}"
                                         class="img-responsive" alt="Image">
                                    <div class="chef-social">
                                        <ul>
                                            <li><a href="{{$chef->facebook}}" target="_blank"><i
                                                            class="icofont icofont-social-facebook"></i></a></li>
                                            <li><a href="{{$chef->twitter}}" target="_blank"><i
                                                            class="icofont icofont-social-twitter"></i></a></li>
                                            <li><a href="{{$chef->pinterest}}" target="_blank"><i
                                                            class="icofont icofont-social-pinterest"></i></a></li>
                                            <li><a href="{{$chef->linkedin}}" target="_blank"><i
                                                            class="icofont icofont-brand-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="chef-info">
                                        <h4>{{$chef->name}}</h4>
                                        <p>{{$chef->designation}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--End Chef Single-->
                        @endforeach

                    </div>
                    <!--End Row-->
                </div>
                <!--End Container-->
            </div>
            <!--End Chefs-->

        </div>
        <!--End About Wrap-->
    </section>
    <!--End Page Content-->

@endsection




