@extends('admin.master')

@section('title', 'Admin | Manage Add-ons')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            PLan Days
        </h2>
<?php 
    $day=[];
?>
@foreach($plandetail as $key => $plandet)
    <?php 
        if($plandet->day_id==1)
        {
            $day[$plandet->day_id]='Sunday';
        }
        else if($plandet->day_id==2)
        {
            $day[$plandet->day_id]='Monday';
        }
        else if($plandet->day_id==3)
        {
            $day[$plandet->day_id]='Thuesday';
        }
        else if($plandet->day_id==4)
        {
            $day[$plandet->day_id]='Wednesday';
        }
        else if($plandet->day_id==5)
        {
            $day[$plandet->day_id]='Thursday';
        }
        else if($plandet->day_id==6)
        {
            $day[$plandet->day_id]='Friday';
        }
        else if($plandet->day_id==7)
        {
            $day[$plandet->day_id]='Sunday';
        }
    ?>
@endforeach

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        All Days
                        <a href="{{url('admin/adddaysofplans',['id' => $planid])}}"><button type="button" class="btn btn-secondary float-right customs-btn-bd" style="margin-left: 10px;">
                            Add Day
                        </button></a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Plan</th>
                                <th scope="col">Day</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plandays as $pday)
                            <tr>
                                <th scope="col">{{$loop->iteration}}</th>
                                <th scope="col">{{$planname}}</th>
                                <th scope="col">
                                        <?php 
                                            if($pday->day_id==1)
                                            {
                                                echo 'Sunday';
                                            }
                                            else if($pday->day_id==2)
                                            {
                                                echo 'Monday';
                                            }
                                            else if($pday->day_id==3)
                                            {
                                                echo 'Thuesday';
                                            }
                                            else if($pday->day_id==4)
                                            {
                                                echo 'Wednesday';
                                            }
                                            else if($pday->day_id==5)
                                            {
                                                echo 'Thursday';
                                            }
                                            else if($pday->day_id==6)
                                            {
                                                echo 'Friday';
                                            }
                                            else if($pday->day_id==7)
                                            {
                                                echo 'Sunday';
                                            }
                                        ?>
                                </th>
                                <th scope="col"> 

                                    <a href="{{url('admin/edit_plandayrecord',['id' => $planid,'day' => $pday->day_id])}}" class="btn btn-info btn-sm btn-square">Edit</a>


                                    <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$planid}}" data-day="{{$pday->day_id}}" data-toggle="modal" data-target="#foodDelete">Delete</a>
                                </th>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- delete Food Alert Modal -->
    <div class="modal modal-danger fade" id="foodDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation!</h4>
                </div>
                <form action="{{url('admin/delete_plandays')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="dayid" id="dayid">
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

@section('scripts')

    <script>
        $('#foodDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var dayid = button.data('day');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #dayid').val(dayid);
        })
    </script>
@endsection


<script>
    $('#plansprogram li:nth-child(1)').addClass('active');
    $('#plansprogram').addClass('show');
</script>
@endsection