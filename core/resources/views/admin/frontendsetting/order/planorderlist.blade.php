@extends('admin.master')

@section('title', 'Admin | Order List')

@section('body')
    <div class="container-fluid">

            <h2 class="mb-4">
                Orders Of Plans
            </h2>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <p><b>Order List:</b></p>
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">email</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key=>$order)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$order->plan_name}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->email}}</td>

                                    <td>{{date("d-m-Y",strtotime($order->deliverydate))}}                                        </td>
                                    
                                        <td>
                                        <select class="form-control status">
                                            
                                    <option value="0" data-id="{{$order->id}}" @if ($order->status==0) selected='selected' @endif >Pending</option>
                                    <option value="1" data-id="{{$order->id}}" @if ($order->status==1) selected='selected' @endif >Done</option>
                                    <option value="2" data-id="{{$order->id}}" @if ($order->status==2) selected='selected' @endif >Cancel</option>
                                        </select>
                                        </td>

                                  
                                    <td>
                                       <!--  <a href="{{route('admin.orderAccept',$order->id)}}"
                                           class="btn btn-success btn-sm btn-square" onclick="return confirm('Are you sure ?')">Accept</a>

                                        <a href="" class="btn btn-danger btn-sm btn-square" data-toggle="modal" data-target="#OrderReject">Reject</a> -->

                                        <!--<a href="{{route('admin.orderDetails',$order->id)}}" class="btn btn-info btn-sm btn-square">Detail</a>-->
                                     

                                         <a href="{{route('admin.planorderprintdays',['uid'=>$order->userid,'oid'=>$order->id,'pid'=>$order->food_id])}}"  class="btn btn-success btn-sm btn-square"><i class="fa fa-eye"></i></a>


                                        <a href="{{route('admin.planorderdays',['uid'=>$order->userid,'oid'=>$order->id,'pid'=>$order->food_id])}}" class="btn btn-success btn-sm btn-square">View Orders</a>



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
        $('#orderPage li:nth-child(2)').addClass('active');
        $('#orderPage').addClass('show');

    </script>
     <script type="text/javascript">
    $(document).ready(function(){ 
        $('select.status').on('change',function(){
            var Status = $(this).children("option:selected").val();
            var  rowID=$(this).find(":selected").attr("data-id");

            $.ajax({

                url:'{{url('admin/statusUpdateplan')}}',
                
               // data:'rowID='+ rowID + '&status='+Status,
                data:{id:rowID,status:Status},
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

