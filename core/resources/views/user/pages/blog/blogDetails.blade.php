@extends('user.master')
@section('title',$gs->websiteTitle.' | Promotion details')

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
                            <h2 class="section-title-subtitle">@lang('Promotion details')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Promotion')</li>
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
                                <img src="{{asset('assets/user/images/posts/'.$blogpost->blog_photo)}}"
                                     class="img-responsive" alt="Image">
                            </div>
                            <div class="blog-details">
                                <div class="post-meta single">
                                    <h2 class="m-0">{{__($blogpost->blog_title)}}</h2>
                                    <p style="text-align: right;">
                                        <a href=""><i class="icofont icofont-user"></i> Admin</a>
                                        <a href=""><i class="icofont icofont-clock-time"></i> {{$blogpost->created_at->format('M d, Y')}}
                                        </a>
                                        <a href=""><i class="fas fa-eye"></i> {{$blogpost->view_count}}</a>
                                    </p>
                                </div>
                                <div class="post-content">
                                    <p>
                                        {{__($blogpost->blog_content)}}
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
                        @include('user.includes.blog_sidebar')
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