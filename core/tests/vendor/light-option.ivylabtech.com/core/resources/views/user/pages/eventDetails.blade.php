@extends('user.master')
@section('title',$gs->websiteTitle.' | event details')

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
                            <h2 class="text-upper">@lang('Event details')</h2>
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

        <!--Start Blog Wrap-->
        <div class="blog-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <!--Start Post Single-->
                    <div class="col-md-8">
                        <div class="blog-post-single">
                            <div class="post-media event-img">
                                <img src="{{asset('assets/user/images/events/'.$eventDetails->event_image)}}"
                                     class="img-responsive" alt="Image">
                            </div>
                            <div class="blog-details">
                                <div class="post-meta single">
                                    <h2 class="m-0">{{__($eventDetails->event_title)}}</h2>
                                    <p style="text-align: right;">
                                        <a href=""><i class="icofont icofont-user"></i> Admin</a>
                                        <a href=""><i
                                                    class="icofont icofont-clock-time"></i> {{$eventDetails->created_at->format('M d, Y')}}
                                        </a>
                                        <a href=""><i class="fas fa-eye"></i> {{$eventDetails->view_count}}</a>
                                    </p>
                                </div>
                                <div class="post-content">
                                    <p>
                                        {{__($eventDetails->Description)}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="blog-comment-area">
                            <div class="post-comments">

                                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="600"
                                     data-numposts="5"></div>

                            </div>
                        </div>

                    </div>
                    <!--End Post Single-->

                    <!--Start Sidebar-->
                    <div class="col-md-4">
                        <div class="blog-sidebar">


                            <!--Start Recent Post Widget-->
                            <div class="recent-post-widget">
                                <h4 class="text-upper my-widget-title">@lang('More Event')</h4>
                            @foreach($events as $event)
                                <!--Start Post Single-->
                                    <div class="recent-post-single fix">
                                        <div class="recent-post-img">
                                            <a href="{{route('user.EventDetails',$event->event_slug)}}"><img
                                                        src="{{asset('assets/user/images/events/'.$event->event_image)}}"
                                                        class="img-responsive"
                                                        alt="Image" height="100" width="100"></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <h5 class="m-0"><a class="color-main" href="{{route('user.EventDetails',$event->event_slug)}}">{{__($event->event_title)}}</a></h5>
                                            <p>
                                                <i class="icofont icofont-calendar"></i> {{$event->created_at->format('M d, Y')}}
                                            </p>
                                        </div>
                                    </div>
                                    <!--End Post Single-->
                                    @if($loop->iteration==3)
                                        @break;
                                    @endif
                                @endforeach

                            </div>
                            <!--End Recent Post Widget-->

                        </div>

                        {{--start Social share--}}
                        <div class="blog-sidebar" style="margin-top: 30px;">

                            <!--Start Recent Post Widget-->
                            <div class="recent-post-widget">
                                <h3 class="text-center my-widget-title"
                                    style="font-weight: 700;  margin-bottom: 28px;">@lang('Social Share')</h3>

                                <!--Start Post Single-->
                                <div class="row justify-content-center">
                                    <div class="col-xs-2 my-icon">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"
                                           class="fa fa-facebook"></a>
                                    </div>
                                    <div class="col-xs-2 my-icon">
                                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}"
                                           class="fa fa-twitter"></a>
                                    </div>

                                    <div class="col-xs-2 my-icon">
                                        <a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}"
                                           class="fa fa-google"></a>
                                    </div>
                                    <div class="col-xs-2 my-icon">
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary"
                                           class="fa fa-linkedin"></a>
                                    </div>

                                    <div class="col-xs-2 my-icon">

                                        <a href="https://www.instagram.com/?url={{urlencode(url()->current()) }}" class="fa fa-instagram"></a>
                                    </div>
                                    <div class="col-xs-2 my-icon">
                                        <a href="http://pinterest.com/pin/create/button/?url={{urlencode(url()->current()) }}" class="fa fa-pinterest"></a>
                                    </div>


                                </div>
                                <!--End Post Single-->
                            </div>
                            <!--End Recent Post Widget-->
                        </div>
                        {{--End Social share--}}

                    </div>
                    <!--End Sidebar-->
                </div>
                <!--End Post Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Blog Wrap-->
    </section>
    <!--End Page Content-->
@section('scripts')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script>

@endsection

@endsection