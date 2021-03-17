<div class="blog-sidebar">

    <!--Start Recent Post Widget-->
    <div class="recent-post-widget">
        <h4 class="text-upper my-widget-title">Recent Announcement</h4>
    @foreach($blogs as $blog)
        <!--Start Post Single-->
            <div class="recent-post-single fix">
                <div class="recent-post-img">
                    <a href="{{route('user.blogDetails',$blog->blog_slug)}}"><img
                                src="{{asset('assets/user/images/posts/'.$blog->blog_photo)}}"
                                class="img-responsive"
                                alt="Image" height="100" width="100"></a>
                </div>
                <div class="recent-post-content">
                    <h5 class="m-0"><a class="color-main"
                                       href="{{route('user.blogDetails',$blog->blog_slug)}}">{{$blog->blog_title}}</a>
                    </h5>
                    <p>
                        <i class="icofont icofont-calendar"></i> {{$blog->created_at->format('M d, Y')}}
                    </p>
                </div>
            </div>
            <!--End Post Single-->
            @if($loop->iteration==3)
                @break;
            @endif
        @endforeach

    </div>
    <!--End Recent Post Widget-->

</div>


<div class="blog-sidebar" style="margin-top: 30px;">
    <!--Start Category Widget-->
    <div class="category-widget">
        <h4 class="text-upper my-widget-title">Category</h4>
        <ul>
            @foreach($blogCategories as $category)
                <li><a href="{{route('user.blogByCategory',$category->name)}}">{{$category->name}} <span
                                class="float-right">{{count($category->posts)}}</span></a></li>
            @endforeach
        </ul>
    </div>
    <!--End Category Widget-->
</div>

{{--start Social share--}}
<div class="blog-sidebar" style="margin-top: 30px;">

    <!--Start Recent Post Widget-->
    <div class="recent-post-widget">
        <h3 class="text-center my-widget-title"
            style="font-weight: 700; margin-bottom: 28px;">@lang('Social Share')</h3>

        <!--Start Post Single-->
        <div class="row justify-content-center">
            <div class="col-xs-2 my-icon">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"
                   class="fa fa-facebook"></a>
            </div>
            <div class="col-xs-2 my-icon">
                <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}"
                   class="fa fa-twitter"></a>
            </div>

            <div class="col-xs-2 my-icon">
                <a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}"
                   class="fa fa-google"></a>
            </div>
            <div class="col-xs-2 my-icon">
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary"
                   class="fa fa-linkedin"></a>
            </div>

            <div class="col-xs-2 my-icon">

                <a href="https://www.instagram.com/?url={{urlencode(url()->current()) }}" class="fa fa-instagram"></a>
            </div>
            <div class="col-xs-2 my-icon">
                <a href="http://pinterest.com/pin/create/button/?url={{urlencode(url()->current()) }}"
                   class="fa fa-pinterest"></a>
            </div>


        </div>
        <!--End Post Single-->
    </div>
    <!--End Recent Post Widget-->
</div>
{{--End Social share--}}
