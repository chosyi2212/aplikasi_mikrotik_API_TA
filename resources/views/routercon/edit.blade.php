@extends('layouts.master')
@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('paket.index') }}">{{__('Back')}}</a></li>
      <li class="breadcrumb-item">{{__('edit')}}</li>
      <li class="breadcrumb-item active">{{ Auth::guard('user')->user()->name }}</li>
    </ol>
@endsection
@section('content')
<section class="content">
    {{-- <div class="row"> --}}
      <!-- Info boxes -->
      <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Edit Router</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('routercon.update',$routercon->id) }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Router</label>
                  <input type="text" class="form-control" name="name" value="{{ $routercon->name }}" placeholder="Nama Router">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ip-Address</label>
                  <input type="text" class="form-control" name="ip" value="{{ $routercon->ip }}" placeholder="192.168.0.1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="username" class="form-control" name="username" value="{{ $routercon->username }}" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" value="{{ $routercon->password }}" placeholder="password">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
      {{-- </div> --}}
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
