@extends('user.master')
@section('title',$gs->websiteTitle.' | Food Gallery')

@section('content')
<style type="text/css">

.main_content_area {
    padding: 70px 0 65px;
}
.container {
    max-width: 1170px;
}
.dashboard_tab_button ul li {
    margin-bottom: 5px;
}
.dashboard_tab_button ul li a {
    font-size: 14px;
    color: #ffffff;
    font-weight: 500;
    text-transform: capitalize;
    background: #a84d38;
    border-radius: 3px;
}
.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #a84d38;
}

.tab-content > .tab-pane {
    display: block;
    height: 0;
    opacity: 0;
    overflow: hidden;
}
.dashboard_content h3 {
    font-size: 22px;
    text-transform: capitalize;
    font-weight: 500;
    margin-bottom: 15px;
}
p:last-child {
    margin-bottom: 0;
}
.dashboard_content p a {
    color: #40A944;
    font-weight: 500;
}
.table-responsive .table {
    border-left: 1px solid #ededed;
    border-bottom: 1px solid #ededed;
    border-right: 1px solid #ededed;
}
.table-responsive table thead {
    background: #ededed;
}
.table-responsive table thead tr th {
    text-align: center;
}
.table-responsive table tbody tr td {
    border-right: 1px solid #ededed;
    font-weight: 500;
    text-transform: capitalize;
    font-size: 14px;
    text-align: center;
    min-width: 150px;
}

