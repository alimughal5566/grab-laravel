@extends('admin.master')

@section('title', 'Admin | Reservation Log')

@section('body')
    <div class="container-fluid">
        <h2 class="mb-4">
            Reservation Request
        </h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <p><b>Reservation Log:</b></p>
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">phone</th>
                                <th scope="col">date</th>
                                <th scope="col">time</th>
                                <th scope="col">status</th>
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
                                        @if($reservation->status == 1)

                                            <span class="badge  badge-pill  badge-danger">rejected</span>
                                        @elseif($reservation->status == 2)
                                            <span class="badge  badge-pill  badge-success">Accepted</span>
                                        @endif
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




@section('scripts')

    {{--dropdown active--}}
    <script>
        $('#reservation li:nth-child(1)').addClass('active');
        $('#reservation').addClass('show');
    </script>
@endsection

@endsection

