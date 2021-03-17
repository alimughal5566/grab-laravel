@extends('user.master')
@section('title',$gs->websiteTitle.' | About Us')

@section('content')
<style type="text/css">

</style>
    <!--Start Page Content-->
    <section class="page-content fix">

        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/banner.png')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">Plans Options</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">Plans Options Categories</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->


    @if(sizeof($optionsplans) > 0)
    <!--Start Plans Options Area-->
    <section class="gallery-area bg-gray default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="section-title-heading color-main">List Of Plans Options</h3>
                        <h2 class="section-title-subtitle">Categories</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Gallery List-->
            <div class="gallery-list">
                <!--Start Row-->
                <div class="row">
                @foreach($optionsplans as $plan)
                    <!--Start Post Single-->
                        <div class="col-md-4 col-xs-12">
                            <div class="blog-post-single fix" style="box-shadow: 0 0 10px #bcc6d0;">
                                <div class="post-media lfood">
                                    <a href="{{route('user.cat_planoptions',['id'=>$plan->id])}}">
                                        <img src="@if($plan->category_image!=''){{asset('assets/user/images/planoptions/'.$plan->category_image)}} @else {{asset('assets/user/images/meal/noimage.png')}} @endif" class="img-responsive" alt="Image">
                                    </a>
                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">
                                        <h2 class="m-0" style="text-align: center;"><a href="{{route('user.cat_planoptions',['id'=>$plan->id])}}">{{$plan->category_name}}</a></h2>
                                    </div>
                                    <div class="post-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="default-btn" style="margin: 10px 0 0 !important;">
                                                    <a href="{{route('user.cat_planoptions',['id'=>$plan->id])}}" class="btn btn-block" style="color: #fff !important;">View Plans Options</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Post Single-->
                    @endforeach
                </div>
                <!--End Row-->
            </div>
            <!--End Gallery List-->
        </div>
        <!--End Container-->
    </section>
    <!--End Plans Options Area-->
    @endif
    </section>
    <!--End Page Content-->
@endsection




