@extends('user.master')
@section('title',$gs->websiteTitle.' | Our food')

@section('content')
    <!--Start Page Content-->
    <section class="page-content fix">
        <!--Start Page Title-->
        <div class="page-title bg-cover position-relative"
             style="background-image: url({{asset('assets/user/images/frontEnd/page-bg.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title-content text-center">
                            <h2 class="text-upper">Make Your Own Meal</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">@lang('Home')</a>
                                </li>
                                <li class="active">Make Your Meal</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Gallery Wrap-->
        <div class="gallery-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Heading-->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-heading text-center">
                            <h3 class="font-2 color-main">Make Your Own Meal</h3>
                        </div>
                    </div>
                </div>
                <!--End Heading-->

        <form action="{{route('user.storemeal')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row mb-4">

                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Meal Name</strong></label>
                                        <input class="form-control form-control-md mb-3" type="text" name="plan_name" required>
                                        <input class="form-control mb-3" type="hidden" name="counterval" id="counterval" value="">

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="header_subtitle"><strong>Meal image</strong></label>
                                        <input class="form-control form-control-lg mb-3" type="file" name="meal_image">
                                    </div>
                                </div>  
                                </div>                              
                                <br>
                                <div class="row">
                                    <div class="col-md-4 mb-3"></div>
                                    <div class="col-md-4 mb-3" style="text-align: center;">
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i> Add Food</button>
                                    </div>
                                    <div class="col-md-4 mb-3"></div>
                                </div><br>

                                <div id="dynamic_days" style="width: 100%;"></div>

                                <div class="row" style="margin-top: 30px;">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" id="makeyourownmeal" class="btn btn-success btn-block">Make Your Own Meal</button>
                                </div>
                                <div class="col-md-4"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>






            </div>
        </div>

    <!--End Gallery Wrap-->
    </section>
    <!--End Page Content-->


@section('scripts')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

    $(document).ready(function(){ 

        $('.datepicker').datepicker({
            format: 'mm-dd-yyyy D',
            minDate: new Date(),
            todayHighlight: true,
            autoclose: true,
        });

        var i=0;
        var k=0;  

        if(k==0)
        {
            $('#makeyourownmeal').hide();
        }
        $('#add').click(function(){  
           i++;
           k++;  
           $('#dynamic_days').append('<div id="addional_row_'+i+'" class="row"><div class="col-md-4 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Foods Item</strong></label><select class="form-control" name="fooditem[]" required><option selected value="">Please Select Food Item</option>@foreach($fooditems as $fooditem)<option value="{{$fooditem->id}}">{{$fooditem->food_name}}</option>@endforeach</select></div></div><div class="col-md-4 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Foods Type</strong></label><select class="form-control" name="food_type[]" required><option selected value="">Please Select Food Type</option><option value="1">Breakfast</option><option value="2">Lunch</option><option value="3">Snacks</option><option value="4">Dinner</option></select></div></div><div class="col-md-3 mb-3"><div class="form-group"><label for="header_subtitle"><strong>Date</strong></label><input class="form-control datepicker" type="text" name="order_date[]" value="<?php echo date("d-m-yy l"); ?>"></div></div><div class="col-md-1 mb-3"><br/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top:4px; float: right;">X</button></div></div>');
            $('#counterval').val(k);
        $('.datepicker').datepicker({
            setDate: new Date(),
            format: 'dd-mm-yyyy DD',
            startDate: '-0d',
            todayHighlight: true,
            autoclose: true,
        });

        if(k > 0)
        {
            $('#makeyourownmeal').show();
        }
            // $( function() {
            //     $('.datepicker').datepicker(); 
            // });
            // $('.datepicker').datepicker({
            //     format: 'mm/dd/yyyy',
            //     todayHighlight: true,
            //     autoclose: true,
            // });
        });


        $(document).on('click', '.btn_remove', function(){  
            k--;
           var button_id = $(this).attr("id");   
           $('#addional_row_'+button_id+'').remove();  
           $('#counterval').val(k);
        if(k <= 0 )
        {
            $('#makeyourownmeal').hide();
        }
        }); 

    });
</script> 
@endsection


@endsection