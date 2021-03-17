@extends('admin.master')

@section('title', 'Admin | Order List')
@section('body')

    <div class="container-fluid">
       <h2 class="mb-4">
               Make Your Own Meal Details
               <span style="margin-left: 60%"><input type="button" class="btn btn-primary" onclick="window.location='{{route('admin.planorderlist')}}'" value="Back"></span>
<span style="margin-left: 1%"><input type="button" class="btn btn-success" onClick="printdiv('div_print');" value=" Print "></span>
            </h2>
           

        <div class="row">
            <div class="col-md-12">
                <div id="div_print" >
                <div class="card">
                    <div class="card-body">
              <div class="invoice p-3 mb-3">
              <!-- title row -->
            
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Light Option
                    {{-- <small class="float-right">{{date("d-m-Y",strtotime($orders[0]->created_at))}}</small> --}}
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{$logged_user_detail[0]->name}} {{$logged_user_detail[0]->ul_name}}</strong><br>
                    Phone: {{$logged_user_detail[0]->phone}}<br>
                    Email: {{$logged_user_detail[0]->email}}<br>
                     <strong>Order Location:</strong> @if($orderdetail[0]->location==1)
                        Mahboula
                    @else
                    Jabriya
                    @endif
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong>Billing Details</strong>
                  <address>
                    Full Name: {{$orderdetail[0]->bill_fname}} {{$orderdetail[0]->bill_lname}}</strong><br>
                   Company: {{$orderdetail[0]->companyname}}<br>
                   Country:{{$orderdetail[0]->bill_country}}<br>
                    Street: {{$orderdetail[0]->bill_street}}<br>
                    Appartment: {{$orderdetail[0]->bill_appartment}}<br>
                    Town: {{$orderdetail[0]->bill_town}}<br>
                    Zip: {{$orderdetail[0]->bill_zip}}<br>
                    Phone: {{$orderdetail[0]->bill_phone}}<br>
                    Email: {{$orderdetail[0]->bill_email}}<br>
                   
                  </address>
                </div>



                  <div class="col-sm-4 invoice-col">
                  <strong>Shipping Details</strong>
                  <address>
                    Full Name: {{$orderdetail[0]->ship_fname}} {{$orderdetail[0]->ship_lname}}</strong><br>
                   Company: {{$orderdetail[0]->ship_company}}<br>
                   Country:{{$orderdetail[0]->ship_country}}<br>
                    Street: {{$orderdetail[0]->ship_street}}<br>
                    Appartment: {{$orderdetail[0]->ship_appartment}}<br>
                    Town: {{$orderdetail[0]->ship_town}}<br>
                    Zip: {{$orderdetail[0]->ship_zip}}<br>
                    Phone: {{$orderdetail[0]->ship_phone}}<br>
                    Email: {{$orderdetail[0]->ship_email}}<br>
                   
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

                    @php
                     $count=count($mealdetails);
                     // dd($count);
                    @endphp
                        <th rowspan="{{$count}}">Invoice #</th>
                      <th rowspan="{{$count}}">Meal Name</th>
                       <th>Food Item</th>
                      <th>week</th>
                      <th>Day</th>
                      <th>Food Type</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    

                     @foreach($mealdetails as $key => $val)
                    <tr>
                    
                    @if($key==0)
                    <td rowspan="0">
                    {{$orderdetail[0]->invoice_no}}
                    </td>
                    <td rowspan="0">
                    {{$mom_name}}
                    </td>
                    @endif

                    <td>
                    {{$val->food_name}}
                    </td>

                    <td>
                    {{$val->weekno}}
                    </td>

                      <td>
                          @if($val->day_id==1)
                              Monday
                          @elseif($val->day_id==2)
                              Tuesday
                          @elseif($val->day_id==3)
                              Wednesday
                          @elseif($val->day_id==4)
                              Thursday
                          @elseif($val->day_id==5)
                              Friday
                          @elseif($val->day_id==6)
                              Saturday
                          @elseif($val->day_id==7)
                              Sunday
                          @endif  
                      </td>
                      
                         
                     
                      <td>
                        @if($val->food_type==1)
                                            Breakfast
                                        @elseif($val->food_type==2)
                                            Lunch
                                        @elseif($val->food_type==3)
                                            Snacks
                                        @elseif($val->food_type==4)
                                            Dinner
                                        @endif 
                        </td>
                    </tr>
                  @endforeach
                
               
              
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
           
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">{{-- Payment Methods: --}}</p>
                <!--   <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  {{--   Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. --}}
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                 <!--  <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{number_format($orderdetail[0]->price,3)}}</td>
                      </tr>
                     
                     
                      <tr>
                        <th>Total:</th>
                        <td>{{number_format($orderdetail[0]->price,3)}}</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
</div>

              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                 <!--  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                 <!--  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> -->
                 
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
        $('#orderPage li:nth-child(4)').addClass('active');
        $('#orderPage').addClass('show');
    </script>
 <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
@endsection
@endsection
