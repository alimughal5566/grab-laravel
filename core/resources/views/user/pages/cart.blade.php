@extends('user.master')
@section('title',$gs->websiteTitle.' | Cart')

@section('content')
    <style type="text/css">
        .table_desc {
            border: 1px solid #ededed;
            margin-bottom: 70px;
            margin-top: 2px;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table_desc .cart_page table {
            width: 100%;
        }

        table {
            border-collapse: collapse;
        }

        .table-responsive table thead {
            background: #a84d38;
            color: #fff;
        }

        .cart_page table thead tr:last-child th, .table_desc table tbody tr td:last-child {
            border-right: 0;
        }

        .table_desc .cart_page table thead tr th {
            border-bottom: 3px solid #a84d38;
            /*border-right: 1px solid #ededed;*/
            font-size: 16px;
            font-weight: 500;
            text-transform: capitalize;
            padding: 10px;
            text-align: center;
        }

        .table-responsive table thead tr th {
            text-align: center;
        }

        .table_desc .cart_page table tbody tr td.product_remove {
            min-width: 100px;
        }

        .table_desc .cart_page table tbody tr td {
            border-bottom: 1px solid #ededed;
            border-right: none;
            text-align: center;
            padding: 10px;
        }

        .table-responsive table tbody tr td {
            border-right: 1px solid #ededed;
            font-weight: 500;
            text-transform: capitalize;
            font-size: 14px;
            text-align: center;
            min-width: 150px;
        }

        .product_thumb {
            position: relative;
            overflow: hidden;
        }

        .table_desc .cart_page table tbody tr td.product_thumb {
            max-width: 180px;
        }

        .table_desc .cart_page table tbody tr td {
            border-bottom: 1px solid #ededed;
            border-right: none;
            text-align: center;
            padding: 10px;
        }

        .cart_submit {
            text-align: right;
            padding: 12px;
        }

        .table_desc {
            border: 1px solid #ededed;
            margin-bottom: 70px;
            margin-top: 2px;
        }

        .cart_submit button:hover {
            background: #40A944;
        }

        .cart_submit button {
            background: #60ba62;
            border: 0;
            color: #ffffff;
            display: inline-block;
            font-size: 12px;
            font-weight: 500;
            height: 38px;
            line-height: 18px;
            padding: 10px 15px;
            text-transform: uppercase;
            cursor: pointer;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            border-radius: 3px;
        }

        button, input[type="submit"] {
            cursor: pointer;
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

        .coupon_area {
            margin-bottom: 70px;
        }

        .coupon_code {
            border: 1px solid #ededed;
        }

        .coupon_inner {
            padding: 10px 20px 25px;
        }

        .coupon_inner p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .coupon_inner input {
            border: 1px solid #ededed;
            height: 42px;
            background: none;
            padding: 0 20px;
            margin-right: 20px;
            font-size: 12px;
            color: #222222;
        }

        .coupon_inner button {
            background: #a84d38;
            border: 0;
            color: #ffffff;
            display: inline-block;
            font-size: 12px;
            font-weight: 500;
            height: 38px;
            line-height: 20px;
            padding: 10px 15px;
            text-transform: uppercase;
            cursor: pointer;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            border-radius: 3px;
        }

        .coupon_code h3 {
            color: #ffffff;
            line-height: 36px;
            padding: 5px 15px;
            background: #a84d38;
            text-transform: uppercase;
            font-size: 16px;
            font-weight: 500;
            margin-top: -5%;
        }

        .cart_subtotal {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .checkout_btn {
            text-align: right;
        }

        .cart_subtotal p {
            font-weight: 600;
            font-size: 14px;
        }

        .cart_subtotal p.cart_amount {
            font-size: 18px;
            font-weight: 500;
        }

        .coupon_inner a {
            display: block;
            text-align: right;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 20px;
            border-bottom: 1px solid #ededed;
            padding-bottom: 10px;
            border-radius: 3px;
        }

        .coupon_inner a:hover {
            color: #40A944;
        }

        .checkout_btn a:hover {
            background: #a84d38;
            color: #ffffff;
        }

        .checkout_btn a {
            background: #a84d38;
            color: #ffffff;
            font-size: 15px;
            padding: 3px 14px;
            line-height: 30px;
            font-weight: 500;
            display: inline-block;
            text-transform: capitalize;
            margin-bottom: 0;
        }

        .table_desc .cart_page table tbody tr td.product_thumb a img {
            width: 100px;
        }

        .product_thumb a img {
            width: 100%;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .product_remove a:hover {
            color: red;
        }

        .cartsopen {
            display: none;
        }


        .btn-success {
            background-color: #a84d38 !important;
        }


        .table > tbody > tr > td, .table > tfoot > tr > td {
            vertical-align: middle;
        }


        .mobiletable {
            overflow: hidden;
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

        .amount-per-serving > div:first-child {
            border-top: 0;
            padding-top: 0;
        }

        .pull-left {
            float: left !important;
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

        .co1 {
            margin-top: 2% !important;
        }

        .co2 {
            margin-top: 5% !important;
        }
        .cart_product_image{
            height: 50px;
            width: 50px;
        }

    </style>
    <!--Start Page Content-->
    <section class="page-content fix">

        <script type="text/javascript">
            $(document).ready(function () {
                $('#cartmsg').hide();
                @foreach($cartProducts as $val)

                $(".upCart{{$val->id}}").on('change keyup', function () {
                    var newQty = $(".upCart{{$val->id}}").val();
                    var rowID = $(".rowID{{$val->id}}").val();
                    $.ajax({

                        url: '{{url('/cart/update')}}',
                        data: 'rowID=' + rowID + '&newQty=' + newQty,
                        type: 'get',
                        success: function (response) {
                            window.location.href = "{{url('/cart')}}",
                                //console.log(response);
                                console.log(response);
                            $('#cartmsg').html(response);
                            $('#cartmsg').show();
                        }

                    });
                });
                @endforeach
            })
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#cartmsg').hide();
                @foreach($cartProducts as $val)

                $(".upCart1{{$val->id}}").on('change keyup', function () {
                    var newQty = $(".upCart1{{$val->id}}").val();
                    var rowID = $(".rowID1{{$val->id}}").val();
                    $.ajax({

                        url: '{{url('/cart/update')}}',
                        data: 'rowID=' + rowID + '&newQty=' + newQty,
                        type: 'get',
                        success: function (response) {
                            window.location.href = "{{url('/cart')}}",
                                //console.log(response);
                                console.log(response);
                            $('#cartmsg').html(response);
                            $('#cartmsg').show();
                        }

                    });
                });
                @endforeach
            })
        </script>

{{--   @php dd($cartProducts);@endphp     --}}
        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative"
             style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">Cart</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">Cart</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--End Page Title-->


        <div class="gallery-wrap cartsopen">

            <div class="container">
                <table id="cart" class="table table-hover table-responsive mobiletable">

                    <tbody>
                    <tr>

                        <td style="background-color: #a84d38" class="text-center ty" data-th="Cart">

                        </td>

                        <!--<td class="text-left">Light Options</td>-->


                    <?php
            $i = 0;
            $total = 0;
            $totalcal = 0;
            $totalcalcium = 0;
            $totalcarbohydrate = 0;
            $totalprotien = 0;
            $totalfat = 0;
            $totalsugar = 0;
            $totaliron = 0;
            $totalcarbogram = 0;
            $totalproteingram = 0;
            $totalfatgram = 0;
            $totalsugargram = 0;
            $totalirongram = 0;
            $totalcalciumgram = 0;
            $unit = 0;

            ?>

                    @foreach($cartProducts as $val)

                        @if($val->attributes->product_type=='product')

                         <?php
                  $pro=DB::select("SELECT calories FROM  food_items WHERE id='$val->id'");
                  $sql=DB::select("SELECT * FROM  compostions WHERE food_id='$val->id'");
                   foreach($sql as  $value){
                                //$dm=$val->dmvalue;
                      if($value->type==1){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $carbohydrate=$val->quantity*$value->dmvalue;
                        $carbohydrategram=$val->quantity*$value->gramvalue;
                        $totalcarbogram+=$carbohydrategram;
                         $totalcarbohydrate+=$carbohydrate;

                    }

                    if($value->type==2){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }


                        $protien=$val->quantity*$value->dmvalue;

                         $proteingram=$val->quantity*$value->gramvalue;
                        $totalproteingram+=$proteingram;

                          $totalprotien+=$protien;


                    }
                    if($value->type==3){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $fat=$val->quantity*$value->dmvalue;
                          $totalfat+=$fat;
                        $fatgram=$val->quantity*$value->gramvalue;
                        $totalfatgram+=$fatgram;

                    }

                    if($value->type==4){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $sugar=$val->quantity*$value->dmvalue;
                          $totalsugar+=$sugar;
                        $sugargram=$val->quantity*$value->gramvalue;
                        $totalsugargram+=$sugargram;

                    }


                    if($value->type==5){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $iron=$val->quantity*$value->dmvalue;
                         $totaliron+=$iron;
                        $irongram=$val->quantity*$value->gramvalue;
                        $totalirongram+=$irongram;

                    }

                    if($value->type==6){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $calcium=$val->quantity*$value->dmvalue;
                        $totalcalcium+=$calcium;
                        $calciumgram=$val->quantity*$value->gramvalue;
                        $totalcalciumgram+=$calciumgram;

                    }





                }



                     //calculation of calories
                    if(is_numeric($val->quantity) && is_numeric($pro[0]->calories))
                    {
                     $cal=$val->quantity * $pro[0]->calories;
                     $totalcal+=$cal;

                 }
                 else
                 {
                    0;
                 }


                     ?>




                            <?php
                            $sql = DB::select("SELECT food_image FROM  food_items WHERE id='$val->id'")[0];

                            $result = DB::select("SELECT food_categories.food_category_name FROM `food_items` JOIN food_categories ON food_categories.id=food_items.food_category_id where food_items.id='$val->id'")[0];

                            ?>

                            <tr>
                                <td class="ops">
                                   @php $sql = DB::select("SELECT food_image FROM  food_items WHERE id='$val->id'")[0]; @endphp
                                    <div style="float: left">
                                        <input type="hidden" id="rowID{{$val->id}}" class="rowID{{$val->id}}" value="{{$val->id}}">
                                        <img class="cart_product_image" src="{{asset('assets/user/images/foods/'.$sql->food_image)}}" alt="">
                                    </div>
                                    <div class="prnm">
                                        <span class="prname">{{$val->name}}</span>
                                    </div>

                                    <?php

                                    $price = $val->price * $val->quantity;

                                    if ($val->attributes->addonsize != 0) {
                                        $price = $price + $val->attributes->addonprice;
                                    }
                                    ?>
                                    <div class="prnmrc">
                                        <span class="symbolprice"
                                              id="prce">{{$gs->currencySymbol}}&nbsp;   {{$price}}</span>
                                    </div>

                                    <div class="delanc">
                                    <span>
                                    <a href="{{url('/delete-cart',$val->id)}}"><strong class="product_remove"><i
                                                class="fa fa-trash-o" style="color: red"></i></strong></a>
                                    </span>
                                    </div>
                                </td>
                            </tr>


                        @elseif($val->attributes->product_type=='plan')
                         <?php
                  $pro=DB::select("SELECT plan_calories FROM  foodplans WHERE id='$val->id'");
                  $sql=DB::select("SELECT * FROM  plancomposes WHERE plan_id='$val->id'");

                   foreach($sql as  $value){
                                //$dm=$val->dmvalue;
                      if($value->nutrition==1){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $carbohydrate=$val->quantity*$value->dmvalue;
                        $carbohydrategram=$val->quantity*$value->gramvalue;
                        $totalcarbogram+=$carbohydrategram;
                         $totalcarbohydrate+=$carbohydrate;

                    }

                    if($value->nutrition==2){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }


                        $protien=$val->quantity*$value->dmvalue;

                         $proteingram=$val->quantity*$value->gramvalue;
                        $totalproteingram+=$proteingram;

                          $totalprotien+=$protien;


                    }
                    if($value->nutrition==3){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $fat=$val->quantity*$value->dmvalue;
                          $totalfat+=$fat;
                        $fatgram=$val->quantity*$value->gramvalue;
                        $totalfatgram+=$fatgram;

                    }

                    if($value->nutrition==4){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $sugar=$val->quantity*$value->dmvalue;
                          $totalsugar+=$sugar;
                        $sugargram=$val->quantity*$value->gramvalue;
                        $totalsugargram+=$sugargram;

                    }


                    if($value->nutrition==5){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $iron=$val->quantity*$value->dmvalue;
                         $totaliron+=$iron;
                        $irongram=$val->quantity*$value->gramvalue;
                        $totalirongram+=$irongram;

                    }

                    if($value->nutrition==6){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $calcium=$val->quantity*$value->dmvalue;
                        $totalcalcium+=$calcium;
                        $calciumgram=$val->quantity*$value->gramvalue;
                        $totalcalciumgram+=$calciumgram;

                    }


                }

                    if(is_numeric($val->quantity) && is_numeric($pro[0]->plan_calories))
                    {
                     $cal=$val->quantity * $pro[0]->plan_calories;
                     $totalcal+=$cal;

                 }
                 else
                 {
                    0;
                 }


                     ?>
                            <tr>
                                <td class="ops">
                                    <div style="float: left">
                                        <input type="hidden" id="rowID{{$val->id}}" class="rowID{{$val->id}}" value="{{$val->id}}">
                                        <img class="cart_product_image" src="{{asset('assets/user/images/plans/'.$val->attributes->image)}}" alt="">
                                    </div>
                                    <div class="prnm">
                                        <span class="prname">{{$val->name}}</span>
                                    </div>


                                    <div class="prnmrc">
                                        <?php
                                        $price = $val->price * $val->quantity;
                                        ?>
                                        <span class="symbolprice"
                                              id="prce">{{$gs->currencySymbol}}&nbsp;{{$price}}</span>
                                    </div>
                                    <div class="delanc">
                                    <span>
                                    <a href="{{url('/delete-cart',$val->id)}}"><strong class="product_remove"><i
                                                class="fa fa-trash-o" style="color: red"></i></strong></a>
                                    </span>
                                    </div>
                                </td>
                            </tr>

                        @elseif($val->attributes->product_type=='meal')
                         <?php
                            $pro2=$val->attributes->pro_id;


                            $meal=DB::select("SELECT food_items.id,food_items.calories,mealdetails.meal_id,mealdetails.food_name,mealdetails.day_id,mealdetails.food_id FROM food_items JOIN mealdetails ON food_items.id=mealdetails.food_id WHERE mealdetails.meal_id='$pro2'");
                            foreach ($meal  as $va) {
                                $meid=$va->id;
                                $c=$va->calories;

                                 $sql3=DB::select("SELECT * FROM  compostions WHERE food_id='$meid'");

                             foreach($sql3 as  $value){
                                                //$dm=$val->dmvalue;
                                      if($value->type==1){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $carbohydrate=$val->quantity*$value->dmvalue;
                                        $carbohydrategram=$val->quantity*$value->gramvalue;
                                        $totalcarbogram+=$carbohydrategram;
                                         $totalcarbohydrate+=$carbohydrate;

                                    }

                                    if($value->type==2){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }


                                        $protien=$val->quantity*$value->dmvalue;

                                         $proteingram=$val->quantity*$value->gramvalue;
                                        $totalproteingram+=$proteingram;

                                          $totalprotien+=$protien;


                                    }

                                    if($value->type==3){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $fat=$val->quantity*$value->dmvalue;
                                          $totalfat+=$fat;
                                        $fatgram=$val->quantity*$value->gramvalue;
                                        $totalfatgram+=$fatgram;

                                    }

                                    if($value->type==4){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $sugar=$val->quantity*$value->dmvalue;
                                          $totalsugar+=$sugar;
                                        $sugargram=$val->quantity*$value->gramvalue;
                                        $totalsugargram+=$sugargram;

                                    }


                                    if($value->type==5){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $iron=$val->quantity*$value->dmvalue;
                                         $totaliron+=$iron;
                                        $irongram=$val->quantity*$value->gramvalue;
                                        $totalirongram+=$irongram;

                                    }

                                    if($value->type==6){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $calcium=$val->quantity*$value->dmvalue;
                                        $totalcalcium+=$calcium;
                                        $calciumgram=$val->quantity*$value->gramvalue;
                                        $totalcalciumgram+=$calciumgram;

                                    }




                                }
                                  if(is_numeric( $va->calories))
                                    {
                                     $cal=$va->calories;

                                     $totalcal+=$cal;

                                 }
                                 else
                                 {
                                    0;
                                 }

                            }


                                     ?>

                            <tr>
                                <td class="ops">
                                    <div style="float: left">
                                        <input type="hidden" id="rowID{{$val->attributes->pro_id}}" class="rowID{{$val->attributes->pro_id}}" value="{{$val->attributes->pro_id}}">
                                        <img class="cart_product_image" src="{{asset('assets/user/images/meal/noimage.png')}}" alt="">
                                    </div>
                                    <div class="prnm">
                                        <span class="prname">{{$val->name}}</span>
                                    </div>

                                    <div class="prnmrc">

                                        <span class="symbolprice"
                                              id="prce">{{$gs->currencySymbol}}&nbsp;{{$val->price}}</span>
                                    </div>
                                    <div class="delanc">
                                    <span>
                                    <a href="{{url('/delete-cart',$val->id)}}"><strong class="product_remove"><i
                                                class="fa fa-trash-o" style="color: red"></i></strong></a>
                                    </span>
                                    </div>
                                </td>
                            </tr>

                        @elseif($val->attributes->product_type=='plan_option')
                        <?php
                            $pro=$val->attributes->pro_id;
                            $prod=DB::select("SELECT calories FROM  food_items WHERE id='$pro'");
                            $sql2=DB::select("SELECT * FROM  plancompostions WHERE plan_id='$pro'");
                             foreach($sql2 as  $value){
                                                //$dm=$val->dmvalue;
                                      if($value->nutrition==1){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $carbohydrate=$val->quantity*$value->dmvalue;
                                        $carbohydrategram=$val->quantity*$value->gmvalue;
                                        $totalcarbogram+=$carbohydrategram;
                                         $totalcarbohydrate+=$carbohydrate;

                                    }

                                    if($value->nutrition==2){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }


                                        $protien=$val->quantity*$value->dmvalue;

                                         $proteingram=$val->quantity*$value->gmvalue;
                                        $totalproteingram+=$proteingram;

                                          $totalprotien+=$protien;


                                    }

                                    if($value->nutrition==3){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $fat=$val->quantity*$value->dmvalue;
                                          $totalfat+=$fat;
                                        $fatgram=$val->quantity*$value->gmvalue;
                                        $totalfatgram+=$fatgram;

                                    }

                                    if($value->nutrition==4){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $sugar=$val->quantity*$value->dmvalue;
                                          $totalsugar+=$sugar;
                                        $sugargram=$val->quantity*$value->gmvalue;
                                        $totalsugargram+=$sugargram;

                                    }


                                    if($value->nutrition==5){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $iron=$val->quantity*$value->dmvalue;
                                         $totaliron+=$iron;
                                        $irongram=$val->quantity*$value->gmvalue;
                                        $totalirongram+=$irongram;

                                    }

                                    if($value->nutrition==6){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $calcium=$val->quantity*$value->dmvalue;
                                        $totalcalcium+=$calcium;
                                        $calciumgram=$val->quantity*$value->gmvalue;
                                        $totalcalciumgram+=$calciumgram;

                                    }
                                }

                                  //calculation of calories
                                    if(is_numeric($val->quantity) && is_numeric($prod[0]->calories))
                                    {
                                     $cal=$val->quantity * $prod[0]->calories;
                                     $totalcal+=$cal;

                                 }
                                 else
                                 {
                                    0;
                                 }

                                    // echo "<pre>";print_r($sql);

                                     ?>
                            <tr>
                                <td class="ops">
                                    <div class="img" style="float: left">
                                        <input type="hidden" id="rowID{{$val->attributes->pro_id}}" class="rowID{{$val->attributes->pro_id}}" value="{{$val->attributes->pro_id}}">
                                        <span><img class="cart_product_image" src="{{asset('assets/user/images/planoptions/'.$val->attributes->image)}}" alt=""></span>
                                    </div>
                                    <div class="prnm">
                                        <span class="prname">{{$val->name}}</span>
                                    </div>


                                    <div class="prnmrc">
                                        <span class="symbolprice"
                                              id="prce">{{$gs->currencySymbol}}&nbsp;{{$val->price}}</span>
                                    </div>
                                    <div class="delanc">
                                    <span>
                                    <a href="{{url('/delete-cart',$val->id)}}"><strong class="product_remove"><i
                                                class="fa fa-trash-o" style="color: red"></i></strong></a>
                                    </span>
                                    </div>
                                </td>
                            </tr>



                        @endif

                    @endforeach




                    <tr>
                        <td class="totalssss2">
                            <div class="form-group subt">
                                <label for="email" class="subs">Subtotal</label>
                                <span class="sbstotal">{{$gs->currencySymbol}} {{$sum}}</span>
                            </div>
                        </td>


                        <td class="totalssss">
                            <div class="form-group" style="margin-top: -20px">
                                <label for="email">Total amount</label>
                                <span class="totamount">{{$gs->currencySymbol}} {{$sum}}</span>
                            </div>
                        </td>

                    </tr>
                    </tbody>
                    <tfoot>

                    <tr>

                        <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                        <td><a href="{{url('/checkout')}}" class="btn btn-success btn-block prcodcatts">Proceed To
                                Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                </table>

                <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-3">


                                <!-- =============== menu single block starts ================== -->
                                <div class="facts-wrap">
                                    <div class="title-block">
                                        <h1 class="nutr">Nutrition Facts</h1>
                                        <!--Serving Size 546 g<br>Serving Per Container 2        -->
                                    </div>
                                    <div class="amount-per-serving">
                                        <!--<div class="">Amount Per Serving</div>-->
                                        <div class=""><span class="pull-left">Calories <?php echo $totalcal;?></span>
                                            <!--<span class="pull-right">Calories from Fat 440</span>-->
                                <div class="text-right daily-value"><b>% Daily Value*</b></div>

                    @if($unit==0 && $totalfatgram==0)
                    @else
                    <div class=""><span class="pull-left"><b>Total Fat</b> <?php echo $totalfatgram?><?php if(!empty($unit)){
                    echo $unit;
                    }
                    else{
                    0;
                    }
                    ?></span>
                    <span class="pull-right"><b><?php echo $totalfat?>%</b></span></div>
                    @endif


