@extends('user.master')
@section('title', $gs->websiteTitle)

@section('content')
    <!--Start Banner Area-->
    <section class="banner-area bg-cover height-full position-relative"
             style="background-image: url({{asset('assets/user/images/frontEnd/banner.png')}});">
        <div class="overlay"></div>
        <!--Start Banner Content-->
        <div class="caption-content display-table">
            <div class="table-cell position-relative">
                <h1 class="font-2 animated fadeInDown">{{!empty($frontEndSetting->banner_text1) ? __($frontEndSetting->banner_text1) : ''}}</h1>

                <h2 class="text-upper animated fadeInDown">
                    {{--remove last word--}}
                    <span class="b-text">{{ preg_replace('/\W\w+\s*(\W*)$/', '$1', __($frontEndSetting->banner_text2)) }}</span>
                    @php
                        $pieces = explode(' ', $frontEndSetting->banner_text2);
                        $last_word = array_pop($pieces);
                        echo $last_word.'<br>';
                    @endphp
                </h2>

                <h3 class="animated fadeInUp">{{!empty($frontEndSetting->banner_text3) ? __($frontEndSetting->banner_text3) : ''}}</h3>
                <!--<div class="default-btn large animated fadeInUp">-->
                <!--    <a href="{{route('user.reservation')}}">@lang('Book Now')</a>-->
                <!--</div>-->
            </div>
        </div>
        <!--End Banner Content-->
    </section>
    <!--End Banner Area-->

    <!--Start About Area-->
    <div class="about-area">
        <!--Start Container-->
        <div class="container">
            <!--Start Row-->
            <div class="row">
                <!--Start About Image-->
                <div class="col-md-6">
                    <div class="about-img fix">
                        <img src="{{asset('assets/user/images/frontEnd/about_image.jpg')}}" class="img-responsive"
                             alt="Image">
                    </div>
                </div>
                <!--End About Image-->
                <!--Start About Content-->
                <div class="col-md-6">
                    <div class="about-content">
                        <h3 class="font-2 color-main m-0">{{!empty($aboutSetting->about_title1) ? __($aboutSetting->about_title1) : ''}}</h3>

                        <h2 class="text-upper">{{!empty($aboutSetting->about_title2) ? __($aboutSetting->about_title2) : ''}}</h2>

                        <p>{{ !empty($aboutSetting->about_text) ?  __($aboutSetting->about_text) : '' }}</p>
                        <div class="default-btn">
                            <a href="{{route('user.about')}}">@lang('Read More')</a>
                        </div>
                    </div>
                </div>
                <!--End About Content-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </div>
    <!--End About Area-->

    <!--Start Event Area-->
    <section class="event-area default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="font-2 color-main">{{ !empty($frontEndSetting->eventTitle1) ?  __($frontEndSetting->eventTitle1) : '' }}</h3>
                        <h2 class="text-upper">{{ !empty($frontEndSetting->eventTitle2) ?  __($frontEndSetting->eventTitle2) : '' }}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Row-->
            <div class="row">
            @foreach($events as $event)
                <!--Start Event Single-->
                    <div class="col-md-6">
                        <div class="event-single position-relative">
                            <img src="{{asset('assets/user/images/events/'.$event->event_image)}}"
                                 class="img-responsive" alt="Image">
                            <div class="event-details">
                                <a href="{{route('user.EventDetails',$event->event_slug)}}">
                                    <h2>{{__($event->event_title)}}</h2>
                                </a>
                                <p><span><i class="icofont icofont-calendar"></i> {{$event->event_date}}</span> <span><i
                                                class="icofont icofont-clock-time"></i> {{$event->event_duration}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--End Event Single-->
                    @if($loop->iteration==2)
                        @break;
                    @endif
                @endforeach
            </div>
            <!--End Row-->

            <div class="default-btn text-center">
                <a href="{{route('user.event')}}">@lang('More Event')</a>
            </div>
        </div>
        <!--End Container-->
    </section>
    <!--End Event Area-->

    <!--Start Gallery Area-->
    <section class="gallery-area bg-gray default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="font-2 color-main">{{!empty($frontEndSetting->featureTitle1) ? __($frontEndSetting->featureTitle1) : ''}}</h3>
                        <h2 class="text-upper">{{!empty($frontEndSetting->featureTitle2) ? __($frontEndSetting->featureTitle2) : ''}}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Gallery List-->
            <div class="gallery-list">
                <!--Start Row-->
                <div class="row">
                @foreach($foodItems as $foodItem)
                    <!--Start Post Single-->
                        <div class="col-md-4">
                            <div class="blog-post-single fix" style="box-shadow: 0 0 10px #bcc6d0;">
                                <div class="post-media lfood">
                                    <a href="{{route('user.foodDetails',$foodItem->id)}}">

                                        @foreach(explode(',', $foodItem->food_image) as $f_image)

                                            <img src="{{asset('assets/user/images/foods/'.$f_image)}}"
                                                 class="img-responsive" alt="Image">

                                            @if($loop->iteration==1)
                                                @break;
                                            @endif
                                        @endforeach

                                    </a>
                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">
                                        <p>
                                            <a href=""><i class="icofont icofont-clock-time"></i> {{$foodItem->created_at->format('M d, Y')}}</a>
                                        </p>
                                        <h2 class="m-0"><a href="{{route('user.foodDetails',$foodItem->id)}}">{{__($foodItem->food_name)}}</a></h2>

                                    </div>
                                    <div class="post-content">
                                        <p>
                                            {{ \Illuminate\Support\Str::words(__($foodItem->food_description), 12,'....') }}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 50px;">
                                                <b>Price : </b> <span class="base-color">{{$gs->currencySymbol}} {{$foodItem->food_price}}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="default-btn">
                                                    <a href="{{route('user.foodDetails',$foodItem->id)}}" style="color: #fff;">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<a href="blog-single.html">View Details <i class="icofont icofont-rounded-double-right"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Post Single-->
                        @if($loop->iteration==6)
                            @break;
                        @endif
                    @endforeach

                </div>
                <!--End Row-->
            </div>
            <!--End Gallery List-->

            <div class="default-btn text-center">
                <a href="{{route('user.foods')}}">@lang('See More')</a>
            </div>

        </div>
        <!--End Container-->
    </section>
    <!--End Gallery Area-->



    <!--Start Testimonial Area-->
    <section class="testimonial-area bg-cover position-relative"
             style="background-image: url({{asset('assets/user/images/frontEnd/banner.png')}});">
        <div class="overlay"></div>

        <!--Start Container-->
        <div class="container">
            <!--Start Row-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!--Start Testimonial Carousel-->
                    <div class="testi-carousel owl-carousel">

                    @foreach($testimonials as $testimonial)
                        <!--Start Testimonial Single-->
                            <div class="testi-single">
                                <div class="client-info text-center">
                                    <img src="{{asset('assets/user/images/testimonial/'.$testimonial->profile_photo)}}"
                                         class="img-responsive" alt="Image">
                                    <h4>{{$testimonial->name}}</h4>
                                </div>
                                <div class="client-comment text-center">
                                    <p>{{__($testimonial->message)}}</p>
                                    <span><i class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i
                                                class="icofont icofont-star"></i><i class="icofont icofont-star"></i><i
                                                class="icofont icofont-star"></i></span>
                                </div>
                            </div>
                            <!--End Testimonial Single-->

                        @endforeach

                    </div>
                </div>
                <!--End Testimonial Carousel-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->

    </section>
    <!--End Testimonial Area-->

    <!--Start Chef Area-->
    <section class="chef-area default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="font-2 color-main">{{ !empty($frontEndSetting->chefTitle1) ?  __($frontEndSetting->chefTitle1) : '' }}</h3>
                        <h2 class="text-upper">{{ !empty($frontEndSetting->chefTitle2) ?  __($frontEndSetting->chefTitle2) : '' }}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

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
    </section>
    <!--End Chef Area-->


    <!--Start Latest Blog-->
    <section class="latest-blog-area  default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="font-2 color-main">{{ !empty($frontEndSetting->newsTitle1) ?  __($frontEndSetting->newsTitle1) : '' }}</h3>
                        <h2 class="text-upper">{{ !empty($frontEndSetting->newsTitle2) ?  __($frontEndSetting->newsTitle2) : '' }}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Row-->
            <div class="row">
            @foreach($posts as $post)
                <!--Start Post Single-->
                    <div class="col-md-4">
                        <div class="blog-post-single fix">
                            <div class="post-media">
                                <a href="{{route('user.blogDetails',$post->blog_slug)}}"><img
                                            src="{{asset('assets/user/images/posts/'.$post->blog_photo)}}"
                                            class="img-responsive"
                                            alt="Image"></a>
                            </div>
                            <div class="blog-details">
                                <div class="post-meta">
                                    <h2 class="m-0"><a
                                                href="{{route('user.blogDetails',$post->blog_slug)}}">{{__($post->blog_title)}}</a>
                                    </h2>
                                    <p>
                                        <a href=""><i class="icofont icofont-user"></i> Admin</a>
                                        <a href=""><i
                                                    class="icofont icofont-clock-time"></i> {{$post->created_at->format('M d, Y')}}
                                        </a>

                                    </p>
                                </div>
                                <div class="post-content">
                                    <p>{{str_limit(strip_tags(__($post->blog_content)), $limit = 150, $end = '...')}}</p>
                                    <a href="{{route('user.blogDetails',$post->blog_slug)}}">@lang('Read More') <i
                                                class="icofont icofont-rounded-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Post Single-->
                    @if($loop->iteration==3)
                        @break;
                    @endif
                @endforeach


            </div>
            <!--End Row-->

            <div class="default-btn text-center">
                <a href="{{route('user.blog')}}">@lang('See All Announcement')</a>
            </div>
        </div>
        <!--End Container-->
    </section>
    <!--End Latest Blog-->

@endsection




