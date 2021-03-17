@extends('admin.master')

@section('title', 'Admin | Order List')

@section('body')
    <div class="container-fluid">

            <h2 class="mb-4">
                Order List
            </h2>

        <div class="row">

            <div class="col-md-12">
                 <div class="alert alert-info" id="ordermsg">
             </div>
                <div class="card">
                    <div class="card-body">

                        <p><b>Order List:</b></p>
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Food Name</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">email</th>
                                <th scope="col">quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key=>$order)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$order->food_name}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->sumq}}</td>

                                    <td>
                                           
                                        
                                        <select class="form-control status">
      <option  value="0" data-id="{{$order->id}}" @if ($order->status==0) selected='selected' @endif >Pending</option>                                       
                                    <option value="1" data-id="{{$order->id}}" @if ($order->status==1) selected='selected' @endif >Confirm</option>
                                    <option value="2" data-id="{{$order->id}}" @if ($order->status==2) selected='selected' @endif >Preparing</option>
                                    <option value="3" data-id="{{$order->id}}" @if ($order->status==3) selected='selected' @endif >Delivered</option>
                                        </select>
                                        
                                        </td>
                                  
                                    <td>
                                       <!--  <a href="{{route('admin.orderAccept',$order->id)}}"
                                           class="btn btn-success btn-sm btn-square" onclick="return confirm('Are you sure ?')">Accept</a>

                                        <a href="" class="btn btn-danger btn-sm btn-square" data-toggle="modal" data-target="#OrderReject">Reject</a> -->

                                        <a href="{{route('admin.orderDetails',$order->users_id)}}" class="btn btn-info btn-sm btn-square">view</a>

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
        $('#orderPage li:nth-child(1)').addClass('active');
        $('#orderPage').addClass('show');

    </script>
     <script type="text/javascript">
    $(document).ready(function(){ 
            $('#ordermsg').hide();
        $('select.status').on('change',function(){
            var Status = $(this).children("option:selected").val();
            var  rowID=$(this).find(":selected").attr("data-id");

            $.ajax({

                url:'{{url('admin/statusUpdate')}}',
               // data:'rowID='+ rowID + '&status='+Status,
                data:{id:rowID,status:Status},
                type:'GET',
                success:function(data)
                {
                   
                      window.location.href = "{{url('admin/orderList')}}";
                       $('#ordermsg').html(data);
                      $('#ordermsg').show();
                  
                   
                }

            });
        });
      
    })
</script>



@endsection

@endsection

