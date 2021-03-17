<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="zxx">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/user/images/frontEnd/icon.png')}}"/>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/bootstrap.css')}}">
    <!--Owl Carousel CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/owl.carousel.min.css')}}">
    <!--Magnific PopUp CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/magnific-popup.css')}}">
    <!--Icofont CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/icofont.css')}}">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('assets/user/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/font-awesome.min.css')}}">
    <!--Animate CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/animate.css')}}">
    <!--Bootsnav CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/bootsnav.css')}}">
    <!--Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/style.css')}}">
    <!--Responsive CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/responsive.css')}}">
    <!--Color Switcher-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/color-switcher.css')}}">

    <!--Modanizr JS-->
    <script src="{{asset('assets/user/js/modernizr.custom.js')}}"></script>
    <!--[if IE]>
    <!--<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
    <![endif]-->

    <!-- customs scc -->
    <link rel="stylesheet" href="{{asset('assets/user/css/customs.css')}}">

    {{--toastr--}}
    <script src="{{asset('assets/user/js/jquery-2.1.1.min.js')}}"></script>
    <link href="{{asset('assets/user/css/toastr.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/user/js/toastr.js')}}"></script>

    {{--admin given code--}}
    <link href="{{url('/')}}/assets/user/css/color.php?color={{$gs->colorCode}}" rel="stylesheet">

</head>


<body>
<!--Start Preloader-->
<div class="site-preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--End Preloader-->



<!--Start Body Wrap-->
<div id="body-wrap">

    <!--Start Header-->
        @include('user.includes.header')
    <!--End Header-->

        @yield('content')


    <!--Start Footer-->
    <footer class="footer">
        <div class="footer-top text-center">
            {{-- <div class="footer-logo">
                <img src="{{asset('assets/user/images/frontEnd/logo.png')}}" class="img-responsive footer-logo-main" alt="Image">
            </div> --}}
            <div class="footer-social">
                <ul>
                    @foreach($socials as $social)
                    <li><a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p>&copy; {{$frontEndSetting->footerText}}</p>
        </div>

        <!--Start Click To Top-->
        <div class="totop">
            <a href="#top"><i class="icofont icofont-simple-up"></i></a>
        </div>
        <!--End Click To Top-->
    </footer>
    <!--End Footer-->
</div>
<!--End Body Wrap-->

<!--jQuery JS-->
<script src="{{asset('assets/user/js/jquery.min.js')}}"></script>

<!--Counter JS-->
<script src="{{asset('assets/user/js/waypoints.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.counterup.min.js')}}"></script>
<!--Bootstrap JS-->
<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
<!--Magnic PopUp JS-->
<script src="{{asset('assets/user/js/magnific-popup.min.js')}}"></script>
<!--Isotope JS-->
<script src="{{asset('assets/user/js/isotope.min.js')}}"></script>
<!--Image Loded JS-->
<script src="{{asset('assets/user/js/images-loded.min.js')}}"></script>
<!--Scrolly JS-->
<script src="{{asset('assets/user/js/jquery.scrolly.js')}}"></script>
<!--Ripple JS-->
<script src="{{asset('assets/user/js/jquery.ripples-min.js')}}"></script>
<!--Owl Carousel JS-->
<script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
<!--Bootsnav JS-->
<script src="{{asset('assets/user/js/bootsnav.js')}}"></script>
<!--Main JS-->
<script src="{{asset('assets/user/js/custom.js')}}"></script>

{{--toastr--}}
<script>
    @if(Session()->has('success'))

toastr.success("{{Session('success')}}")
    @endif

    @if(Session()->has('warning'))

toastr.warning("{{Session('warning')}}")
    @endif

  @if(Session()->has('errors'))
    @foreach($errors->all() as $error)
toastr.error("{{$error}}")
    @endforeach
    @endif
</script>

{{--change language--}}
<script>
    $(document).on('change', '#langSel', function () {
        var code = $(this).val();
        window.location.href = "{{url('/')}}/change-lang/"+code ;
    });
</script>


<script>
    $(document).on('change', '.alice', function () {
        
        var qty = parseInt($(this).val());
        var price=parseInt($('#prce').html());
        var tots=qty * price;
        //alert(tots);
        $('#tosps').val(tots);
       
    });


$(document).on('change', '#address', function () {

    var is_checked = $(this).is(":checked");
    //var address=$('#address').val();
        if(!is_checked)
        {
        
      $('#scompany').val('');
      $('#sstreet').val('');
      $('#sappart').val('');
      $('#scity').val('');
      $('#szip').val('');
       }
       else
       {
        // alert('else');die;
      var fname=$('#bfname').val();
      var lname=$('#blfname').val();
      var company=$('#bcompany').val();
      var stret=$('#bstreet').val();
      var apart=$('#bappart').val();
      var city=$('#bcity').val();
      var zip=$('#bzip').val();
      var phone=$('#bphone').val();
      var email=$('#bemail').val();
      $('#sfname').val(fname);
      $('#slname').val(lname);
      $('#scompany').val(company);
      $('#sstreet').val(stret);
      $('#sappart').val(apart);
      $('#scity').val(city);
      $('#szip').val(zip);
      $('#sphone').val(phone);
      $('#semail').val(email);


       }
    });

</script>





@yield('scripts')



</body>

</html>
