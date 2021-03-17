@extends('user.master')
@section('title',$gs->websiteTitle.' | our events')
<style type="text/css">

     @font-face { font-family: rockstaralt-regular; src: url('assets/user/fonts/rockstaralt-regular.otf'); } 

        @font-face { font-family: Choplin Medium; src: url('assets/user/fonts/Choplin Medium.otf'); }

.font-2 { font-family: rockstaralt-regular;}
  .text-upper{font-family: Choplin Medium !important;font-size: 15}

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
                            <h2 class="section-title-subtitle">@lang('Our Events')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Events')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Events Wrap-->
        <div class="events-wrap default-padding">
            <!--Start Container-->
            <div class="container">
                <!--Start Heading-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-heading text-center">
                            <h3 class="section-title-heading color-main">{{ !empty($frontEndSetting->eventTitle1) ? __($frontEndSetting->eventTitle1) : '' }}</h3>
                            <h2 class="section-title-subtitle">{{ !empty($frontEndSetting->eventTitle2) ?  __($frontEndSetting->eventTitle2) : '' }}</h2>
                        </div>
                    </div>
                </div>
                <!--End Heading-->

                <!--Start Row-->
                <div class="row">

                @foreach($events as $event)
                    <!--Start Event Single-->
                        <div class="col-md-6">
                            <div class="event-single position-relative">
                                <img src="{{asset('assets/user/images/events/'.$event->event_image)}}" class="img-responsive" alt="Image">
                                <div class="event-details">

                                    <a href="{{route('user.EventDetails',$event->event_slug)}}">
                                        <h2>{{$event->event_title}}</h2>
                                    </a>
                                    <p><span><i class="icofont icofont-calendar"></i> {{$event->event_date}}</span> <span><i
                                                    class="icofont icofont-clock-time"></i> {{$event->event_duration}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--End Event Single-->
                    @endforeach


                </div>
                <!--End Row-->

                <!--Start Pagination Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="post-pagination text-center">
                            <ul class="pagination m-0">
                                {{ $events->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Pagination Row-->

            </div>
            <!--End Container-->
        </div>
        <!--End Events Wrap-->
    </section>
    <!--End Page Content-->


@endsection