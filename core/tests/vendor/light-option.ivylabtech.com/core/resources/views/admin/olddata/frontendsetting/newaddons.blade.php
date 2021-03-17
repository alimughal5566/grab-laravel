@extends('admin.master')

@section('title', 'Admin | Create - Add-Ons')

@section('body')
    <div class="container-fluid">
        <form action="{{route('admin.create_addon')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4">
                Add-Ons
            </h2>

            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header bg-white font-weight-bold">
                            Add-Ons
                        </div>
                        <div class="card-body ">
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Name</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="addon_name" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Price</strong></label>

                                        <input class="form-control form-control-lg mb-3" type="text"
                                               name="price" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary float-right  customs-btn-bd">Create
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection