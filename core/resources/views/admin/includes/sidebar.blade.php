
<div class="sidebar sidebar-dark bg-dark" style="background-color: #fff !important;">
    <ul class="list-unstyled">
        @if(Auth::guard('admin')->user()->role_id==1 || Auth::guard('admin')->user()->role_id==2)
        <li id="admindashboard"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home fa-fw"></i> Dashboard</a></li>
        @endif

        @if(Auth::guard('admin')->user()->role_id==1)
        <li id="activecustomers"><a href="{{route('admin.customers')}}"> <i class="fa fa-fw fa-users"> </i> Customers</a></li>
        <li id="activeadmins"><a href="{{route('admin.admins.index')}}"> <i class="fa fa-fw fa-users"> </i> Users</a></li>
        @endif

        @if(Auth::guard('admin')->user()->role_id==1 || Auth::guard('admin')->user()->role_id==3)
        <li>
            <a href="#foods" data-toggle="collapse">
                <i class="fas fa-utensils"></i> Our Foods
            </a>
            <ul id="foods" class="list-unstyled collapse">

                <li><a href="{{route('admin.foodCategory.index')}}"><i class="fas fa-utensils"></i> Food Category</a></li>
                <li><a href="{{route('admin.foods.index')}}"><i class="fas fa-utensils"></i> Food List</a></li>
                <li><a href="{{route('admin.foodGallery')}}"><i class="fas fa-images"></i> Food Gallery</a></li>
                {{-- <li><a href="{{route('admin.foodPageTitle')}}"><i class="fab fa-medrt"></i> Food Page Title</a></li> --}}
                <li><a href="{{route('admin.manageaddons')}}"><i class="fas fa-utensils"></i> Manage Add-ons </a></li>
                <li><a href="{{route('admin.foodavailability')}}"><i class="fas fa-utensils"></i> Food Availability </a></li>
            </ul>
        </li>
        @endif

        @if(Auth::guard('admin')->user()->role_id==1 || Auth::guard('admin')->user()->role_id==3)
        <li>
            <a href="#plansprogram" data-toggle="collapse">
                <i class="fas fa-calendar-alt"></i> Plans
            </a>
            <ul id="plansprogram" class="list-unstyled collapse">
                <li><a href="{{route('admin.plans')}}"><i class="fas fa-calendar-alt"></i> Make Plan</a></li>
                <li><a href="{{route('admin.plancategories')}}"><i class="fas fa-calendar-alt"></i> Plan Category</a></li>
            </ul>
        </li>
        @endif

        @if(Auth::guard('admin')->user()->role_id==1 || Auth::guard('admin')->user()->role_id==2 || Auth::guard('admin')->user()->role_id==3)
        <li>
            <a href="#orderPage" data-toggle="collapse">
                <i class="fas fa-cart-plus"></i> Food Order
            </a>
            <ul id="orderPage" class="list-unstyled collapse">

                <li><a href="{{route('admin.orderList')}}"><i class="fab fa-medrt"></i> Food Item List</a></li>
                <li><a href="{{route('admin.planorderlist')}}"><i class="fab fa-medrt"></i> Plans List</a></li>
                <li><a href="{{route('admin.planoptionlist')}}"><i class="fab fa-medrt"></i> Plans Option List</a></li>
                <li><a href="{{route('admin.meallist')}}"><i class="fab fa-medrt"></i> Make Your Meal List</a></li>
                <!--<li><a href="{{route('admin.orderHistory')}}"><i class="fas fa-utensils"></i> Order History</a></li>-->


            </ul>
        </li>
        @endif

        @if(Auth::guard('admin')->user()->role_id==1 || Auth::guard('admin')->user()->role_id==3)
        <li>
            <a href="#plansoptions" data-toggle="collapse">
                <i class="fas fa-calendar-alt"></i> Plans With Options
            </a>
            <ul id="plansoptions" class="list-unstyled collapse">
                <li><a href="{{route('admin.planoptioncategories')}}"><i class="fas fa-calendar-alt"></i> Categories</a></li>
                <li><a href="{{route('admin.mealsplanoption')}}"><i class="fas fa-calendar-alt"></i> No Of Meals</a></li>
                <li><a href="{{route('admin.plansoption')}}"><i class="fas fa-calendar-alt"></i> Make Plan With Options</a></li>
            </ul>
        </li>
        @endif

        @if(Auth::guard('admin')->user()->role_id==1)
         <li>
            <a href="#Events" data-toggle="collapse">
                <i class="fas fa-calendar-alt"></i> Events
            </a>
            <ul id="Events" class="list-unstyled collapse">

                <li><a href="{{route('admin.events.index')}}"><i class="fa fa-fw fa-list"></i> Event List</a></li>
                <li><a href="{{route('admin.events.create')}}"><i class="fas fa-plus"></i> New Event</a></li>
                <li><a href="{{url('admin/bannerlist')}}"><i class="fas fa-plus"></i> Add Banner</a></li>
            </ul>
        </li>
        @endif


        @if(Auth::guard('admin')->user()->role_id==1)
         <li>
            <a href="#staffteam" data-toggle="collapse">
                <i class="fas fa-desktop fa-fw"></i> Settings
            </a>
            <ul id="staffteam" class="list-unstyled collapse">
                <li><a href="{{route('admin.slider')}}"><i class="fas fa-info fa-fw"></i> Home Page Slider</a></li>
                <li><a href="{{route('admin.OurChefs.index')}}"><i class="fas fa-info fa-fw"></i> Our Chef</a></li>
                <li><a href="{{route('admin.testimonial.index')}}"><i class="fas fa-comments"></i> Testimonial</a>
                </li>
                <li><a href="{{route('admin.delivery')}}"><i class="fas fa-truck"></i> Delivery Charges</a>
                </li>
                <li><a href="{{route('admin.aboutSettings')}}"><i class="fas fa-info fa-fw"></i> About</a></li>
                <li><a href="{{route('admin.footerSettings')}}"><i class="fab fa-simplybuilt"></i> Footer</a></li>
                <li><a href="{{route('admin.social_setting')}}"><i class="fas fa-share-alt"></i> Social Settings</a></li>
                <li><a href="{{route('admin.counter')}}"><i class="fab fa-product-hunt"></i> Counter</a></li>

            </ul>
        </li>
        @endif

        @if(Auth::guard('admin')->user()->role_id==1)
         <li>
            <a href="#sm_base" data-toggle="collapse">
                <i class="fas fa-cog fa-fw"></i> General Settings
            </a>
            <ul id="sm_base" class="list-unstyled collapse">
                <li><a href="{{route('admin.basicSettings')}}"> <i class="fa fa-fw fa-cog"> </i> Basic Settings</a></li>
                <!--<li><a href="{{route('admin.SmsSettings')}}"><i class="fa fa-phone"> </i> SMS Settings</a></li>-->
                <!--<li><a href="{{route('admin.emailSettings')}}"><i class="fa fa-envelope"> </i> Email Settings</a></li>-->

            </ul>
        </li>
        @endif

    </ul>
</div>




