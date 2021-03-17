@extends('user.master')
@section('title',$gs->websiteTitle.' | Checkout')

@section('content')

<style type="text/css">


.user-actions {
    margin-bottom: 20px;
}

.user-actions h3 {
    font-size: 13px;
    font-weight: 400;
    background-color: #f7f6f7;
    padding: 15px 10px;
    border-top: 3px solid #40A944;
    margin-bottom: 0;
}
h3 {
    font-size: 30px;
    line-height: 30px;
}
h1, h2, h3, h4, h5, h6 {
    font-weight: 400;
    margin-top: 0;
}

.user-actions h3 a {
    color: #40A944;
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

.collapse {
    display: none;
}
.checkout_info {
    border: 1px solid #ededed;
    margin-top: 25px;
    padding: 20px 30px;
}

.checkout_info p {
    margin-bottom: 15px;
}

.form_group {
    margin-bottom: 20px;
}

.form_group button {
    display: inline-block;
    width: 80px;
    background: #60ba62;
    border: 0;
    color: #ffffff;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 13px;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    margin-right: 20px;
    cursor: pointer;
    height: 40px;
    line-height: 40px;
    border-radius: 3px;
}
.form_group button:hover {
    background: #40A944;
}

.form_group label {
    font-size: 14px;
    display: block;
    line-height: 18px;
}

a, button, img, input, span {
    transition: all 0.3s ease 0s;
}

.form_group input {
    border: 1px solid #ededed;
    background: none;
    height: 45px;
    width: 350px;
    padding: 0 20px;
}

.form_group.group_3 {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.form_group.group_3 label {
    margin-bottom: 0;
    line-height: 34px;
    cursor: pointer;
}
.form_group label {
    font-size: 14px;
    display: block;
    line-height: 18px;
}
.form_group input[type="checkbox"] {
    width: 15px;
    height: 15px;
    margin-right: 10px;
    position: relative;
    top: 3px;
}
.form_group input {
    border: 1px solid #ededed;
    background: none;
    height: 45px;
    width: 350px;
    padding: 0 20px;
}

.checkout_info a {
    color: #40A944;
    margin-top: 15px;
    display: block;
}

.checkout_info {
    border: 1px solid #ededed;
    margin-top: 25px;
    padding: 20px 30px;
}
.checkout_info.coupon_info form {
    display: flex;
}

#checkout_coupon input {
    background: none;
    border: 1px solid #ededed;
    width: 200px;
    height: 45px;
    font-size: 12px;
    padding: 0 20px;
    color: #222222;
}

#checkout_coupon button {
    width: 130px;
    background: #60ba62;
    color: #ffffff;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 13px;
    cursor: pointer;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    border: 0;
    height: 45px;
    line-height: 45px;
    border-radius: 3px;
    margin-left: 5px;
}
.checkout_form h3 {
    font-size: 16px;
    line-height: 30px;
    padding: 5px 10px;
    text-transform: uppercase;
    color: #ffffff;
    background: #a84d38;
    font-weight: 500;
}

.mb-20 {
    margin-bottom: 20px;
}

.checkout_form label {
    font-weight: 500;
}

.checkout_form label span {
    color: #40A944;
}
.checkout_form input {
    border: 1px solid #ededed;
    background: none;
    height: 40px;
    width: 100%;
    padding: 0 20px;
    color: #222222;
}

.select_option {
    display: flex;
    align-items: center;
}

.checkout_form .nice-select {
    width: 100%;
}
.select_option {
    display: flex;
    align-items: center;
}

.checkout_form .nice-select ul.list {
    width: 100%;
    height: 180px;
    overflow: auto;
}
.checkout_form label span {
    color: #40A944;
}

