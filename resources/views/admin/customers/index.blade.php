@extends('layouts.app')

@section('title')
    Customers
@endsection

@section('content')
    <div class="row " style="padding: 50px">
        <div class="col-md-4">
            <h5>Create New Customers</h5>

            <form action="{{ url('/admin/customers/create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control" name="fullname" >
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" >
                </div>

                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <input type="text" class="form-control" name="number" >
                </div>


                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" >
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" name="nationality" >
                </div>
                <div class="form-group">
                    <label for="Gender">Gender</label>
                    <input type="text" class="form-control" name="gender" >
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>


            </form>
        </div>

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Customers</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Customer Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Nigeria</th>
                                <th>Gender</th>
                                <th></th>


                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            @if($customers)
                                @foreach($customers as $key => $customer)

                                    <tr>
                                        <td>{{$customer->customer_id}}</td>
                                        <td>{{$customer->fullname}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->number}}</td>
                                        <td style="font-size: 9px">{{$customer->address}}</td>
                                        <td style="font-size: 12px">{{$customer->nationality}}</td>
                                        <td style="font-size: 12px">{{$customer->gender}}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <a class="dropdown-item" href="#">EDIT</a>
                                                  <a class="dropdown-item" href="#]">DELETE </a>

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
@endsection
