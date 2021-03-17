@extends('admin.master')

@section('title', 'Admin | Manage Add-ons')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            Food Availability
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Food Availability
                        <a href="{{route('admin.addavailability')}}"><button type="button" class="btn btn-secondary float-right customs-btn-bd" style="margin-left: 10px;">
                            Add Availability
                        </button></a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Food Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fooditems as $fooditems)
                            <tr>
                                <th scope="col">{{$loop->iteration}}</th>
                                <th scope="col">{{$fooditems->food_name}}</th>
                                <th scope="col">{{$fooditems->food_price}}</th>
                                <th scope="col"><?php 
                                if($fooditems->availability=='')
                                    { echo 'N/A'; } 
                                    else
                                    { 
                                        $availabilities=explode(',',$fooditems->availability);
                                        
                                        $days= [];
                                        foreach ($availabilities as $key => $availability) {
                                            if($availability==1)
                                            {
                                                array_push($days, 'Sunday');
                                            }
                                            else if($availability==2)
                                            {
                                                array_push($days, 'Monday');
                                            }
                                            else if($availability==3)
                                            {
                                                array_push($days, 'Thuesday');
                                            }
                                            else if($availability==4)
                                            {
                                                array_push($days, 'Wednesday');
                                            }
                                            else if($availability==5)
                                            {
                                                array_push($days, 'Thursday');
                                            }
                                            else if($availability==6)
                                            {
                                                array_push($days, 'Friday');
                                            }
                                            else if($availability==7)
                                            {
                                                array_push($days, 'Saturday');
                                            }

                                        }
                                        $avail_days=implode(',', $days);
                                        echo $avail_days;
                                    } ?>
                                </th>
                                <th scope="col"> 
                                    <a href="{{url('admin/edit_availability',['id' => $fooditems->id])}}" class="btn btn-info btn-sm btn-square">Edit</a>

                                    <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$fooditems->id}}" data-toggle="modal" data-target="#foodDelete">Delete</a>
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
                <form action="{{url('admin/delete_availability')}}" method="post">
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

@section('scripts')

    <script>
        $('#foodDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection


<script>
    $('#foods li:nth-child(6)').addClass('active');
    $('#foods').addClass('show');
</script>
@endsection