.dashboard_content address {
    font-weight: 500;
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
.dashboard_content h3 {
    font-size: 40px !important;
    text-transform: capitalize;
    font-weight: 500;
    margin-bottom: 15px;
}
.input-radio span {
    font-weight: 500;
    padding-right: 10px;
}
.input-radio span input[type="radio"], .account_login_form form span input[type="checkbox"] {
    width: 15px;
    height: 15px;
    margin-right: 2px;
    position: relative;
    top: 2px;
}
.account_login_form form input {
    border: 1px solid #ddd;
    background: none;
    height: 40px;
    margin-bottom: 20px;
    width: 100%;
    padding: 0 20px;
    color: #222222;
}
.account_login_form form input {
    border: 1px solid #ddd;
    background: none;
    height: 40px;
    margin-bottom: 20px;
    width: 100%;
    padding: 0 20px;
    color: #222222;
}

.dashboard_content button {
    color: #40A944;
    font-weight: 500;
    border: 0;
    background: inherit;
}

.btn-cop{
    background-color:#a84d38 !important;
    color: #fff !important;
}
.btn-cop:hover{
    color: #fff !important;
    border-color: #a84d38 !important;
}


</style>


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
<section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link">Dashboard</a></li>
                                  <li><a href="#account-details" data-toggle="tab" class="nav-link active show">Profile</a></li>

                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Food Items Orders</a></li>
                                <li> <a href="#planorders" data-toggle="tab" class="nav-link">Plans Orders</a></li>

                                 <li> <a href="#planoptionsorders" data-toggle="tab" class="nav-link">Plans Option Orders</a></li>

                                 <li> <a href="#momorders" data-toggle="tab" class="nav-link">Make Your Own Meal Orders</a></li>

                               <!--  <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li> -->

                                <li><a href="{{url('/userlogout')}}" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                            </div>

                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Food Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order as $key=>$val)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                  <td>{{$val->food_name}}</td>
                                                <td>{{date("d-m-Y", strtotime($val->created_at))}}</td>

                                                @if($val->status==0)
                                                <td><span class="success">Pending</span></td>
                                                @else
                                                <td><span class="success">Completed</span></td>
                                                @endif
                                                <td>{{$val->price}}</td>
                                                <td>


                                                    <a href="{{url('ordersdetails',$val->id)}}" class="view">view</a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="planorders">
                                <h3>Plans Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>
                                                <th>Plan Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Starting Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($planorders as $key=> $val)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                  <td>{{$val->plan_name}}</td>
                                                <td>{{$val->c_quantity}}</td>
                                                <td>{{$val->price*$val->c_quantity}}</td>


                                                <td>{{date('d-m-Y',strtotime($val->deliverydate))}}</td>
                                                <td>



                                            <a href="{{url('planorderprint',['uid'=>$val->userid,'oid'=>$val->id,'pid'=>$val->food_id])}}"  class="btn btn-cop btn-sm btn-square"><i class="fa fa-eye"></i></a>

                                                    <a href="#" class="view" data-id="{{$val->id}}"   data-pid="{{$val->food_id}}"  data-user="{{$val->userid}}" onclick="porderdays(this);">View Detail</a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                              <div class="tab-pane fade" id="planoptionsorders">
                                <h3>Plans Option Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>
                                                <th>Plan Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Starting Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($planoption as $key=> $val)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>  <a href="#" class="view" data-id="{{$val->id}}" onclick="porder(this);">{{$val->plan_name}}</a></td>
                                                <td>{{$val->c_quantity}}</td>
                                                <td>{{$val->price*$val->c_quantity}}</td>



                                                <td>{{date('d-m-Y',strtotime($val->created_at))}}</td>
                                                <td>

                              <a href="{{url('planoptorderprint',['uid'=>$val->userid,'oid'=>$val->id,'pid'=>$val->planoption_id])}}" class="btn btn-cop btn-sm btn-square"><i class="fa fa-eye"></i></a>


                                               {{--  <a href="{{url('planoptorderprint',['oid'=>$val->id])}}" class="btn btn-cop btn-sm btn-square"><i class="fa fa-print"></i></a> --}}

                                        <a href="#" class="view" data-id="{{$val->id}}" onclick="porder(this);">View Detail</a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                              <div class="tab-pane fade" id="momorders">
                                <h3>Make Your Own Meal Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>
                                                <th>Meal Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Starting Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mommeals as $key=> $val)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$val->meal_name}}</a></td>
                                                <td>{{$val->c_quantity}}</td>
                                                <td>{{$val->price*$val->c_quantity}}</td>
                                                <td>{{date('d-m-Y',strtotime($val->deliverydate))}}</td>
                                                <td>

                              <a href="{{url('momuserorderprint',['mid'=>$val->meal_id])}}" class="btn btn-cop btn-sm btn-square"><i class="fa fa-eye"></i></a>




                                        <a href="#" class="view" data-id="{{$val->meal_id}}" onclick="momorder(this);">View Detail</a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane fade active show" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="{{url('updateaccount')}}" method="post">
                                                @csrf

                                                <!-- <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                <div class="input-radio">
                                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                </div> <br> -->
                                                <label>First Name</label>
                                                <input type="text" name="name" value="{{$user[0]->name}}">
                                                <label>Last Name</label>
                                                <input type="text" name="ul_name" value="{{$user[0]->ul_name}}">
                                                <label>Email</label>
                                                <input type="text" name="email" value="{{$user[0]->email}}">
                                                <label>Password</label>
                                                <input type="password" name="password" value="{{$user[0]->name}}">
                                                <label>Phone</label>
                                                <input type="text" placeholder="Phone" value="{{$user[0]->phone}}" name="phone">
                                                <span class="example">

                                                </span>
                                                  <label>Billing Address</label>
                                                 <input type="text" placeholder="Billing Address" value="{{$user[0]->billing_address}}" name="billing_address">
                                                  <label>Shipping Address</label>
                                                 <input type="text" placeholder="Shipping Address"  name="shipping_address" value="{{$user[0]->shipping_address}}">

                                                  <label>Town / City </label>
                                                 <input type="text" placeholder="Town / City" name="city" value="{{$user[0]->city}}" >

                                                  <label>Postcode / ZIP </label>
                                                 <input type="text" placeholder="Postcode / ZIP"  name="postcode" value="{{$user[0]->postcode}}">

                                                <div class="save_button primary_btn default_button">
                                                   <button type="submit" class="btn btn-cop">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    </section>




        </div>



    <!-- Reject Alert Modal -->
    <div class="modal fade bd-example-modal-lg" id="DaysOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel"><strong>Plan Order Details</strong></h4>
                </div>

                <form action="{{!empty($order->id) ? route('admin.orderRemove',$order->id) : '#'}}" method="post">
                    @csrf

                    <div class="modal-body">

                        <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>

                                                <th>Food Item</th>
                                                <th>Day</th>
                                                <th>Food Type</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listingofdaysorders">

                                        </tbody>
                                    </table>
                                </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cop" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




        <!-- Reject Alert Modal -->
    <div class="modal fade bd-example-modal-lg" id="DaysOrders" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel"><strong>Plan Order Details</strong></h4>
                </div>

                <form action="{{!empty($order->id) ? route('admin.orderRemove',$order->id) : '#'}}" method="post">
                    @csrf

                    <div class="modal-body">

                        <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>

                                                <th>Plan Name</th>
                                                <th>Food Type</th>
                                                <th>Delivery Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listingofdaysorder">

                                        </tbody>
                                    </table>
                                </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cop" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


        <!-- MOM Meal Order Modal -->
    <div class="modal fade bd-example-modal-lg" id="MOMDaysOrders" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel"><strong>Make Your Own Order Details</strong></h4>
                </div>


                    <div class="modal-body">

                        <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr#</th>

                                                <th>Food Item</th>
                                                <th>Food Type</th>
                                                <th>Week</th>
                                                <th>Day</th>
                                                <th>Delivery Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="momlistingofdaysorder">

                                        </tbody>
                                    </table>
                                </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cop" data-dismiss="modal">Cancel</button>
                    </div>
            </div>
        </div>
    </div>




    <!--End Page Content-->
@section('scripts')


