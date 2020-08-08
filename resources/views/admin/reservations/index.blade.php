@extends('layouts.app')

@section('title')
    Reservations
@endsection

<style>

    .transform{
        text-transform: uppercase !important;

    }
    .label-success{
        width: 100%;
        height: 30px;
        padding: 5px;
        background: #1cc88a;
        color: #fff;
        text-align: center;
        font-size: 14px;
        font-weight: lighter;
        text-transform: uppercase;
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

    .float-right{
        position: absolute;
        top: 10px;
        right: 50px;
        padding: 15px;
        float: right;
    }


    .customers {
        display: block;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d1d3e2;
        border-radius: .35rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>

@section('content')
    <div class="row " style="padding: 50px; position: relative">
      <div class="float-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New</button>
      </div>
        <div class="col-md-12 my-5">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Reservations</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Reservation Id</th>
                                <th>Customer</th>
                                <th>Room Type</th>
                                <th>Room Number</th>
                                <th>Floor</th>
                                <th>Room Status</th>

                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            @if($reservations)
                                @foreach($reservations as $key => $reservation)

                                    <td>{{$key + 1}}</td>
                                    <td>{{$reservation->reservation_id}}</td>
                                    <td>{{$reservation->Customer->fullname}}</td>
                                    <td>
                                        @if($reservation->Room->room_type === 'basic')
                                            <label class="label label-primary" >  {{$reservation->Room->room_type}}</label>
                                        @elseif($reservation->Room->room_type === 'standard')
                                            <label class="label label-warning" >  {{$reservation->Room->room_type}}</label>

                                        @else
                                            <label class="label label-default" >  {{$reservation->Room->room_type}}</label>
                                        @endif
                                    </td>
                                    <td>{{$reservation->Room->room_id}}</td>
                                    <td>{{$reservation->Room->floor}}</td>

                                    <td>
                                        @if($reservation->Room->status === 'available')
                                            <label class="label label-success" >  {{$reservation->Room->status}}</label>
                                        @else
                                            <label class="label label-danger" >  {{$reservation->Room->status}}</label>
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

    <!--modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Reservations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/admin/reservations/create')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="customer">Search Customer Name</label>
{{--                            <input type="text" class="form-control" name="customer" value="" placeholder="Search Customer Name "/>--}}
                           <div class="customers">
                               <select id="customers" class="form-control select2-single" name="customers" style="width: 100% ">
                                   <option >--Select Customer --</option>

                                   @foreach($customers  as $key => $customer)
                                       <option class="transform" value="{{$customer->customer_id}}">{{$customer->fullname}} - {{$customer->number}}</option>

                                   @endforeach
                               </select>
                           </div>
                        </div>

                        <div class="form-group">
                            <label for="room">Room</label>
                            <select name="room" class="form-control">
                                <option value="">--Select Room --</option>
                                @foreach($rooms  as $key => $room)
                                    <option class="transform" value="{{$room->room_id}}">{{strtoupper($room->room_type)}} AVAILABLE ON FLOOR {{$room->floor}}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" id="bookRoom">Book</button>
                        </div>

                    </form>
                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!--modal-->
@endsection
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>--}}

@section('js')
    <script>
        $(document).ready(function () {
            $('#customers').select2();
        })
    </script>

@endsection
