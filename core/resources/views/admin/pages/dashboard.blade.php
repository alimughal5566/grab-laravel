@extends('admin.master')

@section('title', 'Admin Dashboard')
@section('body')


    <h2 class="mb-4">Dashboard</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <span style="font-size: 35px; width: 55px;">
                             <i class="fas fa-utensils"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="{{route('admin.foodCategory.index')}}" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Total food Category </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($foodCategories)}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fas fa-utensils"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="{{route('admin.foods.index')}}" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> TOTAL Food </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($foodItems)}} </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fas fa-utensils"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="{{route('admin.orderList')}}" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Today's Food Items Orders </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($fooditem)}} </h3>
                </div>
            </div>
        </div>


        <!--<div class="col-md-4">-->
        <!--</div>         -->

            <div class="col-md-12 pt-2">
            <h2 class="mb-4">Food Order</h2>
            </div>

         <div class="col-md-3">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-clock"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Pending </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($prodpend)}}</h3>
                </div>
            </div>
        </div>



           <div class="col-md-3">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-check"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Confirm   </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($prodcon)}}</h3>
                </div>
            </div>
        </div>


           <div class="col-md-3">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-tasks"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Preparing </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($prodprep)}}</h3>
                </div>
            </div>
        </div>



               <div class="col-md-3">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fas fa-truck"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Delivery </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($proddel)}}</h3>
                </div>
            </div>
        </div>



         <div class="col-md-12 pt-2">
            <h2 class="mb-4">Plan Orders</h2>
            </div>

         <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-clock"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Pending </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($planpend)}}</h3>
                </div>
            </div>
        </div>



           <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-window-close"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Cancel </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($plancancel)}}</h3>
                </div>
            </div>
        </div>


           <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-check"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Done </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($plandone)}}</h3>
                </div>
            </div>
        </div>







         <div class="col-md-12 pt-2">
            <h2 class="mb-4">Plan Option Orders</h2>
            </div>

         <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-clock"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Pending </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($planoptpend)}}</h3>
                </div>
            </div>
        </div>



           <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-window-close"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Cancel  </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($planoptcancel)}}</h3>
                </div>
            </div>
        </div>


           <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-check"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Done </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($planoptdone)}}</h3>
                </div>
            </div>
        </div>


        <div class="col-md-12 pt-2">
            <h2 class="mb-4">Meal Orders</h2>
        </div>

         <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-clock"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Pending </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($mealpend)}}</h3>
                </div>
            </div>
        </div>



           <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-window-close"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Cancel  </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($mealcancel)}}</h3>
                </div>
            </div>
        </div>


           <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">

                         <span style="font-size: 35px; width: 55px;">
                             <i class="fa fa-check"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="#" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0"> Done </p></a>
                    <h3 class="font-weight-bold mb-0">{{count($mealdone)}}</h3>
                </div>
            </div>
        </div>




    </div>


    {{--graph--}}
    <h2 class="mb-4">Order Statistics</h2>
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Order Statistics By Graph
        </div>
        <div class="card-body">
            <div id="order" style="height: 250px;"></div>

        </div>
    </div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
             var months = @php echo json_encode(array_values(month_arr()));  @endphp;
            new Morris.Line({
                element: 'order',
                data: @php echo $order; @endphp,
                xkey: 'month',
                ykeys: [ 'PendingOrder','CompleteOrder'],
                labels: ['Pending','Complete'],

                xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
                    var month = months[x.getMonth()];
                    return month;
                },
                dateFormat: function(x) {
                    var month = months[new Date(x).getMonth()];
                    return month;
                },
            });
        });
    </script>

    <!-- morris css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/morris.css')}}">
    <script src=" {{asset('assets/admin/js/raphael-min.js')}}"></script>
    <script src=" {{asset('assets/admin/js/morris.min.js')}}"></script>

@endsection
<script>
    $('#admindashboard').addClass('active');
    $('#admindashboard').addClass('show');
</script>
@endsection
