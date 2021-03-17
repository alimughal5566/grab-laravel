@extends('user.master')
@section('title',$gs->websiteTitle.' | Our food')
<style type="text/css">
    @font-face { font-family: rockstaralt-regular; src: url('assets/user/fonts/rockstaralt-regular.otf'); }

        @font-face { font-family: Choplin Medium; src: url('assets/user/fonts/Choplin Medium.otf'); }

    .font-2 { font-family: rockstaralt-regular;

    }
    .text-upper{font-family: Choplin Medium !important;font-size: 20 !important}
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
                            <h2 class="section-title-subtitle">@lang('Our All Food')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Our Food')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Latest Blog-->
        <section class="latest-blog-area bg-gray default-padding">
            <!--Start Container-->
            <div class="container">
                <!--Start Section Heading-->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-heading text-center">
                            <h3 class="section-title-heading color-main">{{ !empty($frontEndSetting->foodTitle1) ?  __($frontEndSetting->foodTitle1) : '' }}</h3>
                            <h2 class="section-title-subtitle">{{ !empty($frontEndSetting->foodTitle2) ?  __($frontEndSetting->foodTitle2) : '' }}</h2>
                        </div>
                    </div>
                </div>
                <!--End Section Heading-->

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
                                        <h2 class="m-0"><a
                                                    href="{{route('user.foodDetails',$foodItem->id)}}">{{__($foodItem->food_name)}}</a>
                                        </h2>

                                    </div>
                                    <div class="post-content">
                                        <p>
                                            {{ \Illuminate\Support\Str::words(__($foodItem->food_description), 12,'....') }}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 20px;">
                                                <b>Price : </b> <span
                                                        class="base-color">{{$gs->currencySymbol}} {{$foodItem->food_price}}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="default-btn">
                                                    <a href="{{route('user.foodDetails',$foodItem->id)}}" style="color: #fff !important;">@lang('View
                                                        Details')</a>
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

                <!--Start Post Pagination-->
                <div class="post-pagination text-center">

                    <ul class="pagination m-0">
                        {{ $foodItems->links() }}
                    </ul>
                </div>
                <!--End Post Pagination-->
            </div>
            <!--End Container-->
        </section>
        <!--End Latest Blog-->

    <!--End Gallery Wrap-->
    </section>
    <!--End Page Content-->


@endsection
