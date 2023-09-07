{{-- haloooo
{{Auth::guard('pengguna')->user()->name}} --}}
@extends('layouts-pelanggan.master')
@section('crumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Setting Akun {{Auth::guard('pengguna')->user()->name}}</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{Auth::guard('pengguna')->user()->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-8">
            <div class="card">
                <form class="form-horizontal" action="{{ route('useraktif.update',$user->id) }}">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Informasi Akun</h4>
                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-3 text-end control-label col-form-label">Nama Depan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    placeholder="Nama Depan">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Nama Belakang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="full_name" value="{{ $user->name }}"
                                    placeholder="Nama Belakang">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Email </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}"
                                    placeholder="Nama Belakang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                class="col-sm-3 text-end control-label col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat"" value="{{ $user->pelanggans->alamat }}"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1"
                                class="col-sm-3 text-end control-label col-form-label">No Telfon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_telfon" value="{{ $user->pelanggans->no_telfon }}"
                                    placeholder="No Telfon">
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div class="card-body">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
@endsection




