<div class="sidebar sidebar-dark bg-dark">
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home fa-fw"></i> Dashboard</a></li>

        <li>
            <a href="#foods" data-toggle="collapse">
                <i class="fas fa-utensils"></i> Our Foods
            </a>
            <ul id="foods" class="list-unstyled collapse">

                <li><a href="{{route('admin.foodCategory.index')}}"><i class="fas fa-utensils"></i> Food Category</a></li>
                <li><a href="{{route('admin.foods.index')}}"><i class="fas fa-utensils"></i> Food List</a></li>
                <li><a href="{{route('admin.foodGallery')}}"><i class="fas fa-images"></i> Food Gallery</a></li>
                <li><a href="{{route('admin.foodPageTitle')}}"><i class="fab fa-medrt"></i> Food Page Title</a></li>
                <li><a href="{{route('admin.manageaddons')}}"><i class="fas fa-utensils"></i> Manage Add-ons </a></li>
                <li><a href="{{route('admin.foodavailability')}}"><i class="fas fa-utensils"></i> Food Availability </a></li>
            </ul>
        </li>

        <li>
            <a href="#orderPage" data-toggle="collapse">
                <i class="fas fa-cart-plus"></i> Food Order
            </a>
            <ul id="orderPage" class="list-unstyled collapse">

                <li><a href="{{route('admin.orderList')}}"><i class="fab fa-medrt"></i> Order List</a></li>
                <li><a href="{{route('admin.orderHistory')}}"><i class="fas fa-utensils"></i> Order History</a></li>


            </ul>
        </li>

        <li>
            <a href="#reservation" data-toggle="collapse">
                <i class="fas fa-th-list"></i> Reservation
            </a>
            <ul id="reservation" class="list-unstyled collapse">

                <li><a href="{{route('admin.reservation')}}"><i class="fas fa-comments"></i> Reservation Order</a></li>
                <li><a href="{{route('admin.reservationLog')}}"><i class="fas fa-history"></i> Reservation Log</a></li>
                <li><a href="{{route('admin.reservationPage')}}"><i class="fas fa-plus"></i> Reservation Page</a></li>

            </ul>
        </li>

        <li>
            <a href="#Events" data-toggle="collapse">
                <i class="fas fa-calendar-alt"></i> Events
            </a>
            <ul id="Events" class="list-unstyled collapse">

                <li><a href="{{route('admin.events.index')}}"><i class="fa fa-fw fa-list"></i> Event List</a></li>
                <li><a href="{{route('admin.events.create')}}"><i class="fas fa-plus"></i> New Event</a></li>

            </ul>
        </li>

        <li>
            <a href="#blog" data-toggle="collapse">
                <i class="fas fa-bullhorn"></i> Announcement
            </a>
            <ul id="blog" class="list-unstyled collapse">
                <li><a href="{{route('admin.blogCategory.index')}}"><i class="fa fa-fw fa-list"></i>Category</a>
                </li>
                <li><a href="{{route('admin.post.index')}}"><i class="fa fa-fw fa-list"></i>Announcement</a></li>

            </ul>
        </li>

        <li id="activeLang"><a href="{{route('admin.language-manage')}}"> <i class="fa fa-fw fa-cog"> </i> Language Manager</a></li>


        <li>
            <a href="#frontEndSetting" data-toggle="collapse">
                <i class="fas fa-desktop fa-fw"></i> FrontEnd Settings
            </a>
            <ul id="frontEndSetting" class="list-unstyled collapse">

                <li><a href="{{route('admin.banner')}}"><i class="fab fa-product-hunt"></i> Banner</a></li>
                <li><a href="{{route('admin.aboutSettings')}}"><i class="fas fa-info fa-fw"></i> About</a></li>
                <li><a href="{{route('admin.testimonial.index')}}"><i class="fas fa-comments"></i> Testimonial</a>
                </li>
                <li><a href="{{route('admin.OurChefs.index')}}"><i class="fas fa-info fa-fw"></i> Our Chef</a></li>
                <li><a href="{{route('admin.contact')}}"><i class="fas fa-address-book"></i> Contact</a></li>
                <li><a href="{{route('admin.social_setting')}}"><i class="fas fa-share-alt"></i> Social Settings</a></li>
                <li><a href="{{route('admin.counter')}}"><i class="fab fa-product-hunt"></i> Counter</a></li>
                <li><a href="{{route('admin.footerSettings')}}"><i class="fab fa-simplybuilt"></i> Footer</a></li>

            </ul>
        </li>
        <li>
            <a href="#sm_base" data-toggle="collapse">
                <i class="fas fa-cog fa-fw"></i> General Settings
            </a>
            <ul id="sm_base" class="list-unstyled collapse">
                <li><a href="{{route('admin.basicSettings')}}"> <i class="fa fa-fw fa-cog"> </i> Basic Settings</a></li>
                <li><a href="{{route('admin.SmsSettings')}}"><i class="fa fa-phone"> </i> SMS Settings</a></li>
                <li><a href="{{route('admin.emailSettings')}}"><i class="fa fa-envelope"> </i> Email Settings</a></li>

            </ul>
        </li>

    </ul>
</div>