@extends('admin.master')

@section('title', 'Admin | Manage Add-ons')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            Manage Add-ons
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Assigned Add-ons
                        <a href="{{route('admin.addassign_addons')}}"><button type="button" class="btn btn-secondary float-right customs-btn-bd" style="margin-left: 10px;">
                            Assign New
                        </button></a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Food Item</th>
                                <th scope="col">Add-Ons</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($addons_list as $key => $list)
                            <tr>
                                <th scope="col">{{++$key}}</th>
                                <th scope="col">{{$list->food_name}}</th>
                                <th scope="col">{{$list->addon_name}}</th>
                                <th scope="col"> 
                                    <a href="{{url('admin/edit_assignedaddon',['id' => $list->id])}}" class="btn btn-info btn-sm btn-square">Edit</a>

                                    <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$list->id}}" data-toggle="modal" data-target="#foodDelete">Delete</a>
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


    <!-- delete Food Alert Modal -->
    <div class="modal modal-danger fade" id="foodDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation!</h4>
                </div>
                <form action="{{url('admin/delete_assignedaddon')}}" method="post">
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
        $('#foodDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection


<script>
    $('#foods li:nth-child(4)').addClass('active');
    $('#foods').addClass('show');
</script>
@endsection