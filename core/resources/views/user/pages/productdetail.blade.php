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
    color: #a84d38;
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
    background: #a84d38;
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
    background-color: #a84d38 !important;
    color: #ffffff;
}


.facts-wrap {
    border: 1px solid #000;
    padding: 15px 15px 20px;
    font-family: 'Helvetica';
    line-height: 21px;
    color: #000;
    float: left;
    width: 100%;
    font-size: 14px;
}
.facts-wrap .title-block {
    border-bottom: 14px solid #000;
    padding-bottom: 10px;
    margin-bottom: 10px;
    border-top: 0;
    padding-top: 0;
}
.facts-wrap div {
    width: 100%;
    float: left;
    padding: 5px 0;
    border-top: 1px solid #000;
}

.facts-wrap div {
    width: 100%;
    float: left;
    padding: 5px 0;
    border-top: 1px solid #000;
}
.facts-wrap h1, .facts-wrap h2, .facts-wrap h3, .facts-wrap h4, .facts-wrap h5, .facts-wrap h6, .facts-wrap a, .facts-wrap p, .facts-wrap strong {
    font-family: "Montserrat-Regular", sans-serif;
    color: #000;
    margin-top: 0px;
}

.facts-wrap h1 {
    font-size: 52px;
    line-height: 60px;
    font-weight: 600;
    margin-bottom: 5px;
    font-family: "Montserrat-Bold", sans-serif;
}
.amount-per-serving>div:first-child {
    border-top: 0;
    padding-top: 0;
}
.pull-left {
    float: left!important;
}
.pull-right {
    float: right;
}
.facts-wrap .daily-value {
    font-size: 15px;
    border-top: 4px solid #000;
}

.facts-wrap div.sub-amount {
    padding-top: 0px;
    padding-bottom: 0px;
}

.facts-wrap .sub-amount {
    border-top: 0;
    padding-left: 20px;
}


.star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: yellow !important;}

