
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootadmin.min.css')}}">

    {{--Bootstrap Toggle--}}
    <link href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <script src="{{asset('assets/admin/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>

    {{--customs css--}}
    <link rel="stylesheet" href="{{asset('assets/admin/css/customs.css')}}">

    {{--toastr--}}
    <link href="{{asset('assets/admin/css/toastr.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/admin/js/toastr.js')}}"></script>

    <!--Icofont CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/icofont.css')}}">

    <title>@yield('title')</title>
</head>
<body class="bg-light">

{{--nav--}}
 @include('admin.includes.nav')

    <div class="d-flex">
       {{--sidebar--}}
       @include('admin.includes.sidebar')


        <div class="content p-4">

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

            @yield('body')
        </div>
    </div>

<script src=" {{asset('assets/admin/js/jquery.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/datatables.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/moment.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/fullcalendar.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/bootadmin.min.js')}}"></script>

@yield('scripts')

</body>
</html>