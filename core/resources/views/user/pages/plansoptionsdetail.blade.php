@extends('user.master')
@section('title',$gs->websiteTitle.' | Plans')

@section('content')
<style type="text/css">



</style>

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
                            <h2 class="section-title-subtitle">Home</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">Plans</li>
                                <li class="active">{{$cat_name}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->



    <!--Start Gallery Area-->
    <section class="gallery-area bg-gray default-padding">
        <!--Start Container-->
        <div class="container">
            <!--Start Section Heading-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h3 class="section-title-heading color-main">List Of Plans Options</h3>
                        <h2 class="section-title-subtitle">{{$plan_name}}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Gallery List-->
            <div class="gallery-list">
                <!--Start Row-->
                <div class="row">

                @foreach($planopt_list as $plan)
                    <!--Start Post Single-->
                        <div class="col-md-4 col-xs-12">
                            <div class="blog-post-single fix" style="box-shadow: 0 0 10px #bcc6d0;">
                                <div class="post-media lfood">
                                    <!-- Add Plan Image -->

                                    @if($plan->single_img!='')
                                    <a href="{{route('user.planoptionmeals_detail',['id' => $id, 'planid' => $planid, 'mealtype' => $plan->meal_type])}}">
                                        <img src="{{asset('assets/user/images/planoptions/'.$plan->single_img)}}" class="img-responsive" alt="Image">
                                    </a>

                                    @else
                                    <a href="{{route('user.planoptionmeals_detail',['id' => $id, 'planid' => $planid, 'mealtype' => $plan->meal_type])}}">
                                    <img src="{{asset('assets/user/images/meal/noimage.png')}}"
                                            class="img-responsive" alt="Image">
                                    </a>
                                    @endif
                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">
                                        <h2 class="m-0" style="text-align: center; margin-bottom: 10px;">
                                            <a href="{{route('user.planoptionmeals_detail',['id' => $id, 'planid' => $planid, 'mealtype' => $plan->meal_type])}}">{{$plan_name}}</a>
                                        </h2>

                                    </div>
                                    <div class="post-content">

                                        @foreach($planopt_details as $detail)
                                          @if($detail->meal_type==$plan->meal_type)
                                            <p><strong>Food Item : </strong>{{$detail->food_name}}</p>
                                          @endif
                                        @endforeach
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 20px;">
                                                <b>Price : </b> <span class="base-color">{{$gs->currencySymbol}} {{$plan->price}}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="default-btn" style="margin-top: 0px;">
                                                    <a href="{{route('user.planoptionmeals_detail',['id' => $id, 'planid' => $planid, 'mealtype' => $plan->meal_type])}}" style="color: #fff !important; width: 100%; text-align: center;">View Details</a>
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
    <!--End Gallery Area-->


    </section>
    <!--End Page Content-->

@endsection
