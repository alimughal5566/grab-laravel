@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')

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
    background: #60ba62;
    color: #fff;
}
.cart_page table thead tr:last-child th, .table_desc table tbody tr td:last-child {
    border-right: 0;
}

.table_desc .cart_page table thead tr th {
    border-bottom: 3px solid #40A944;
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
    background: #60ba62;
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
    background: #60ba62;
    text-transform: uppercase;
    font-size: 16px;
    font-weight: 500;
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
    background: #60ba62;
    color: #ffffff;
}

.coupon_inner a:hover {
    color: #40A944;
}

.checkout_btn a {
    background: #40A944;
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
.product_remove a:hover{
    color: red;
}

</style>
    <!--Start Page Content-->
    <section class="page-content fix">

        <script type="text/javascript">
    $(document).ready(function(){ 
       $('#cartmsg').hide();
        @foreach($cartProducts as $val)

        $("#upCart{{$val->id}}").on('change keyup',function(){
            var newQty=$("#upCart{{$val->id}}").val();
            var rowID=$("#rowID{{$val->id}}").val();
            $.ajax({

                url:'{{url('/cart/update')}}',
                data:'rowID='+ rowID + '&newQty='+newQty,
                type:'get',
                success:function(response)
                {
                    window.location.href="{{url('/cart')}}",
                    //console.log(response);
                    $('#cartmsg').html(response);
                      $('#cartmsg').show();
                }

            });
        });
        @endforeach
    })
</script>


        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="text-upper">Cart</h2>
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

        <!--Start Gallery Wrap-->

        <div class="gallery-wrap">
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
                                $i=0;
                                $total=0;
                                ?>

                                @foreach($cartProducts as $val)

                                @if($val->attributes->product_type=='product')


                                <tr>
                                   <td class="product_remove"><a href="{{url('/delete-cart',$val->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                    <?php
                                     $sql=DB::select("SELECT food_image FROM  food_items WHERE id='$val->id'")[0];
                            
                                    $result=DB::select("SELECT food_categories.food_category_name FROM `food_items` JOIN food_categories ON food_categories.id=food_items.food_category_id where food_items.id='$val->id'")[0];
                      
                                    ?>
                    
                                    <td class="product_thumb"><a href="#"><img src="{{asset('assets/user/images/foods/'.$sql->food_image)}}" alt=""></a></td>
                                    <td class="product_name"><a href="#" style="color: #575757; font-weight: 600;">{{$val->name}}</a></td>
                                    <td class="product_name">{{$result->food_category_name}}</td>

                                    <td class="product-price" id="prce" style="color: #60ba62; font-weight:700;">{{$gs->currencySymbol}} {{$val->price}}</td>
                                   
                                    <td class="product_quantity"><input min="1" id="upCart{{$val->id}}" class="qty-fill" max="100" value="{{$val->quantity}}" type="number" style="height: 40px; text-align: center; width: 40px; border: 1px solid #60ba62;"><input type="hidden" id="rowID{{$val->id}}" value="{{$val->id}}"></td>

                                <!--     <td class="product_quantity">
                                        
                                        <input min="1" class="alice" value="{{$val->quantity}}" type="number" name="qty">
                                      

                                       <button class="btn"><i class="fa fa-refresh" aria-hidden="true"></i></button></td> -->
                                       
                                   <?php
                                   $price=$val->price*$val->quantity;
                                   ?>
                                    <td class="product_total" id="tosps" style="color: #575757; font-weight:700;">{{$gs->currencySymbol}} {{$price}}</td>

                                    
                                </tr>

                                @elseif($val->attributes->product_type=='plan')


                                <tr>
                                   <td class="product_remove"><a href="{{url('/delete-cart',$val->id)}}"><i class="fa fa-trash-o"></i></a></td>
                    
                                    <td class="product_thumb"><a href="#"><img src="{{asset('assets/user/images/plans/'.$val->attributes->image)}}" alt=""></a></td>
                                    <td class="product_name"><a href="#" style="color: #575757; font-weight: 600;">{{$val->name}}</a></td>
                                    <td class="product_name">Plan</td>

                                    <td class="product-price" id="prce" style="color: #60ba62; font-weight:700;">{{$gs->currencySymbol}} {{$val->price}}</td>
                                   
                                    <td class="product_quantity"><input min="1" id="upCart{{$val->id}}" class="qty-fill" max="100" value="{{$val->quantity}}" type="number" style="height: 40px; text-align: center; width: 40px; border: 1px solid #60ba62;"><input type="hidden" id="rowID{{$val->id}}" value="{{$val->id}}"></td>
                                       
                                   <?php
                                   $price=$val->price*$val->quantity;
                                   ?>
                                    <td class="product_total" id="tosps" style="color: #575757; font-weight:700;">{{$gs->currencySymbol}} {{$price}}</td>

                                    
                                </tr>

                                @elseif($val->attributes->product_type=='own_meal')


                                <tr>
                                   <td class="product_remove"><a href="{{url('/delete-cart',$val->id)}}"><i class="fa fa-trash-o"></i></a></td>
                    
                                    <td class="product_thumb"><a href="#"><img src="
                                        @if($val->attributes->image!='')
                                        {{asset('assets/user/images/meal/'.$val->attributes->image)}}
                                        @elseif($val->attributes->image=='')
                                        {{asset('assets/user/images/meal/noimage.png')}}
                                        @endif
                                        " alt=""></a></td>
                                    <td class="product_name"><a href="#" style="color: #575757; font-weight: 600;">{{$val->name}}</a></td>
                                    <td class="product_name">Own Created Meal</td>

                                    <td class="product-price" id="prce" style="color: #60ba62; font-weight:700;">{{$gs->currencySymbol}} {{$val->price}}</td>
                                   
                                    <td class="product_quantity"><input min="1" id="upCart{{$val->id}}" class="qty-fill" max="100" value="{{$val->quantity}}" type="number" disabled style="height: 40px; text-align: center; width: 40px; border: 1px solid #60ba62;"><input type="hidden" id="rowID{{$val->id}}" value="{{$val->id}}"></td>
                                       
                                   <?php
                                   $price=$val->price*$val->quantity;
                                   ?>
                                    <td class="product_total" id="tosps">{{$gs->currencySymbol}} {{$price}}</td>

                                    
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
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">K.D  {{Cart::getSubTotal()}}</p>
                                   </div>
                                
                                   
                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">K.D  {{Cart::getSubTotal()}}
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
                <!--coupon code area end-->
            </form>
               

            </div>
        </div>
            <!--End Container-->
        </div>
        <!--End Gallery Wrap-->
    </section>
    <!--End Page Content-->


@endsection
