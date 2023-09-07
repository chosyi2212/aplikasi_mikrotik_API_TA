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
              <h3 class="card-title">Tambah Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('pelanggan.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Pelanggan</label>
                  <input type="text" class="form-control"value="{{ $nomerPel }}"  placeholder="Nomor pelanggan" disabled>
                  <input hidden value="{{ $nomerPel }}" name="pelanggan_id">
                </div>
                <div class="form-group">
                    <label>User Pelanggan</label>
                    <select name="userpelanggans_id" class="form-control select2" style="width: 100%;">
                      <option selected="selected">Pilih User</option>
                      @foreach ($userPelanggan as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Panjang </label>
                  <input type="text" class="form-control" name="full_name" placeholder="Nama Pelanggan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password PPPoe</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Telfon</label>
                  <input type="text" class="form-control" name="no_telfon" placeholder="No.Telfon">
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
