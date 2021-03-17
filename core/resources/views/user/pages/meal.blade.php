@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')

@section('content')
    <style type="text/css">

        @media screen and (max-width: 768px) {
            table.tt_timetable {
                /*margin: 0px -20px !important;*/
            }

            #meals_search_input {
                padding-bottom: 15px;
            }

            #meals_categories {

            }

            #meals_categories .btn {
                padding: 6px 8px;
            }

            tbody, thead {
                float: left;
            }

            tbody, tr {
                float: left
            }


            tbody {
            }

            td, th {
                display: block
            }

            table.tt_timetable tbody > tr > th {
            }
            table.tt_timetable thead > tr > th {

            }

            table.tt_timetable th {
                width: 100% !important;
                padding: 90px 5px !important;
            }

            table.tt_timetable .event {
                height: 180px !important;
                width: 139px !important
            }
        }
        @media screen and (max-width: 690px) {
            table.tt_timetable th {
                padding: 85px 4px !important;
            }
            table.tt_timetable .event {
                height: 170px !important;
                width: 130px !important;
            }
        }
        @media screen and (max-width: 650px) {
            table.tt_timetable th {
                padding: 75px 5px !important;
            }
            table.tt_timetable .event {
                height: 150px !important;
                width: 120px !important;
            }
        }
        @media screen and (max-width: 612px) {
            table.tt_timetable th {
                padding: 67px 5px !important;
            }
            table.tt_timetable .event {
                height: 134px !important;
                width: 110px !important;
            }
        }
        @media screen and (max-width: 575px) {
            table.tt_timetable th {
                font-size: 10px;
                padding: 59px 5px !important;
            }
            table.tt_timetable .event {
                height: 118px !important;
                width: 94px !important;
            }
        }
        @media screen and (max-width: 485px) {
            table.tt_timetable th {
                font-size: 10px;
                padding: 50px 5px !important;
            }
            table.tt_timetable .event {
                height: 100px !important;
                width: 79px !important;
            }
        }
        @media screen and (max-width: 425px) {
            table.tt_timetable th {
                font-size: 10px;
                padding: 50px 5px !important;
            }
            table.tt_timetable .event {
                height: 100px !important;
                width: 73px !important;
            }
        }
        @media screen and (max-width: 400px) {
            table.tt_timetable th {
                font-size: 10px;
                padding: 45px 5px !important;
            }
            table.tt_timetable .event {
                height: 90px !important;
                width: 65px !important;
            }
        }
        @media screen and (max-width: 375px) {
            table.tt_timetable th {
                font-size: 10px;
                padding: 44px 5px !important;
            }
            table.tt_timetable .event {
                height: 88px !important;
                width: 63px !important;
            }
            table.tt_timetable .event  p{
                font-size: 10px;
            }
        }
        @media screen and (max-width: 360px) {
            table.tt_timetable th {
                padding: 38px 2px !important;
                font-size: 10px;
            }
            table.tt_timetable .event {
                height: 76px !important;
                width: 54px !important;
            }
        }
        @media screen and (max-width: 320px) {
            table.tt_timetable th {
                padding: 30px 0px !important;
                font-size: 6px;
            }
            table.tt_timetable .event {
                height: 60px !important;
                width: 40px !important;
            }
            table.tt_timetable .event  p{
                font-size: 5px;
            }
        }
        @media screen and (max-width: 240px) {
            table.tt_timetable th {
                padding: 40px 5px !important;
                font-size: 10px;
            }
            table.tt_timetable .event {
                height: 88px !important;
                width: 54px !important;
            }
        }

        table.tt_timetable {
            width: 100%;

            border: none;
            border-collapse: separate;
            border-spacing: 1px;
        }

        table.tt_timetable .meal-title {
            height: 50px;
        }

        table.tt_timetable thead tr:first-child th {
            border-top-width: 0;
            border-top-style: solid;
        }


        table.tt_timetable th {
            width: 200px;
            height: 50px;
        }

        table th {
            background-color: #a84d38 !important;
            color: #ffffff;
        }


        table.tt_timetable th, table.tt_timetable td.tt_hours_column {
            text-align: center;
            vertical-align: middle;
        }

        table.tt_timetable td.tt_hours_column {
            padding: 0 5px;
        }

        table.tt_timetable .event {
            position: relative;
            border-width: 1px;
            border-style: solid;
            height: 100px;
            text-align: center;
            padding: 0;
            vertical-align: middle;
        }


        a, button, input {
            outline: medium none;
            color: #242424;
        }


        .pb-20 {
            padding-bottom: 20px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        .product-img {
            background-color: #dedede;
            height: 243px;
            width: 243px;
            overflow: hidden;
            position: relative;
        }

        .product-action {
            bottom: -30px;
            display: flex;
            justify-content: space-between;
            left: 0;
            padding: 0 20px;
            position: absolute;
            right: 0;
            width: 100%;
            opacity: 0;
            visibility: hidden;
            transition: all .3s ease 0s;
        }

        .product-content {
            text-align: center;
            padding: 5px 0 0;
        }

        .product-content > a {
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 8px;
        }

        .product-price-wrapper {
            padding: 5px;
        }

        .product-price-wrapper > p {
            font-weight: 700;
            font-size: 18px
        }

        .product-grid .product-list-details {
            display: none;
        }

        .product-list-details > h4 {
            font-size: 14px;
            font-weight: 500;
            margin: 0;
        }

        .product-list-details > h4 a {
            color: #2f333a;
        }

        .product-list-details .product-price-wrapper {
            margin: 10px 0 15px;
        }

        .product-img img {
            width: 100%;
        }

        .btn-cop {
            background-color: #a84d38 !important;
            color: #ffffff;
        }

        .btn-cop:hover {
            color: #fff !important;
            border-color: #a84d38 !important;
        }

        .gallery-button button{
            background-color: transparent !important;
            color: #a84d38 !important;
        }
        .gallery-button button.active, .gallery-button button:hover{
            color: #fff !important;
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
                            <h2 class="section-title-subtitle">Make Your Own Meal</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">Add Meal</li>
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
                            <h3 class="section-title-heading color-main">Make Your Own Meal</h3>
                        </div>
                    </div>
                </div>

                <!--End Heading-->

                <form action="{{route('user.handlemealcart')}}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="form-group text-center">
                                <label for="exampleFormControlSelect1">Meal Plan Days</label>
                                <select class="form-control num_meal_days" name="meal_days" id="meal_days" required>
                                    <option @if(session('ml_weekno') && session('ml_weekno')==7) value="7" selected
                                            @else value="7" @endif>7 Days
                                    </option>
                                    <option @if(session('ml_weekno') && session('ml_weekno')==14) value="14" selected
                                            @else value="14" @endif>14 Days
                                    </option>
                                    <option @if(session('ml_weekno') && session('ml_weekno')==21) value="21" selected
                                            @else value="21" @endif>21 Days
                                    </option>
                                    <option @if(session('ml_weekno') && session('ml_weekno')==28) value="28" selected
                                            @else value="28" @endif>28 Days
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">

                            <div class="col-md-12">
                                @if ($message = Session::get('error_meal'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--    Weeks Buttons                 --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="gallery-button text-center">
                                <div class="button-group filter-button-group">
                                    {{-- <button type="button" data-filter="*" class="active" style="display: none;">All Week</button> --}}
                                    <button type="button" class="active hide_weekone" data-filter=".firstweek">1st Week
                                    </button>
                                    <button type="button" class="hide_weektwo" data-filter=".scndweek">2nd Week</button>
                                    <button type="button" class="hide_weekthree" data-filter=".thirdweek">3rd Week
                                    </button>
                                    <button type="button" class="hide_weekfour" data-filter=".forthweek">4th Week
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Meal Weeks Table --}}
                    <div class="gallery-list">
                        <div class="row">
                            <div class="col-sm-12 gallery-grid firstweek">
                                <table class="tt_timetable">
                                    <thead>
                                    <tr class="row_gray">
                                        <th>Food Type</th>
                                        <th scope="col">Monday</th>
                                        <th scope="col">Tuesday</th>
                                        <th scope="col">Wednesday</th>
                                        <th scope="col">Thursday</th>
                                        <th scope="col">Friday</th>
                                        <th scope="col">Saturday</th>
                                        <th scope="col">Sunday</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="row_1">
                                        <th class="" scope="row">BreakFast</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="1" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="2" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="3" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="4" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="5" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="6" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="7" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_2">
                                        <th class="tt_hours_column" scope="row">Lunch</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="1" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="2" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="3" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="4" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="5" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="6" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="7" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_3">
                                        <th class="tt_hours_column">Snacks</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="1" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="2" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="3" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="4" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="5" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="6" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="7" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_4">
                                        <th class="tt_hours_column" scope="row">Dinner</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="1" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="2" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="3" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="4" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="5" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="6" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="1" hafta-id="1" day-id="7" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==1)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{--    2nd Table   --}}
                            <div class="col-sm-12 gallery-grid scndweek">
                                <table class="tt_timetable">
                                    <thead>
                                    <tr class="row_gray">
                                        <th>Food Type</th>
                                        <th scope="col">Monday</th>
                                        <th scope="col">Tuesday</th>
                                        <th scope="col">Wednesday</th>
                                        <th scope="col">Thursday</th>
                                        <th scope="col">Friday</th>
                                        <th scope="col">Saturday</th>
                                        <th scope="col">Sunday</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="row_1">
                                        <th class="" scope="row">BreakFast</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="1" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="2" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="3" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="4" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="5" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="6" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="7" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_2">
                                        <th class="tt_hours_column" scope="row">Lunch</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="1" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="2" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="3" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="4" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="5" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="6" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="7" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_3">
                                        <th class="tt_hours_column">Snacks</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="1" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="2" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="3" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="4" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="5" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="6" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="7" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_4">
                                        <th class="tt_hours_column" scope="row">Dinner</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="1" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="2" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="3" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="4" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="5" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="6" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="2" hafta-id="2" day-id="7" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==2)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{--    3rd Table   --}}
                            <div class="col-sm-12 gallery-grid thirdweek">
                                <table class="tt_timetable">
                                    <thead>
                                    <tr class="row_gray">
                                        <th>Food Type</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="row_1">
                                        <th class="" scope="row">BreakFast</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="1" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="2" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="3" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="4" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="5" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="6" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="7" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_2">
                                        <th class="tt_hours_column" scope="row">Lunch</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="1" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="2" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="3" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="4" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="5" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="6" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="7" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_3">
                                        <th class="tt_hours_column">Snacks</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="1" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="2" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="3" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="4" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="5" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="6" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="7" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_4">
                                        <th class="tt_hours_column" scope="row">Dinner</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="1" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="2" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="3" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="4" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="5" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="6" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="3" hafta-id="3" day-id="7" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==3)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-sm-12 gallery-grid forthweek">
                                <table class="tt_timetable">
                                    <thead>
                                    <tr class="row_gray">
                                        <th>Food Type</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="row_1">
                                        <th class="" scope="row">BreakFast</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="1" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="2" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="3" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="4" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="5" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="6" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="7" foodtype-id="1"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==1 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_2">
                                        <th class="tt_hours_column" scope="row">Lunch</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="1" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="2" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="3" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="4" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="5" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="6" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="7" foodtype-id="2"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==2 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_3">
                                        <th class="tt_hours_column">Snacks</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="1" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="2" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="3" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="4" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="5" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="6" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="7" foodtype-id="3"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==3 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="row_4">
                                        <th class="tt_hours_column" scope="row">Dinner</th>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="1" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==1 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="2" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==2 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="3" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==3 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="4" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==4 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="5" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==5 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="6" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==6 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="event">
                                            <div class="meal_container">
                                                <a class="" week="4" hafta-id="4" day-id="7" foodtype-id="4"
                                                   href="#" data-toggle="modal" onclick="modalMenu(this)"
                                                   data-target="#DeleteModal">
                                                    <div>
                                                        @foreach($cartProducts as $val)
                                                            @if($val->attributes->product_type=='meal' && $val->attributes->anothermyom=='notdone')
                                                                @if($val->attributes->dayid==7 && $val->attributes->foodtypeid==4 && $val->attributes->weekno==4)
                                                                    <div class="meal-title hidden-xs">
                                                                        <p class="">{{$val->name}}</p>
                                                                    </div>
                                                                    <div class="meal-img">
                                                                        <img style="width: 100%; height:auto;"
                                                                             src="{{asset('assets/user/images/foods/'.$val->attributes->image)}}">
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <div class="add-meal-text">
                                                            <p>Add Meal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    {{-- Meal Weeks Table END   --}}
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-cop"
                                    style="float: right; margin-left: 10px; margin-right: 10px;">Make Meal
                            </button>
                            <a href="{{route('user.clearmealcard')}}" class="btn btn-cop"
                               style="float: right; margin-left: 10px; margin-right: 10px;">Clear Cart</a>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </form>
            </div>
            <!--End Container-->
        </div>
        <!--End Gallery Wrap-->
    </section>


    <div class="modal fade" id="meal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">
                        <strong>Meal Plan</strong>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </h5>

                    <div class="modal-body">
                        <div class="">
                            <div class="row" style="padding-bottom: 15px">
                                <div class="col-md-6 col-xs-12">
                                    <div style="text-align: center" id="meals_search_input">
                                        <input type="text" id="query" class="form-control" placeholder="Search"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div style="text-align: center" id="meals_categories">
                                        <a class="btn btn-cop" onclick="category_breakfast()">Breakfast</a>
                                        <a class="btn btn-cop" onclick="category_lunch()">Lunch</a>
                                        <a class="btn btn-cop" onclick="category_snacks()">Snacks</a>
                                        <a class="btn btn-cop" onclick="category_dinner()">Dinner</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="max-height: 700px;overflow-y: auto;">
                            <div class="grid-list-product-wrapper">
                                <div class="product-view pb-20 product-grid">
                                    <div class="row" id="productlist">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            hidetables();
            var ss_days = $('.num_meal_days').val();
            if (ss_days == 7) {
                $('.hide_weekone').show();
                $('.hide_weektwo').hide();
                $('.hide_weekthree').hide();
                $('.hide_weekfour').hide();
            } else if (ss_days == 14) {
                $('.hide_weekone').show();
                $('.hide_weektwo').show();
                $('.hide_weekthree').hide();
                $('.hide_weekfour').hide();
            } else if (ss_days == 21) {
                $('.hide_weekone').show();
                $('.hide_weektwo').show();
                $('.hide_weekthree').show();
                $('.hide_weekfour').hide();
            } else if (ss_days == 28) {
                $('.hide_weekone').show();
                $('.hide_weektwo').show();
                $('.hide_weekthree').show();
                $('.hide_weekfour').show();
            }

            $('select.num_meal_days').on('change', function () {

                var selected_number = $(this).children("option:selected").val();

                if (selected_number == 7) {
                    $(".firstweek").css("display", "inline-block");
                    $('.hide_weekone').show();
                    $('.hide_weektwo').hide();
                    $('.hide_weekthree').hide();
                    $('.hide_weekfour').hide();
                } else if (selected_number == 14) {
                    $('.hide_weekone').show();
                    $('.hide_weektwo').show();
                    $('.hide_weekthree').hide();
                    $('.hide_weekfour').hide();
                } else if (selected_number == 21) {
                    $('.hide_weekone').show();
                    $('.hide_weektwo').show();
                    $('.hide_weekthree').show();
                    $('.hide_weekfour').hide();
                } else if (selected_number == 28) {
                    $('.hide_weekone').show();
                    $('.hide_weektwo').show();
                    $('.hide_weekthree').show();
                    $('.hide_weekfour').show();
                }

            });

            $('.hide_weekone').on('click', function () {
                $(".firstweek").css("display", "inline-block");
            });
            $('.hide_weektwo').on('click', function () {
                $(".scndweek").css("display", "inline-block");
            });
            $('.hide_weekthree').on('click', function () {
                $(".thirdweek").css("display", "inline-block");
            });
            $('.hide_weekfour').on('click', function () {
                $(".forthweek").css("display", "inline-block");
            });

        });
        function  hidetables(){
            $(".firstweek").css("display", "inline-block");
            $(".scndweek").css("display", "none");
            $(".thirdweek").css("display", "none");
            $(".forthweek").css("display", "none");
        }
    </script>

    <!--End Page Content-->
    <script type="text/javascript">
        var data1 = [];
        var data2 = [];
        var query = "";

        var sf_day="";
        var sf_food="";
        var sf_weekno="";

        $("#query").change(function () {
            console.log('Data1', data1);

            query = $("#query").val().toLowerCase();
            console.log(query);
            var data_unfiltered = data1.result;
            var filtered_result = data_unfiltered.filter(food => food.food_name.toLowerCase().startsWith(query));

            console.log('Filtered result', filtered_result);

            data2.result = filtered_result;
            display(data2);
        });

        function category_breakfast() {
            var data_unfiltered = data1.result;
            console.log(data_unfiltered);
            var filtered_result = data_unfiltered.filter(function(food) {
              return food.food_type == "1";
            });

            console.log('Filtered result', filtered_result);

            data2.result = filtered_result;
            display(data2);
        }

        function category_lunch() {
            var data_unfiltered = data1.result;
            var filtered_result = data_unfiltered.filter(function(food) {
              return food.food_type == "2";
            });

            console.log('Filtered result', filtered_result);

            data2.result = filtered_result;
            display(data2);
        }

        function category_snacks() {
            var data_unfiltered = data1.result;
            var filtered_result = data_unfiltered.filter(function(food) {
              return food.food_type == "3";
            });

            console.log('Filtered result', filtered_result);

            data2.result = filtered_result;
            display(data2);
        }

        function category_dinner() {
            var data_unfiltered = data1.result;
            var filtered_result = data_unfiltered.filter(function(food) {
              return food.food_type == "4";
            });

            console.log('Filtered result', filtered_result);

            data2.result = filtered_result;
            display(data2);
        }

        function display(data) {
            $('#productlist').empty();
            $.each(data.result, function (i, item) {
                var eq = '<div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30 col-xs-12">' +
                    '<div class="product-wrapper">' +
                    '<form class="form_meal_add" action="{{url('cartadd')}}" method="POST">@csrf<input type="hidden" name="ProductId" value="' + item.id + '">' +
                    '<button type="submit" style="padding: 0;border: none; background: none; outline: none;">'+
                    '<div class="product-img">' +
                    '<img class="meal_image" src="{{asset('assets/user/images/foods/')}}/' + item.food_image + '"></div>' +
                    '</button>'+
                    '<div class="product-content">' +
                    '<a href="#" id="food_name">' + item.food_name + '</a>' +
                    '<div class="product-price-wrapper">' +
                    '<p>KD. ' + item.food_price + '</p>' +
                    '</div>' +
                    '<div class="row col-xs-12 pb-20">' +
                    '<div class="col-md-3 col-xs-3">' +
                    '<p>Calories</p>' +
                    '</div>' +
                    '<div class="col-md-6 col-xs-6"><span class="pull-right">------</span></div>' +
                    '<div class="col-md-3 col-xs-3"><label>'+ item.calories+'</label></div>' +
                    '</div>' +

                    '<input type="hidden" name="image">' +
                    '<input type="hidden" name="foodtypeid" value="' + sf_food + '">' +
                    '<input type="hidden" name="dayid" value="' + sf_day + '" >' +
                    '<input type="hidden" name="weekno" value="' + sf_weekno + '" >' +
                    '<input type="hidden" name="qty" value="1">' +
                    '<button class="btn btn-cop col-xs-12">Add to cart</button>' +
                    '</form></div></div></div>';
                $('#productlist').append(eq);
            });

        }
        function modalMenu(e) {

            var day = e.getAttribute("day-id");
            var food = e.getAttribute("foodtype-id");
            var weekno = e.getAttribute("hafta-id");
            var selected_weekno = $('#meal_days').val();

            sf_day=day;
            sf_food=food;
            sf_weekno=weekno;

            var query = e.getAttribute("query");
            $.ajax({
                url: '{{url("mealemodal")}}',
                type: 'GET',
                dataType: 'JSON',
                data: {day: day, food: food, weekno: weekno, query: query, selected_weekno: selected_weekno},
                success: function (data) {
                    data1 = data;
                    display(data);
                    $('#meal').modal('show');
                }
            });
        }
    </script>

@endsection