.checkout_form input[type="checkbox"] {
    width: 15px;
    height: 15px;
    position: relative;
    top: 2px;
    margin-right: 10px;
}
.checkout_form input {
    border: 1px solid #ededed;
    background: none;
    height: 40px;
    width: 100%;
    padding: 0 20px;
    color: #222222;
}
.checkout_form label.righ_0 {
    cursor: pointer;
    font-size: 15px;
    line-height: 27px;
    padding: 5px 10px;
    text-transform: capitalize;
    color: #ffffff;
    background: #60ba62;
    font-weight: 500;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    margin-bottom: 0;
    border-radius: 5px;
}
.order-notes textarea {
    border: 1px solid #e5e5e5;
    border-radius: 0;
    height: 45px;
    max-width: 100%;
    padding: 0 30px 0 20px;
    background: none;
    font-size: 13px;
    resize: none;
    line-height: 45px;
    width: 100%;
    color: #222222;
}
.order_table {
    margin-bottom: 35px;
}
.order_table table {
    width: 100%;
}
.table-responsive table thead {
    background: #ededed;
}
.table-responsive table thead tr th {
    text-align: center;
}
.order_table table thead tr th {
    min-width: 50%;
    text-align: center;
    padding: 15px 0;
    border-bottom: 1px solid #ddd;
}

.table-responsive table tbody tr td {
    border-right: 1px solid #ededed;
    font-weight: 500;
    text-transform: capitalize;
    font-size: 14px;
    text-align: center;
    min-width: 150px;
}

.order_table table tbody tr td {
    min-width: 50%;
    text-align: center;
    padding: 15px 0;
    border-bottom: 1px solid #ddd;
}
.order_table table tfoot tr th {
    min-width: 50%;
    text-align: center;
    padding: 15px 0;
    border-bottom: 1px solid #ddd;
}
.order_table table tfoot tr td {
    min-width: 50%;
    text-align: center;
    padding: 15px 0;
    border-bottom: 1px solid #ddd;
}
.order_table table {
    width: 100%;
}
.panel-default input[type="radio"] {
    width: 15px;
    height: 15px;
    position: relative;
    top: 2px;
    margin-right: 10px;
}
.checkout_form input {
    border: 1px solid #ededed;
    background: none;
    height: 40px;
    width: 100%;
    padding: 0 20px;
    color: #222222;
}
.card-body1 {
    margin-bottom: 15px;
}
p:last-child {
    margin-bottom: 0;
}

