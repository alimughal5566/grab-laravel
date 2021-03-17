@extends('user.master')
@section('title',$gs->websiteTitle.' | Contact')
<style type="text/css">
    @font-face { font-family: rockstaralt-regular; src: url('assets/user/fonts/rockstaralt-regular.otf'); }

        @font-face { font-family: Choplin Medium; src: url('assets/user/fonts/Choplin Medium.otf'); }

    .font-2 { font-family: rockstaralt-regular;}
    .text-upper{font-family: Choplin Medium !important;font-size: 20 !important}
</style>
@section('content')

    <!--Start Page Content-->
    <section class="page-content fix">
        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative"
             style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">{{!empty($contacts->contact_title1) ? __($contacts->contact_title1) : ''}}</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Contact')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Contact Wrap-->
        <div class="contact-wrap default-padding">
            <!--Start Container-->
            <div class="container">
                <!--Start Heading-->
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="page-heading text-center">
                            <h3 class="section-title-heading color-main">{{!empty($contacts->contact_title2) ? __($contacts->contact_title2) : ''}}</h3>
                            <h2 class="section-title-subtitle">{{!empty($contacts->contact_title3) ? __($contacts->contact_title3) : ''}}</h2>
                        </div>
                    </div>
                </div>
                <!--End Heading-->

                <!--Start Row-->
                <div class="row">
                    <!--Start Contact Content-->
                    <div class="col-md-8 col-md-offset-2">
                        <div class="contact-content">


                            <!--Start Contact Form-->
                            <div class="contact-form row">
                                <form action="{{route('user.contactMail')}}" method="POST">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" rows="10" name="message" required></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit">@lang('Send')</button>
                                    </div>
                                </form>
                            </div>
                            <!--End Contact Info-->
                        </div>
                    </div>
                    <!--End Contact Content-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Contact Wrap-->


    </section>





@endsection
