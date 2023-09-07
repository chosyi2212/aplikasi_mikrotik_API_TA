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
        {{-- <a href="{{ route('paket.create') }}" type="button" class="btn btn-primary ">Tambah Paket</a> --}}
        {{-- <br>
        <br>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Log Paket</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama Pelanggan</th>
                      <th>Paket upgrade</th>
                      <th>Paket Sebelumnya</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($tampil as $item)
                      <tr>
                        <div hidden>{{ $id = str_replace('*','',$item['id']) }}</div>
                        <td>{{ $item->pelanggan->userpelanggan->name }}</td>
                        <td>{{ $item->paket->namapaket }}</td>
                        <td>{{ $item->paket_sebelumnya }}</td>
                        <td>Rp.{{ number_format($item->harga) }}</td>
                        <td><span class="badge {{ ($item->status==0) ? 'badge-danger':'badge-success' }}">{{ ($item->status==0) ? 'Belum Aktif':'Sudah Upgrade' }}</span></td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                        @if ($item->status==0)
                         <a href="{{ route('paket.logup', $id) }}" type="button" class="btn btn-outline-success"><i class="fa-solid fa-bolt"></i></a>

                        @endif
                          <a href="{{ route('paket.delete', $id) }}" type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tfoot>
                  </table>
            </div>
        </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  @include('sweetalert::alert')
@endsection
