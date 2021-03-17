@extends('user.master')
@section('title',$gs->websiteTitle.' | Reservation')

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
                            <h2 class="section-title-subtitle">reservation</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">Home</a>
                                </li>
                                <li class="active">Reservation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Reservation Wrap-->
        <div class="reservation-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Heading-->
                <div class="row">
                    <div class="col-md-8">
                        <div class="page-heading text-center">
                            <h3 class="section-title-heading color-main">{{!empty($frontEndSetting->reservation_title1) ? $frontEndSetting->reservation_title1 : ''}}</h3>
                            <h2 class="section-title-subtitle">{{!empty($frontEndSetting->reservation_title2) ? $frontEndSetting->reservation_title2 : ''}}</h2>
                        </div>
                    </div>
                </div>
                <!--End Heading-->

                <!--Start Row-->
                <div class="row">
                    <!--Start Reservation Form-->
                    <div class="col-md-8">
                        <div class="reservation-form">
                            <form action="{{route('user.reservation')}}" method="POST">
                                @csrf
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" class="form-control" placeholder="Phone" name="phone" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" class="form-control" placeholder="Person"
                                           name="person_quantity" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" placeholder="Date" name="date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Time" name="time" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" rows="10" name="message" required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End Reservation Form-->

                    <!--Start Opening Schedule-->
                    <div class="col-md-4">
                        <div class="opening-schedule text-center">
                            <div class="opening-info">
                                <h4>Opening Time</h4>
                                <p class="text-light">
                                    @foreach(explode(',', $frontEndSetting->reservation_openingTime) as $time)
                                        {{$time}}<br>
                                    @endforeach
                                </p>
                            </div>
                            <div class="help-line">
                                <h4>Help Line</h4>
                                <p>
                                    @foreach(explode(',', $contacts->contact_phone) as $phone)

                                        <i class="icofont icofont-phone"></i> {{$phone}}<br>

                                    @endforeach

                                </p>

                                <p>
                                    @foreach(explode(',', $contacts->contact_mail) as $email)

                                        <i class="icofont icofont-email"></i> {{$email}}<br>

                                    @endforeach

                                </p>


                            </div>

                        </div>
                    </div>
                    <!--End Opening Schedule-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Reservation Wrap-->
    </section>
    <!--End Page Content-->

@endsection