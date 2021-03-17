@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')


@section('content')
<style type="text/css">
    .pb-100 {
    padding-bottom: 100px;
}
.pt-100 {
    padding-top: 100px;
}
.pb-30 {
    padding-bottom: 30px;
}
a, button, input {
    outline: medium none;
    color: #242424;
}
.shop-topbar-wrapper {
    border: 1px solid #e9e9e9;
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
    padding: 15px 24px;
}
.view-mode {
    display: inline-block;
    float: left;
    margin-right: 33px;
}

.view-mode li {
    display: inline-block;
}
.view-mode li.active a {
    color: #60ba62;
}
.view-mode li a {
    color: #898888;
    font-size: 20px;
    display: inline-block;
    margin: 0 10px 0 0;
}
.shop-topbar-left > p {
    display: inline-block;
    margin: 3px 0 0;
}



.pb-20 {
    padding-bottom: 20px;
}
.mb-30 {
    margin-bottom: 30px;
}
.product-img {
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
.pro-action-left > a {
    color: #000000;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
}

.pro-action-left > a i {
    font-size: 20px;
    margin-right: 9px;
}

.product-content {
    padding: 26px 0 0;
}
.product-content > h4 {
    color: #2f333a;
    font-size: 14px;
    font-weight: 500;
    margin: 0 0 8px;
}

.product-price-wrapper > span {
    color: #2f333a;
    font-weight: 500;
}

.product-price-wrapper > span.product-price-old {
    color: #e02c2b;
    margin-left: 12px;
    text-decoration: line-through;
}
.product-price-wrapper > span {
    color: #2f333a;
    font-weight: 500;
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
.shop-list-cart-wishlist {
    display: inline-block;
    float: left;
    margin-right: 3px;
}
.shop-list-cart-wishlist a {
    background-color: #F5F5F5;
    border-radius: 5px;
    color: #242424;
    display: inline-block;
    font-size: 20px;
    height: 50px;
    line-height: 52px;
    margin: 0 8px 0 0;
    text-align: center;
    transition: all 0.3s ease 0s;
    width: 52px;
}

.pagination-total-pages {
    border: 1px solid #e9e9e9;
    padding: 15px 24px 13px;
}
.pagination-total-pages {
    display: flex;
    justify-content: space-between;
}

.pagination-style li {
    display: inline-block;
    list-style: outside none none;
    margin: 0 8px 0 0;
}

.pagination-style li a.prev-next {
    padding: 11px 22px;
}
.pagination-style li a {
    background-color: #f1f1f1;
    border-radius: 3px;
    color: #242424;
    display: inline-block;
    line-height: 1;
    padding: 11px 13px;
}

.pagination-style li a.prev i {
    margin-right: 7px;
}

.pagination-style li a:hover, .pagination-style li a.active, .pagination-style li a.next:hover {
    background-color: #e02c2b;
    color: #fff;
}
.pagination-style li a {
    background-color: #f1f1f1;
    border-radius: 3px;
    color: #242424;
    display: inline-block;
    line-height: 1;
    padding: 11px 13px;
}
.pagination-style li {
    display: inline-block;
    list-style: outside none none;
    margin: 0 8px 0 0;
}
.total-pages > p {
    margin: 4px 0 0;
}
p {
    font-size: 14px;
    font-weight: 400;
    line-height: 24px;
    color: #242424;
    margin-bottom: 15px;
    font-family: 'Rubik', sans-serif;
}

.shop-sidebar-wrapper {
    border: 1px solid #efefef;
    padding: 17px 18px 29px;
}
h4.shop-sidebar-title {
    font-size: 18px;
    font-weight: 500;
    margin: 0;
}
.shop-catigory > ul {
    border-top: 1px solid #ebebeb;
    margin: 18px 0 0;
    padding: 27px 0 0;
}
.shop-catigory ul > li {
    display: block;
    list-style: outside none none;
    padding: 0 0 13px;
}
.shop-catigory ul > li a {
    color: #242424;
    display: block;
    position: relative;
}
.shop-catigory ul > li a i {
    float: right;
    color: #7a7a7a;
    font-size: 14px;
}

.shop-catigory ul > li > ul li {
    padding: 7px 0 0 15px;
}
.shop-catigory ul > li {
    display: block;
    list-style: outside none none;
    padding: 0 0 13px;
}
.shop-catigory ul > li ul li a {
    color: #666;
}
.shop-catigory ul > li a {
    color: #242424;
    display: block;
    position: relative;
}
.shop-catigory ul > li > ul li {
    padding: 7px 0 0 15px;
}
.shop-catigory ul > li {
    display: block;
    list-style: outside none none;
    padding: 0 0 13px;
}
.shop-sidebar-border {
    border-top: 1px solid #ebebeb;
}

.pt-35 {
    padding-top: 35px;
}
.mt-40 {
    margin-top: 40px;
}
h4.shop-sidebar-title {
    font-size: 18px;
    font-weight: 500;
    margin: 0;
}
.mt-25 {
    margin-top: 25px;
}

.price_filter > span {
    color: #242424 !important;
    display: block !important;
    margin: 0 0 21px !important;
}
.price_filter .ui-slider.ui-slider-horizontal.ui-widget.ui-widget-content.ui-corner-all {
    background: #dbdbdb none repeat scroll 0 0;
    border: medium none;
    border-radius: 50px;
    height: 5px;
    margin-bottom: 12px;
    margin-left: auto;
}
.price_filter .ui-slider-handle.ui-state-default.ui-corner-all {
    background: #e02c2b none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    height: 15px;
    margin-left: 0;
    width: 15px;
}
.ui-slider-horizontal .ui-slider-handle {
    top: -6px;
}
.price_slider_amount > button {
    background-color: #60ba62;
    border: medium none;
    border-radius: 5px;
    color: #fff;
    line-height: 1;
    padding: 8px 16px;
    cursor: pointer;
    transition: all .3s ease 0s;
}
 
.sidebar-list-style ul li {
    display: block;
    list-style: outside none none;
    padding: 0 0 6px;
}
.sidebar-list-style ul li input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 1px solid #d7d7d7;
    float: left;
    height: 17px;
    margin: 3px 12px 0 0;
    padding-left: 0;
    width: 17px;
    cursor: pointer;
}
.sidebar-list-style ul li a {
    color: #242424;
}
.compare-product > p {
    color: #242424;
    margin: 20px 0 24px;
}
.compare-product-btn {
    display: flex;
    justify-content: space-between;
}
.compare-product-btn > span {
    color: #242424;
    margin: 4px 0 0;
}
.compare-product-btn > a {
    background-color: #242424;
    border-radius: 3px;
    color: #fff;
    display: inline-block;
    line-height: 1;
    padding: 5px 15px 8px;
}
h4.shop-sidebar-title {
    font-size: 18px;
    font-weight: 500;
    margin: 0;
}
.shop-tags li {
    display: inline-block;
    list-style: outside none none;
    margin: 0 4px 11px 0;
}

.shop-tags a {
    border: 1px solid #60ba62;
    border-radius: 3px;
    color: #60ba62;
    display: inline-block;
    line-height: 1;
    padding: 8px 12px;
}

.price_slider_amount .label-input input {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    box-shadow: none;
    color: #363f4d;
    font-size: 14px;
    height: auto;
    margin: 3px 0 14px;
    padding-left: 0;
    width: 100%;
}
.product-img img {
    width: 100%;
}


.pro-action-left > a {
    color: #000000;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
}

.pagination-style li a:hover, .pagination-style li a.active, .pagination-style li a.next:hover {
    background-color: #60ba62;
    color: #fff;
}
.pagination-style li a.next {
    background-color: #60ba62;
    color: #fff;
}

a:hover {
    color: #333;
    text-decoration: none;
}

.shop-catigory ul li:hover > a i {
    color: #e02c2b;
}
.shop-catigory ul > li a i {
    float: right;
    color: #7a7a7a;
    font-size: 14px;
}






.header_right_info {
    display: flex;
    align-items: center;
    justify-content: flex-end;
/*    margin-top: 1%;
    margin-left:25%; */
}

.search_container {
    margin-right: 35px;
    margin-top: 10%;
}
.search_container form {
    display: flex;
    border-radius: 30px;
    border: 1px solid #ededed;
    background: #fff;
    width: 540px;
}
.hover_category {
    position: relative;
    border-radius: 25px 0 0 25px;
}

.hover_category .select_option {
    border: 0;
    background: #f5f5f5;
    padding-left: 25px;
    padding-right: 35px;
    font-size: 13px;
    height: 45px;
    line-height: 45px;
    border-radius: 25px 0 0 25px;
}
.select_option {
    display: flex;
    align-items: center;
}

.hover_category .select_option {
    border: 0;
    background: #f5f5f5;
    padding-left: 25px;
    padding-right: 35px;
    font-size: 13px;
    height: 45px;
    line-height: 45px;
    border-radius: 25px 0 0 25px;
}
.select_option {
    display: flex;
    align-items: center;
}
.hover_category .select_option ul.list {
    max-height: 300px;
    overflow: auto;
}
.hover_category .select_option::after {
    top: 54%;
    right: 13px;
}

.hover_category {
    position: relative;
    border-radius: 25px 0 0 25px;
}
.search_box {
    position: relative;
    width: 100%;
}
.search_box input {
    border: 0;
    background: inherit;
    width: 100%;
    height: 45px;
    color: #222222;
    font-size: 14px;
    font-weight: 400;
    padding: 0 75px 0 20px;
    opacity: 0.7;
}

.search_box button {
    border: 0;
    position: absolute;
    top: 0;
    height: 100%;
    line-height: 48px;
    width: 60px;
    padding: 0;
    text-align: center;
    right: 0;
    font-weight: 400;
    font-size: 20px;
    border-radius: 0 30px 30px 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    background:#60ba62;
    color: #fff;
}

.lnr {
    font-family: 'Linearicons-Free';
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.search_box button {
    border: 0;
    position: absolute;
    top: 0;
    height: 100%;
    line-height: 48px;
    width: 60px;
    padding: 0;
    text-align: center;
    right: 0;
    font-weight: 400;
    font-size: 20px;
    border-radius: 0 30px 30px 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    background: #40A944;
    color: #fff;
}

.header_account_area {
    display: flex;
    justify-content: flex-end;
}

.header_account_list {
    margin-right: 20px;
}

.header_account_list.register ul li {
    display: inline-block;
}
.header_account_list.register ul li a {
    text-transform: uppercase;
}

.header_account_list > a {
    font-size: 26px;
    display: flex;
    align-items: center;
}
.header_account_list:last-child {
    margin-right: 0;
}
.mini_cart_wrapper {
    position: relative;
}
.header_account_list {
    margin-right: 20px;
}

.header_account_list span.item_count {
    margin-left: 5px;
    width: 18px;
    height: 18px;
    line-height: 18px;
    background: #e6e6e6;
    color: #222222;
    border-radius: 100%;
    text-align: center;
    font-weight: 400;
    font-size: 12px;
    display: inline-block;
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
    padding: 11px 0;
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

.btn-cop{
    background-color:#60ba62 !important; 
    color: #ffffff;
}



.slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height: 25px; /* Specified height */
  background: #d3d3d3; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
  transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
  opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
.slider::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #4CAF50; /* Green background */
  cursor: pointer; /* Cursor on hover */
}



.sort_by_top_filters {
    padding: 0;
}
.full_width {
    float: left;
    width: 100%;
    box-sizing: border-box;
}
.sort_by_top_filters li:first-child {
    line-height: 27px;
    font-weight: 500;
}
.sort_by_top_filters li {
    list-style: none;
    float: left;
    width: auto;
    margin-right: 16px;
}

.sort_by_top_filters li a {
  background-color: #60ba62 !important;
    color: #ffffff;
    text-decoration: none;
    line-height: 25px;
    float: left;
    width: auto;
    border: 1px solid #60ba62;
    border-radius: 5px;
    padding: 5px 8px;
}
.sort_by_top_filters li a:hover {
    background-color: #fff !important;
    border: 1px solid #60ba62;
    color: #60ba62;
}
.btn-cop:hover{
    color: #fff !important;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/linearicons.css')}}">




    <!--Start Page Content-->
    <section class="page-content fix">
        

      <div class="col-lg-10">
                            <div class="header_right_info">
                                <div class="search_container">
                                   
                                       <div class="hover_category">
                                            <select class="select_option" name="select" id="categori2" style="display: none;">
                                                <option selected="" value="1">Select a categories</option>
                                                <option value="2">Accessories</option>
                                                <option value="3">Accessories &amp; More</option>
                                                <option value="4">Butters &amp; Eggs</option>
                                                <option value="5">Camera &amp; Video </option>
                                             
                                            </select>            
                                       </div>
                                       <form action="{{url('searchfood')}}" method="get">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text" name="food">
                                             <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="header_account_area">
                                 
                                 
                                    <div class="header_account_list  mini_cart_wrapper" style="margin-top:100px">
                                       <a href="{{url('/cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="item_count">{{$count}}</span></a>
                                        <!--mini cart-->
                                        <div class="mini_cart">
                                           <!--  <div class="cart_gallery">
                                                <div class="cart_item">
                                                   <div class="cart_img">
                                                       <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                                                   </div>
                                                    <div class="cart_info">
                                                        <a href="#">Primis In Faucibus</a>
                                                        <p>1 x <span> $65.00 </span></p>    
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="#"><i class="icon-x"></i></a>
                                                    </div>
                                                </div>
                                                <div class="cart_item">
                                                   <div class="cart_img">
                                                       <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                                                   </div>
                                                    <div class="cart_info">
                                                        <a href="#">Letraset Sheets</a>
                                                        <p>1 x <span> $60.00 </span></p>    
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="#"><i class="icon-x"></i></a>
                                                    </div>
                                                </div>
                                            </div> -->
                                         
                                       
                                        </div>
                                        <!--mini cart end-->
                                   </div>
                                </div>
                            </div>
                        </div>


<div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                   <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Filter Your Meal</h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                       @foreach($result2 as $val)
                                      
                                        <li> <a href="{{url('categoriespro',$val->id)}}">{{$val->food_category_name}}</a> </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Price Filter</h4>
                                <div class="price_filter mt-25">
                                   <form action="{{url('pricefilter')}}" method="get">
                                    @csrf
                                <div class="slidecontainer">
                                    <input type="hidden" name="minprice" value="30">
                                  <input type="range" name="maxprice" min="1" max="2000" value="15" class="slider" id="myRange">
                                 
                                </div>
                                
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <p>Value: <span id="demo"></span></p>
                                        </div>
                                        <button type="submit">Filter</button> 
                                    </div>
                                    </form>
                                </div>
                            </div>
                          <!--   <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">By Brand</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <li><input type="checkbox"><a href="#">Poure </a></li>
                                        <li><input type="checkbox"><a href="#">Eveman </a></li>
                                        <li><input type="checkbox"><a href="#">Iccaso </a></li>
                                        <li><input type="checkbox"><a href="#">Annopil </a></li>
                                        <li><input type="checkbox"><a href="#">Origina </a></li>
                                        <li><input type="checkbox"><a href="#">Perini  </a></li>
                                        <li><input type="checkbox"><a href="#">Dolloz </a></li>
                                        <li><input type="checkbox"><a href="#">Spectry </a></li>
                                    </ul>
                                </div>
                            </div> -->
                        <!--     <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">By Color</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <li><input type="checkbox"><a href="#">Black </a></li>
                                        <li><input type="checkbox"><a href="#">Blue </a></li>
                                        <li><input type="checkbox"><a href="#">Green </a></li>
                                        <li><input type="checkbox"><a href="#">Grey </a></li>
                                        <li><input type="checkbox"><a href="#">Red</a></li>
                                        <li><input type="checkbox"><a href="#">White  </a></li>
                                        <li><input type="checkbox"><a href="#">Yellow   </a></li>
                                    </ul>
                                </div>
                            </div> -->
                        <!--     <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Compare Products</h4>
                                <div class="compare-product">
                                    <p>You have no item to compare. </p>
                                    <div class="compare-product-btn">
                                        <span>Clear all </span>
                                        <a href="#">Compare <i class="fa fa-check"></i></a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Popular Tags</h4>
                                <div class="shop-tags mt-25">
                                    <ul>
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Gluten Free</a></li>
                                        <li><a href="#">Organic</a></li>
                                        <li><a href="#">Vegan</a></li>
                                        <li><a href="#">Vegetarian</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 70px !important"></div>
                    <div class="col-lg-9">
                        <div class="banner-area pb-30">
                            <a href="product-details.html"><img alt="" src="{{asset('assets/user/images/custombilal/banner-49.jpg')}}"></a>
                        </div>
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                               <ul class="view-mode"> 
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                 <!--    <li class=""><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li> -->
                              </ul>
                          <!--       <p>Showing 1 - 20 of 30 results  </p> -->
                            </div>
                           
                            <div class="product-sorting-wrapper">
                              
            <ul class="full_width sort_by_top_filters">
                    <li><label>Sort By:</label></li>
             
                <li><a href="{{url('/price-asc')}}">Price, Low to High</a></li>
                <li><a href="{{url('/price-desc')}}">Price, High to Low</a></li>
              </ul>

                            

                              
                            </div>
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-view pb-20 product-grid">
                            
                                <div class="row">
                                   
                                        @foreach($result as $val)
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                               <a href="{{url('productdetail/'.$val->id)}}">
                                                    <img src="{{asset('assets/user/images/foods/'.$val->food_image)}}" alt="">
                                                  
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h4>
                                                    
                                                    <center><a href="{{url('productdetail/'.$val->id)}}"><strong>{{$val->food_name}} </strong></a></center>
                                                    
                                                </h4>
                                          
                                                <div class="product-price-wrapper" style="margin-bottom: 10px;">
                                                    <center><strong style="color: #60ba62;">KD <span style="font-size: 16px;">{{$val->food_price}}
                                                        </span></strong>
                                                    </span>

                                                   <!--  <span class="product-price-old">$120.00 </span> -->
                                                </div>
                                                <form action="{{url('/cart-add')}}" method="POST">
                                                    @csrf
                                                  <input type="hidden" name="ProductId" value="{{$val->id}}">
                                                  <input type="hidden" name="image" value="{{$val->food_image}}">
                                                  <input type="hidden" name="qty" value="1">
                                                   <button class="btn btn-cop col-md-offset-4">Add to cart</button> 
                                                    
                                                   
                                                    </form>
                                               
                                            </div>
                                         
                                        </div>
                                    </div>
                                   
                                     @endforeach
                                  
                                </div>


                            </div>
                         

                              <div class="row">
                    <div class="col-md-12">
                        <div class="post-pagination text-center">
                            <ul class="pagination m-0">
                                {{$result->links()}}
                            </ul>
                        </div>
                    </div>
                </div>

                        </div>
                    </div>
                   
                </div>
            </div>
        </div>    

  

<!--End Page Content-->

<script type="text/javascript">
    var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}

$(document).on('change',function(){
    var price=$('.pricegrid').val();
        $.ajax({

                url:'{{url('pricefiltergrid')}}',
                data:{id:price},
                type:'GET',
                 dataType: "json",
                success:function(data)
                {
                   
                   console.log(data);
                   
                }

            });
})

</script>
@endsection