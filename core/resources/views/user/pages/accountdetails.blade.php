@extends('user.master')
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

        @media print {

            .invoice-info {
                float: left !important;
                width: 100%;
            }

            .mem1 {
                float: left !important;
                width: 33% !important;
            }

            .mem2 {
                float: left !important;
                width: 33% !important;
            }

            .mem3 {
                float: left !important;
                width: 33% !important;
            }

            .page-title {
                display: none !important;
            }

            .ok {
                display: none !important;
            }

            .footer {
                display: none !important;
            }

            .tbrows {
                float: left !important;
                width: 100%;
            }

            .tbrows2 {
                float: left !important;
                width: 100%;
            }

        }
    </style>


    <!------ Include the above in your HEAD tag ---------->


    <!--Start Page Content-->
    <!--Start Page Title-->
    <div class="page-title bg-cover position-relative"
         style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
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
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <!-- Nav tabs -->

                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->


                        <div class="tab-pane">
                            <h3 class="ok">Orders
                                <span style="margin-left: 75%"><input type="button" class="btn btn-primary"
                                                                      onclick="window.location='{{url('account')}}'"
                                                                      value="Back"></span>
                                <span style="margin-left: 1%"><input type="button" class="btn btn-success"
                                                                     onclick="doPrint()" value=" Print "></span>

                            </h3>

                            <div id="div_print">
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-globe"></i> Light Option
                                                <small
                                                    class="float-right">{{date("d-m-Y",strtotime($orders[0]->created_at))}}</small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col mem1">
                                            From
                                            <address>
                                                <strong> {{$orders[0]->name}} {{$orders[0]->ul_name}}</strong><br>

                                                Phone: {{$orders[0]->phone}}<br>
                                                Email: {{$orders[0]->email}}<br>
                                                <strong>Order Location:</strong> @if($orders[0]->location==1)
                                                    Mahboula
                                                @else
                                                    Jabriya
                                                @endif
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col mem2">
                                            <strong>Billing Details</strong>
                                            <address>
                                                Full
                                                Name: {{$orders[0]->bill_fname}} {{$orders[0]->bill_lname}}</strong><br>
                                                Company: {{$orders[0]->companyname}}<br>
                                                Country:{{$orders[0]->bill_country}}<br>
                                                Street: {{$orders[0]->bill_street}}<br>
                                                Appartment: {{$orders[0]->bill_appartment}}<br>
                                                Town: {{$orders[0]->bill_town}}<br>
                                                Zip: {{$orders[0]->bill_zip}}<br>
                                                Phone: {{$orders[0]->bill_phone}}<br>
                                                Email: {{$orders[0]->bill_email}}<br>

                                            </address>
                                        </div>


                                        <div class="col-sm-4 invoice-col mem3">
                                            <strong>Shipping Details</strong>
                                            <address>
                                                Full
                                                Name: {{$orders[0]->ship_fname}} {{$orders[0]->ship_lname}}</strong><br>
                                                Company: {{$orders[0]->ship_company}}<br>
                                                Country:{{$orders[0]->ship_country}}<br>
                                                Street: {{$orders[0]->ship_street}}<br>
                                                Appartment: {{$orders[0]->ship_appartment}}<br>
                                                Town: {{$orders[0]->ship_town}}<br>
                                                Zip: {{$orders[0]->ship_zip}}<br>
                                                Phone: {{$orders[0]->ship_phone}}<br>
                                                Email: {{$orders[0]->ship_email}}<br>

                                            </address>
                                        </div>
                                    </div>

                                    <div class="row tbrows">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Qty</th>
                                                    <th>Category</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>

                                                    <td>{{$orders[0]->food_name}}</td>
                                                    <td>{{$orders[0]->c_quantity}}</td>
                                                    <td>{{$orders[0]->food_category_name}}</td>
                                                    <td>{{$orders[0]->price}}</td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row tbrows2">
                                        <div class="col-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td>{{$orders[0]->price}}</td>
                                                    </tr>


                                                    <tr>
                                                        <th>Total:</th>
                                                        <td>{{$orders[0]->price}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->


                                </div>
                            </div>


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

    <script language="javascript">
        function doPrint() {

            window.print();

        }
    </script>

@endsection
