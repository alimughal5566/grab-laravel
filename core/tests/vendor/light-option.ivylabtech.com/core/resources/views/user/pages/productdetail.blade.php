@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')


@section('content')
<style type="text/css">
.mb-70 {
    margin-bottom: 70px;
}
.mt-70 {
    margin-top: 70px;
}
.container {
    max-width: 1170px;
}
#img-1 {
    border: 1px solid #ededed;
}
a, button, img, input, span {
    transition: all 0.3s ease 0s;
}
a, button {
    color: inherit;
    line-height: inherit;
    text-decoration: none;
    cursor: pointer;
}
img {
    max-width: 100%;
    height: auto;
}
a, button, img, input, span {
    transition: all 0.3s ease 0s;
}
.single-zoom-thumb {
    margin-top: 20px !important;
    width: 80%;
    margin: 0 auto;
}
.s-tab-zoom.owl-carousel .owl-nav {
    display: block;
}
.s-tab-zoom.owl-carousel .owl-nav div {
    position: absolute;
    background: #f2f2f2;
    border-radius: 3px;
    height: 32px;
    top: 50%;
    transform: translatey(-50%);
    width: 32px;
    text-align: center;
    line-height: 32px;
    left: -7px;
    font-size: 18px;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    opacity: 0;
    visibility: hidden;
}
.s-tab-zoom.owl-carousel .owl-nav div.owl-next {
    right: -7px;
    left: auto;
}
.s-tab-zoom.owl-carousel .owl-nav div {
    position: absolute;
    background: #f2f2f2;
    border-radius: 3px;
    height: 32px;
    top: 50%;
    transform: translatey(-50%);
    width: 32px;
    text-align: center;
    line-height: 32px;
    left: -7px;
    font-size: 18px;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    opacity: 0;
    visibility: hidden;
}


.product_d_right h1 {
    text-transform: capitalize;
    line-height: 20px;
    font-size: 22px;
    font-weight: 400;
    margin-bottom: 22px;
}
h1 {
    font-size: 48px;
    line-height: 1;
    font-weight: 700;
}
.product_d_right h1 a {
    color: #252525;
}
a, button, img, input, span {
    transition: all 0.3s ease 0s;
}
a, button {
    color: inherit;
    line-height: inherit;
    text-decoration: none;
    cursor: pointer;
}

ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.product_nav ul li:first-child {
    margin-left: 0;
}
.product_nav ul li {
    display: inline-block;
    margin-left: 3px;
}
.product_nav ul li a {
    background: #40A944;
    border-radius: 3px;
    color: #ffffff;
    display: block;
    font-size: 15px;
    height: 30px;
    width: 30px;
    line-height: 30px;
    text-align: center;
}

.product_d_right .product_ratting {
    margin-bottom: 17px;
}
.product_ratting ul li {
    display: inline-block;
}

.product_d_right .product_ratting ul li a {
    color: #FEB954;
}
.product_ratting ul li a {
    color: #40A944;
}
.product_d_right .product_ratting ul li.review a {
    color: #5a5a5a;
    margin-left: 10px;
}
.product_d_right .price_box {
    margin-bottom: 14px;
}
.price_box {
    margin-top: 12px;
}
.product_d_right .price_box span.current_price {
    font-size: 23px;
}
.price_box span.current_price {
    font-weight: 500;
    font-size: 17px;
    color: #40A944;
}
.price_box span {
    line-height: 16px;
}
.product_d_right .price_box span.old_price {
    font-size: 20px;
}
.price_box span.old_price {
    text-decoration: line-through;
    font-weight: 400;
    font-size: 15px;
    margin-left: 5px;
}
.price_box span {
    line-height: 16px;
}
.product_d_right .product_desc {
    margin-bottom: 19px;
    padding-bottom: 24px;
    border-bottom: 1px solid #ededed;
}
.product_d_right .product_desc p {
    font-size: 14px;
    line-height: 26px;
}
p:last-child {
    margin-bottom: 0;
}
.product_d_right .price_box span.current_price {
    font-size: 23px;
}
.price_box span.current_price {
    font-weight: 500;
    font-size: 17px;
    color: #40A944;
}
.price_box span {
    line-height: 16px;
}
.product_d_right .price_box span.old_price {
    font-size: 20px;
}
.price_box span.old_price {
    text-decoration: line-through;
    font-weight: 400;
    font-size: 15px;
    margin-left: 5px;
}
.price_box span {
    line-height: 16px;
}

