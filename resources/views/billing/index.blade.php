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

      <!-- Info boxes -->
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Billing</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama pelanggan</th>
                      <th>Paket</th>
                      <th>Harga</th>
                      <th>tanggal tempo</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($billing as $item)
                      <tr>
                        <div hidden>{{ $id = str_replace('*','',$item['id']) }}</div>
                        <td>{{ $item->pelanggan->userpelanggan->name}}</td>
                        <td>{{ $item->paket->namapaket }}</td>
                        <td>Rp.{{ number_format($item->harga) }}</td>
                        @if ($item->tempo_id == null)
                        <td>-</td>
                        @else
                        <td>{{ $item->tanggaltempo->bulan }} - {{ $item->tanggaltempo->tahun }}</td>
                        @endif
                        <td>
                          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-lg{{ $id }}"><i class="fa-solid fa-file-invoice"></i> Transaksi</button>
                        </td>
                      </tr>
                      @endforeach
                    </tfoot>
                  </table>
            </div>
        </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
    @foreach ($billing as $item)
    <div class="modal fade" id="modal-lg{{ $item->id }}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('billing.update',$item->id) }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">No.Invoice</label>
                        <input type="text" class="form-control" name="localaddress" id="localaddress" value="{{ $nomerPel }}" placeholder="Local Address" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Pelanggan</label>
                        <input hidden value="{{ $nomerPel }}" name="infoice_id">
                        <input hidden value="{{ $item->pelanggan->pelanggan_id }}" name="pelanggan_id">
                        <input hidden value="{{ $item->pelanggan->paket->id }}" name="pakets_id">
                        {{-- <input hidden value="{{ $item->paket->harga }}" name="harga"> --}}
                        <input type="email" class="form-control" name="user" id="user" value="{{ $item->pelanggan->userpelanggan->name }}" placeholder="Email Pelanggan" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" class="form-control" name="remoteaddress" id="remoteaddress" value="{{ $item->pelanggan->alamat }}" placeholder="Remote Address"disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Paket</label>
                        <input type="text" class="form-control" name="remoteaddress" id="remoteaddress" value="{{ $item->pelanggan->paket->namapaket }}" placeholder="Remote Address"disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tagihan</label>
                        <input type="text" class="form-control" name="harga" id="harga" value="{{ $item->harga }}" placeholder="No.Telfon">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bulan Tempo</label>
                        <select name="tanggaltempo_id"  class="form-control">
                            <option value="" selected disabled>Pilih</option>
                            @foreach ($tanggal as $data)
                            <option value="{{ $data->id }}">{{ $data->bulan }}-{{ $data->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
      <!-- /.modal -->
  </section>
  @include('sweetalert::alert')
@endsection
