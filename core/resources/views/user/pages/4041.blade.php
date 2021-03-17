@extends('user.master')
@section('title',$gs->websiteTitle.' | page not found')

@section('content')
<style type="text/css">
body {
  width: 100%;
  margin: 0;
  height: 100%;
  background-color: #1d3041 !important;
  font-family: "Open Sans - Semibold", sans-serif;
  color: #fff;
}
.notfound-wrap {
    padding: 100px 0 160px;
    background-color: #ffb600;
}
h1 {
  text-align: center;
  margin-top: 1%;
  margin-bottom: 25px;
  font-size: 30px;
  font-weight: 400;
  text-transform: uppercase;
  color: #fff;
}
p {
  display: block;
  margin: 25px auto;
  max-width: 776px;
  text-align: center;
  color: #bcecf2;
  font-family: "Open Sans", sans-serif;
  font-size: 16px;
  font-weight: 400;
  line-height: 24px;
}
.bl_page404__wrapper {
  position: relative;
  width: 100%;
  margin: 10px auto 10px;
  max-width: 440px;
  min-height: 410px;

}
.bl_page404__img {
  width: 100%;
}
.bl_page404__link {
  display: block;
  margin: 0 auto;
  width: 260px;
  height: 64px;
/*  box-shadow: 0 5px 0 #9c1007, inset 0 0 18px rgba(253, 60, 0, 0.75);*/
  background-color: #a84d38;
  color: #fff;
  font-family: "Open Sans", sans-serif;
  font-size: 24px;
  font-weight: 700;
  line-height: 64px;
  text-transform: uppercase;
  text-decoration: none;
  border-radius: 30px;
  text-align: center;
}
.bl_page404__link:hover,
.bl_page404__link:focus {
  background-color: #a84d38;
}
.bl_page404__link:hover {
  color: #fff !important;
}

.bl_page404__el1 {
  position: absolute;
  top: 108px;
  left: 102px;
  opacity: 1;
  animation: el1Move 800ms linear infinite;
  width: 84px;
  height: 106px;
  background: url("https://github.com/BlackStar1991/Pictures-for-sharing-/blob/master/404/bigBoom/404-1.png?raw=true")
    50% 50% no-repeat;
  z-index: 2;
}
.bl_page404__el2 {
  position: absolute;
  top: 92px;
  left: 136px;
  opacity: 1;
  animation: el2Move 800ms linear infinite;
  width: 184px;
  height: 106px;
  background: url("https://github.com/BlackStar1991/Pictures-for-sharing-/blob/master/404/bigBoom/404-2.png?raw=true")
    50% 50% no-repeat;
  z-index: 2;
}
.bl_page404__el3 {
  position: absolute;
  top: 108px;
  left: 180px;
  opacity: 1;
  animation: el3Move 800ms linear infinite;
  width: 284px;
  height: 106px;
  background: url("https://github.com/BlackStar1991/Pictures-for-sharing-/blob/master/404/bigBoom/404-3.png?raw=true")
    50% 50% no-repeat;
  z-index: 2;
}
@keyframes el1Move {
  0% {
    top: 108px;
    left: 102px;
    opacity: 1;
  }
  100% {
    top: -10px;
    left: 22px;
    opacity: 0;
  }
}
@keyframes el2Move {
  0% {
    top: 92px;
    left: 136px;
    opacity: 1;
  }
  100% {
    top: -10px;
    left: 108px;
    opacity: 0;
  }
}
@keyframes el3Move {
  0% {
    top: 108px;
    left: 180px;
    opacity: 1;
  }
  100% {
    top: 28px;
    left: 276px;
    opacity: 0;
  }
}

</style>
    <!--Start Page Content-->
    <section class="page-content fix">

        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative" style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="section-title-subtitle">PAGE NOT FOUND</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Notfound Wrap-->
        <div class="notfound-wrap default-padding">
            <!--Start Container-->

            <h1>Oops! This page Could Not Be Found!</h1>
            <center>
            <img src="{{url('assets/user/images/frontEnd/4041.jpg')}}">
            </center>


            <!--End Container-->
        </div>
        <!--End Notfound Wrap-->
    </section>
    <!--End Page Content-->

@endsection




