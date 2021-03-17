@extends('admin.master')

@section('title', 'Customers')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            Customers
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        List Of Customers
                    </div>
                    <div class="card-body ">
                        <table id="customerslisting" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <th scope="col">{{$loop->iteration}}</th>
                                <th scope="col">{{$customer->name}} {{$customer->ul_name}}</th>
                                <th scope="col">{{$customer->email}}</th>
                                <th scope="col">{{$customer->phone}}</th>
                                <th scope="col">
                                    <a href="#" class="btn btn-info btn-sm btn-square" data-id="{{$customer->id}}" onclick="customerdetail(this)">View</a>

                                    <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$customer->id}}"
                                       data-toggle="modal" data-target="#CustomerDelete">Delete</a>
                                </th>

                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- Edit Foods item Modal -->
    <div class="modal modal-danger fade" id="CustomersView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Customer Detail</h4>
                </div>
                    <div class="modal-body">

                        <div class="row">
                        <div class="col-md-12 mb-3">
                                <img src="{{asset('assets/user/images/meal/noimage.png')}}" class="img-thumbnail" width="200" height="200">
                            </div> --}}
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" id="username" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Email</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" id="useremail" readonly>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Contact No</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" id="usercontact" readonly>
                            </div>
                        </div>
                        </div>







                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

    <!-- delete Food Alert Modal -->
    <div class="modal modal-danger fade" id="CustomerDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message!</h4>
                </div>
                <form action="{{url('admin/deletecustomer')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <h4 class="text-center">Are you sure ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('scripts')



    <script>

        function customerdetail(e)
        {
            var customerid=$(e).attr('data-id');
            $.ajax({

                url:'{{url('admin/showcustomerdetail')}}',
                data:{cid:customerid},
                type:'GET',
                 dataType: "json",
                success:function(data)
                {
                    console.log(data.customer[0]);
                    $('#username').val(data.customer[0].name+' '+data.customer[0].ul_name);
                    $('#useremail').val(data.customer[0].email);
                    $('#usercontact').val(data.customer[0].phone);
                    $('#CustomersView').modal('show');

                }

            });
        }

    </script>

    {{--script for modal Category Delete--}}
    <script>
        $('#CustomerDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection


{{--dropdown active--}}
<script>
    $('#activecustomers').addClass('active');
    $('#activecustomers').addClass('show');
</script>

<script type="text/javascript">
    $(document).ready(function(){

    $('#customerslisting').DataTable({
        "pageLength": 10
    });
    });


</script>
@endsection
