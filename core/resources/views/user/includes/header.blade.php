<?php
$plancategories=DB::table('catplans')->select('id','category_name')->get();
$planOptioncategories=DB::table('catoptionplans')->select('id','category_name')->get();
$total=Cart::getContent();
$count=count($total);
?>

<style type="text/css">


    /* CART */
.btn-success {
    border-color: #a84d38 !important;
        background-color: #a84d38 !important;
}

.cart-contents:before {
  font-family: 'FontAwesome';
  font-size: 28px;
  margin-top: 10px;
  font-style: normal;
  font-weight: 400;
  padding-right: 5px;
  vertical-align: middle;
  display: inline-block;
}

.cart-contents:hover {
  text-decoration: none;
}
.cart-contents-count {
  color: #fff;
  background-color: #2ecc71;
  font-weight: bold;
  border-radius: 10px;
  height: 1.2em;
  width: 1.2em;
  line-height: 1.2em;
  text-align: center;
  font-family: Arial, Helvetica, sans-serif;
  vertical-align: middle;
}


.cart-placement {
  float: right;
  padding-top: 15px!important;
  padding-bottom: 15px!important;
  padding-left: 15px!important;
  display: inline-block;
  line-height: 50px;
  padding: 0;
  position:relative;
}


a.cart-contents {
  color: #ff7454 !important;
}

a.cart-contents {
  position: relative;
}

.cart-contents-count,
.fa {
  display: inline-block;
  vertical-align: middle;
  margin: 0 0.25em
}




.mini_cart {
    position: absolute;
    min-width: 355px;
    padding: 0 28px;
    background: #fff;
    z-index: 999;
    right: 0;
    top: 142%;
    max-height: 0;
    visibility: hidden;
    overflow: hidden;
    border: 1px solid #ededed;
    -webkit-transition: 0.5s;
    transition: 0.5s;
}
.cart_item {
    overflow: hidden;
    padding: 11px 5px;
    border-bottom: 1px solid #ededed;
    display: flex;
    justify-content: space-between;
}
.cart_img {
    width: 90px;
    margin-right: 10px;
    border: 1px solid transparent;
}
.cart_info {
    width: 63%;
}
.cart_info a {
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    display: block;
    margin-bottom: 6px;
}
.cart_info p {
    font-size: 12px;
}
p:last-child {
    margin-bottom: 0;
}
.cart_info p span {
    font-weight: 600;
}
.cart_remove a {
    font-size: 15px;
    display: block;
    line-height: 20px;
    text-align: center;
}

.mrt{
  margin-top: 2%;
}

</style>

