@extends('admin.master')

@section('title', 'Users | Show')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
           Users
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                       List Of Users
                        <button type="submit" class="btn btn-secondary float-right customs-btn-bd" data-toggle="modal"
                                data-target="#admin">
                            Add New
                        </button>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped"  id="customerslisting">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">UserName</th>
                                <th scope="col">Email</th>
                                 <th scope="col">Roles</th>
                                {{--<th scope="col">Image</th>--}}
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin as $val)
                            <tr>
                                <th scope="col">{{$loop->iteration}}</th>
                                <th scope="col">{{$val->name}}</th>
                                <th scope="col">{{$val->userName}}</th>
                                <th scope="col">{{$val->email}}</th>
                                <th scope="col">{{$val->role->name}}</th>


                                <th scope="col">
                                    <a href="" class="btn btn-info btn-sm btn-square"
                                       data-name="{{$val->name}}"
                                       data-username="{{$val->userName}}"
                                       data-email="{{$val->email}}"
                                       data-role="{{$val->role_id}}"
                                       data-id="{{$val->id}}"
                                       data-toggle="modal" onclick="open_foodedit_modal(this)"
                         data-target="#adminEdit"
                                    >Edit</a>

                                    <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$val->id}}"
                                       data-toggle="modal" data-target="#foodDelete">Delete</a>
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



    <!-- Create Foods item Modal -->
    <div class="modal modal-danger fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create User</h4>
                </div>
                <form action="{{route('admin.admins.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>UserName</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="userName" required>
                            </div>
                        </div>

                         <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Email</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="email" required>
                            </div>
                        </div>

                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Password</strong></label>
                                <input class="form-control form-control-lg mb-3" type="password" name="password" required>
                            </div>
                        </div>




                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Assign Role</strong></label>
                                <select class="form-control" id="" name="role_id" required>

                                @foreach($roles as $val)
                                  <option value="{{$val->id}}">{{$val->name}}</option>
                                 @endforeach
                                </select>
                            </div>
                        </div>







                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Foods item Modal -->
    <div class="modal modal-danger fade" id="adminEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Update User Detail</h4>
                </div>
                <form action="{{route('admin.admins.update','update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">


                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="data-id">



                         <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Name</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="name" id="data-name" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>UserName</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="userName" id="data-username" required>
                            </div>
                        </div>

                         <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Email</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="email" id="data-email" required>
                            </div>
                        </div>



                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Assign Role</strong></label>
                                <select class="form-control" id="data-role" name="role_id" required>

                                @foreach($roles as $val)
                                  <option value="{{$val->id}}">{{$val->name}}</option>
                                 @endforeach
                                </select>
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete Food Alert Modal -->
    <div class="modal modal-danger fade" id="foodDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($val->id) ? route('admin.admins.destroy','delete') : '#'}}"
                      method="post">
                    @csrf
                    @method('delete')
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



    {{--Edit Food--}}


    {{--script for modal Category Delete--}}
    <script>
        $('#foodDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection


{{--dropdown active--}}
<script>
    $('#activeadmins').addClass('active');
    $('#activeadmins').addClass('show');
</script>



<script type="text/javascript">
     function open_foodedit_modal(e)
    {

        var id= e.getAttribute("data-id");
        $.ajax({
            url:'{{url("admin/adminseditmodal")}}',
            type: 'GET',
            dataType: 'JSON',
            data: { id:id},
            success: function(data){

            console.log(data);
            $('#data-name').val(data.result[0].name);
             $('#data-id').val(data.result[0] .id);
            $('#data-username').val(data.result[0].userName);
            $('#data-email').val(data.result[0].email);
            $('#data-role').val(data.result[0].role_id);
            $('#adminEdit').modal('show');

            }
        });
    }






</script>

<script type="text/javascript">
    $(document).ready(function(){

    $('#customerslisting').DataTable({
        "pageLength": 10
    });
    });


</script>

@endsection