@if($unit==0 && $totalirongram==0)
@else
<div class=""><span class="pull-left"><b>Iron </b> <?php echo $totalirongram;?><?php if(!empty($unit)){
    echo $unit;
}
else{
    0;
}?></span>
<span class="pull-right"><b><?php echo $totaliron;?>%</b></span></div>
@endif
@if($unit==0 && $totalcalciumgram==0)
@else
<div class=""><span class="pull-left"><b>Calcium </b> <?php echo $totalcalciumgram;?><?php if(!empty($unit)){
    echo $unit;
}
else{
    0;
}?></span>
<span class="pull-right"><b><?php echo $totalcalcium;?>%</b></span></div>
@endif
@if($unit==0 && $totalcarbogram==0)
@else
<div class=""><span class="pull-left"><b>Total Carbohydrate </b> <?php echo $totalcarbogram;?><?php if(!empty($unit)){
    echo $unit;
}
else{
    0;
}?></span>
<span class="pull-right"><b><?php echo $totalcarbohydrate?>%</b></span></div>
@endif
@if($unit==0 && $totalsugargram==0)
@else
<div class=""><span class="pull-left"><b>Total Sugars </b> <?php echo  $totalsugargram;?><?php if(!empty($unit)){
    echo $unit;
}
else{
    0;
}?></span>
<span class="pull-right"><b><?php echo $totalsugar;?>%</b></span></div>
@endif

