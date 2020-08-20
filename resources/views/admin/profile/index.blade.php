@extends('layouts.app')

@section('title')
Profile Page
@endsection



@section('content')
<div class="row " style="padding: 50px; position: relative">
    
    <div class="col-md-12 my-5">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" disabled>
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" disabled>
                </div>

                </div>
                <div class="col-md-6">

                <form action="{{ url('/admin/profile/password', array(Auth::user()->id))}})}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" name="cpass" required >
                  </div>
  
                  <div class="form-group">
                      <label for="new_password">New Password</label>
                      <input type="password" class="form-control" name="newpass" required>
                  </div>
                  <div class="form-group">
                      <label for="c_password"> Confirm Password</label>
                      <input type="password" class="form-control" name="cnewpass" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-info">Change Password</button>
                 </div>
 
 
                  </form>

                </div>
              </div>
            </div>
        </div>





    </div>
</div>



@endsection
