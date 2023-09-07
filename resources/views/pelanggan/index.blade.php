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
      <a href="{{ route('pelanggan.create') }}" type="button" class="btn btn-primary ">Tambah Pelanggan</a>
      <br>
      <br>
      {{-- @if(session('success'))
          <p>{{ session('success') }}</p>
      @endif --}}
      <!-- /.row -->
      <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Daftar Layanan</h3>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nomor Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Email Pelanggan</th>
                        <th>Paket</th>
                        <th>Tagihan/Bln</th>
                        <th>Status Layanan</th>
                        {{-- <th>Status Pembayaran</th> --}}
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                       @foreach ($pelanggan as $item)
                        <tr>
                          <div hidden>{{ $id = $item->pelanggan_id }}</div>
                          <td>{{ $item->pelanggan_id }}
                              <a href="{{ route('pelanggan.show',$id) }}" type="button" class="btn btn-success btn-xs" ><i class="fa-sharp fa-solid fa-link"></i> Rincian Paket</a>
                          </td>
                          <td>{{ $item->userpelanggan->name }}</td>
                          <td>{{ $item->userpelanggan->email}}</td>
                          @if ($item->pakets_id == null)
                          <td>-</td>
                          <td>0</td>
                          @else
                          <td>{{ $item->paket->namapaket }}</td>
                          <td>Rp.{{ number_format($item->paket->harga) }}</td>
                          @endif
                          <td><span class="badge {{ ($item->status==0) ? 'badge-danger':'badge-success' }}">{{ ($item->status==0) ? 'Belum Aktif':'Aktif' }}</span></td>
                          {{-- <td><span class="badge {{ ($item->status==0) ? 'badge-danger':'badge-success' }}">{{ ($item->status==0) ? 'Belum bayar':'Aktif' }}</span></td> --}}
                          <td>
                              @if ($item->status==0)
                              <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-lg{{ $item->pelanggan_id }}"><i class="fa-solid fa-file-invoice"></i></button>

                              @endif
                            {{-- <a href="{{ route('pelanggan.edit', $id) }}" type="button" class="btn btn-outline-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="{{ route('pelanggan.edit', $id) }}" type="button" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i></a> --}}
                            <a href="{{ route('pelanggan.delete', $id) }}" type="button" class="btn btn-outline-danger"data-confirm-delete="true"><i class="fa-solid fa-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tfoot>
                    </table>
              </div>
      {{-- </div> --}}
  </div>
  @foreach ($pelanggan as $item)
  <div class="modal fade" id="modal-lg{{ $item->pelanggan_id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('pelanggan.kirimrouter',$item->pelanggan_id) }}" method="post">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Email Pelanggan</label>
                    <input hidden value="{{ $item->pelanggan_id }}" name="pelanggan_id">
                    <input hidden value="{{ $no }}" name="billing_id">
                    @if ($item->pakets_id == null)
                    <input hidden  name="pakets_id">
                    <input hidden  name="harga">
                    @else
                    <input hidden value="{{ $item->pakets_id }}" name="pakets_id">
                    <input hidden value="{{ $item->paket->harga }}" name="harga">
                    @endif
                    <input type="email" class="form-control" name="user" id="user" value="{{ $item->userpelanggan->email }}" placeholder="Email Pelanggan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="{{ $item->passpppoe }}" placeholder="Password" >
                    <div class="input-group-append">
                        <span class="input-group-text">
                        <button class="btn btn-outline btn-xs" type="button" id="mata">
                            <i class="fa fa-eye"></i>
                        </button>
                        </span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Paket</label>
                    <select name="profile"  class="form-control">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($pppoeprofile as $data)
                        <option value="{{ $data['.id'] }}">{{ $data['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Local Address</label><small class="text-success"> 192.168.30.1</small>
                    <input type="text" class="form-control" name="localaddress" id="localaddress" placeholder="Local Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Remote Address  </label><small class="text-success">@foreach ($ip as $item)
                        {{ $item->ranges }}</small>
                    @endforeach
                    <input type="text" class="form-control" name="remoteaddress" id="remoteaddress" placeholder="Remote Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">keterangan Pelanggan</label>
                    <select name="jatuh_tempo" id="jatuh_tempo"  class="form-control">
                        <option value="" selected disabled>Pilih</option>
                        <option value="pelanggan baru">Pelanggan Baru</option>
                        <option value="pelanggan lama">Pelanggan Lama</option>
                    </select>
                    {{-- <input type="text" class="form-control"  value="{{ formatDate($item->created_at) }}" placeholder="No.Telfon"> --}}
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
  <!-- /.modal -->
  @endforeach
</section>
@include('sweetalert::alert')
@endsection
