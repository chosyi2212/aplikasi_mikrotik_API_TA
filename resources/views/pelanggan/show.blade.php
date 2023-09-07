@extends('layouts.master')
@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">{{__('Back')}}</a></li>
      <li class="breadcrumb-item">{{__('Create')}}</li>
      <li class="breadcrumb-item active">{{ Auth::guard('user')->user()->name }}</li>
    </ol>
@endsection
@section('content')
<section class="content">
    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Layanan Paket</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($pelanggan->pakets_id == null)
            {{-- pilih paket --}}
            <form action="{{ route('pelanggan.layanan',$pelanggan->pelanggan_id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Pelanggan</label>
                            {{-- <input hidden value="{{ $notransksi }}" name="infoice_id"> --}}
                            <input hidden value="{{ $pelanggan->pelanggan_id }}" name="pelanggan_id">
                            <input hidden id="kirim" name="harga">
                            <input type="text" class="form-control"value="{{ $pelanggan->pelanggan_id }}"  placeholder="Nomor pelanggan" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                            <input type="text" class="form-control"value="{{ $pelanggan->userpelanggan->name }}"  placeholder="Nomor pelanggan" disabled>
                        </div>
                      <!-- /.form-group -->
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="exampleInputPassword1">Paket Internet</label>
                        <select name="pakets_id" id="service" class="form-control">
                            <option value="" selected disabled>Pilih</option>
                            @foreach ($pakets as $item)
                            <option value="{{ $item->id }}" >{{ $item->namapaket }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Pelanggan</label>
                            <input type="text" class="form-control" value="{{ $pelanggan->alamat }}"  placeholder="Nomor pelanggan" disabled>
                        </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <div class="input-group">

                            <input type="text" class="form-control"  id="harga" placeholder="50000" disabled>

                            </div>
                        </div>
                      <!-- /.form-group -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
            @else
            {{-- upgrade paket --}}
            <form action="{{ route('pelanggan.layanan',$pelanggan->pelanggan_id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Pelanggan</label>
                            {{-- <input hidden value="{{ $notransksi }}" name="infoice_id"> --}}
                            <input hidden value="{{ $pelanggan->pelanggan_id }}" name="pelanggan_id">
                            <input hidden id="kirim" name="harga">
                            <input type="text" class="form-control"value="{{ $pelanggan->pelanggan_id }}"  placeholder="Nomor pelanggan" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                            <input type="text" class="form-control"value="{{ $pelanggan->userpelanggan->name }}"  placeholder="Nomor pelanggan" disabled>
                        </div>
                      <!-- /.form-group -->
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="exampleInputPassword1">Paket Internet</label>
                        <select name="pakets_id" id="service" class="form-control">
                            <option selected value="{{$pelanggan->paket_id}}">{{ $pelanggan->paket->namapaket }}</option>
                            @foreach ($pakets as $item)
                            <option value="{{ $item->id }}" >{{ $item->namapaket }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Pelanggan</label>
                            <input type="text" class="form-control" value="{{ $pelanggan->alamat }}"  placeholder="Nomor pelanggan" disabled>
                        </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <div class="input-group">

                            <input type="text" class="form-control"  id="harga" placeholder="50000" disabled>

                            </div>
                        </div>
                      <!-- /.form-group -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
            @endif
        </div>
          <!-- /.row -->
      <!-- Info boxes -->
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Paket</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Layanan Paket</th>
                      <th>Paket</th>
                      <th>Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @if ($pelanggan->pakets_id == null)
                        <td></td>
                        <td></td>
                        <td></td>
                        @else
                        <td>{{ $pelanggan->paket->namapaket }}</td>
                        <td>{{ $pelanggan->paket->kecepatan }}</td>
                        <td>Rp.{{ number_format($pelanggan->paket->harga) }}</td>
                        @endif
                      </tr>
                    </tbody>
                    <tfoot>
                       <tr>
                        <th rowspan="1" colspan="2">Total Harga/bln</th>
                        <th rowspan="1" colspan="1">Rp.{{ ($pelanggan->pakets_id == null)? '0': number_format($pelanggan->paket->harga) }}</th>
                       </tr>
                    </tfoot>
                  </table>
            </div>
        </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection
