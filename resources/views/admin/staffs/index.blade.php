@extends('layouts.app')

@section('title')
    Staffs
@endsection

@section('content')
    <div class="row " style="padding: 50px">
        <div class="col-md-4">
            <h5>Create New Staff</h5>

            <form action="{{ url('/admin/staffs/create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" >
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" name="email" >
                </div>


                <div class="form-group">
                   <button type="submit" class="btn btn-info">Create</button>
                </div>


            </form>
        </div>

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Staffs</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                            @if($staffs)
                                @foreach($staffs as $key => $staff)

                                    <tr>
                                        <td>{{$staff->name}}</td>
                                        <td>{{$staff->email}}</td>
                                        <td>{{$staff->role}}</td>
                                        <td>Active</td>
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
