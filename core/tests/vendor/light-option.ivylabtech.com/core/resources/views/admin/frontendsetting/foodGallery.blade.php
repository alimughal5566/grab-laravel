@extends('admin.master')

@section('title', 'Admin | Food Gallery')

@section('body')

    <div class="container-fluid">
        <h2 class="mb-4">Our Food Gallery</h2>
        <div class="row ">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Food Photo list
                        <a href=""
                           class="btn btn-primary btn-md float-right customs_btn" data-toggle="modal"
                           data-target="#foodGallery">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            @foreach($foodGallery as $gallery)
                                <div class="col-md-2 text-center">
                                    <img src="{{asset('assets/user/images/foodGallery/'.$gallery->food_image)}}" class="img-thumbnail"
                                         width="200" height="200">
                                    <a href="{{route('admin.foodGalleryDelete',$gallery->id)}}"
                                       class="btn btn-danger btn-sm btn-square mt-2"
                                       onclick="return confirm('Are you sure ?')">Remove</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Create food gallery image Modal -->
    <div class="modal modal-danger fade" id="foodGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create food Gallery Image</h4>
                </div>
                <form action="{{route('admin.foodGallery')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Foods category</strong></label>
                                <select class="form-control" id="" name="food_category_id" required>
                                    <option selected value="">Category</option>
                                    @foreach($foodCategoryForItem as $category)
                                        <option value="{{$category->id}}">{{$category->food_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Portfolio Image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="food_image" required>
                                <small class="text-danger">(Image will be resized into 800 x 800px)</small>
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

@section('scripts')

    {{--dropdown active--}}
    <script>
        $('#foods li:nth-child(3)').addClass('active');
        $('#foods').addClass('show');
    </script>
@endsection

@endsection

