@extends('admin.master')

@section('title', 'Admin | Manage Slider')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            Slider
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        All Slider
                       <button type="submit" class="btn btn-secondary float-right customs-btn-bd" data-toggle="modal"
                                data-target="#addslider">
                            Add New
                        </button>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Head</th>
                                <th scope="col">Paragraph</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            @if(sizeof($slider) > 0)
                            @foreach($slider as $key=>$val)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$val->heading}}</td>
                                <td>{{$val->paragraph}}</td>
                                <td>   <img src="{{asset('assets/admin/img/slider/'.$val->image)}}" width="100px"></td>
                            
                                <td>
                                    <a href="" data-id="{{$val->id}}" class="btn btn-info btn-sm btn-square"
                                       data-toggle="modal" onclick="open_sliderEdit_modal(this)" 
                         data-target="#sliderEdit"
                                    >Edit</a>
                                 <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$val->id}}"
                                           data-toggle="modal" data-target="#sliderDelete">Delete</a>
                                       </td>
                                        
                            </tr>

                            @endforeach
                            @endif
                            <tbody>
                        

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



     <!-- Create Foods category Modal -->
    <div class="modal modal-danger fade" id="addslider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Add Slider</h4>
                </div>
                <form action="{{url('admin/createslider')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Heading</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="head" required>
                              
                            </div>
                        </div>

                              <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Paragraph</strong></label>
                                <input class="form-control form-control-lg mb-3" type="text" name="para" required>
                              
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Image</strong></label>
                                <input class="form-control form-control-lg mb-3" type="file" name="image" required>
                              {{--   <span style="color:red">Image width must be 870px and height 200px</span> --}}
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



       <!-- Edit Foods category Modal -->
    <div class="modal modal-danger fade" id="sliderEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit Slider</h4>
                </div>
                <form action="{{url('admin/sliderupdate')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                  
                    <div class="modal-body">
                        
                           <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Heading</strong></label>
                                <input class="form-control form-control-lg mb-3" id="head" type="text" name="head" required>
                              
                            </div>
                        </div>

                    <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Paragraph</strong></label>
                                <input class="form-control form-control-lg mb-3" data-para="editpara" id="para" type="text" name="para" required>
                              
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Image</strong></label>
                                <input class="form-control form-control-lg mb-3"  id="editimage" type="file" name="image">
                             {{--    <span style="color:red">Image width must be 870px and height 200px</span> --}}
                            </div>
                            
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                       {{--  <button type="submit" class="btn btn-success" onclick="Updateslid()">Update</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>



@if(sizeof($slider) > 0)
    <!-- delete Food Alert Modal -->
    <div class="modal modal-danger fade" id="sliderDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation!</h4>
                </div>
                 <form action="{{url('admin/delete_slider/'.$val->id)}}" method="post"
                     >
                    @csrf
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <h4 class="text-center">Are you sure ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@section('scripts')

    <script>
        $('#sliderDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>

    <script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function Updateslid()
        {

            var id= $('#id').val();
            var para=$('#para').val();
            var head=$('#head').val();
            data = new FormData();
    jQuery.each(jQuery('#image')[0].files, function(i, file) {
        data.append('image', file);
    });
          
            //alert(image);die;
            //var image=document.getElementById("editimage").files[0].name;
             var image = new FormData( $("#editimage").get(0) )
            alert(image);die;

         //   var p= e.getAttribute("editpara");

          
            
             $.ajax({
            url:'{{url("admin/sliderupdate")}}',
            type: 'POST',
            data: {_token: CSRF_TOKEN,id: id,para:para,head:head,image:image},
            success: function(data){
            console.log(data);  
            //window.location.href= "{{url('admin/slider')}}";             
               
            }
        });
        }
        
 function open_sliderEdit_modal(e)
    {

        var id= e.getAttribute("data-id");
        $.ajax({
            url:'{{url("admin/slidereditmodal")}}',
            type: 'GET',
            dataType: 'JSON',
            data: { id:id},
            success: function(data){
            console.log(data);
//            console.log(data.result1[0].id);
            // $('#food_names').val(data.result1[0].food_name);
            //  $('#foodid').val(data.result1[0] .id);
            // $('#food_price').val(data.result1[0].food_price);
            $('#id').val(data.result[0].id);
            $('#head').val(data.result[0].heading);
            $('#para').val(data.result[0].paragraph);
           // $('#editimage').html(data.result[0].image );
            $('#sliderEdit').modal('show'); 
                  // $('#emp_id').html(data.user);
                  // $('#permitted_id').html(data.user);
                  // $('#leavtype').html(data.leave);
                  // $('#add_grantloan').modal('show');
               
            }
        });
    }



    </script>

@endsection


<script>
    $('#staffteam li:nth-child(1)').addClass('active');
    $('#staffteam').addClass('show');
</script>
@endsection