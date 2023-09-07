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
              <h3 class="card-title">Edit Pool</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('poolip.update') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pool</label>
                  <input hidden value="{{ $ipool['.id'] }}" name="id">
                  <input type="text" class="form-control" name="name" value="{{ $ipool['name'] ?? '' }}" placeholder="Nama Pool">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ranges</label>
                  <input type="text" class="form-control" name="ranges" value="{{ $ipool['ranges'] ?? '' }}" placeholder="Ranges : 192.168.10.2-192.168.10.254">
                </div>
                {{-- <input hidden id="output"  name="range"> --}}
                {{-- <div class="form-group">
                  <label for="exampleInputPassword1">Range Akhir</label>
                  <input type="text" class="form-control" id="input2" name="rangesakhir"  placeholder="Email Pelanggan">
                </div> --}}
                <div class="form-group">
                  <label for="exampleInputPassword1">Comment</label>
                  <input type="text" class="form-control" name="comment"" value="{{ $ipool['comment'] ?? '' }}" placeholder="Comment">
                </div>
                {{-- <div id="output"></div> --}}
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