.product_name a:hover{
    color: inherit;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<!------ Include the above in your HEAD tag ---------->




    <!--Start Page Content-->
    <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
         <!--    <div class="overlay"></div> -->
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

                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                               <form action="{{url('/detailaddToCart')}}" method="POST">
                                                    @csrf

                            <h1 style="font-weight: 700;">{{$result[0]->food_name}}</h1>

                            @if(isset($radiobtn_addonsize))
                                <input type="hidden" name="radiobtn_addonsize" value="{{$distinctaddonsize}}">
                            @else
                            <input type="hidden" name="radiobtn_addonsize" value="0">
                            @endif
                            <div class=" product_ratting">

                            </div>

                            <div class="product_meta">
                                <span><strong>Category: </strong><a href="#" style="color: #a84d38; font-weight: 600;">{{$result[0]->food_category_name}}</a></span> &nbsp;&nbsp;&nbsp;
                                <span><strong>Price: </strong><a href="#" style="color: #a84d38; font-weight: 600;">{{$gs->currencySymbol}} {{$result[0]->food_price}}</a></span>
                            </div>

                            <?php
                                $cat=$result[0]->catid;
                               $catpro=DB::select("SELECT * FROM  food_items WHERE food_category_id='$cat' limit 5" );


                            ?>

                            <div class="product_desc">
                                <p>{{$result[0]->food_description}}</p>
                            </div>
                              <div class="product_variant" style="margin-bottom: 30px;">
                              <h5 style="font-weight: 700;">Addons</h5>
                                <!--<label></label>-->
                                <ul>
                                    @if(sizeof($result2)>0)
                                    @if(isset($distinct_addons) && sizeof($distinct_addons) > 0)
                                    @foreach($distinct_addons as $key => $distinct_addon)
                                    @php ++$key @endphp
                                        @foreach($addoncats as $addoncat)
                                            @if($distinct_addon==$addoncat->id)
                                                <h6 style="font-weight:600; color: #a84d38;">{{$addoncat->category_name}}</h6>

                                                @foreach($result2 as $val)
                                                    @if(isset($val->addon_type) && $val->addon_type==1)
                                                        @if($val->addon_category==$distinct_addon)
                                                        <li style="margin-bottom: 5px;">
                                                        <label class="radio-inline"><input type="radio" name="singleaddon{{$key}}" value="{{$val->id}}">{{ucwords($val->addon_name)}}</label>
                                                        <span class="pull pull-right" style="color: #a84d38; font-weight: 600;">{{$gs->currencySymbol}} {{$val->price}}</span> <br>
                                                        </li>

                                                        @endif
                                                    @endif
                                                @endforeach

                                            @endif
                                        @endforeach
                                    @endforeach
                                    @endif

                                    <li style="margin-bottom: 15px;"></li>

                                    @foreach($result2 as $val)




                                    @if(isset($val->addon_type) && $val->addon_type==2)
                                    <li style="margin-bottom: 5px;">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="addon[]" value="{{$val->id}}"> {{ucwords($val->addon_name)}}
                                        </label>
                                        <span class="pull pull-right" style="color: #a84d38; font-weight: 600;">{{$gs->currencySymbol}} {{$val->price}}</span>
                                    </li>
                                    @endif

                                    <!--<li><input type="checkbox" name="addon[]" value="{{$val->id}}"> {{ucwords($val->addon_name)}}<span class="pull pull-right">KD.{{$val->price}}</span></li>-->
                                      <input type="hidden" name="addonsize" value="1">
                                   @endforeach
                                   @else
                                   <input type="hidden" name="addonsize" value="0">
                                   @endif

                                </ul>
                            </div>


                            <div class="product_variant quantity">
                                <label><strong>quantity</strong></label>
                                <input min="1" value="1" type="number" name="qty">

                                <input type="hidden" name="ProductId" value="{{$result[0]->id}}">
                                <button class="button" type="submit">add to cart</button>

                            </div>

                                                   </form>

                        <?php
                        $id=$result[0]->id;
                        $carbo='';
                        $carbov='';
                        $pro='';
                        $prov='';
                        $fats='';
                        $fatsv='';
                        $sugar='';
                        $sugarv='';
                        $iron='';
                        $calcium='';
                        $calciumv='';
                        $ironv='';
                        $g='';
                        $sql=DB::select("SELECT * FROM  compostions WHERE food_id='$id'");
                        foreach ($sql as $value) {
                        ?>



                          <?php if($value->type==1):
                            $carbo=$value->gramvalue;
                            $carbov=$value->dmvalue;

                            ?>

                        <?php elseif($value->type==2):
                            $pro=$value->gramvalue;
                            $prov=$value->dmvalue;
                            ?>

                            <?php elseif($value->type==3):
                            $fats=$value->gramvalue;
                            $fatsv=$value->dmvalue;
                            ?>

                            <?php elseif($value->type==4):
                            $sugar=$value->gramvalue;
                            $sugarv=$value->dmvalue;
                            ?>

                            <?php elseif($value->type==5):
                            $iron=$value->gramvalue;
                            $ironv=$value->dmvalue;
                            ?>

                            <?php elseif($value->type==6):
                            $calcium=$value->gramvalue;
                            $calciumv=$value->dmvalue;
                            ?>
                               <?php endif; ?>


                                           <?php
                                            }
                                            ?>




            <div class="facts-wrap">
                <div class="title-block">
                <h1>Nutrition Facts</h1>{{-- Serving Size 546 g --}}<br>
                </div>
<div class="amount-per-serving">

    <div class=""><span class="pull-left">Calories @php if(isset($result[0]->calories) && $result[0]->calories!=''){echo $result[0]->calories;} else{ echo '0';} @endphp </span>
<div class="text-right daily-value"><b>% Daily Value*</b></div>
<div class=""><span class="pull-left"><b>Fat</b>
    <?php
    echo $fats;
?>
    </span>&nbsp;g
<span class="pull-right"><b><?php echo $fatsv;?>%</b></span></div>
<div class=""><span class="pull-left"><b>Iron </b> <?php echo $iron;?></span>&nbsp;g
<span class="pull-right"><b><?php echo $ironv;?>%</b></span></div>
<div class=""><span class="pull-left"><b>Calcium </b><?php echo $calcium;?> </span>&nbsp;g
<span class="pull-right"><b><?php echo $calciumv;?>%</b></span></div>

<div class=""><span class="pull-left"><b>Carbohydrate </b><?php echo $carbo;?></span>&nbsp;g
<span class="pull-right"><b><?php echo $carbov;?>%</b></span></div>


<div class=""><span class="pull-left"><b> Sugars </b> <?php echo $sugar;?></span>&nbsp;g
<span class="pull-right"><b><?php echo $sugarv;?>%</b></span></div>

<div class="">
    <span class="pull-left"><b>Protein </b><?php echo $pro;?> </span>&nbsp;g
<span class="pull-right"><b><?php echo $prov;?>%</b></span></div>


</div>
</div>

       </div>

                      </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


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

                               <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{{$result[0]->food_description}}</p>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="reviews" role="tabpanel">

                                <div class="reviews_wrapper">
                                        @if (\Session::has('success'))
                                        <div class="alert alert-success">
                                        <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                        </div>
                                        @endif


                                    @if(count($review)>0)

                                  @foreach($review as $val)
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                           <img src="{{asset('assets/user/images/custombilal/comment2.jpg')}}" alt="">
                                        <span><strong>{{$val->name}} {{$val->ul_name}}</strong></span><br>
                                    <span>{{$val->comments}}</span>
                                    @if($val->ratings==1)

                                    <div class="row">
                                            <div class="col-lg-12">
                                            <div class="star-rating">
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
                                        </div>
                                    </div>
                                </div>
                                            @endif


                                      @if($val->ratings==2)

                                    <div class="row">
                                            <div class="col-lg-12">
                                            <div class="star-rating">
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>

                                        </div>
                                    </div>
                                </div>
                                            @endif


                                              @if($val->ratings==3)

                                    <div class="row">
                                            <div class="col-lg-12">
                                            <div class="star-rating">
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>

                                        </div>
                                    </div>
                                </div>
                                            @endif


                                              @if($val->ratings==4)

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="star-rating">
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
                                        </div>
                                    </div>
                                </div>
                                            @endif


                                              @if($val->ratings==5)

                                    <div class="row">
                                            <div class="col-lg-12">
                                            <div class="star-rating">
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>
    <span class="fa fa-star-o" style="margin-left:-5px;color: yellow !important"; data-rating="1"></span>

                                        </div>
                                    </div>
                                </div>
                                            @endif


                                       </div>
                                    </div>

                                    @endforeach
                                     @else
                                    <p style="color:#a84d38">This product has no reviews.<p>
                                <p>Let others know what do you think and be the first to write a review before login</p>
                                @endif







                                  @if (Auth::guard('frontend')->check())

                                    <div class="product_review_form">
                                        <form action="{{url('addreview')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                        <div class="col-12">
                                        <label for="review_comment">Your review </label>
                                        <textarea name="comments" id="review_comment" required></textarea>
                                        </div>
                                        </div>

                                        <input type="hidden" name="user_id" value="{{Auth::guard('frontend')->user()->id}}">

                                        <input type="hidden" name="food_id" value="{{$result[0]->id}}">
                                        <input id="input-1" name="ratings" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" required>
                                        </div>
                                        <button type="submit" class="btn btn-cop" style="color: #fff !important;">Submit</button>

                                    </div>
                                        </form>
                                        @endif







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
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xs-12">

                    <div class="product_carousel product_column5 owl-carousel owl-loaded owl-drag">






                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-1160px, 0px, 0px); transition: all 0s ease 0s; width: 3712px;"><div class="owl-item cloned" style="width: 212px; margin-right: 20px;"><article class="single_product">
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










                </div>





