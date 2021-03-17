@extends('admin.master')

@section('title', 'Admin | Order List')

@section('body')
    <div class="container-fluid">

            <h2 class="mb-4">
                Order List
            </h2>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <p><b>Order List:</b></p>
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Food Name</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">email</th>
                                <th scope="col">quantity</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$order->food_id}}</td>
                                    <td>{{$order->c_name}}</td>
                                    <td>{{$order->c_phone}}</td>
                                    <td>{{$order->c_mail}}</td>
                                    <td>{{$order->c_quantity}}</td>
                                    <td>{{$order->c_address}}</td>
                                    <td>
                                        <a href="{{route('admin.orderAccept',$order->id)}}"
                                           class="btn btn-success btn-sm btn-square" onclick="return confirm('Are you sure ?')">Accept</a>

                                        <a href="" class="btn btn-danger btn-sm btn-square" data-toggle="modal" data-target="#OrderReject">Reject</a>
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
@endsection

@endsection