@if($unit==0 && $totalproteingram==0)
@else
<div class="">
    <span class="pull-left"><b>Protein </b> <?php  echo $totalproteingram?><?php if(!empty($unit)){
    echo $unit;
}
else{
    0;
}?></span>
<span class="pull-right"><b><?php echo $totalprotien;?>%</b></span></div>
@endif

</div>
</div>

   <div class="hints">
                            <span class="">*Percent Daily Values are based on a 2,000 calorie diet. Your daily value may be higher or lower depending on your calorie needs.</span>
                        </div>
                                </div>
                                <!-- =============== menu single block ends ================== -->

                            </div>


            </div>
        </div>


        <!--Start Gallery Wrap-->

        <div class="gallery-wrap cartsorder">
            <div class="container">

                <form action="#">
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-info" id="cartmsg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">


                                <div class="table_desc">
                                    <div class="cart_page table-responsive">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th class="product_remove">Remove</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product_name">Category</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>

<?php
$i = 0;
$total = 0;
$totalcal = 0;
$totalcalcium = 0;
$totalcarbohydrate = 0;
$totalprotien = 0;
$totalfat = 0;
$totalsugar = 0;
$totaliron = 0;
$totalcarbogram = 0;
$totalproteingram = 0;
$totalfatgram = 0;
$totalsugargram = 0;
$totalirongram = 0;
$totalcalciumgram = 0;
$unit = 0;
?>

