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
              <h3 class="card-title">Edit Aktifasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('PPPoEsecret.update') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input hidden value="{{ $user['.id'] }}" name="id">
                  <input type="text" class="form-control" name="user" id="user" value="{{ $user['name'] ?? '' }}" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" value="{{ $user['password'] ?? '' }}" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Paket Profil</label>
                    <select name="profile" id="profile" class="form-control">
                        <option  value="{{ $user['profile'] }}" selected>{{ $user['profile'] }}</option>
                        @foreach ($profile as $item)
                        <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Local Address</label>
                    <input type="text" class="form-control" name="localaddress" id="localaddress" value="{{ $user['local-address'] ?? '' }}" placeholder="Local Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Remote Address</label>
                    <input type="text" class="form-control" name="remoteaddress" id="remoteaddress" value="{{ $user['remote-address'] ?? '' }}" placeholder="Remote Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select name="disabled" id="disabled" class="form-control">
                        <option disabled selected>--Pilih status secreate--</option>
                        @if ($user['disabled'] == "false")
                             <option value="true">Disable</option>
                             <option value="false" selected>Enable</option>
                        @elseif($user['disabled'] == "true")
                             <option value="true" selected>Disable</option>
                             <option value="false">Enable</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Comment</label>
                  <input type="text" class="form-control" name="comment" id="comment" value="{{ $user['comment'] ?? '' }}" placeholder="Comment">
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