<header class="header">
    <div class="main-menu">
        <nav class="navbar navbar-default bootsnav" data-spy="affix" data-offset-top="10">
            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icofont icofont-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-addon close-search"><i class="icofont icofont-close"></i></span>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <!--Start Container-->
            <div class="container">

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="icofont icofont-navigation-menu"></i>
                    </button>
                    <a class="navbar-brand logo-main" href="{{route('user.home')}}">
                        <img src="{{asset('assets/user/images/frontEnd/food.png')}}" class="logo" alt=""
                             style="max-width: 75px;margin-top: -13px">
                    </a>

                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
                        <li>
                            <a href="{{route('user.home')}}">@lang('Home')</a>

                        </li>

                        <li class="dropdown">
                            <a href="{{route('user.menu')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Menu</span></a>
                            <ul class="dropdown-menu animated fadeOut">
                                 @if(!empty($foodCategories))
                                 @foreach($foodCategories as $val)
                                        <li> <a href="{{url('categoriespro',$val->id)}}">{{$val->food_category_name}}</a> </li>
                                        @endforeach
                                        @endif
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="{{route('user.listplancategories')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Plans</span></a>
                            <ul class="dropdown-menu animated fadeOut">
                                @foreach($plancategories as $plancate)
                                <li><a href="{{route('user.cat_plans',['id'=>$plancate->id])}}">{{$plancate->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="{{route('user.listplansoptionscat')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Plans Options</span></a>
                            <ul class="dropdown-menu animated fadeOut">
                                @foreach($planOptioncategories as $planoptcate)
                                <li><a href="{{route('user.cat_planoptions',['id'=>$planoptcate->id])}}">{{$planoptcate->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{route('user.meal')}}">Make Your Meal</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">FoodGrab Options</span></a>
                            <ul class="dropdown-menu animated fadeOut">
                                <li><a href="{{route('user.about')}}">@lang('About Us')</a></li>
                                <li><a href="{{route('user.gallery')}}">@lang('Food Gallery')</a></li>
                                <li><a href="{{route('user.event')}}">@lang('Our Events')</a></li>
                                <li><a href="{{route('user.contact')}}">@lang('Contact')</a></li>
                                <!--<li><a href="{{route('user.blog')}}">@lang('Announcement')</a></li>-->
                            </ul>
                        </li>



                        @if(Auth::guard('frontend')->user())

                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">
                                <!--<img src="{{asset('assets/user/images/bilal/user1.png')}}">-->
                                @php
                                    $loggedusername=Auth::guard('frontend')->user()->name.' '.Auth::guard('frontend')->user()->ul_name;
                                    echo ucfirst($loggedusername);
                                @endphp
                                </span></a>
                            <ul class="dropdown-menu animated fadeOut">

                         <li><a href="{{url('/account')}}">@lang('Profile')</a></li>

                        <li><a href="{{url('userlogout')}}">Logout</a></li>


                            </ul>
                        </li>

                        @else
                          <li><a href="{{url('/user')}}">@lang('Login')</a></li>
                        @endif



                                  <li class="dropdown">
                                      <div class="cart-placement">



                                      <a href="{{url('cart')}}" class="btn btn-success" style="background-color: #eed4c8; color:#fff; border-radius: 10px;">
                                      <span class="glyphicon glyphicon-shopping-cart"></span><span class="badge badge"></span> {{$count}} item
                                      </a>


                                      <ul class="dropdown-menu animated fadeOut" style="width: 450px; display: none; right: 0px; left: auto; padding: 10px">





                                          <?php

                                                foreach($total as $val)
                                                {
                                                if($val->attributes->product_type=='product'){
                                                  $sql=DB::select("SELECT food_image FROM  food_items WHERE id='$val->id'")[0];
                                                }
                                                else if($val->attributes->product_type=='meal')
                                                {
                                                    $sel_p_id=$val->attributes->pro_id;
                                                    $sql=DB::select("SELECT food_image FROM  food_items WHERE id='$sel_p_id'")[0];
                                                }
                                                  ?>
                                                <div class="cart_item">
                                                   <div class="cart_img">
                                                       @if($val->attributes->product_type=='product')
                                                       <a href="{{url('/cart')}}"><img src="{{asset('assets/user/images/foods/'.$sql->food_image)}}" width="90px"></a>
                                                       @elseif($val->attributes->product_type=='meal')
                                                       <a href="{{url('/cart')}}"><img src="{{asset('assets/user/images/meal/noimage.png')}}" width="90px"></a>
                                                       @elseif($val->attributes->product_type=='plan')
                                                       <a href="{{url('/cart')}}"><img src="{{asset('assets/user/images/plans/'.$val->attributes->image)}}" width="90px"></a>
                                                       @elseif($val->attributes->product_type=='plan_option')
                                                       <a href="{{url('/cart')}}"><img src="{{asset('assets/user/images/planoptions/'.$val->attributes->image)}}" width="90px"></a>
                                                       @endif
                                                   </div>
                                                    <div class="cart_info">
                                                        <a href="{{url('/cart')}}" style="color: #000;">{{$val->name}}</a>
                                                         <?php
                                   $price=$val->price*$val->quantity;

                                    if($val->attributes->addonsize!=0)
                                    {
                                    $price=$price+$val->attributes->addonprice;
                                    }



                                   ?>

                                                        <p>{{$val->quantity}} x <span>{{$val->price}} ={{$gs->currencySymbol}} {{$price}}</span></p>

                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="{{url('/delete-cart',$val->id)}}"><i class="fa fa-remove" style="color:red"></i></a>
                                                    </div>
                                                </div>
                                                <?php
                                              }
                                              ?>
                                            <div class="cart_remove">
                                                <button onclick="window.location='{{ url("checkout") }}'" class="btn btn-success mrt pull-right" >Checkout</button>
                                            </div>



                            </ul>

                                      </div>



                                    </li>



                      <!--   <div class="col-md-9">
                            @if(session()->has('message'))
                            <p class="alert alert-success"></p>
                            {{session()->get('message')}}
                            @endif
                        </div> -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!--End Container-->
        </nav>
    </div>
    <div class="clearfix"></div>
</header>
