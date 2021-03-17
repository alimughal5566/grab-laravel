<?php
$plancategories=DB::table('catplans')->select('id','category_name')->get();
$total=Cart::getContent();
$count=count($total); 
?>

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
                <!-- Start Atribute Navigation -->
            {{--<div class="attr-nav">--}}
            {{--<ul>--}}
            {{--<li class="search"><a href="#"><i class="icofont icofont-search"></i></a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="icofont icofont-navigation-menu"></i>
                    </button>
                    <a class="navbar-brand logo-main" href="{{route('user.home')}}">
                        <img src="{{asset('assets/user/images/custombilal/logo.png')}}" class="logo" alt=""
                             style="max-width: 200px; max-height: 50px;">
                    </a>

                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
                        <li>
                            <a href="{{route('user.home')}}">@lang('Home')</a>

                        </li>
                        <li><a href="{{route('user.about')}}">@lang('About Us')</a></li>
                        <li><a href="{{route('user.menu')}}">@lang('Menu')</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Plans</span></a>
                            <ul class="dropdown-menu animated fadeOut">
                                @foreach($plancategories as $plancate)
                                <li><a href="{{route('user.cat_plans',['id'=>$plancate->id])}}">{{$plancate->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </li> 

                        <li><a href="{{route('user.makemeal')}}">Make Your Meal</a></li>

                      <!--   <li><a href="{{route('user.reservation')}}">@lang('Reservation')</a></li> -->
                        <!--<li><a href="{{route('user.foods')}}">@lang('Our Food')</a></li>-->
                        <li><a href="{{route('user.gallery')}}">@lang('Food Gallery')</a></li>
                        <li><a href="{{route('user.event')}}">@lang('Our Events')</a></li>
                        <li><a href="{{route('user.blog')}}">@lang('Announcement')</a></li>
                        <!--<li><a href="{{route('user.contact')}}">@lang('Contact')</a></li>-->
                     <!--    <li><a href="{{url('/account')}}">@lang('Account')</a></li>-->

                     <!--@if(Auth::guard('frontend')->user())-->
                     <!--   <li><a href="{{url('userlogout')}}">Logout</a></li>-->
                     <!--   @else-->
                     <!--   <li><a href="{{url('user')}}">Login</a></li>-->
                     <!-- @endif-->
                      
                      
                        @if(Auth::guard('frontend')->user())
                        
                          <li class="dropdown">
                            <a href="{{url('user')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">
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
                      
                      <li><a href="{{url('/cart')}}" class="btn" style="background-color: #fff; color: #60ba62; border-radius: 10px; border: 1px solid #fff; padding: 8px 17px; margin-top: 21px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="item_count">&nbsp;&nbsp;&nbsp;{{$count}} item</span></a></li>
                      

                        {{-- <li style="padding-top: 30px;">
                            <select id="langSel">
                                <option style="color: black" value="en">English</option>
                                @foreach($lang as $data)
                                    <option value="{{$data->code}}"
                                            @if(Session::get('lang') === $data->code) selected
                                            @endif style="color: black">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </li> --}}
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