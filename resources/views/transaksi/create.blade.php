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
              <h3 class="card-title">Tambah Paket</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('paket.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Paket</label>
                  <input type="text" class="form-control" name="namapaket" placeholder="Nama Paket">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kecepatan</label>
                  <input type="text" class="form-control" name="kecepatan" placeholder="Contoh : 4M/5M">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" name="harga" placeholder="50.000">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
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