@foreach($cartProducts as $val)




                        @if($val->attributes->product_type=='product')

                <?php
                  $pro=DB::select("SELECT calories FROM  food_items WHERE id='$val->id'");
                  $sql=DB::select("SELECT * FROM  compostions WHERE food_id='$val->id'");
                   foreach($sql as  $value){
                                //$dm=$val->dmvalue;
                      if($value->type==1){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $carbohydrate=$val->quantity*$value->dmvalue;
                        $carbohydrategram=$val->quantity*$value->gramvalue;
                        $totalcarbogram+=$carbohydrategram;
                         $totalcarbohydrate+=$carbohydrate;

                    }

                    if($value->type==2){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }


                        $protien=$val->quantity*$value->dmvalue;

                         $proteingram=$val->quantity*$value->gramvalue;
                        $totalproteingram+=$proteingram;

                          $totalprotien+=$protien;


                    }
                    if($value->type==3){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $fat=$val->quantity*$value->dmvalue;
                          $totalfat+=$fat;
                        $fatgram=$val->quantity*$value->gramvalue;
                        $totalfatgram+=$fatgram;

                    }

                    if($value->type==4){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $sugar=$val->quantity*$value->dmvalue;
                          $totalsugar+=$sugar;
                        $sugargram=$val->quantity*$value->gramvalue;
                        $totalsugargram+=$sugargram;

                    }


                    if($value->type==5){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $iron=$val->quantity*$value->dmvalue;
                         $totaliron+=$iron;
                        $irongram=$val->quantity*$value->gramvalue;
                        $totalirongram+=$irongram;

                    }

                    if($value->type==6){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $calcium=$val->quantity*$value->dmvalue;
                        $totalcalcium+=$calcium;
                        $calciumgram=$val->quantity*$value->gramvalue;
                        $totalcalciumgram+=$calciumgram;

                    }





                }



                     //calculation of calories
                    if(is_numeric($val->quantity) && is_numeric($pro[0]->calories))
                    {
                     $cal=$val->quantity * $pro[0]->calories;
                     $totalcal+=$cal;

                 }
                 else
                 {
                    0;
                 }

                    // echo "<pre>";print_r($sql);

                     ?>