<script type="text/javascript">
       function porderdays(e)
        {
            var oid=$(e).attr('data-id');
            var uid=$(e).attr('data-user');
            var pid=$(e).attr('data-pid');
            var iq;
            $.ajax({

                url:'{{url('showupdatedstatus')}}',
                data:{uid:uid,oid:oid,pid:pid},
                type:'GET',
                 dataType: "json",
                success:function(data)
                {


                   console.log(data.daysorderslist);

                   $.each(data.daysorderslist, function(i, item) {

                    iq=iq + '<tr><td>'+i+'</td>><td>'+item.food_name+'</td><td>'+(item.day_id==1 ? 'Sunday' :'')+''+(item.day_id==2 ? 'Monday' :'')+''+(item.day_id==3 ? 'Tuesday' :'')+''+(item.day_id==4 ? 'Wednesday' :'')+''+(item.day_id==5 ? 'Thursday' :'')+''+(item.day_id==6 ? 'Friday' :'')+''+(item.day_id==7 ? 'Saturday' :'')+'</td><td>'+(item.food_type_id==1 ? 'BreakFast':'') +''+(item.food_type_id==2 ? 'Lunch':'') +''+(item.food_type_id==3 ? 'Snacks':'') +''+(item.food_type_id==4 ? 'Dinner':'') +'</td><td>'+(item.order_status==0 ? 'Pending':'')+''+(item.order_status==1 ? 'Confirm':'')+''+(item.order_status==2 ? 'Preparing':'')+''+(item.order_status==3 ? 'Delivered':'')+'</td></tr>';

                   });
                   $('#listingofdaysorders').html(iq);
                   $('#DaysOrder').modal('show');


                }

            });


        }

        function porder(e)
        {
            var orderid=$(e).attr('data-id');
            var iq;
            $.ajax({

                url:'{{url('showupdatedstatuss')}}',
                data:{orderid:orderid},
                type:'GET',
                 dataType: "json",
                success:function(data)
                {


                   console.log(data.daysorderslist);

                   $.each(data.daysorderslist, function(i, item) {

                    iq=iq + '<tr><td>'+i+'</td><td>'+item.plan_name+'</td>'+(item.day_id==1 ? 'Sunday' :'')+''+(item.day_id==2 ? 'Monday' :'')+''+(item.day_id==3 ? 'Tuesday' :'')+''+(item.day_id==4 ? 'Wednesday' :'')+''+(item.day_id==5 ? 'Thursday' :'')+''+(item.day_id==6 ? 'Friday' :'')+''+(item.day_id==7 ? 'Saturday' :'')+'</td><td>'+(item.food_type_id==1 ? 'BreakFast':'') +''+(item.food_type_id==2 ? 'Lunch':'') +''+(item.food_type_id==3 ? 'Snacks':'') +''+(item.food_type_id==4 ? 'Dinner':'') +'</td><td>'+item.created_at+'</td><td>'+(item.order_status==0 ? 'Pending':'')+''+(item.order_status==1 ? 'Confirm':'')+''+(item.order_status==2 ? 'Preparing':'')+''+(item.order_status==3 ? 'Delivered':'')+'</td></tr>';

                   });
                   $('#listingofdaysorder').html(iq);
                   $('#DaysOrders').modal('show');


                }

            });


        }

        function momorder(e)
        {
            var mealid=$(e).attr('data-id');
            var iq;
            $.ajax({

                url:'{{url('showmomupdatedstatus')}}',
                data:{mealid:mealid},
                type:'GET',
                 dataType: "json",
                success:function(data)
                {


                   console.log(data.daysorderslist);

                   $.each(data.daysorderslist, function(i, item) {

                    iq=iq + '<tr><td>'+i+'</td><td>'+item.food_name+'</td><td>'+(item.food_type==1 ? 'BreakFast':'') +''+(item.food_type==2 ? 'Lunch':'') +''+(item.food_type==3 ? 'Snacks':'') +''+(item.food_type==4 ? 'Dinner':'') +'</td><td>'+item.weekno+'</td><td>'+(item.day_id==1 ? 'Monday' :'')+''+(item.day_id==2 ? 'Thuesday' :'')+''+(item.day_id==3 ? 'Wednesday' :'')+''+(item.day_id==4 ? 'Thursday' :'')+''+(item.day_id==5 ? 'Friday' :'')+''+(item.day_id==6 ? 'Saturday' :'')+''+(item.day_id==7 ? 'Sunday' :'')+'</td><td>'+item.order_date+'</td><td>'+(item.status==0 ? 'Pending':'')+''+(item.status==1 ? 'Confirm':'')+''+(item.status==2 ? 'Preparing':'')+''+(item.order_status==3 ? 'Delivered':'')+'</td></tr>';

                   });
                   $('#momlistingofdaysorder').html(iq);
                   $('#MOMDaysOrders').modal('show');


                }

            });


        }


</script>
@endsection

@endsection
