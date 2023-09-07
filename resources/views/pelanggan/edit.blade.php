@extends('layouts.master')
@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">{{__('Back')}}</a></li>
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
              <h3 class="card-title">Edit Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('pelanggan.update',$pelanggan->id) }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pelanggan</label>
                  <input type="text" class="form-control" name="name_pelanggan" value="{{ $pelanggan->name_pelanggan }}" placeholder="Nama Pelanggan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Pelanggan</label>
                  <input type="email" class="form-control" name="email" value="{{ $pelanggan->email }}" placeholder="Email Pelanggan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" value="{{ $pelanggan->password }}" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Paket</label>
                    {{-- <input type="text" class="form-control" name="pakets_id"  value="{{ $pelanggan->pakets_id }}"placeholder="Alamat"> --}}
                    <select name="pakets_id" id="paket" class="form-control">
                        @foreach ($pakets as $item)
                        @if ($item->id==$pelanggan->pakets_id)
                        <option value="{{ $item->id }}"selected>{{ $item->namapaket }}</option>

                        @else
                        <option value="{{ $item->id }}">{{ $item->namapaket }}</option>

                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="{{ $pelanggan->alamat }}" placeholder="Alamat">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nomor Telfon</label>
                  <input type="text" class="form-control" name="no_telfon" value="{{ $pelanggan->no_telfon }}" placeholder="No.Telfon">
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