{{--                   start here --}}

                        @foreach($catpro as $key => $cat)
                        @php $key=$key+1; @endphp
                    <div class="owl-item active last" style="width: 212px; @if($key < 5) margin-right: 20px; @endif"><article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{asset('assets/user/images/foods/'.$cat->food_image)}}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="assets/img/product/product17.jpg" alt=""></a>
                                    <div class="label_product">
                                      {{--   <span class="label_sale">Sale</span> --}}
                                    </div>

                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="{{url('productdetail/'.$cat->id)}}"><strong>{{$cat->food_name}}</strong></a></h4>
                                    <!--<p><a href="#">Fruits</a></p>-->
                                    <div class="price_box" style="margin-bottom: 10px;">
                                        <span class="current_price">{{$gs->currencySymbol}} {{$cat->food_price}}</span>
                                    </div>

                                      <form action="{{url('/cart-add')}}" method="POST">
                                                    @csrf
                                                  <input type="hidden" name="ProductId" value="{{$cat->id}}">
                                                  <input type="hidden" name="image" value="{{$cat->food_image}}">
                                                  <input type="hidden" name="qty" value="1">
                                                   <button class="btn btn-cop" style="color:white;">Add to cart</button>

                                                    </form>
                                                    <br>



                                </figcaption>
                            </figure>
                        </article></div>

                        @endforeach


                </div>
            </div>


                </div>


                </div>



            </div>
        </div>
    </section>




        </div>






    <!--End Page Content-->

{{-- <script type="text/javascript">
    var $star_rating = $('.star-rating .fa');


var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});

function Reviews()
{
   var star=$(this).attr('')
}

</script> --}}

<script>
$("#input-id").rating();
</script>
@endsection
