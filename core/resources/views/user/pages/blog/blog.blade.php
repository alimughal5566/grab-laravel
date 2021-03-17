@extends('user.master')
@section('title',$gs->websiteTitle.' | Promotion')

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
                            <h2 class="section-title-subtitle">@lang('Promotion')</h2>
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
                <!--Start Post Row-->
                <div class="row">

                @foreach($blogs as $blog)
                    <!--Start Post Single-->
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post-single">
                                <div class="post-media">
                                    <a href="{{route('user.blogDetails',$blog->blog_slug)}}">
                                        <img src="{{asset('assets/user/images/posts/'.$blog->blog_photo)}}"
                                                                    class="img-responsive" alt="Image">
                                    </a>
                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">
                                        <h2 class="m-0">
                                            <a href="{{route('user.blogDetails',$blog->blog_slug)}}">{{__($blog->blog_title)}}</a>
                                        </h2>
                                        <p>
                                            <a href=""><i class="icofont icofont-user"></i> Admin</a>
                                            <a href=""><i
                                                        class="icofont icofont-clock-time"></i> {{$blog->created_at->format('M d, Y')}}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="post-content">
                                        <p>{{Str::words(__($blog->blog_content),20)}}</p>

                                        <a href="{{route('user.blogDetails',$blog->blog_slug)}}">@lang('Read More') <i
                                                    class="icofont icofont-rounded-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Post Single-->
                    @endforeach
                </div>
                <!--End Post Row-->

                <!--Start Pagination Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="post-pagination text-center">
                            <ul class="pagination m-0">
                                {{ $blogs->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Pagination Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Blog Wrap-->


    </section>
    <!--End Page Content-->

@endsection