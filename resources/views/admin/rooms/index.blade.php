@extends('layouts.app')

@section('title')
    Rooms
@endsection

<style>
    .label-success{
        width: 100%;
        height: 30px;
        padding: 5px;
        background: #1cc88a;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: lighter;
        border-radius: 2px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
    }

    .label-danger{
        width: 100%;
        height: 30px;
        padding: 5px;
        background: #9b2e1a;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: lighter;
        border-radius: 2px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
    }

    .label-primary{
        width: 100%;
        height: 30px;
        padding: 5px;
        background: #1f6fb2;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: lighter;
        border-radius: 2px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
    }

    .label-warning{
        width: 100%;
        height: 30px;
        padding: 5px;
        background: #e67e22;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: lighter;
        border-radius: 2px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
    }

    .label-default{
        width: 100%;
        height: 30px;
        padding: 5px;
        background: #242424;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: lighter;
        border-radius: 2px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.2);
    }

</style>

@section('content')
    <div class="row " style="padding: 50px">

        <div class="col-md-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Rooms</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Room Id</th>
                                <th>Floor</th>
                                <th>Type</th>
                                <th>Status</th>
                                {{-- <th>Actions</th> --}}

                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            @if($rooms)
                                @foreach($rooms as $key => $room)

                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$room->room_id}}</td>
                                        <td>{{$room->floor}}</td>
                                        <td>
                                            @if($room->room_type === 'basic')
                                                <label class="label label-primary" >  {{$room->room_type}}</label>
                                            @elseif($room->room_type === 'standard')
                                                <label class="label label-warning" >  {{$room->room_type}}</label>

                                            @else
                                                <label class="label label-default" >  {{$room->room_type}}</label>
                                            @endif
                                        </td>

                                        <td>
                                          @if($room->status === 'available')
                                                <label class="label label-success" >  {{$room->status}}</label>
                                                @else
                                                <label class="label label-danger" >  {{$room->status}}</label>
                                                @endif
                                           </td>

                                        <td><i class="fa fa-fw fa-envelope-open-o"></i></td>

                                    </tr>
                                @endforeach

                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





        </div>
    </div>
@endsection
