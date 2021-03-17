@extends('admin.master')

@section('title', 'Admin | Order List')

@section('body')
    <div class="container-fluid">

            <h2 class="mb-4">
                Orders Of Make Your Own Meal
            </h2>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <p><b>MOM Days List:</b></p>
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Food Item</th>
                                <th scope="col">Week</th>
                                <th scope="col">Day</th>
                                <th scope="col">Food Type</th>
                                <th scope="col">Delivery Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Update Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderdays as $key=>$orderday)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$orderday->food_name}}</td>
                                    <td>{{$orderday->weekno}}</td>
                                    <td>
                                        @if($orderday->day_id==1)
                                            Monday
                                        @elseif($orderday->day_id==2)
                                            Tuesday
                                        @elseif($orderday->day_id==3)
                                            Wednesday
                                        @elseif($orderday->day_id==4)
                                            Thursday
                                        @elseif($orderday->day_id==5)
                                            Friday
                                        @elseif($orderday->day_id==6)
                                            Saturday
                                        @elseif($orderday->day_id==7)
                                            Sunday
                                        @endif
                                    </td>
                                    <td>
                                        @if($orderday->food_type==1)
                                            Breakfast
                                        @elseif($orderday->food_type==2)
                                            Lunch
                                        @elseif($orderday->food_type==3)
                                            Snacks
                                        @elseif($orderday->food_type==4)
                                            Dinner
                                        @endif
                                    </td>
                                    <td>                                           
                                        {{date('d-m-Y',strtotime($orderday->order_date))}}
                                    </td>
                                    <td>
                                        @if($orderday->status==0)
                                            <span style="background-color: #ffc107; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Pending</span>
                                        @elseif($orderday->status==1)
                                            <span style="background-color: #117a8b; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Confirm</span>
                                        @elseif($orderday->status==2)
                                            <span style="background-color: #0062cc; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Preparing</span>
                                        @elseif($orderday->status==3)
                                            <span style="background-color: #1e7e34; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Delivered</span>
                                        @endif
                                    </td>
                                           
                                        
                                        {{-- <select class="form-control status">
      <option  value="0" data-id="{{$order->id}}" @if ($order->status==0) selected='selected' @endif >Pending</option>                                       
                                    <option value="1" data-id="{{$order->id}}" @if ($order->status==1) selected='selected' @endif >Confirm</option>
                                    <option value="2" data-id="{{$order->id}}" @if ($order->status==2) selected='selected' @endif >Preparing</option>
                                    <option value="3" data-id="{{$order->id}}" @if ($order->status==3) selected='selected' @endif >Delivered</option>
                                        </select> --}}
                                        
                                        
                                  
                                    <td>
                                        <select class="form-control status">
                                            <option  value="0" data-id="{{$orderday->id}}" @if ($orderday->status==0) selected='selected' @endif >Pending</option>                                       
                                            <option value="1" data-id="{{$orderday->id}}" @if ($orderday->status==1) selected='selected' @endif >Confirm</option>

                                            <option value="2" data-id="{{$orderday->id}}" @if ($orderday->status==2) selected='selected' @endif >Preparing</option>

                                            <option value="3" data-id="{{$orderday->id}}" @if ($orderday->status==3) selected='selected' @endif >Delivered</option>
                                        </select>
                                    </td>



                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Alert Modal -->
{{--     <div class="modal modal-danger fade" id="OrderReject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel"><strong>Reason for canceling</strong></h4>
                </div>

                <form action="{{!empty($order->id) ? route('admin.orderRemove',$order->id) : '#'}}" method="post">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="reject_message" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


@section('scripts')
    {{--dropdown active--}}
    <script>
        $('#orderPage li:nth-child(4)').addClass('active');
        $('#orderPage').addClass('show');

    </script>
     <script type="text/javascript">
    $(document).ready(function(){ 
        $('select.status').on('change',function(){
            var status=$(this).children("option:selected").val();
            var mealid=$(this).find(":selected").attr("data-id");

            $.ajax({

                url:'{{url('admin/statusUpdatemom')}}',
                data:{mealid:mealid,status:status},
                type:'GET',
                 dataType: "json",
                success:function(data)
                {
                    console.log(data);
                    if(data.result=='true'){
                        window.location.reload();  
                    }
                }

            });
        });
      
    })
</script>



@endsection

@endsection