<tr>
<td class="product_remove"><a
href="{{url('/delete-cart',$val->id)}}"><i
class="fa fa-trash-o"></i></a></td>
<?php
$sql = DB::select("SELECT food_image FROM  food_items WHERE id='$val->id'")[0];

$result = DB::select("SELECT food_categories.food_category_name FROM `food_items` JOIN food_categories ON food_categories.id=food_items.food_category_id where food_items.id='$val->id'")[0];

?>

<td class="product_thumb"><a href="#"><img
src="{{asset('assets/user/images/foods/'.$sql->food_image)}}"
alt=""></a></td>
<td class="product_name"><a href="#"
style="color: #575757; font-weight: 600;">{{$val->name}}</a>
<p>
<span><strong>Addons: </strong></span>{{$val->attributes->addonname}}
</p></td>
<td class="product_name">{{$result->food_category_name}}</td>

<td class="product-price" id="prce"
style="color: #a84d38; font-weight:700;">{{$gs->currencySymbol}} {{$val->price}}</td>

<td class="product_quantity"><input min="1"
id="upCart{{$val->id}}"
class="upCart1{{$val->id}} qty-fill"
max="100"
value="{{$val->quantity}}"
type="number"
style="height: 40px; text-align: center; width: 40px; border: 1px solid #a84d38;"><input
type="hidden" id="rowID{{$val->id}}"
class="rowID1{{$val->id}}" value="{{$val->id}}"></td>