.product_variant.color {
    margin-bottom: 26px;
}
.product_variant.color h3 {
    font-weight: 500;
    text-transform: capitalize;
    font-size: 18px;
    margin-bottom: 0;
    margin-right: 40px;
}
h3 {
    font-size: 30px;
    line-height: 30px;
}

.product_variant.color label {
    font-size: 15px;
    font-weight: 500;
    text-transform: capitalize;
}
.product_variant.color ul li {
    display: inline-block;
    padding: 2px;
    border: 1px solid #ccc;
    margin-right: 5px;
}
.product_variant.color ul li.color1 a {
    background: #000000;
}
.product_variant.color ul li a {
    width: 30px;
    height: 30px;
    display: block;
}
.product_variant.color ul li.color2 a {
    background: #BEBEBE;
}

.product_variant.color ul li.color3 a {
    background: #FE0000;
}

.product_variant.color ul li:last-child {
    margin-right: 0;
}
.product_variant.color ul li.color4 a {
    background: #FFFF01;
}
.product_variant.quantity {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.product_variant.quantity label {
    font-weight: 500;
    text-transform: capitalize;
    font-size: 14px;
    margin-bottom: 0;
}

.product_variant.quantity input {
    width: 130px;
    border: 1px solid #ebebeb;
    background: none;
    height: 42px;
    padding: 0 12px;
    border-radius: 5px;
    margin-left: 15px;
}

.product_variant.quantity button {
    border: 0;
    font-size: 16px;
    margin-left: 20px;
    background: #40A944;
    height: 42px;
    line-height: 42px;
    text-transform: capitalize;
    min-width: 270px;
}
.button {
    background: #40A944;
    box-shadow: none;
    color: #ffffff;
    display: inline-block;
    height: 45px;
    line-height: 45px;
    padding: 0 22px;
    text-transform: uppercase;
    font-size: 13px;
    border-radius: 3px;
}
.product_d_action {
    margin-bottom: 14px;
}

.product_d_action ul li a {
    font-size: 14px;
    line-height: 28px;
}

.product_meta {
    margin-bottom: 24px;
}
.product_meta span {
    font-weight: 500;
}

.product_meta span a {
    margin-left: 10px;
    font-weight: 400;
}
.mb-65 {
    margin-bottom: 65px;
}

.product_d_inner {
    padding: 20px 30px 27px;
    border: 1px solid #ededed;
}

.product_info_button {
    border-bottom: 1px solid #ededed;
    padding-bottom: 15px;
    margin-bottom: 29px;
}

.product_info_button ul li a.active {
    color: #333333;
}
.product_info_button ul li a {
    display: block;
    float: left;
    text-transform: capitalize;
    font-size: 20px;
    color: #555;
    font-weight: 500;
    margin-right: 35px;
    line-height: 26px;
    position: relative;
}

.tab-content > .tab-pane.active {
    display: block;
    height: auto;
    opacity: 1;
    overflow: visible;
}
.tab-content > .tab-pane {
    display: block;
    height: 0;
    opacity: 0;
    overflow: hidden;
}

.product_info_content p {
    line-height: 28px;
}

p:last-child {
    margin-bottom: 0;
}
.product_d_table {
    padding: 10px 0 22px;
}

.product_d_table table {
    border-top: 1px solid #ddd;
    width: 100%;
}

.product_d_table table tbody tr {
    border-bottom: 1px solid #ddd;
}

.product_d_table table tbody tr td:first-child {
    border-right: 1px solid #ddd;
    width: 30%;
    font-weight: 700;
}
.product_d_table table tbody tr td {
    padding: 7px 17px;
}

.product_d_table table tbody tr td {
    padding: 7px 17px;
}

.product_d_table table tbody tr {
    border-bottom: 1px solid #ddd;
}

.product_info_content p {
    line-height: 28px;
}
p:last-child {
    margin-bottom: 0;
}
.reviews_wrapper h2 {
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
}
.reviews_comment_box {
    display: flex;
    margin-bottom: 22px;
}

img {
    max-width: 100%;
    height: auto;
}

.reviews_comment_box .comment_text {
    width: 100%;
    border: 1px solid #ededed;
    position: relative;
    margin-left: 21px;
    padding: 12px;
    border-radius: 3px;
}
.comment_title {
    margin-bottom: 20px;
}
.reviews_wrapper h2 {
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
}
.reviews_wrapper .product_ratting {
    margin-bottom: 20px;
}
.reviews_wrapper .product_ratting h3 {
    font-size: 14px;
    font-weight: 700;
    text-transform: capitalize;
}
.product_review_form button {
    border: none;
    background: #222222;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 500;
    padding: 5px 15px 3px;
    display: block;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    cursor: pointer;
    margin-top: 20px;
    border-radius: 5px;
    font-size: 13px;
}

.product_review_form textarea {
    border: 1px solid #ddd;
    background: none;
    height: 120px;
    resize: none;
    width: 100%;
    margin-bottom: 14px;
    padding: 0 20px;
}
.product_review_form input {
    border: 1px solid #ddd;
    background: none;
    width: 100%;
    height: 40px;
    padding: 0 20px;
}

.related_products {
    margin-bottom: 60px;
}

.container {
    max-width: 1170px;
}
.section_title {
    text-align: center;
    margin-bottom: 30px;
}

.section_title h2 {
    font-size: 32px;
    line-height: 35px;
    font-weight: 500;
    display: inline-block;
    margin-bottom: 0;
    text-transform: capitalize;
    padding-bottom: 0;
}
h2 {
    font-size: 36px;
    line-height: 36px;
}
figure {
    padding: 0;
    margin: 0;
}

.product_thumb {
    position: relative;
    overflow: hidden;
}

.product_carousel .product_thumb a img {
    width: 100%;
    margin: 0 auto;
}

.product_thumb a.secondary_img {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    opacity: 0;
    visibility: hidden;
    -moz-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out;
}
.product_carousel .product_thumb a img {
    width: 100%;
    margin: 0 auto;
}
.owl-carousel .owl-item img {
    display: block;
    width: 100%;
}
.product_thumb a img {
    width: 100%;
}
img {
    max-width: 100%;
    height: auto;
}
.label_product span.label_sale {
    top: 20px;
    left: 20px;
    text-transform: uppercase;
    color: #ffffff;
    background: #40A944;
    font-size: 12px;
    height: 20px;
    line-height: 20px;
    width: 40px;
    text-align: center;
    display: block;
    border-radius: 5px;
}
.label_product span {
    position: absolute;
}
.label_product span.label_new {
    top: 20px;
    right: 20px;
    text-transform: uppercase;
    color: #ffffff;
    background: #40A944;
    font-size: 12px;
    height: 20px;
    line-height: 20px;
    width: 40px;
    text-align: center;
    display: block;
    border-radius: 5px;
}
.label_product span {
    position: absolute;
}
.action_links {
    transition: all 0.3s ease;
    position: absolute;
    left: 50%;
    transform: translatex(-50%);
    bottom: 0;
    opacity: 0;
    visibility: hidden;
    z-index: 9;
    background: #ffffff;
    padding: 4px 7px;
    box-shadow: 0 2px 3px 1px rgba(0, 0, 0, 0.1);
    border-radius: 30px;
}
.action_links ul {
    display: flex;
}
.action_links ul li {
    margin-right: 4px;
}
.action_links ul li a {
    font-size: 16px;
    display: inline-block;
    width: 33px;
    height: 33px;
    line-height: 36px;
    text-align: center;
    background: #fff;
    border-radius: 50%;
}
.product_content {
    margin-top: 16px;
    text-align: center;
}
.product_content h4 {
    font-size: 15px;
    line-height: 15px;
    font-weight: 400;
    text-transform: capitalize;
    margin-bottom: 16px;
}
.product_content p {
    font-size: 12px;
    line-height: 12px;
    margin-bottom: 0;
}
.price_box {
    margin-top: 12px;
}
.price_box span.current_price {
    font-weight: 500;
    font-size: 17px;
    color: #40A944;
}
.price_box span {
    line-height: 16px;
}
.price_box span.old_price {
    text-decoration: line-through;
    font-weight: 400;
    font-size: 15px;
    margin-left: 5px;
}
.price_box span {
    line-height: 16px;
}
.btn-cop {
    background-color: #60ba62 !important;
    color: #ffffff;
}
</style>


<!------ Include the above in your HEAD tag ---------->


    <!--Start Page Content-->
    <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
         <!--    <div class="overlay"></div> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="text-upper">@lang('Food Gallery')</h2>
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

        <!--Start Page Title-->
      
        <!--End Page Title-->

        <!--Start Gallery Wrap-->
         <div class="gallery-wrap">
          <div class="product_details mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">

            <img id="zoom1" src="{{asset('assets/user/images/foods/'.$result[0]->food_image)}}" alt="">

                             <!--    <img id="zoom1" src="{{asset('assets/user/images/bilal/productbig4.jpg')}}" alt="big-1"> -->
                            </a>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="#">
                           
                            <h1><a href="#">{{$result[0]->food_name}}</a></h1>
                        
                            <div class=" product_ratting">
                               <!--  <ul>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                   <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                </ul> -->
                                
                            </div>
                            <div class="price_box">
                                <span class="current_price">KD.{{$result[0]->food_price}}</span>
                             <!--    <span class="old_price">£80.00</span> -->
                                
                            </div>
                            <div class="product_desc">
                                <p>{{$result[0]->food_description}}</p>
                            </div>
                         <!--    <div class="product_variant">
                                <h3>Available Options</h3>
                                <label>Variants</label>
                                <ul>
                                    <li><input type="checkbox" name=""><a href="#">Small</a></li>
                                    <li><input type="checkbox" name=""><a href="#">Medium</a></li>
                                    <li><input type="checkbox" name=""><a href="#">Large</a></li>
                                    
                                </ul>
                            </div>
 -->                               
                              <div class="product_variant">
                              <h3>Available Options</h3>
                                <label>Addon</label>
                                <ul>
                                    @foreach($result2 as $val)
                                    <li><input type="checkbox" name=""><a href="#">{{ucwords($val->addon_name)}}</a><span class="pull pull-right">KD.{{$val->price}}</span></li>
                                   @endforeach
                                    
                                </ul>
                            </div>
                          


                         <!--     <div class="product_variant color">
                                <h3>Available Options</h3>
                                <label>Addon</label>
                                <ul>
                                    <li class="color1"><a href="#"></a></li>
                                    <li class="color2"><a href="#"></a></li>
                                    <li class="color3"><a href="#"></a></li>
                                    <li class="color4"><a href="#"></a></li>
                                </ul>
                            </div> -->


                            <div class="product_variant quantity">
                                <label><strong>quantity</strong></label>
                                <input min="1" max="100" value="1" type="number">
                                <button class="button" type="submit">add to cart</button>  
                                
                            </div>
                           
                            <div class="product_meta">
                                <span><strong>Category: </strong><a href="#">{{$result[0]->food_category_name}}</a></span>
                            </div>
                            
                        </form>
                    

                    </div>
                </div>
            </div>
        </div>    
    </div>







    <div class="product_d_info mb-65">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                               
                                <!--<li>-->
                                <!--   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{{$result[0]->food_description}}</p>
                                </div>    
                            </div>
                          

                            <!--<div class="tab-pane fade" id="reviews" role="tabpanel">-->
                            <!--    <div class="reviews_wrapper">-->
                            <!--        <h2>1 review for Donec eu furniture</h2>-->
                            <!--        <div class="reviews_comment_box">-->
                            <!--            <div class="comment_thmb">-->
                            <!--                <img src="{{asset('assets/user/images/custombilal/comment2.jpg')}}" alt="">-->
                            <!--            </div>-->
                            <!--            <div class="comment_text">-->
                            <!--                <div class="reviews_meta">-->
                            <!--                    <div class="star_rating">-->
                            <!--                        <ul>-->
                            <!--                            <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                           <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                           <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                           <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                           <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                        </ul>   -->
                            <!--                    </div>-->
                            <!--                    <p><strong>admin </strong>- September 12, 2018</p>-->
                            <!--                    <span>roadthemes</span>-->
                            <!--                </div>-->
                            <!--            </div>-->
                                        
                            <!--        </div>-->
                            <!--        <div class="comment_title">-->
                            <!--            <h2>Add a review </h2>-->
                            <!--            <p>Your email address will not be published.  Required fields are marked </p>-->
                            <!--        </div>-->
                            <!--        <div class="product_ratting mb-10">-->
                            <!--           <h3>Your rating</h3>-->
                            <!--            <ul>-->
                            <!--                <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                   <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                   <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                   <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--                   <li><a href="#"><i class="icon-star"></i></a></li>-->
                            <!--            </ul>-->
                            <!--        </div>-->
                            <!--        <div class="product_review_form">-->
                            <!--            <form action="#">-->
                            <!--                <div class="row">-->
                            <!--                    <div class="col-12">-->
                            <!--                        <label for="review_comment">Your review </label>-->
                            <!--                        <textarea name="comment" id="review_comment"></textarea>-->
                            <!--                    </div> -->
                            <!--                    <div class="col-lg-6 col-md-6">-->
                            <!--                        <label for="author">Name</label>-->
                            <!--                        <input id="author" type="text">-->

                            <!--                    </div> -->
                            <!--                    <div class="col-lg-6 col-md-6">-->
                            <!--                        <label for="email">Email </label>-->
                            <!--                        <input id="email" type="text">-->
                            <!--                    </div>  -->
                            <!--                </div>-->
                            <!--                <button type="submit">Submit</button>-->
                            <!--             </form>   -->
                            <!--        </div> -->
                            <!--    </div>     -->
                            <!--</div>-->
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>






    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products    </h2>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_column5 owl-carousel owl-loaded owl-drag">
                        
                        
                        
                        
                        
                        
                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1160px, 0px, 0px); transition: all 0s ease 0s; width: 3712px;"><div class="owl-item cloned" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="assets/img/product/product15.jpg" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="assets/img/product/product14.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                  
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Cas Meque Metus</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$26.00</span>
                                     
                                        
                                    </div>
                                  
                                </figcaption>
                                
                            </figure>
                        </article></div>
                        <div class="owl-item cloned" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="assets/img/product/product17.jpg" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="assets/img/product/product16.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                 
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="product-details.html">Aliquam Consequat</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$26.00</span>
                                       
                                    </div>
                                </figcaption>
                            </figure>
                        </article></div>
                        <div class="owl-item cloned" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="assets/img/product/product14.jpg" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="assets/img/product/product15.jpg" alt=""></a>
                                    <div class="label_product">

                                    </div>
                                 
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Mauris Vel Tellus</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$48.00</span>
                                     
                                    </div>
                                </figcaption>
                            </figure>
                        </article></div>



                        <div class="owl-item cloned" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="assets/img/product/product16.jpg" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="assets/img/product/product17.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                    
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Nunc Neque Eros</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$35.00</span>
                                        <span class="old_price">$245.00</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article></div>


                        <div class="owl-item cloned" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="assets/img/product/product18.jpg" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="assets/img/product/product19.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                 
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Proin Lectus Ipsum</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$26.00</span>
                                        <span class="old_price">$362.00</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article></div>

                        <div class="owl-item active" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{asset('assets/user/images/bilal/product29.jpg')}}" alt=""></a>
                                   
                                    <div class="label_product">
                                        <span class="label_sale">Sale2</span>
                                        <span class="label_new">New</span>
                                    </div>
                                
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="product-details.html">Quisque In Arcu</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$55.00</span>
                                      
                                    </div>
                                    <button class="btn btn-cop">Add to cart</button>     
                                </figcaption>
                            </figure>
                        </article></div><div class="owl-item active" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{asset('assets/user/images/bilal/productbig4.jpg')}}" alt=""></a>
                                 
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Cas Meque Metus</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$26.00</span>
                                        <span class="old_price">$362.00</span>
                                    </div>
                                     <button class="btn btn-cop">Add to cart</button>  
                                </figcaption>
                            </figure>
                        </article></div><div class="owl-item active" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{asset('assets/user/images/bilal/productbig5.jpg')}}" alt=""></a>
                                    
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                  
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Aliquam Consequat</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$26.00</span>
                                        <span class="old_price">$362.00</span>
                                    </div>
                                     <button class="btn btn-cop">Add to cart</button>  
                                </figcaption>
                            </figure>
                        </article></div><div class="owl-item active" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="{{asset('assets/user/images/bilal/product13.jpg')}}" alt=""></a>
                                  
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                        <span class="label_new">New</span>
                                    </div>
                               
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Mauris Vel Tellus</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$48.00</span>
                                        <span class="old_price">$257.00</span>
                                    </div>
                                     <button class="btn btn-cop">Add to cart</button>  
                                </figcaption>
                            </figure>
                        </article></div><div class="owl-item active last" style="width: 212px; margin-right: 20px;"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{asset('assets/user/images/bilal/product23.jpg')}}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="assets/img/product/product17.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">Sale</span>
                                    </div>
                                 
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="#">Nunc Neque Eros</a></h4>
                                    <p><a href="#">Fruits</a></p>
                                    <div class="price_box"> 
                                        <span class="current_price">$35.00</span>
                                        <span class="old_price">$245.00</span>
                                    </div>
                                     <button class="btn btn-cop">Add to cart</button>  
                                </figcaption>
                            </figure>
                        </article></div>

                  
                </div>
            </div>

                  
                </div>
                </div>
            </div>  
        </div>
    </section>




        </div>



     

     
    <!--End Page Content-->


@endsection