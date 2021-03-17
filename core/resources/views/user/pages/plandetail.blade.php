@extends('user.master')
@section('title',$gs->websiteTitle.' | Plans')

<style type="text/css">
    @font-face {
        font-family: rockstaralt-regular;
        src: url('assets/user/fonts/rockstaralt-regular.otf');
    }

    @font-face {
        font-family: Choplin Medium;
        src: url('assets/user/fonts/Choplin Medium.otf');
    }

    .font-2 {
        font-family: rockstaralt-regular;

    }

    .text-upper {
        font-family: Choplin Medium !important;
        font-size: 20 !important
    }
</style>

@section('content')
    <style type="text/css">
        .widget > :last-child {
            margin-bottom: 0;
        }

        @media (min-width: 768px)
            .banner {
                z-index: 1;
                position: relative;
            }

            .banner {
                overflow: hidden;
            }

            .banner-image {
                height: 406px;
                overflow: hidden;
            }

            .banner {
                overflow: hidden;
            }

            figure {
                margin: 0;
            }

            img {
                -ms-interpolation-mode: bicubic;
                border: 0;
                height: auto;
                max-width: 100%;
                vertical-align: middle;
            }

            .banner-text {
                position: absolute;
                top: 32%;
                width: 100%;
            }

            .text-center {
                text-align: center;
            }

            .banner-text h1 {
                margin-top: 0px;
            }

            .banner-text h1 {
                color: #000;
                line-height: 56px;
                letter-spacing: 0.05em;
                font-size: 38px;
                font-family: 'Montserrat-Regular', sans-serif;
            }

            strong {
                font-size: 46px;
            }

            .txcolor {
                color: #a84d38;
            }

            b, strong {
                font-weight: 700;
                color: #484848;
                font-family: "Montserrat-Regular", sans-serif;
                letter-spacing: 0.1em;
            }

            #pg-3573-0, #pl-3573 .so-panel {
                margin-bottom: 30px;
            }

            .panel-grid-cell .so-panel {
                zoom: 1;
            }

            .widget {
                color: #707070;
                color: rgba(51, 51, 51, 0.7);
                margin: 0 auto 9.09090%;
                width: 100%;
                /* word-wrap: break-word; */
            }

            .widget > :last-child {
                margin-bottom: 0;
            }

            .weight-loss-block {
                padding-bottom: 0;
            }

            .block, .download-app-block {
                background-color: #fff;
            }

            .block {
                padding: 90px 0;
            }

            section {
                position: relative;
                z-index: 11;
            }

            article, aside, details, figcaption, figure, hgroup, menu, nav, section {
                display: block;
            }

            .text-center.img-text-center {
                margin-bottom: 60px;
            }

            .text-center {
                text-align: center;
            }

            .img-text-center figure {
                width: 41px;
                height: 41px;
                margin: 0 auto 18px;
            }

            .text-center figure {
                margin-left: auto;
                margin-right: auto;
            }

            .weight-loss-block h3 {
                font-size: 26px;
                margin-top: 0px;
            }

            .weight-loss-block h3:after {
                position: absolute;
                bottom: 0;
                width: 88px;
                height: 1px;
                background: #878787;
                content: '';
                left: 0;
                right: 0;
                margin: auto;
            }

            .weight-loss-block ul li {
                margin-bottom: 22px;
            }

            .weight-loss-block ul {
                width: 64%;
                margin: 0 auto -22px;
                line-height: 29px;
            }

            .weight-loss-block ul li {
                display: inline-block;
                width: 49%;
                font-size: 15px;
                background: url('../assets/user/images/bilal/check.jpg') no-repeat left;
                padding-left: 45px;
                margin-bottom: 10px;
            }

            .weight-loss-block h3 {
                font-size: 26px;
                color: #000;
                font-family: 'Montserrat-Light', sans-serif;
                position: relative;
                padding-bottom: 30px;
                margin-bottom: 35px;
            }

            .page-content-body p, .page-content-body ul, .page-content-body ol, .page-content-body dl {
                font-size: 14px;
            }

            .img-text-center p {
                width: 70%;
                margin: auto;
            }

            .block, .download-app-block {
                background-color: #fff;
            }

            .block {
                padding: 90px 0;
            }

            .top-description {
                width: 90%;
                margin: auto;
            }

            .fadeInUp {
                -webkit-animation-name: fadeInUp;
                animation-name: fadeInUp;
            }

            .sample-menu-block h3 {
                margin-top: 0px;
                font-size: 25px;
            }

            .sample-menu-block .top-description > p {
                width: 67%;
                margin: 0 auto 45px;
            }

            .page-content-body p, .page-content-body ul, .page-content-body ol, .page-content-body dl {
                font-size: 14px;
            }

            .top-description > p {
                width: 79%;
                margin: 0 auto 85px;
            }

            .menu-item-wrap {
                word-wrap: break-word;
            }

            .text-center {
                text-align: center;
            }

            .menu-item-wrap figure {
                height: 265px;
                overflow: hidden;
                margin-bottom: 23px;
            }

            .text-center figure {
                margin-left: auto;
                margin-right: auto;
            }

            a:link {
                -webkit-tap-highlight-color: transparent;
            }

            .menu-listing h4 {
                margin: 0px;
            }

            .menu-listing span {
                font-size: 14px;
                margin-top: 4px;
            }

            .menu-item-wrap > span {
                color: #575757;
                line-height: 22px;
                display: inline-block;
            }

            .menu-item-wrap {
                word-wrap: break-word;
            }

            .text-center {
                text-align: center;
            }

            .block.select-menu-block {
                padding-top: 0;
            }

            .block, .download-app-block {
                background-color: #fff;
            }

            .block {
                padding: 90px 0;
            }

            .food-tab {
                background: #fafafa;
                margin-bottom: 34px;
            }

            ul.nav.nav-tabs {
                border-bottom: 0;
            }

            .food-image figure {
                margin-bottom: 0;
                position: relative;
                padding-left: 22px;
                height: 133px;
                overflow: hidden;
            }

            .txcolors {
                color: #f7ca18;
            }

            .nav-tabs > li > a {
                text-transform: uppercase;
                padding: 30px 44px;
                font-size: 24px;
                font-family: 'Montserrat-Light', sans-serif;
                color: #cecece;
                position: relative;
                border: 0;
            }

            .nav-tabs > li {
                float: left;
                margin-bottom: -1px;
            }

            .nav > li {
                position: relative;
                display: block;
            }

            .nav > li > a:hover, .nav > li > a:focus {
                border: 0;
                background: transparent;
                color: #60ba62;
                outline: none;
            }

            .nav > li > a:hover, .nav > li > a:focus, .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
                color: #a84d38;
            }

            .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
                background-color: transparent;
                border: 0;
            }

            .nav-tabs > li {
                float: left;
                margin-bottom: -1px;
            }

            .nav > li {
                position: relative;
                display: block;
            }

            .food-listing-row {
                margin-bottom: 36px;
                padding-bottom: 36px;
                border-bottom: 1px solid #fafafa;
            }

            .food-image {
                width: 18.3%;
                margin-right: 4.55%;
            }

            a:link {
                -webkit-tap-highlight-color: transparent;
            }

            .food-listing-row > div {
                display: inline-block;
                vertical-align: middle;
            }

            .food-image {
                width: 18.3%;
                margin-right: 4.55%;
            }

            .food-listing-row > div {
                display: inline-block;
                vertical-align: middle;
            }

            .food-type {
                width: 12%;
                margin-right: 2%;
            }

            .food-type h5 {
                margin: 0;
            }

            .food-type h5 {
                margin-bottom: 0;
                text-transform: capitalize;
                font-family: 'Montserrat-Light', sans-serif;
                letter-spacing: 0.1em;
            }

            .food-listing-row > div {
                display: inline-block;
                vertical-align: middle;
            }

            .food-ingredients {
                font-size: 15px;
                font-family: 'Montserrat-Light', sans-serif;
                line-height: 23px;
                width: 40%;
                margin-right: 3%;
            }

            .food-category {
                width: 19%;
                text-align: right;
            }

            .food-category .ftag {
                border: 1px solid #ddd;
                font-size: 11px;
                padding: 7px 20px;
                font-family: 'Montserrat-Light', sans-serif;
                background: #fff;
                color: #848484;
                border-radius: 0;
                padding: 7px 20px;
            }

            .food-category .ftag:hover {
                border-width: 1px;
                border-style: solid;
            }

            a:link {
                -webkit-tap-highlight-color: transparent;
            }

            .food-listing-row {
                margin-bottom: 36px;
                padding-bottom: 36px;
                border-bottom: 1px solid #fafafa;
            }

            #panel-3573-0-0-4 > .panel-widget-style {
                padding: 0px 0px 100px 0px;
            }

            .ow-button-base.ow-button-align-center {
                text-align: center;
            }

            .so-widget-sow-button-flat-888dd0636ead .ow-button-base {
                zoom: 1;
            }

            .ow-button-base {
                zoom: 1;
            }

            .so-widget-sow-button-flat-888dd0636ead .ow-button-base a:visited, .so-widget-sow-button-flat-888dd0636ead .ow-button-base a:active, .so-widget-sow-button-flat-888dd0636ead .ow-button-base a:hover {
                color: #ffffff !important;
            }

            .so-widget-sow-button-flat-888dd0636ead .ow-button-base a {
                -ms-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                width: 400px;
                max-width: 100%;
                font-size: 1.45em;
                padding: 1.4em 2.8em;
                background: #60ba62;
                color: #ffffff !important;
                border: 1px solid #60ba62;
                border-width: 1px 0;
                -webkit-border-radius: 0.25em;
                -moz-border-radius: 0.25em;
                border-radius: 0.25em;
                text-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
            }

            .ow-button-base a {
                text-align: center;
                display: inline-block;
                cursor: pointer;
                text-decoration: none;
                line-height: 1em;
            }

            .ow-button-base a.ow-icon-placement-left .sow-icon-image, .ow-button-base a.ow-icon-placement-left [class^="sow-icon-"] {
                margin: -0.1em .75em -0.2em -0.75em;
                float: left;
            }

            .ow-button-base a .sow-icon-image, .ow-button-base a [class^="sow-icon-"] {
                font-size: 1.3em;
                height: 1em;
                width: auto;
                margin: -0.1em .75em -0.2em -0.75em;
                display: block;
                float: left;
            }

            .sow-icon-typicons {
                font-family: 'sow-typicons';
                display: inline-block;
                speak: none;
                font-style: normal;
                font-weight: normal;
                font-variant: normal;
                text-transform: none;
                line-height: 1;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            #pl-3573 .so-panel:last-child {
                margin-bottom: 0px;
            }

            .menu-single-block {
                padding: 65px 0 80px;
            }

            .block, .download-app-block {
                background-color: #fff;
            }

            .menu-listing h4 a {
                font-size: 22px;
            }

            .menu-item-wrap h4 a {
                font-family: "Montserrat-Light", sans-serif;
            }

            .block {
                padding: 90px 0;
            }

            .menu-single-left {
                color: #575757;
            }

            .menu-single-block article {
                line-height: 29px;
                font-size: 15px;
                padding-bottom: 30px;
            }

            article, aside, details, figcaption, figure, hgroup, menu, nav, section {
                display: block;
            }

            .ingredients h5 {
                font-size: 20px;
                margin: 0 0 5px 0;
            }

            .ingredients ul {
                list-style: none;
                margin: 0;
                line-height: 29px;
            }

            .ingredients ul li {
                font-size: 18px;
                position: relative;
                padding-left: 15px;
            }

            .ingredients ul li:before {
                position: absolute;
                content: '-';
                width: 2px;
                height: 1px;
                left: 0;
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

            .facts-wrap h1 {
                font-size: 52px;
                line-height: 60px;
                font-weight: 600;
                margin-bottom: 5px;
                font-family: "Montserrat-Bold", sans-serif;
            }

            .facts-wrap div {
                width: 100%;
                float: left;
                padding: 5px 0;
                border-top: 1px solid #000;
            }

            .amount-per-serving {
                border-top: 0;
                border-bottom: 14px solid #000;
            }

            .amount-per-serving > div:first-child {
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

            .pull-left {
                float: left;
            }

            .pull-left {
                float: left !important;
            }

            .facts-wrap .daily-value {
                font-size: 15px;
                border-top: 4px solid #000;
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

            .facts-wrap div.sub-amount {
                padding-top: 0px;
                padding-bottom: 0px;
            }

            .facts-wrap .sub-amount {
                border-top: 0;
                padding-left: 20px;
            }

            .facts-wrap div {
                width: 100%;
                float: left;
                padding: 5px 0;
                border-top: 1px solid #000;
            }

            .vitamin > div:first-child {
                border-top: 0;
                padding-top: 0;
            }

            .facts-wrap div {
                width: 100%;
                float: left;
                padding: 5px 0;
                border-top: 1px solid #000;
            }

            .facts-wrap .hints {
                font-size: 11px;
                line-height: 18px;
                letter-spacing: 0.5px;
                border-top: 0;
                padding: 12px 0;
            }

            .facts-wrap div {
                width: 100%;
                float: left;
                padding: 5px 0;
                border-top: 1px solid #000;
            }

            .facts-wrap .calorie-table {
                border-top: 0;
            }

            .facts-wrap div {
                width: 100%;
                float: left;
                padding: 5px 0;
                border-top: 1px solid #000;
            }

            .calorie-table table {
                table-layout: auto;
                box-sizing: border-box;
                display: table;
                font-size: 11px;
                width: 100%;
                letter-spacing: 0.5px;
                border-width: 0px;
                border-style: none;
                margin-bottom: 0px;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
            }

            .calorie-table table tr th {
                font-weight: 400;
                border-bottom: 1px solid #000;
            }

            .calorie-table table tr td, .calorie-table table tr th {
                padding: 0px;
                border-width: 0px;
                border-style: none;
                line-height: 22px;
            }

            @media only screen and (min-width: 360px) and (max-width: 479px) {
                .food-type h5 {
                    margin-top: -50px;
                    margin-left: 50px;
                    text-align: center;
                }

                .food-image {
                    margin-top: 50px;

                }

                .food-listing-row {
                    margin-bottom: -100px;
                }

            }


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
                                <li class="active">Plan</li>
                                <li class="active">Detail</li>
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

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="page-heading text-center">
                            <h3 class="section-title-heading color-main">Food Plan</h3>
                            <h2 class="section-title-subtitle">{{$planname}}</h2>
                            <p style="margin-top: 10px; font-size: 14px;">{{$plandescription}}</p>
                        </div>
                    </div>
                </div>


<section class="block menu-single-block">
<div class="container">
<div class="row">


<div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-3">


<!-- =============== menu single block starts ================== -->
<div class="facts-wrap">
<div class="title-block">
<h1>Nutrition Facts</h1>
<!--Serving Size 546 g<br>Serving Per Container 2        -->
</div>
<div class="amount-per-serving">
<!--<div class="">Amount Per Serving</div>-->
<div class=""><span class="pull-left">Calories @if(isset($plan_calories) && $plan_calories!='') {{$plan_calories}} @else
                    0 @endif</span>
</div>
 <div class=""><span class="pull-left"><b>Typical Compositions</b></span>
                <span class="pull-right"><b>% Daily Value</b></span></div>
        @if(sizeof($plancompose) > 0)
                @foreach($plancompose as $plancompostion)

                    <div class=""><span class="pull-left"><b>
                    @if($plancompostion->nutrition == 1)
                    Carbohydrates
                    @elseif($plancompostion->nutrition == 2)
                    Proteins
                    @elseif($plancompostion->nutrition == 3)
                    Fats
                    @elseif($plancompostion->nutrition == 4)
                    Sugar
                    @elseif($plancompostion->nutrition == 5)
                    Iron
                    @elseif($plancompostion->nutrition == 6)
                    Calcium
                    @endif
                    </b>
                    {{$plancompostion->gramvalue}}
                    @if($plancompostion->unit == 1) Mg
                    @elseif($plancompostion->unit == 2) g
                    @endif
                    </span>
                    <span
                    class="pull-right"><b>{{$plancompostion->dmvalue}}%</b></span>
                    </div>

                    @endforeach

@endif
</div>
<div class="hints">
<span class="">Your daily value may be higher or lower depending on your calorie needs.</span>
</div>
</div>


</div>
</div>


<!-- =============== menu single block ends ================== -->


</section>


<div class="page-content-body">
<div id="pl-3573" class="panel-layout">
<div id="pg-3573-0" class="panel-grid panel-no-style">
<div id="pgc-3573-0-0" class="panel-grid-cell">
<div id="panel-3573-0-0-0"
class="so-panel widget widget_madang_banner_widget panel-first-child"
data-index="0">
<div
class="so-widget-madang_banner_widget so-widget-madang_banner_widget-default-d75171398898">


</div>
</div>

<div id="panel-3573-0-0-2" class="so-panel widget widget_madang_samplemenu_widget"
data-index="2">
<div
class="so-widget-madang_samplemenu_widget so-widget-madang_samplemenu_widget-default-d75171398898">


</div>
</div>
<div id="panel-3573-0-0-3" class="so-panel widget widget_madang_mealplan_widget"
data-index="3">
<div
class="so-widget-madang_mealplan_widget so-widget-madang_mealplan_widget-default-d75171398898">
<section class=" weight-gain-program program-box block select-menu-block">
<!-- == menu tab part starts == -->
<div class="food-tab wow fadeInUp animated"
style="visibility: visible; animation-name: fadeInUp;">
<div class="container">
<ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#monday"
role="tab"
data-toggle="tab"
class="txhcolor brhcolor">Mon</a>
</li>
<li role="presentation"><a href="#thuesday" role="tab"
data-toggle="tab"
class="txhcolor brhcolor">Tue</a>
</li>
<li role="presentation"><a href="#wednesday" role="tab"
data-toggle="tab"
class="txhcolor brhcolor">Wed</a>
</li>
<li role="presentation"><a href="#thursday" role="tab"
data-toggle="tab"
class="txhcolor brhcolor">Thu</a>
</li>
<li role="presentation"><a href="#friday" role="tab"
data-toggle="tab"
class="txhcolor brhcolor">Fri</a>
</li>
<li role="presentation"><a href="#saturday" role="tab"
data-toggle="tab"
class="txhcolor brhcolor">Sat</a>
</li>
<li role="presentation"><a href="#sunday" role="tab"
data-toggle="tab"
class="txhcolor brhcolor">Sun</a>
</li>
</ul>
</div>
</div>
<!-- == menu tab part ends == -->
<!-- == Tab description starts == -->
<div class="tab-description">
<div class="container">
<div class="tab-content">

<div role="tabpanel" class="tab-pane fade in active "
id="monday">

<div class="food-listing-group">
@foreach($plandetails as $plandetail)
@if($plandetail->day_id==2)
<div class="food-listing-row ">
<div class="food-image">
<a data-toggle="lightbox"
class="lightbox" href="#">
<figure>
<img width="192" height="132"
src="{{asset('assets/user/images/foods/'.$plandetail->food_image)}}"
class="img-responsive"
alt=""
sizes="(max-width: 192px) 100vw, 192px">
</figure>
</a>
</div>
<div class="food-type">
<h5><a class="lightbox txcolor"
href="#">
@if($plandetail->food_type_id==1)
BreakFast
@elseif($plandetail->food_type_id==2)
Lunch
@elseif($plandetail->food_type_id==3)
Snacks
@elseif($plandetail->food_type_id==4)
Dinner
@endif
</a></h5>
</div>
<div
class="food-ingredients">{{$plandetail->food_name}}</div>
</div>
@endif
@endforeach


</div>
</div>

<div role="tabpanel" class="tab-pane fade in " id="thuesday">

<div class="food-listing-group">
@foreach($plandetails as $plandetail)
@if($plandetail->day_id==3)
<div class="food-listing-row ">
<div class="food-image">
<a data-toggle="lightbox"
class="lightbox" href="#">
<figure>
<img width="192" height="132"
src="{{asset('assets/user/images/foods/'.$plandetail->food_image)}}"
class="img-responsive"
alt=""
sizes="(max-width: 192px) 100vw, 192px">
</figure>
</a>
</div>
<div class="food-type">
<h5><a class="lightbox txcolor"
href="#">
@if($plandetail->food_type_id==1)
BreakFast
@elseif($plandetail->food_type_id==2)
Lunch
@elseif($plandetail->food_type_id==3)
Snacks
@elseif($plandetail->food_type_id==4)
Dinner
@endif
</a></h5>
</div>
<div
class="food-ingredients">{{$plandetail->food_name}}</div>
</div>
@endif
@endforeach


</div>
</div>


<div role="tabpanel" class="tab-pane fade in " id="wednesday">
<div class="food-listing-group">
@foreach($plandetails as $plandetail)
@if($plandetail->day_id==4)
<div class="food-listing-row ">
<div class="food-image">
<a data-toggle="lightbox"
class="lightbox" href="#">
<figure>
<img width="192" height="132"
src="{{asset('assets/user/images/foods/'.$plandetail->food_image)}}"
class="img-responsive"
alt=""
sizes="(max-width: 192px) 100vw, 192px">
</figure>
</a>
</div>
<div class="food-type">
<h5><a class="lightbox txcolor"
href="#">
@if($plandetail->food_type_id==1)
BreakFast
@elseif($plandetail->food_type_id==2)
Lunch
@elseif($plandetail->food_type_id==3)
Snacks
@elseif($plandetail->food_type_id==4)
Dinner
@endif
</a></h5>
</div>
<div
class="food-ingredients">{{$plandetail->food_name}}</div>
</div>
@endif
@endforeach


</div>
</div>


<div role="tabpanel" class="tab-pane fade in " id="thursday">
<div class="food-listing-group">
@foreach($plandetails as $plandetail)
@if($plandetail->day_id==5)
<div class="food-listing-row ">
<div class="food-image">
<a data-toggle="lightbox"
class="lightbox" href="#">
<figure>
<img width="192" height="132"
src="{{asset('assets/user/images/foods/'.$plandetail->food_image)}}"
class="img-responsive"
alt=""
sizes="(max-width: 192px) 100vw, 192px">
</figure>
</a>
</div>
<div class="food-type">
<h5><a class="lightbox txcolor"
href="#">
@if($plandetail->food_type_id==1)
BreakFast
@elseif($plandetail->food_type_id==2)
Lunch
@elseif($plandetail->food_type_id==3)
Snacks
@elseif($plandetail->food_type_id==4)
Dinner
@endif
</a></h5>
</div>
<div
class="food-ingredients">{{$plandetail->food_name}}</div>
</div>
@endif
@endforeach


</div>
</div>


<div role="tabpanel" class="tab-pane fade in " id="friday">
<div class="food-listing-group">
@foreach($plandetails as $plandetail)
@if($plandetail->day_id==6)
<div class="food-listing-row ">
<div class="food-image">
<a data-toggle="lightbox"
class="lightbox" href="#">
<figure>
<img width="192" height="132"
src="{{asset('assets/user/images/foods/'.$plandetail->food_image)}}"
class="img-responsive"
alt=""
sizes="(max-width: 192px) 100vw, 192px">
</figure>
</a>
</div>
<div class="food-type">
<h5><a class="lightbox txcolor"
href="#">
@if($plandetail->food_type_id==1)
BreakFast
@elseif($plandetail->food_type_id==2)
Lunch
@elseif($plandetail->food_type_id==3)
Snacks
@elseif($plandetail->food_type_id==4)
Dinner
@endif
</a></h5>
</div>
<div
class="food-ingredients">{{$plandetail->food_name}}</div>
</div>
@endif
@endforeach


</div>
</div>


<div role="tabpanel" class="tab-pane fade in " id="saturday">
<div class="food-listing-group">
@foreach($plandetails as $plandetail)
@if($plandetail->day_id==7)
<div class="food-listing-row ">
<div class="food-image">
<a data-toggle="lightbox"
class="lightbox" href="#">
<figure>
<img width="192" height="132"
src="{{asset('assets/user/images/foods/'.$plandetail->food_image)}}"
class="img-responsive"
alt=""
sizes="(max-width: 192px) 100vw, 192px">
</figure>
</a>
</div>
<div class="food-type">
<h5><a class="lightbox txcolor"
href="#">
@if($plandetail->food_type_id==1)
BreakFast
@elseif($plandetail->food_type_id==2)
Lunch
@elseif($plandetail->food_type_id==3)
Snacks
@elseif($plandetail->food_type_id==4)
Dinner
@endif
</a></h5>
</div>
<div
class="food-ingredients">{{$plandetail->food_name}}</div>
</div>
@endif
@endforeach


</div>
</div>


<div role="tabpanel" class="tab-pane fade in " id="sunday">
<div class="food-listing-group">
@foreach($plandetails as $plandetail)
@if($plandetail->day_id==1)
<div class="food-listing-row ">
<div class="food-image">
<a data-toggle="lightbox"
class="lightbox" href="#">
<figure>
<img width="192" height="132"
src="{{asset('assets/user/images/foods/'.$plandetail->food_image)}}"
class="img-responsive"
alt=""
sizes="(max-width: 192px) 100vw, 192px">
</figure>
</a>
</div>
<div class="food-type">
<h5><a class="lightbox txcolor"
href="#">
@if($plandetail->food_type_id==1)
BreakFast
@elseif($plandetail->food_type_id==2)
Lunch
@elseif($plandetail->food_type_id==3)
Snacks
@elseif($plandetail->food_type_id==4)
Dinner
@endif
</a></h5>
</div>
<div
class="food-ingredients">{{$plandetail->food_name}}</div>
</div>
@endif
@endforeach


</div>
</div>


</div>
</div>
</div>
<!-- == Tab description ends == -->
</section>
<!-- ============== select menu block starts ============== -->

</div>
</div>
<div id="panel-3573-0-0-4" class="so-panel widget widget_sow-button panel-last-child"
data-index="4">
<div class="panel-widget-style panel-widget-style-for-3573-0-0-4">
<div class="so-widget-sow-button so-widget-sow-button-flat-888dd0636ead">

<div class="ow-button-base ow-button-align-center">
<form action="{{ route('user.orderplan') }}" method="POST">
@csrf
<div class="col-md-4"></div>
<div class="col-md-4">
<input type="hidden" name="plan_id" value="{{$planid}}">
<div class="gallery-button text-center">
<button type="submit"
class="btn btn-success btn-block btn-lg"
style="height: 60px; background-color: #a84d38 !important; color:#fff !important; border-color: #a84d38 1important;">
Order This Plan
</button>
</div>
</div>
<div class="col-md-4"></div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="pg-3573-1" class="panel-grid panel-no-style">
<div id="pgc-3573-1-0" class="panel-grid-cell">
<div id="panel-3573-1-0-0"
class="so-panel widget widget_madang_nutrition_widget panel-first-child panel-last-child"
data-index="5">
<div
class="so-widget-madang_nutrition_widget so-widget-madang_nutrition_widget-default-d75171398898">
<!-- =============== menu single block ends ================== --></div>
</div>
</div>
</div>
</div>
</div>


</div>
<!--End Container-->
</div>
<!--End Gallery Wrap-->


</section>
<!--End Page Content-->


@endsection
