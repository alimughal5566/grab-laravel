@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid"> 
        <form action="{{url('admin/update_addon',['id' => $id])}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <h2 class="mb-4">
                Update Add-Ons
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Update Add-Ons
                        </div>
                        <div class="card-body ">
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Name</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="addon_name" value="{{$addon->addon_name}}" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Price</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="price" value="{{$addon->price}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary float-right  customs-btn-bd">Update
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
<script>
    $('#foods li:nth-child(4)').addClass('active');
    $('#foods').addClass('show');
</script>
@endsection