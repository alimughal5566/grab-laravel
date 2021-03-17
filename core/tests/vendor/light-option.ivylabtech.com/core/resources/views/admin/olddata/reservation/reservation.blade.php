@extends('admin.master')

@section('title', 'Admin | Reservation Order')

@section('body')
    <div class="container-fluid">
        <h2 class="mb-4">
            Reservation Request
        </h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <p><b>Reservation Request:</b></p>
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">phone</th>
                                <th scope="col">date</th>
                                <th scope="col">time</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                       @foreach($reservations as $reservation)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$reservation->name}}</td>
                                <td>{{$reservation->phone}}</td>
                                <td>{{$reservation->date}}</td>
                                <td>{{$reservation->time}}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm btn-square" data-message="{{$reservation->message}}"
                                       data-toggle="modal" data-target="#reservationView">View Message</a>

                                    <a href="{{route('admin.reservationAccept',$reservation->id)}}"
                                       class="btn btn-success btn-sm btn-square" onclick="return confirm('Are you sure ?')">Accept</a>

                                    <a href="{{route('admin.reservationDelete',$reservation->id)}}"
                                       class="btn btn-danger btn-sm btn-square" onclick="return confirm('Are you sure ?')">Reject</a>
                                </td>

                            </tr>
                           @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Foods item Modal -->
    <div class="modal modal-danger fade" id="reservationView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Message</h4>
                </div>

                    <div class="modal-body">

                        <div class="col-md-12 mb-3">

                            <p id="message" class="text-muted text-justify"></p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

            </div>
        </div>
    </div>


@section('scripts')

    {{--View reservation--}}
    <script>
        $('#reservationView').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);

            var message = button.data('message') ;

            var modal = $(this);
            $('#message').html(message);

        })
    </script>


    {{--dropdown active--}}
    <script>
        $('#reservation li:nth-child(1)').addClass('active');
        $('#reservation').addClass('show');
    </script>
@endsection

@endsection