.panel-default img {
    width: 160px;
}
img {
    max-width: 100%;
    height: auto;
}
.order_button button {
    border: 0;
}
.order_button button {
    cursor: pointer;
    font-size: 16px;
    line-height: 30px;
    padding: 5px 10px;
    text-transform: capitalize;
    color: #ffffff;
    background: #a84d38;
    font-weight: 500;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    margin-bottom: 0;
    border-radius: 5px;
}
.order_button button:hover {
   /* background: #222222;*/
   background:#a84d38;
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

@media only screen and (min-width: 360px) and (max-width: 479px) {
    .scores label {
  margin-top: -85px;
    margin-left: 25px;
}
    }


</style>
    <!--Start Page Content-->
    <section class="page-content fix">
        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">@lang('Checkout')</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{route('user.home')}}">@lang('Home')</a>
                                </li>
                                <li class="active">@lang('Checkout')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Gallery Wrap-->
        <div class="gallery-wrap">
          <div class="container">
            <form action="{{url('storecustomer')}}" method="post">
                @csrf
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name="bfname" required value="{{Auth::guard('frontend')->user()['name']}}" id="bfname">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name  <span>*</span></label>
                                    <input type="text" name="blfname" required value="{{Auth::guard('frontend')->user()['ul_name']}}" id="blfname">
                                </div>

                                <div class="col-lg-12 col-md-6 mb-20">
                                    <label>Company name (optional)</label>
                                    <input type="text" name="bcompany" id="bcompany">
                                </div>
                                <div class="col-lg-12 col-md-6 mb-20">
                                    <label for="country">country <span>*</span></label>
                                   <input type="text" name="bcountry" value="Kuwait" readonly="">


                                </div>

                                <div class="col-lg-12 col-md-6 mb-20">
                                    <label>Address  <span>*</span></label>
                                    <input required placeholder="Address" name="bstreet" type="text" id="bstreet" value="{{Auth::guard('frontend')->user()['billing_address']}}">
                                </div>
                                <div class="col-lg-12 col-md-6 mb-20">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" name="bappart" type="text" id="bappart">
                                </div>
                                <div class="col-lg-12 col-md-6 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name="bcity" id="bcity" value="{{Auth::guard('frontend')->user()['city']}}" required>
                                </div>

                                 <div class="col-lg-12 col-md-6 mb-20">
                                    <label>Postcode / ZIP  <span>*</span></label>
                                    <input type="text" name="bzip" required id="bzip" value="{{Auth::guard('frontend')->user()['postcode']}}">
                                </div>

                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="bphone" required value="{{Auth::guard('frontend')->user()['phone']}}" id="bphone">

                                </div>
                                 <div class="col-lg-6 mb-20">
                                    <label> Email Address   <span>*</span></label>
                                      <input type="text" required name="bemail" value="{{Auth::guard('frontend')->user()['email']}}" id="bemail">

                                </div>


                                <div class="col-lg-12 mb-20">
                                    <h3>Shipping Details</h3>
                                    <input id="address" name="bship" type="checkbox" data-target="createp_account" style="margin-bottom:20px; font-size:14px;"><strong><span style="font-size:14px;">Same as billing details?</span></strong>
                                       <div class="row">
                                            <div class="col-lg-6 mb-20">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" name="sfname" id="sfname">
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <label>Last Name  <span>*</span></label>
                                                <input type="text" name="slname" id="slname">
                                            </div>
                                            <div class="col-lg-12 col-md-6 mb-20">
                                                <label>Company name (optional)</label>
                                                <input type="text" name="scompany" id="scompany">
                                            </div>

                                            <div class="col-lg-12 col-md-6 mb-20">
                                            <label for="country">country <span>*</span></label>
                                            <input type="text" name="scountry" value="Kuwait" readonly="">


                                            </div>

                                            <div class="col-lg-12 col-md-6 mb-20">
                                                <label>Address  <span>*</span></label>
                                                <input name="sstreet" id="sstreet" placeholder="Address" type="text" value="{{Auth::guard('frontend')->user()['shipping_address']}}">
                                            </div>
                                            <div class="col-lg-12 col-md-6 mb-20">
                                                <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="sappart" id="sappart">
                                            </div>
                                            <div class="col-lg-12 col-md-6 mb-20">
                                                <label>Town / City <span>*</span></label>
                                                <input type="text" name="scity" id="scity">
                                            </div>

                                            <div class="col-lg-12 col-md-6 mb-20">
                                                <label>Postcode / ZIP  <span>*</span></label>
                                                <input type="text" name="szip" id="szip">
                                            </div>

                                            <div class="col-lg-6 mb-20">
                                                <label>Phone<span>*</span></label>
                                                <input type="text" name="sphone" id="sphone">

                                            </div>
                                             <div class="col-lg-6">
                                                <label> Email Address   <span>*</span></label>
                                                  <input type="text" name="semail" id="semail">

                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-6 mb-10">
                                    <div class="order-notes">
                                         <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery." name="ordernotes"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-6">

                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $i=0;
                                $total=0;
                                $totalcal=0;
                                $totalcalcium=0;
                                $totalcarbohydrate=0;
                                 $totalprotien=0;
                                 $totalfat=0;
                                 $totalsugar=0;
                                 $totaliron=0;
                                 $totalcarbogram=0;
                                  $totalproteingram=0;
                                  $totalfatgram=0;
                                   $totalsugargram=0;
                                   $totalirongram=0;
                                   $totalcalciumgram=0;
                                   $unit=0;
                                ?>

                                @foreach($cartProducts as $key => $val)

                                @if($val->attributes->product_type=='product')

                                <?php
                                     $pro=DB::select("SELECT calories FROM  food_items WHERE id='$val->id'");
                                     $sql=DB::select("SELECT * FROM  compostions WHERE food_id='$val->id'");
                                    foreach($sql as  $value){
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
                                    if(is_numeric($val->quantity) && is_numeric( $pro[0]->calories))
                                    {
                                     $cal=$val->quantity * $pro[0]->calories;
                                     $totalcal+=$cal;

                                 }
                                 else
                                 {
                                    0;
                                 }

                                     ?>

                        @elseif($val->attributes->product_type=='plan_option')
                            <?php
                            $pro=$val->attributes->pro_id;
                            $prod=DB::select("SELECT calories FROM  food_items WHERE id='$pro'");
                            $sql2=DB::select("SELECT * FROM  plancompostions WHERE plan_id='$pro'");
                             foreach($sql2 as  $value){
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
                                    if(is_numeric($val->quantity) && is_numeric( $prod[0]->calories))
                                    {
                                     $cal=$val->quantity * $prod[0]->calories;
                                     $totalcal+=$cal;

                                 }
                                 else
                                 {
                                    0;
                                 }
                                     ?>

                                      @elseif($val->attributes->product_type=='plan')
                         <?php
                  $pro=DB::select("SELECT plan_calories FROM  foodplans WHERE id='$val->id'");
                  $sql=DB::select("SELECT * FROM  plancomposes WHERE plan_id='$val->id'");

                   foreach($sql as  $value){
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



                                @endif
                                    <tr>
                                            <td>{{$val->name}} <strong> × {{$val->quantity}}</strong><br>{{$val->attributes->addonname}}</td>
                                            <?php
                                   $price=$val->price*$val->quantity;

                                    if($val->attributes->addonsize!=0)
                                    {
                                    $price=$price+$val->attributes->addonprice;
                                    }
                                    ?>
                                            <td>{{$gs->currencySymbol}} {{$price}}</td>
                                    </tr>

                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SubTotal</th>
                                            <td>

                                                {{$gs->currencySymbol}} {{$sum}}</td>
                                        </tr>

                                        <tr>
                                            <th>Delivery Charges</th>

                                            <td> @if(count($cartProducts)>0){{$gs->currencySymbol}} {{$delivercharges[0]->deliverycharges}}@else {{$gs->currencySymbol}} 0 @endif</td>

                                        </tr>
                                        <tr class="order_total">
                                            <th>Total</th>

                                            <td>
                                                @if(count($cartProducts)>0)
                                                <strong> @php
                                                $del=$delivercharges[0]->deliverycharges+$sum;
                                                $del=number_format($del,3);
                                                @endphp
                                                {{$gs->currencySymbol}} {{$del}}</strong>@else {{$gs->currencySymbol}} 0 @endif</td>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div>

            <div class="facts-wrap">
                <div class="title-block">
                <h1 class="nutr">Nutrition Facts</h1>{{-- Serving Size 546 g<br>
                Serving Per Container 2    --}}
                </div>
<div class="amount-per-serving">

    <div class=""><span class="pull-left">Calories   <?php echo $totalcal;?></span>
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

       </div>                 </div>


                        <div class="col-md-6" style="margin-top: 20px;">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Order Location: </strong></label>
                                <select class="form-control" id="food_type" name="location" required>
                                    <option selected value="">Select Location</option>
                                    <option value="1">Mahboula</option>
                                    <option value="2">Jabriya</option>
                                </select>
                            </div>
                        </div>


                        <div class="payment_method col-md-6 col-xs-12">
                               <div class="panel-default">
                                    <input id="payment" checked name="cashondelivery" type="radio" data-target="createp_account" value="Cash on Delivery">
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method"> Cash on delivery</label>

                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>

                                </div>


                                <div class="panel-default">
                                    <input id="payment" name="cashondelivery" type="radio" data-target="createp_account" value="knet">
                                    <label for="payment" data-toggle="collapse" data-target="#method1" aria-controls="method">knet Payment Gateway</label>

                                    <div id="method1" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>pay via Knet; you can pay securely with your debit or credit card.</p>
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>


                                    <div class="scores">
                                   <div class="panel-default">
                                    <input id="payment" name="" type="checkbox" data-target="createp_accoun">
                                    <label for="payments"> I have read and agree to the website terms and conditions <strong>*</strong></label>
                                </div>
                            </div>



                                <div class="order_button">
                                    <button type="submit" class="pulp pull-right">Place Order</button>
                                </div>
                            </div>



                    </div>




                </div>
            </div>

            </form>

        </div>
        </div>
            <!--End Container-->
        </div>
        <!--End Gallery Wrap-->
    </section>
    <!--End Page Content-->


@endsection
