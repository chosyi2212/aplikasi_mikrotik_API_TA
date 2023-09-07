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
              <h3 class="card-title">Tambah Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('profile_pppoe.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name Profile</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name Profile">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Local Address</label>
                  <input type="text" class="form-control" name="localaddress" id="localaddress" placeholder="Local Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Remote adress</label>
                    <select name="remoteaddress" id="remoteaddress" class="form-control">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($ippool as $item)
                        <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Rate limite</label>
                    <select name="ratelimit" id="ratelimit" class="form-control">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($paket as $item)
                        <option value="{{ $item->kecepatan }}">{{ $item->namapaket }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Comment</label>
                  <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment">
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
