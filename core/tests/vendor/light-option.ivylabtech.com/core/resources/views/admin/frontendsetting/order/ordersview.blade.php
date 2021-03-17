@extends('admin.master')

@section('title', 'Admin | Order List')

@section('body')
    <div class="container-fluid">

            <h2 class="mb-4">
               Order Details
            </h2>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                     
                     

                        <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Cragus, Inc.
                    <small class="float-right">{{date("d-m-Y",strtotime($orders[0]->created_at))}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                   {{$orders[0]->name}} {{$orders[0]->ul_name}}<br>
                    San Francisco, CA 94107<br>
                    Phone: {{$orders[0]->phone}}<br>
                    Email: {{$orders[0]->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong>Billing Details</strong>
                  <address>
                    Fulll Name: {{$orders[0]->bill_fname}} {{$orders[0]->bill_lname}}</strong><br>
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



                  <div class="col-sm-4 invoice-col">
                  <strong>Shipping Details</strong>
                  <address>
                    Fulll Name: {{$orders[0]->ship_fname}} {{$orders[0]->ship_lname}}</strong><br>
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


                <!-- /.col -->
             <!--    <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div> -->
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
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

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                <!--   <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                 <!--  <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$orders[0]->price}}</td>
                      </tr>
                     
                     
                      <tr>
                        <th>Total:</th>
                        <td>{{$orders[0]->price}}</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                 <!--  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                 <!--  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> -->
                  <button type="button"  onclick="window.location='{{route('admin.orderList')}}'" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-arrow-left"></i> Back
                  </button>
                </div>
              </div>
            </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

   


@section('scripts')
    {{--dropdown active--}}
    <script>
        $('#orderPage li:nth-child(1)').addClass('active');
        $('#orderPage').addClass('show');
    </script>
@endsection

@endsection

