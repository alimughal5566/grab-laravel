@extends('admin.master')

@section('title', 'create Promotion')

@section('body')

    <h2 class="mb-4" style="text-transform: uppercase;"> Add Promotion
        <a href="{{route('admin.post.index')}}" class="btn btn-primary btn-md float-right customs_btn">
            <i class="fa fa-list"></i> View Promotion List
        </a>
    </h2>

    <div class="container-fluid">

        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                Add Promotion
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label><strong>Promotion Title</strong></label>
                        <input type="text" name="blog_title"
                               class="form-control form-control-lg {{ $errors->has('blog_title') ? ' is-invalid' : '' }}"
                               value="{{ old('blog_title') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1"><strong>Category</strong></label>
                        <select class="form-control form-control-lg {{ $errors->has('category') ? ' is-invalid' : '' }}"
                                name="category" required>
                            <option value="">Select</option>
                            @foreach($blogCategories as $blogCategory)
                                <option value="{{$blogCategory->id}}">{{$blogCategory->name}}</option>

                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label><strong>Image</strong></label>
                        <input type="file" name="post_image"
                               class="form-control form-control-lg {{ $errors->has('post_image') ? ' is-invalid' : '' }}"
                               value="{{ old('post_image') }}" required>
                        <small class="text-danger">[Image will be resize: 800 * 533]</small>

                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Content</strong></label>
                        <textarea id="NicEditor" class="form-control form-control-lg" name="blogContent" rows="10" required>{{ old('blogContent') }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">CREATE</button>
                    </div>


                </form>
            </div>

        </div>
    </div>

    {{--dropdown active--}}
    <script>
        $('#blog li:nth-child(2)').addClass('active');
        $('#blog').addClass('show');
    </script>

@endsection


