@extends('layouts.master')
@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{__('Home')}}</a></li>
      <li class="breadcrumb-item active">{{ Auth::guard('user')->user()->name }}</li>
    </ol>
@endsection
@section('content')
<section class="content">
        <!-- /.card-header -->
      <!-- Info boxes -->
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cetak PDF Data Transaksi</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cetakPDF') }}" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Bulan</label>
                            <select name="bulan" class="form-control">
                                    <option name="bulan" value="januari">Januari</option>
                                    <option name="bulan" value="februari">Februari</option>
                                    <option name="bulan" value="maret">Maret</option>
                                    <option name="bulan" value="april">April</option>
                                    <option name="bulan" value="mei">Mei</option>
                                    <option name="bulan" value="juni">Juni</option>
                                    <option name="bulan" value="juli">Juli</option>
                                    <option name="bulan" value="agustus">Agustus</option>
                                    <option name="bulan" value="september">September</option>
                                    <option name="bulan" value="oktober">Oktober</option>
                                    <option name="bulan" value="november">November</option>
                                    <option name="bulan" value="desember">Desember</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Tahun</label>
                            <input type="number" class="form-control" name="tahun" value="2023">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Cetak PDF</button>
                    </div>
                </form>
            </div>
        </div>
      <!-- /.row -->
    <!--/. container-fluid -->

  @include('sweetalert::alert')
@endsection
