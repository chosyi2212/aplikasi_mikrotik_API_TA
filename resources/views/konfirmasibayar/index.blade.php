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
                <h3 class="card-title">Konfiemasi Data</h3>
                {{-- <h3 class="card-title text-success float-right">Total Rekapan = Rp.{{ $totalseluruh }}</h3> --}}
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama pelanggan</th>
                      <th>Bukti Bayar</th>
                      <th>Harga</th>
                      <th>Tempo Bulan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($transaksi as $item)
                      <tr>
                        <div hidden>{{ $id = str_replace('*','',$item['id']) }}</div>
                        <td>{{ $item->pelanggan->userpelanggan->name}}</td>
                        @if ($item->photo==null)
                        <td>-</td>
                        @else
                        <td><img src="{{ asset('storage/bukti-transaksi/'.$item->photo) }}" height="60px"></td>
                        @endif
                        <td>Rp.{{ $item->harga }}</td>
                        @if ($item->tanggaltempo_id == null)
                        <td><span class="badge badge-danger">Belum Aktif 1 bulan</span></td>
                        @else
                        <td>{{ $item->bulantempo->bulan }} - {{ $item->bulantempo->tahun }}</td>
                        @endif
                        <td>
                            @if ($item->status==0)
                                    <span class="badge badge badge-danger">Belum Bayar</span>
                                    @elseif ($item->status==1)
                                    <span class="badge badge badge-warning">Menunggu</span>
                                    @else
                                    <span class="badge badge badge-success">Sudah bayar</span>
                                    @endif
                        </td>
                        <td>
                          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-success{{$id}}"><i class="fa-solid fa-print"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tfoot>
                  </table>
            </div>
        </div>
      <!-- /.row -->
    <!--/. container-fluid -->
    @foreach ($transaksi as $item)
    <div class="modal fade" id="modal-success{{ $item->id }}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-success ">
            <div class="modal-header">
              <h4 class="modal-title">Cetak Transaksi </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3>{{ $item->pelanggan->userpelanggan->name }}</h3>
                <h5>Dengan Kecepatan {{ $item->paket->kecepatan }}</h5>
                <p>Cetak Transaksi {{ $item->pelanggan->userpelanggan->name }}.</p>
                <img src="{{ asset('storage/bukti-transaksi/'.$item->photo) }}" height="300px">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <a href="{{ route('transaksi.print', $item->id) }}"  type="button" class="btn btn-outline-light">Cetak Transaksi</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @endforeach
      <!-- /.modal -->
  </section>
@endsection
@include('sweetalert::alert')
