@extends('user.master')
@section('title',$gs->websiteTitle.' | Plans')

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
                        <h3 class="section-title-heading color-main">List Of Plans</h3>
                        <h2 class="section-title-subtitle">{{$cat_name}}</h2>
                    </div>
                </div>
            </div>
            <!--End Section Heading-->

            <!--Start Gallery List-->
            <div class="gallery-list">
                <!--Start Row-->
                <div class="row">
                @foreach($cat_plans as $plan)
                    <!--Start Post Single-->
                        <div class="col-md-4 col-xs-12">
                            <div class="blog-post-single fix" style="box-shadow: 0 0 10px #bcc6d0;">
                                <div class="post-media lfood">
                                    <a href="{{route('user.plandetail',['id' => $id, 'planid' => $plan->id])}}">

                                            <img src="{{asset('assets/user/images/plans/'.$plan->plan_image)}}"
                                                 class="img-responsive" alt="Image">
                                    </a>


                                </div>
                                <div class="blog-details">
                                    <div class="post-meta">
                                        <h2 class="m-0"><a href="{{route('user.plandetail',['id' => $id, 'planid' => $plan->id])}}">{{$plan->plan_name}}</a></h2>

                                    </div>
                                    <div class="post-content">
                                        <p><?php echo substr($plan->plan_description,0,77) . '...'; ?>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 50px;">
                                                <b>Price : </b> <span class="base-color">{{$gs->currencySymbol}} {{$plan->plan_price}}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="default-btn">
                                                    <a href="{{route('user.plandetail',['id' => $id, 'planid' => $plan->id])}}" style="color: #fff !important;">View Details</a>
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
