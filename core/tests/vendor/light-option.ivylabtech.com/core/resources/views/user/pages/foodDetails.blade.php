@extends('user.master')
@section('title',$gs->websiteTitle.' | Food details')

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
                            <h2 class="text-upper">@lang('Food details')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Food')</li>
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
                        <div class="my-food-title">
                        <h2 class="text-center">{{$foods->food_name}}</h2>
                        </div>
                        <div class="blog-post-single">
                            <div class="post-media food-box">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @foreach(explode(',', $foods->food_image) as $key => $f_image)

                                        <div style="display: {{$loop->first?'':'none'}}" class="img_lead"
                                             id="image_{{$key+1}}">
                                            <img src="{{asset('assets/user/images/foods/'.trim($f_image))}}"
                                                 class="img-responsive img-thumbnail">

                                        </div>
                                    @endforeach


                                </div>

                                <div class="row" style="margin-top: 20px;">

                                    @foreach(explode(',', $foods->food_image) as $key => $f_image)
                                        <div class="col-xs-3">
                                            <div class="img_btn small-img-item"
                                                 data-id="{{$key+1}}">
                                                <img src="{{asset('assets/user/images/foods/'.trim($f_image))}}"
                                                     class="img-responsive">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>




                            <div class="blog-details">
                                <div class="post-meta single" style="margin-bottom: 20px;">

                                    <h2 class="m-0">@lang('Food Overview')</h2>

                                </div>
                                <div class="post-content">
                                    <p>
                                        {{__($foods->food_description)}}
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
                                <h3 class="text-center my-widget-title"
                                    style="font-weight: 700; margin-bottom: 28px;">@lang('Food details')</h3>

                                <!--Start Post Single-->
                                <div class="row">
                                    <b>@lang('Name') : </b>{{$foods->food_name}}
                                    <hr>
                                    <b>@lang('Category') : </b>{{$foods->FoodCategory->food_category_name}}<br><br>
                                    <b>@lang('Price') : </b>{{$gs->currencySymbol}} {{$foods->food_price}} <br><br>
                                    <b>@lang('View') : </b> {{$foods->view_count}}


                                    <div class="col-md-12 default-btn text-center" style="margin-top: 30px;">
                                        <a href="" class="btn-block" data-toggle="modal" data-target="#order">
                                           @lang(' Order Now')
                                        </a>

                                    </div>
                                </div>
                                <!--End Post Single-->
                            </div>
                            <!--End Recent Post Widget-->
                        </div>

                        {{--start Social share--}}
                        <div class="blog-sidebar" style="margin-top: 30px;">

                            <!--Start Recent Post Widget-->
                            <div class="recent-post-widget">
                                <h3 class="text-center my-widget-title"
                                    style="font-weight: 700; margin-bottom: 28px;">@lang('Social Share')</h3>

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

    <!-- food Order -->
    <div class="modal modal-danger fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">@lang('Order info')</h4>
                </div>
                <form action="{{route('user.foodOrder',$foods->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>@lang('Customer Name')</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>@lang('Phone No')</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="phone" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>@lang('email')</strong></label>
                                <input class="form-control form-control-lg mb-3" type="email" name="email" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>@lang('Quantity')</strong></label>
                                <input class="form-control form-control-lg mb-3" type="number" name="quantity" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>@lang('Shipping Address')</strong></label>
                                <textarea class="form-control form-control-lg mb-3" rows="3" name="address"
                                          required></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #f3f1f1;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-success">@lang('Order')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('scripts')

    {{--facebook comment + share--}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.img_btn', function () {
                var id = $(this).data('id');
                $('.img_lead').css('display', 'none');
                $('#image_' + id).css('display', 'block');
            })
        });
    </script>

@endsection
@endsection