@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')

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
    background: #60ba62;
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
    background: #40A944;
    font-weight: 500;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    margin-bottom: 0;
    border-radius: 5px;
}
.order_button button:hover {
   /* background: #222222;*/
   background:#60ba62;
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

        <!--Start Gallery Wrap-->
        <div class="gallery-wrap">
          <div class="container">
              @if(isset($cart) && $cart->getContent())

            <form action="{{url('storecustomer')}}" method="post">
                @csrf
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Billing Details</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name="bfname">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name  <span>*</span></label>
                                    <input type="text" name="blfname">
                                </div>


                                <div class="col-12 mb-20">
                                    <label>Company name (optional)</label>
                                    <input type="text" name="bcompany">
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="country">country <span>*</span></label>
                                   <input type="text" name="bcountry" value="Kuwait" readonly="">


                                </div>

                                <div class="col-12 mb-20">
                                    <label>Street address  <span>*</span></label>
                                    <input placeholder="House number and street name" name="bstreet" type="text">
                                </div>
                                <div class="col-12 mb-20">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" name="bappart" type="text">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name="bcity">
                                </div>

                                 <div class="col-12 mb-20">
                                    <label>Postcode / ZIP  <span>*</span></label>
                                    <input type="text" name="bzip">
                                </div>

                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="bphone">

                                </div>
                                 <div class="col-lg-6 mb-20">
                                    <label> Email Address   <span>*</span></label>
                                      <input type="text" name="bemail">

                                </div>

                                <div class="col-12 mb-20">
                                    <input id="address" name="bship" type="checkbox" data-target="createp_account">
                                    <label class="righ_0" for="address" data-toggle="collapse" data-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label>

                                    <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                       <div class="row">
                                            <div class="col-lg-6 mb-20">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" name="sfname">
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <label>Last Name  <span>*</span></label>
                                                <input type="text" name="slname">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>Company name (optional)</label>
                                                <input type="text" name="scompany">
                                            </div>

                                            <div class="col-12 mb-20">
                                            <label for="country">country <span>*</span></label>
                                            <input type="text" name="scountry" value="Kuwait" readonly="">


                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Street address  <span>*</span></label>
                                                <input name="sstreet" placeholder="House number and street name" type="text">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="sappart">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>Town / City <span>*</span></label>
                                                <input type="text" name="scity">
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Postcode / ZIP  <span>*</span></label>
                                                <input type="text" name="szip">
                                            </div>

                                            <div class="col-lg-6 mb-20">
                                                <label>Phone<span>*</span></label>
                                                <input type="text" name="sphone">

                                            </div>
                                             <div class="col-lg-6">
                                                <label> Email Address   <span>*</span></label>
                                                  <input type="text" name="semail">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
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
                                ?>

                                @foreach($cartProducts as $val)

                                        <tr>
                                            <td>{{$val->name}} <strong> × {{$val->quantity}}</strong></td>
                                             <?php
                                    $subtotal=$val->quantity * $val->price;
                                    ?>
                                            <td> K.D {{$subtotal}}</td>
                                        </tr>

                                       <?php  $total=$total+$subtotal?>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SubTotal</th>
                                            <td>K.D {{$sum}}</td>
                                        </tr>

                                        <tr>
                                            <th>Deliver Charges</th>
                                            <td>{{$gs->currencySymbol}} {{$delivercharges[0]->deliverycharges}} </td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Total</th>

                                            <td><strong> @php
                                                $del=$delivercharges[0]->deliverycharges+$sum;
                                                @endphp
                                                {{$gs->currencySymbol}} {{$del}}</strong></td>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                               <div class="panel-default">
                                    <input id="payment" name="cashondelivery[]" type="radio" data-target="createp_account">
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method"> Cash on delivery</label>

                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>

                                </div>


                                <div class="panel-default">
                                    <input id="payment" name="cashondelivery[]" type="radio" data-target="createp_account">
                                    <label for="payment" data-toggle="collapse" data-target="#method1" aria-controls="method">knet Payment Gateway</label>

                                    <div id="method1" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>pay via Knet; you can pay securely with your debit or credit card.</p>
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>

                                   <div class="panel-default">
                                    <input id="payment" name="" type="checkbox" data-target="createp_accoun">
                                    <label for="payments"> I have read and agree to the website terms and conditions <strong>*</strong></label>
                                </div>



                                <div class="order_button">
                                    <button type="submit" class="pulp pull-right">Place Order</button>
                                </div>
                            </div>

                    </div>

                </div>
            </div>

            </form>
             @else
                    <p>No Product in</p>
                    @endif
        </div>
        </div>
            <!--End Container-->
        </div>
        <!--End Gallery Wrap-->
    </section>
    <!--End Page Content-->


@endsection
