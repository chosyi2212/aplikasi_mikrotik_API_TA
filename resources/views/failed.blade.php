@extends('layouts.master')
@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="">{{__('Home')}}</a></li>
      <li class="breadcrumb-item active">{{ Auth::guard('user')->user()->name }}</li>
    </ol>
@endsection
@section('content')
<section class="content">
    <div class="error-page">
      <h2 class="headline text-warning"> 404</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Anda belum terhubung ke Router.</h3>

        <p>
         Anda belum terhubung ke router.
          mohon untuk cek <a href="{{ route('routercon.index') }}">Router connect</a> agar dapat mengakses API mikrotik.
        </p>

        {{-- <form class="search-form">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
              </button>
            </div>
          </div>
          <!-- /.input-group -->
        </form> --}}
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
@endsection
