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
                        <i class="fas fa-3x fa-fw fa-calendar-alt"></i>

                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="{{route('admin.events.index')}}" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0">Total Event</p></a>
                    <h3 class="font-weight-bold mb-0">{{count($events)}}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">

        <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-user"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="{{route('admin.OurChefs.index')}}" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0">Total Chef</p></a>
                    <h3 class="font-weight-bold mb-0">{{count($chefs)}}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-list"></i>

                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="{{route('admin.blogCategory.index')}}" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0">Post Category</p></a>

                    <h3 class="font-weight-bold mb-0">{{count($blogCategories)}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex border">
                <div class="customs_bd text-light p-4">
                    <div class="d-flex align-items-center h-100">
                          <span style="font-size: 35px; width: 55px;">
                              <i class="fas fa-bullhorn"></i>
                         </span>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <a href="{{route('admin.post.index')}}" style="text-decoration: none;"><p class="text-uppercase text-secondary mb-0">Total Announcement</p></a>
                    <h3 class="font-weight-bold mb-0">{{count($blogs)}}</h3>
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

@endsection