<input min="1" class="alice" value="{{$val->quantity}}" type="number" name="qty">


<button class="btn"><i class="fa fa-refresh" aria-hidden="true"></i></button></td> -->

<?php
$price = $val->price * $val->quantity;

if ($val->attributes->addonsize != 0) {
$price = $price + $val->attributes->addonprice;
}



?>
<td class="product_total" id="tosps"
style="color: #575757; font-weight:700;">{{$gs->currencySymbol}} {{$price}}</td>


</tr>

@elseif($val->attributes->product_type=='plan')
  <?php
                  $pro=DB::select("SELECT plan_calories FROM  foodplans WHERE id='$val->id'");
                  $sql=DB::select("SELECT * FROM  plancomposes WHERE plan_id='$val->id'");

                   foreach($sql as  $value){
                                //$dm=$val->dmvalue;
                      if($value->nutrition==1){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $carbohydrate=$val->quantity*$value->dmvalue;
                        $carbohydrategram=$val->quantity*$value->gramvalue;
                        $totalcarbogram+=$carbohydrategram;
                         $totalcarbohydrate+=$carbohydrate;

                    }

                    if($value->nutrition==2){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }


                        $protien=$val->quantity*$value->dmvalue;

                         $proteingram=$val->quantity*$value->gramvalue;
                        $totalproteingram+=$proteingram;

                          $totalprotien+=$protien;


                    }
                    if($value->nutrition==3){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $fat=$val->quantity*$value->dmvalue;
                          $totalfat+=$fat;
                        $fatgram=$val->quantity*$value->gramvalue;
                        $totalfatgram+=$fatgram;

                    }

                    if($value->nutrition==4){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $sugar=$val->quantity*$value->dmvalue;
                          $totalsugar+=$sugar;
                        $sugargram=$val->quantity*$value->gramvalue;
                        $totalsugargram+=$sugargram;

                    }


                    if($value->nutrition==5){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }

                        $iron=$val->quantity*$value->dmvalue;
                         $totaliron+=$iron;
                        $irongram=$val->quantity*$value->gramvalue;
                        $totalirongram+=$irongram;

                    }

                    if($value->nutrition==6){
                        if($value->unit==2)
                        {
                            $unit='g';
                        }
                        else{
                            $unit='mg';
                        }
                        $calcium=$val->quantity*$value->dmvalue;
                        $totalcalcium+=$calcium;
                        $calciumgram=$val->quantity*$value->gramvalue;
                        $totalcalciumgram+=$calciumgram;

                    }





                }



                     //calculation of calories
                    if(is_numeric($val->quantity) && is_numeric($pro[0]->plan_calories))
                    {
                     $cal=$val->quantity * $pro[0]->plan_calories;
                     $totalcal+=$cal;

                 }
                 else
                 {
                    0;
                 }


                     ?>





<tr>
<td class="product_remove"><a
href="{{url('/delete-cart',$val->id)}}"><i
class="fa fa-trash-o"></i></a></td>

<td class="product_thumb"><a href="#"><img
src="{{asset('assets/user/images/plans/'.$val->attributes->image)}}"
alt=""></a></td>
<td class="product_name"><a href="#"
style="color: #575757; font-weight: 600;">{{$val->name}}</a>
</td>
<td class="product_name">Plan</td>

<td class="product-price" id="prce"
style="color: #a84d38; font-weight:700;">{{$gs->currencySymbol}}{{$val->price}}</td>

<td class="product_quantity"><input min="1"
id="upCart{{$val->id}}"
class="upCart1{{$val->id}} qty-fill"
max="100"
value="{{$val->quantity}}"
type="number"
style="height: 40px; text-align: center; width: 40px; border: 1px solid #a84d38;" disabled><input
type="hidden" class="rowID1{{$val->id}}"
id="rowID{{$val->id}}" value="{{$val->id}}"></td>

<?php
$price = $val->price * $val->quantity;

?>
<td class="product_total" id="tosps"
style="color: #575757; font-weight:700;">{{$gs->currencySymbol}} {{$price}}</td>


</tr>

