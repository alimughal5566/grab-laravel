<?php
header ("Content-Type:text/css");
$color = "#ea0117";// Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if(isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {

    $color = "#" . $_GET[ 'color' ];
}


?>
.base-color{
color: <?php echo $color; ?> !important;
}
nav.navbar.bootsnav ul.nav > li > a:hover,
nav.navbar li.dropdown ul.dropdown-menu li a:hover {
<!-- color: <?php echo $color; ?> !important; -->
}

.b-text{
color: <?php echo $color; ?> !important;
}
.p-color{
color: <?php echo $color; ?> !important;
}

.default-btn a {
display: inline-block;
background-color: <?php echo $color; ?>;
color: #fff;
font-weight: 500;
padding: 10px 20px;
border-radius: 4px;
margin: 15px 0 0;
}

.default-btn.large a:hover {
background-color: #fff;
color: <?php echo $color; ?>;
}

.color-main {
color:  <?php echo $color; ?> !important;
}

.event-details {
padding: 10px 30px 20px;
position: absolute;
left: 7.5%;
bottom: 9%;
background-color: <?php echo $color; ?> !important;
width: 85%;
}

.testi-carousel .owl-dots .owl-dot.active, .gallery-carousel .owl-dots .owl-dot.active {
background-color: <?php echo $color; ?> !important;
border-color: <?php echo $color; ?> !important;
}

.chef-info h4 {
font-weight: 700;
margin: 0;
color: <?php echo $color; ?> !important;
}

.chef-social {
position: absolute;
left: 0;
bottom: 84px;
width: 100%;
background-color: <?php echo $color; ?> !important;
border-radius: 25px 25px 0 0;
padding: 15px 0;
-webkit-transition: 0.3s;
transition: 0.3s;
opacity: 0;
visibility: hidden;
margin: 20px 0 0;
}

.chef-social ul li a:hover {
background-color: #fff;
color: <?php echo $color; ?> !important;
}

.booking-form button {
background-color: <?php echo $color; ?> !important;
color: #fff;
border: 0;
font-weight: 500;
margin: 15px 0 0;
width: 100%;
height: 45px;
border-radius: 2px;
}

.post-meta h2 a {
font-size: 18px;
font-weight: 600;
line-height: 28px;
color: <?php echo $color; ?> !important;
}

<!--.post-content a {-->
<!--color: --><?php //echo $color; ?><!-- !important;-->
<!--font-weight: 500;-->
<!--}-->

.footer-social li a {
display: block;
color: <?php echo $color; ?> !important;
border: 2px solid <?php echo $color; ?> !important;
padding: 8px 10px;
margin: 0 4px;
font-size: 20px;
}

.footer-social li a:hover {
background-color: <?php echo $color; ?> !important;
color: #fff !important;
}

.totop > a {
background-color: <?php echo $color; ?> !important;
color: #fff;
display: block;
font-size: 22px;
padding: 10px 12px;
}

.breadcrumb li a {
color: <?php echo $color; ?> !important;
font-weight: 600;
font-size: 16px;
}

.counter-single i {
color: <?php echo $color; ?> !important;
font-size: 50px;
border: 2px solid;
padding: 6px 8px;
display: inline-block;
}

.opening-schedule {
padding: 40px 60px;
border-radius: 2px;
background-color: <?php echo $color; ?> !important;
}

.reservation-form button {
margin: 0 auto;
display: block;
padding: 10px 30px;
color: #fff;
background-color: <?php echo $color; ?> !important;
border: 0;
border-radius: 2px;
font-weight: 600;
}

.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
z-index: 3;
color: #fff;
cursor: default;
background-color: <?php echo $color; ?> !important;
border-color: <?php echo $color; ?> !important;
}

.pagination li.active a,
.pagination li.active a:hover,
.pagination li a:hover {
background-color: <?php echo $color; ?> !important;
border-color: <?php echo $color; ?> !important;
color: #fff;
}

.gallery-button button.active, .gallery-button button:hover {
background-color: <?php echo $color; ?> !important;
color: #fff;
}

.gallery-button button {
background-color: transparent;
font-weight: 500;
border: 2px solid <?php echo $color; ?> !important;
padding: 6px 10px;
color: #ffffff;
margin: 0 2px 50px;
border-radius: 3px;
}

.post-meta p a:hover {
color: <?php echo $color; ?> !important;
}

.post-meta.single h2 {
font-size: 18px;
font-weight: 600;
line-height: 28px;
color: <?php echo $color; ?> !important;
margin: 20px 0 0;
}

.category-widget ul li a:hover {
color: <?php echo $color; ?> !important;
}

.contact-form button {
margin: 0 auto;
display: block;
padding: 10px 30px;
color: #fff;
background-color: <?php echo $color; ?> !important;
border: 0;
border-radius: 2px;
font-weight: 600;
}

.site-preloader {
background-color: <?php echo $color; ?> !important;
height: 100%;
left: 0;
position: fixed;
top: 0;
width: 100%;
z-index: 9999999;
}


.my-widget-title {
background: <?php echo $color; ?>!important;
padding: 6px 10px;
color: #fff;
margin-left: -30px;
margin-right: -30px;
margin-top: -50px;
}

.my-food-title h2{
color: <?php echo $color; ?>!important;
}
