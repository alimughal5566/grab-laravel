@extends('admin.master')

@section('title', 'Admin | Manage Banner')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            Banner
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        All Banner
                     {{--   <button type="submit" class="btn btn-secondary float-right customs-btn-bd" data-toggle="modal"
                                data-target="#foodCategory">
                            Add New
                        </button> --}}
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            @foreach($banner as $key=>$val)
                            <tr>
                                <td>{{++$key}}</td>
                                <td><img src="{{asset('assets/admin/img/banner/'.$val->image)}}" width="100px"></td>
                                <td>
                                 <a href="" class="btn btn-info btn-sm btn-square" data-id="{{$val->id}}"
                                           data-toggle="modal" data-target="#bannerEdit">Edit</a>
                                           

                               {{--   <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$val->id}}"
                                           data-toggle="modal" data-target="#bannerDelete">Delete</a> --}}
                                           </td>
                            </tr>

                            @endforeach
                            <tbody>
                        

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



     <!-- Create Foods category Modal -->
    <div class="modal modal-danger fade" id="foodCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Add Banner</h4>
                </div>
                <form action="{{url('admin/createbanner')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="bannerimage" required>
                                <span style="color:red">Image width must be 870px and height 200px</span>
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



       <!-- Edit Foods category Modal -->
    <div class="modal modal-danger fade" id="bannerEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit Banner</h4>
                </div>
                <form action="{{url('admin/bannerupdate',$val->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Image</strong></label>
                                <input class="form-control form-control-lg mb-3" id="banner" type="file" name="bannerimage" required>
                                <span style="color:red">Image width must be 870px and height 200px</span>
                            </div>

                             <div class="form-group">
                                <label for="header_subtitle"><strong></strong></label>  
                                <img src="{{asset('assets/admin/img/banner/'.$val->image)}}" width="100px">
                            </div>

                        </div>
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                     

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- delete Food Alert Modal -->
    <div class="modal modal-danger fade" id="bannerDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation!</h4>
                </div>
                <form action="{{url('admin/delete_banner')}}" method="post">
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
        $('#bannerDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>

     <script>
        $('#bannerEdit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var banner = button.data('banner')
            var id = button.data('id')

            var modal = $(this)

            modal.find('.modal-body #banner').val(banner);
          
            modal.find('.modal-body #id').val(id);

        })
    </script>

@endsection


<script>
    $('#plansprogram li:nth-child(1)').addClass('active');
    $('#plansprogram').addClass('show');
</script>
@endsection