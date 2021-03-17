@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')
<style type="text/css">

     @font-face { font-family: rockstaralt-regular; src: url('assets/user/fonts/rockstaralt-regular.otf'); } 

        @font-face { font-family: Choplin Medium; src: url('assets/user/fonts/Choplin Medium.otf'); }

.font-2 { font-family: rockstaralt-regular;}
  .text-upper{font-family: Choplin Medium !important;font-size: 25}

</style>

@section('content')
    <!--Start Page Content-->
    <section class="page-content fix">
        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">@lang('Food Gallery')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Gallery')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Gallery Wrap-->
        <div class="gallery-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Heading-->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-heading text-center">
                            <h3 class="section-title-heading color-main">{{ !empty($frontEndSetting->foodGalleryTitle1) ?  __($frontEndSetting->foodGalleryTitle1) : '' }}</h3>
                            <h2 class="section-title-subtitle">{{ !empty($frontEndSetting->foodGalleryTitle2) ?  __($frontEndSetting->foodGalleryTitle2) : '' }}</h2>
                        </div>
                    </div>
                </div>
                <!--End Heading-->

                <!--Start Gallery Button Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-button text-center">
                            <div class="button-group filter-button-group">
                                <button class="active" data-filter="*">@lang('ALL')</button>
                                @foreach($foodCategories as $foodCategory)
                                    <button data-filter=".{{$foodCategory->food_category_slug}}">{{__($foodCategory->food_category_name)}}</button>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Gallery Button Row-->

                <!--Start Gallery List-->
                <div class="gallery-list">
                    <!--Start Row-->
                    <div class="row">
                    @foreach($foodGallery as $gallery)
                            <!--Start Gallery Single-->
                            <div class="col-md-4 col-sm-6 gallery-grid {{$gallery->FoodCategory->food_category_slug}}">
                                <div class="gallery-single position-relative fix">
                                    <img src="{{asset('assets/user/images/foodGallery/'.$gallery->food_image)}}"
                                         class="img-responsive" alt="Image">
                                    <div class="gallery-overlay">
                                        <div class="gallery-inner">
                                            <div class="display-table">
                                                <div class="table-cell text-center">
                                                    <a class="popup-img" href="{{asset('assets/user/images/foodGallery/'.$gallery->food_image)}}"><i class="icofont icofont-drag1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Gallery Single-->
                        @endforeach
                    </div>

                    </div>
                    <!--End Row-->
                </div>
                <!--End Gallery List-->

            </div>
            <!--End Container-->
        </div>
        <!--End Gallery Wrap-->
    </section>
    <!--End Page Content-->


@endsection