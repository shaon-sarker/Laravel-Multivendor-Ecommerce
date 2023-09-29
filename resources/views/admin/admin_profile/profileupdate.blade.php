@extends('admin.master') 
@section('content')
<!-- Start content -->
<div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <div class="page-header-title"> @if(Auth::guard('admin')->check()) <h4 class="pull-left page-title">Dashboard of {{ Auth::guard('admin')->user()->name }}</h4> @elseif (Auth::guard('seller')->check()) <h4 class="pull-left page-title">Dashboard of {{ Auth::guard('seller')->user()->name }}</h4> @else @endif <ol class="breadcrumb pull-right">
              <li>
                <a href="#">Xadmino</a>
              </li>
              <li class="active">Dashboard</li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Profile Information</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                      Update your account's profile information and email address.
                  </p>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.profile.update',Auth::guard('admin')->user()->id) }}" method="post">
                      @csrf
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Name" id=""><br>
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" placeholder="Email" id=""><br>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-border panel-dark">
              <div class="panel-heading">
                  <h3 class="panel-title">Profile Information</h3>
                  <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Update your account's profile information and email address.
                </p>
              </div>
              <div class="panel-body">
                  <form action="{{ route('admin.password.update',Auth::guard('admin')->user()->id) }}" method="post">
                    @csrf
                      <label for="">Current Password</label>
                      <input type="password" name="current_password" class="form-control" placeholder="Current Password" id=""><br>
                      <label for="" class="form-label">New Password</label>
                      <input type="password" name="password" class="form-control" placeholder="New Password" id=""><br>
                      <label for="" class="form-label">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id=""><br>
                      <button type="submit" class="btn btn-dark">Update</button>
                  </form>
              </div>
          </div>
      </div>
       
      </div>
    </div>
</div>
@endsection