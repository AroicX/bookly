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
                    <label for="number">Number</label>
                    <input type="text" class="form-control" name="number" >
                </div>


                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" >
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Customer Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>Actions</th>

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
