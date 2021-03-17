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
    background: #60ba62;
    border-radius: 3px;
}
.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #60ba62;
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
    font-size: 22px;
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
                            <h2 class="text-upper">@lang('Food Gallery')</h2>
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

                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                               
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
                                                <td><a href="{{url('ordersdetails',$val->id)}}" class="view">view</a></td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         
                         <!--    <div class="tab-pane" id="address">
                               <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address">Billing address</h4>
                                <a href="#" class="view">Edit</a>
                                <p><strong>Bobby Jackson</strong></p>
                                <address>
                                    House #15<br>
                                    Road #1<br>
                                    Block #C <br>
                                    Banasree <br>
                                    Dhaka <br>
                                    1212
                                </address>
                                <p>Bangladesh</p>   
                            </div> -->
                            <div class="tab-pane fade active show" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="#">
                                                <!-- <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                <div class="input-radio">
                                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                    <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                </div> <br> -->
                                                <label>First Name</label>
                                                <input type="text" name="first-name" value="{{$user[0]->name}}">
                                                <label>Last Name</label>
                                                <input type="text" name="last-name" value="{{$user[0]->ul_name}}">
                                                <label>Email</label>
                                                <input type="text" name="email-name" value="{{$user[0]->email}}">
                                                <label>Password</label>
                                                <input type="password" name="user-password" value="{{$user[0]->name}}">
                                                <label>Phone</label>
                                                <input type="text" placeholder="Phone" value="{{$user[0]->phone}}" name="birthday">
                                                <span class="example">
                                                 
                                                </span>
                                               <!--  <br>
                                                <span class="custom_checkbox">
                                                    <input type="checkbox" value="1" name="optin">
                                                    <label>Receive offers from our partners</label>
                                                </span>
                                                <br>
                                                <span class="custom_checkbox">
                                                    <input type="checkbox" value="1" name="newsletter">
                                                    <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                </span> -->
                                                <div class="save_button primary_btn default_button">
                                                   <button type="submit" class="btn btn-info">Save</button>
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



     

     
    <!--End Page Content-->


@endsection