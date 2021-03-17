@extends('admin.master')

@section('title', 'Admin | Manage Add-ons')

@section('body')
    <div class="container-fluid">

        <h2 class="mb-4">
            PLans With Options
        </h2>


        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        All Plans
                        <a href="{{url('admin/addplanoptions_mealfood',['id' => $planid])}}"><button type="button" class="btn btn-secondary float-right customs-btn-bd" style="margin-left: 10px;">
                            New Meal Food
                        </button></a>
                    </div>
                    <div class="card-body ">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Meal</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_mealoptionsdays as $key => $plan)
                            <tr>
                                <th scope="col">{{$loop->iteration}}</th>
                                <th scope="col">{{$planname}}</th>

                                <th scope="col">
                                    @foreach($mealstype as $meal)
                                        @if($meal->id==$plan->meal_type)
                                            {{$meal->category_name}}
                                        @endif
                                    @endforeach
                                </th>

                                {{-- <th scope="col">{{$plan->total_days}}</th> --}}
                                <th scope="col"> 
                                    <a href="{{route('admin.editplanoptions_mealfood',['id' => $plan->planopt_id, 'meal_type' => $plan->meal_type ])}}" class="btn btn-info btn-sm btn-square">Edit</a>


                                    <a href="" class="btn btn-danger btn-sm btn-square" data-id="{{$plan->planopt_id}}" data-mealtype="{{$plan->meal_type}}" data-toggle="modal" data-target="#foodDelete">Delete</a>
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
                <form action="{{route('admin.delete_planoptionsmeal')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="mealtype" id="mealtype">
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
            var mealtype = button.data('mealtype');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #mealtype').val(mealtype);
        })
    </script>
@endsection


<script>
    $('#plansoptions li:nth-child(3)').addClass('active');
    $('#plansoptions').addClass('show');
</script>
@endsection