@elseif($val->attributes->product_type=='meal')
   <?php
                            $pro2=$val->attributes->pro_id;


                            $meal=DB::select("SELECT food_items.id,food_items.calories,mealdetails.meal_id,mealdetails.food_name,mealdetails.day_id,mealdetails.food_id FROM food_items JOIN mealdetails ON food_items.id=mealdetails.food_id WHERE mealdetails.meal_id='$pro2'");
                            foreach ($meal  as $va) {
                                $meid=$va->id;
                                $c=$va->calories;

                                 $sql3=DB::select("SELECT * FROM  compostions WHERE food_id='$meid'");

                             foreach($sql3 as  $value){
                                                //$dm=$val->dmvalue;
                                      if($value->type==1){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $carbohydrate=$val->quantity*$value->dmvalue;
                                        $carbohydrategram=$val->quantity*$value->gramvalue;
                                        $totalcarbogram+=$carbohydrategram;
                                         $totalcarbohydrate+=$carbohydrate;

                                    }

                                    if($value->type==2){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }


                                        $protien=$val->quantity*$value->dmvalue;

                                         $proteingram=$val->quantity*$value->gramvalue;
                                        $totalproteingram+=$proteingram;

                                          $totalprotien+=$protien;


                                    }

                                    if($value->type==3){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $fat=$val->quantity*$value->dmvalue;
                                          $totalfat+=$fat;
                                        $fatgram=$val->quantity*$value->gramvalue;
                                        $totalfatgram+=$fatgram;

                                    }

                                    if($value->type==4){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $sugar=$val->quantity*$value->dmvalue;
                                          $totalsugar+=$sugar;
                                        $sugargram=$val->quantity*$value->gramvalue;
                                        $totalsugargram+=$sugargram;

                                    }


                                    if($value->type==5){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $iron=$val->quantity*$value->dmvalue;
                                         $totaliron+=$iron;
                                        $irongram=$val->quantity*$value->gramvalue;
                                        $totalirongram+=$irongram;

                                    }

                                    if($value->type==6){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $calcium=$val->quantity*$value->dmvalue;
                                        $totalcalcium+=$calcium;
                                        $calciumgram=$val->quantity*$value->gramvalue;
                                        $totalcalciumgram+=$calciumgram;

                                    }




                                }
                                  if(is_numeric( $va->calories))
                                    {
                                     $cal=$va->calories;

                                     $totalcal+=$cal;

                                 }
                                 else
                                 {
                                    0;
                                 }

                            }


                                     ?>



<tr>
<td class="product_remove"><a
href="{{url('/delete-cart',$val->id)}}"><i
class="fa fa-trash-o"></i></a></td>

<td class="product_thumb"><a href="#"><img
src="{{asset('assets/user/images/meal/noimage.png')}}"
alt=""></a></td>
<td class="product_name"><a href="#"
style="color: #575757; font-weight: 600;">{{$val->name}}</a>
</td>
<td class="product_name">Make Your Own Meal</td>

<td class="product-price" id="prce"
style="color: #a84d38; font-weight:700;">{{$gs->currencySymbol}} {{$val->price}}</td>

<td class="product_quantity"><input min="1"
id="upCart{{$val->attributes->pro_id}}"
class="upCart1{{$val->attributes->pro_id}} qty-fill"
max="100"
value="{{$val->quantity}}"
type="number" disabled
style="height: 40px; text-align: center; width: 40px; border: 1px solid #a84d38;"><input
type="hidden" id="rowID{{$val->attributes->pro_id}}"
class="rowID1{{$val->attributes->pro_id}}"
value="{{$val->attributes->pro_id}}"></td>

<?php
$price = $val->price * $val->quantity;
?>
<td class="product_total"
id="tosps">{{$gs->currencySymbol}} {{$price}}</td>


</tr>

@elseif($val->attributes->product_type=='plan_option')
<?php
                            $pro=$val->attributes->pro_id;
                            $prod=DB::select("SELECT calories FROM  food_items WHERE id='$pro'");
                            $sql2=DB::select("SELECT * FROM  plancompostions WHERE plan_id='$pro'");
                             foreach($sql2 as  $value){
                                                //$dm=$val->dmvalue;
                                      if($value->nutrition==1){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $carbohydrate=$val->quantity*$value->dmvalue;
                                        $carbohydrategram=$val->quantity*$value->gmvalue;
                                        $totalcarbogram+=$carbohydrategram;
                                         $totalcarbohydrate+=$carbohydrate;

                                    }

                                    if($value->nutrition==2){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }


                                        $protien=$val->quantity*$value->dmvalue;

                                         $proteingram=$val->quantity*$value->gmvalue;
                                        $totalproteingram+=$proteingram;

                                          $totalprotien+=$protien;


                                    }

                                    if($value->nutrition==3){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $fat=$val->quantity*$value->dmvalue;
                                          $totalfat+=$fat;
                                        $fatgram=$val->quantity*$value->gmvalue;
                                        $totalfatgram+=$fatgram;

                                    }

                                    if($value->nutrition==4){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $sugar=$val->quantity*$value->dmvalue;
                                          $totalsugar+=$sugar;
                                        $sugargram=$val->quantity*$value->gmvalue;
                                        $totalsugargram+=$sugargram;

                                    }


                                    if($value->nutrition==5){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }

                                        $iron=$val->quantity*$value->dmvalue;
                                         $totaliron+=$iron;
                                        $irongram=$val->quantity*$value->gmvalue;
                                        $totalirongram+=$irongram;

                                    }

                                    if($value->nutrition==6){
                                        if($value->unit==2)
                                        {
                                            $unit='g';
                                        }
                                        else{
                                            $unit='mg';
                                        }
                                        $calcium=$val->quantity*$value->dmvalue;
                                        $totalcalcium+=$calcium;
                                        $calciumgram=$val->quantity*$value->gmvalue;
                                        $totalcalciumgram+=$calciumgram;

                                    }
                                }

                                  //calculation of calories
                                    if(is_numeric($val->quantity) && is_numeric($prod[0]->calories))
                                    {
                                     $cal=$val->quantity * $prod[0]->calories;
                                     $totalcal+=$cal;

                                 }
                                 else
                                 {
                                    0;
                                 }

                                    // echo "<pre>";print_r($sql);

                                     ?>
