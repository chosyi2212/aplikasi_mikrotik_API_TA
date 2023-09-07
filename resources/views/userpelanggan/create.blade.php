@extends('layouts.master')
@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('paket.index') }}">{{__('Back')}}</a></li>
      <li class="breadcrumb-item">{{__('Create')}}</li>
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
              <h3 class="card-title">Tambah User Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('userpelanggan.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <input hidden value="{{ $nomerPel }}" name="pelanggan_id">
                  <input hidden value="{{ $nomeruser }}" name="id">
                  <label for="exampleInputEmail1">Nama Pelanggan</label>
                  <input type="text" class="form-control" name="name" placeholder="Nama Pelanggan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email Pelanggan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No.Telfon</label>
                  <input type="text" class="form-control" name="no_telfon" placeholder="No.telfon">
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
