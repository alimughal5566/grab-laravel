@extends('admin.master')

@section('title', 'Admin | Order List')

@section('body')
    <div class="container-fluid">

            <h2 class="mb-4">
                Orders Of Plan
            </h2>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <p><b>Plan Days List:</b></p>
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Food Item</th>
                           
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
                                    <td>{{$orderday->plan_name}}</td>
                           
                                    <td>
                                        @if($orderday->food_type_id==1)
                                            Breakfast
                                        @elseif($orderday->food_type_id==2)
                                            Lunch
                                        @elseif($orderday->food_type_id==3)
                                            Snacks
                                        @elseif($orderday->food_type_id==4)
                                            Dinner
                                        @endif
                                    </td>
                                  <td>{{date('d-m-Y',strtotime($orderday->created_at))}}</td>
                                    <td>
                                        @if($orderday->order_status==0)
                                            <span style="background-color: #ffc107; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Pending</span>
                                        @elseif($orderday->order_status==1)
                                            <span style="background-color: #117a8b; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Confirm</span>
                                        @elseif($orderday->order_status==2)
                                            <span style="background-color: #0062cc; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Preparing</span>
                                        @elseif($orderday->order_status==3)
                                            <span style="background-color: #1e7e34; color: #fff; border: none; padding: 2px 7px; border-radius: 5px;">Delivered</span>
                                        @endif
                                    </td>
                                           
                                        
                                 
                                        
                                        
                                  
                                    <td>
                                       <select class="form-control status">
                                            <option  value="0" data-id="{{$orderday->opid}}" person-id="{{$uid}}" plan-id="{{$orderday->planoption_id}}"  foodtype-id="{{$orderday->food_type_id}}" @if ($orderday->order_status==0) selected='selected' @endif >Pending</option>


                                              <option  value="1" data-id="{{$orderday->opid}}" person-id="{{$uid}}" plan-id="{{$orderday->planoption_id}}"  foodtype-id="{{$orderday->food_type_id}}" @if ($orderday->order_status==1) selected='selected' @endif >Confirm</option>


                                                <option  value="2" data-id="{{$orderday->opid}}" person-id="{{$uid}}" plan-id="{{$orderday->planoption_id}}"  foodtype-id="{{$orderday->food_type_id}}" @if ($orderday->order_status==2) selected='selected' @endif >Preparing</option>


                                                <option  value="3" data-id="{{$orderday->opid}}" person-id="{{$uid}}" plan-id="{{$orderday->planoption_id}}"  foodtype-id="{{$orderday->food_type_id}}" @if ($orderday->order_status==3) selected='selected' @endif >Delivered</option>


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
    <div class="modal modal-danger fade" id="OrderReject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    </div>


@section('scripts')
    {{--dropdown active--}}
    <script>
        $('#orderPage li:nth-child(3)').addClass('active');
        $('#orderPage').addClass('show');

    </script>
     <script type="text/javascript">
    $(document).ready(function(){ 
        $('select.status').on('change',function(){
            var  Status=$(this).children("option:selected").val();
            var  orderId=$(this).find(":selected").attr("data-id");
            var  personId=$(this).find(":selected").attr("person-id");
            var  planId=$(this).find(":selected").attr("plan-id");
            var  foodtypeId=$(this).find(":selected").attr("foodtype-id");

            $.ajax({

                url:'{{url('admin/statusUpdateplanoptionorder')}}',
               // data:'rowID='+ rowID + '&status='+Status,
                data:{orderid:orderId,personid:personId,planid:planId,foodtypeid:foodtypeId,status:Status},
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