<tr>
<td class="product_remove"><a
href="{{url('/delete-cart',$val->id)}}"><i
class="fa fa-trash-o"></i></a></td>

<td class="product_thumb"><a href="#"><img
src="{{asset('assets/user/images/planoptions/'.$val->attributes->image)}}"
alt=""></a></td>
<td class="product_name"><a href="#"
style="color: #575757; font-weight: 600;">{{$val->name}}</a>
</td>
<td class="product_name">Plans Options</td>

<td class="product-price" id="prce"
style="color: #a84d38; font-weight:700;">{{$gs->currencySymbol}} {{$val->price}}</td>

<td class="product_quantity"><input min="1"
id="upCart{{$val->attributes->pro_id}}"
class="upCart1{{$val->attributes->pro_id}} qty-fill"
max="100"
value="{{$val->quantity}}"
type="number" disabled
style="height: 40px; text-align: center; width: 40px; border: 1px solid #a84d38;"><input
type="hidden" class="rowID1{{$val->attributes->pro_id}}"
id="rowID{{$val->attributes->pro_id}}"
value="{{$val->attributes->pro_id}}"></td>

<?php
$price = $val->price * $val->quantity;
?>
<td class="product_total"
id="tosps">{{$gs->currencySymbol}} {{$price}}</td>


</tr>


@endif





@endforeach


</tbody>
</table>
</div>
<!--  <div class="cart_submit">
<button type="submit">update cart</button>
</div>    -->
</div>
</div>
</div>
<!--coupon code area start-->

<div class="coupon_area">
<div class="row">
<div class="col-md-6">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="coupon_code left">
<div class="facts-wrap">
<div class="title-block">
<h1>Nutrition Facts</h1>{{-- Serving Size 546 g<br>
Serving Per Container 2    --}}
</div>
<div class="amount-per-serving">
{{--  <div class="">Amount Per Serving</div> --}}

<div class=""><span
class="pull-left">Calories   <?php echo $totalcal;?></span>
{{-- <span class="pull-right">Calories from Fat 440</span></div> --}}
<div class="text-right daily-value"><b>% Daily Value*</b></div>
@if($unit==0 && $totalfatgram==0)
@else
<div class=""><span
class="pull-left"><b>Total Fat</b> <?php echo $totalfatgram?><?php if (!empty($unit)) {
echo $unit;
} else {
0;
}
?></span>
<span class="pull-right"><b><?php echo $totalfat?>%</b></span>
</div>
@endif


@if($unit==0 && $totalirongram==0)
@else
<div class=""><span
class="pull-left"><b>Iron </b> <?php echo $totalirongram;?><?php if (!empty($unit)) {
echo $unit;
} else {
0;
}?></span>
<span
class="pull-right"><b><?php echo $totaliron;?>%</b></span>
</div>
@endif
@if($unit==0 && $totalcalciumgram==0)
@else
<div class=""><span
class="pull-left"><b>Calcium </b> <?php echo $totalcalciumgram;?><?php if (!empty($unit)) {
echo $unit;
} else {
0;
}?></span>
<span
class="pull-right"><b><?php echo $totalcalcium;?>%</b></span>
</div>
@endif
@if($unit==0 && $totalcarbogram==0)
@else
<div class=""><span
class="pull-left"><b>Total Carbohydrate </b> <?php echo $totalcarbogram;?><?php if (!empty($unit)) {
echo $unit;
} else {
0;
}?></span>
<span
class="pull-right"><b><?php echo $totalcarbohydrate?>%</b></span>
</div>
@endif
@if($unit==0 && $totalsugargram==0)
@else
<div class=""><span
class="pull-left"><b>Total Sugars </b> <?php echo $totalsugargram;?><?php if (!empty($unit)) {
echo $unit;
} else {
0;
}?></span>
<span
class="pull-right"><b><?php echo $totalsugar;?>%</b></span>
</div>
@endif

@if($unit==0 && $totalproteingram==0)
@else
<div class="">
<span class="pull-left"><b>Protein </b> <?php  echo $totalproteingram?><?php if (!empty($unit)) {
echo $unit;
} else {
0;
}?></span>
<span
class="pull-right"><b><?php echo $totalprotien;?>%</b></span>
</div>
@endif

</div>
</div>


<div class="hints">
<span class="">*Percent Daily Values are based on a 2,000 calorie diet. Your daily value may be higher or lower depending on your calorie needs.</span>
</div>

</div>
</div>
</div>
</div>

<div class="col-md-6 co1">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="coupon_code left">
<h3>Coupon</h3>
<div class="coupon_inner">
<p>Enter your coupon code if you have one.</p>
<input placeholder="Coupon code" type="text">
<button type="submit">Apply coupon</button>
</div>
</div>
</div>
</div>


<div class="col-md-6 co2">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="coupon_code right">
<h3>Cart Totals</h3>
<div class="coupon_inner">
<div class="cart_subtotal">
<p>Subtotal</p>
<p class="cart_amount">{{$gs->currencySymbol}} {{$sum}}</p>
</div>


<div class="cart_subtotal">
<p>Total</p>
<p class="cart_amount">{{$gs->currencySymbol}} {{$sum}}
</p>
</div>
<div class="checkout_btn">
<a href="{{url('/checkout')}}">Proceed to Checkout</a>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<!--coupon code area end-->
</form>


</div>
</div>

<!--for mobile-->


<!--End Container-->
</div>
<!--End Gallery Wrap-->
</section>
<!--End Page Content-->


@endsection
