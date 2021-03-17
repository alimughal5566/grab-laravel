@extends('user.master')
@section('title',$gs->websiteTitle.' | Contact')

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
                            <h2 class="text-upper">{{!empty($contacts->contact_title1) ? __($contacts->contact_title1) : ''}}</h2>
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
                            <h3 class="font-2 color-main">{{!empty($contacts->contact_title2) ? __($contacts->contact_title2) : ''}}</h3>
                            <h2>{{!empty($contacts->contact_title3) ? __($contacts->contact_title3) : ''}}</h2>
                        </div>
                    </div>
                </div>
                <!--End Heading-->

                <!--Start Row-->
                <div class="row">
                    <!--Start Contact Content-->
                    <div class="col-md-8 col-md-offset-2">
                        <div class="contact-content">
                            <!--Start Contact Info-->
                            <div class="contact-info row text-center">
                                <!--Start Contact Info Single-->
                                <div class="col-sm-4">
                                    <div class="contact-info-single">
                                        <h4>@lang('CALL US')</h4>
                                        <p>
                                            @foreach(explode(',', $contacts->contact_phone) as $phone)
                                                {{$phone}}<br>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <!--End Contact Info Single-->

                                <!--Start Contact Info Single-->
                                <div class="col-sm-4">
                                    <div class="contact-info-single">
                                        <h4>@lang('MAIL US')</h4>
                                        <p>
                                            @foreach(explode(',', $contacts->contact_mail) as $email)
                                                {{$email}}<br>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <!--End Contact Info Single-->

                                <!--Start Contact Info Single-->
                                <div class="col-sm-4">
                                    <div class="contact-info-single">
                                        <h4>@lang('LOCATION')</h4>
                                        <p>
                                            @foreach(explode(',', $contacts->address) as $address)
                                                {{$address}}<br>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <!--End Contact Info Single-->
                            </div>
                            <!--End Contact Info-->

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

        <!--Google Map-->
        {{--<div id="map"></div>--}}

    </section>

    <div class="responsive-map-container">

        <iframe src="https://www.google.com/maps/embed?pb={{$contacts->contact_map}}"
                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>
    <!--End Page Content-->


@endsection