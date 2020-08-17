@extends('layouts.app')

@section('title')
Reservations
@endsection

<style>
    .transform {
        text-transform: uppercase !important;

    }

    .label-success {
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
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
    }

    .label-danger {
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
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
    }

    .label-primary {
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
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
    }

    .label-warning {
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
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
    }

    .label-default {
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
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
    }

    .float-right {
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
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Reservation Id</th>
                                <th>Customer</th>
                                <th>Room Type</th>
                                <th>Room Number</th>
                                <th>Room Price</th>
                                <th>Floor</th>
                                <th>Payment</th>
                                {{-- <th>Stay</th> --}}
                                <th>Arried at</th>
                                <th>To Depart at</th>
                                <th>Amount</th>
                                <th>Room Status</th>



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
                                <label class="label label-primary"> {{$reservation->Room->room_type}}</label>
                                @elseif($reservation->Room->room_type === 'standard')
                                <label class="label label-warning"> {{$reservation->Room->room_type}}</label>

                                @else
                                <label class="label label-default"> {{$reservation->Room->room_type}}</label>
                                @endif
                            </td>
                            <td>{{$reservation->Room->room_id}}</td>
                            <td>₦ {{$reservation->Room->price}}</td>
                            <td>{{$reservation->Room->floor}}</td>
                            <td>{{$reservation->payment_by}}</td>
                            {{-- <td>{{$reservation->stay}}</td> --}}
                            <td>{{$reservation->arrival}}</td>
                            <td>{{$reservation->departure}}</td>
                            <td>₦ {{$reservation->amount}}</td>

                            <td>
                                @if($reservation->Room->status === 'available')
                                <label class="label label-success"> {{$reservation->Room->status}}</label>
                                @else
                                <label class="label label-danger"> {{$reservation->Room->status}}</label>
                                @endif
                            </td>


                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" id="edit-{{$reservation->id}}">EDIT</a>
                                    <a class="dropdown-item" href="/admin/reservations/delete/{{$reservation->id}}">DELETE</a>

                                    </div>
                                </div>
                            </td>

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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Reservations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/admin/reservations/create')}}" method="POST" id="chnageURL">
                    @csrf
                    <div class="form-group">
                        <label for="customer">Search Customer Name</label>
                        {{--                            <input type="text" class="form-control" required name="customer" value="" placeholder="Search Customer Name "/>--}}
                        <label for="" id="showcustomer"></label>
                    <br>
                        <div class="customers">
                            <select id="customers" class="form-control select2-single" name="customers"
                                style="width: 100% ">
                                <option>--Select Customer --</option>

                                @foreach($customers as $key => $customer)
                                <option class="transform" value="{{$customer->customer_id}}">{{$customer->fullname}} -
                                    {{$customer->number}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room" id="rooms">Room</label>
                    <br>

                        <select name="room" class="form-control" required >
                            <option value="">--Select Room --</option>
                            @foreach($rooms as $key => $room)
                            <option class="transform" value="{{$room->room_id}}">{{strtoupper($room->room_type)}}
                                AVAILABLE ON FLOOR {{$room->floor}} - ₦ {{$room->price}}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment" id="payment">Payment by</label>
                        <select name="payment" class="form-control" required >
                            <option value="">--Select payment --</option>
                            <option value="transfer">By Transfer</option>
                            <option value="cash">By Cash</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stay">Number of Days</label>
                        <input type="number" name="stay" id="stay" class="form-control" required>
                    </div>

                    <input  type="hidden" name="reservation_id" id="reservation_id">
                    

                    <div class="form-group">
                        <label for="arrival">Arrival </label>
                        <input type="date" name="arrival" id="arrival" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="departure">Departure </label>
                        <input type="date" name="departure" id="departure" class="form-control" required>
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });


        $('[id^=edit]').click(function () {


            let getId = $(this).attr('id');
            let reservation_id = getId.replace("edit-", " ");




            $.ajax({
                url: `/admin/reservations/find`,
                type: "get",
                data: {
                    reservation_id: reservation_id
                },
               
                beforeSend: function () {
                    $(".preloader").show();
                },
                success: function (response) {


                    $('#exampleModal').modal('show');
                    $('#exampleModalLabel').text('Edit Reservation')

                    $('#chnageURL').attr('action', "/admin/reservations/update");


                    console.log('Reservation id',reservation_id);
                    $('#reservation_id').val(reservation_id);
                    $('#showcustomer').text(`Previous Selected Cutomer: ${response.customer.fullname}`)
                    $('#rooms').text(`Previous Selected Room:${response.room.room_id}`);
                    $('#payment').text(`Previously payment was made by: ${response.payment_by}`);
                    $('#stay').val(response.stay)
                    $('#arrival').val(response.arrival)
                    $('#departure').val(response.departure)
                    


                },
                error: function () { //remove gif}

                }


            });

        })
    })

</script>

@endsection
