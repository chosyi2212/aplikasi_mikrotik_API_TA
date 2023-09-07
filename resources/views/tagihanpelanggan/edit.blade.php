@extends('layouts-pelanggan.master')
@section('crumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Pembayaran Seluruh Transaksi {{Auth::guard('pengguna')->user()->name}}</h4>
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
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('tagihanpelanggan.update',$tr->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Bayar Semua Tagihan</h4>
                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-2 text-end control-label col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{ $tr->pelanggan->userpelanggan->name }}"
                                    placeholder="Nama Pelanggan"disabled>
                                {{-- <input hidden type="text" name="nama_pelanggan" value="{{ $tr->pelanggan->userpelanggan->name }}"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-2 text-end control-label col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{ $tr->pelanggan->userpelanggan->email }}"
                                    placeholder="Email"disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-end control-label col-form-label">Alamat </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="{{ $tr->pelanggan->alamat }}"
                                    placeholder="Alamat"disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-end control-label col-form-label">Total Bayar </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="Rp.{{ $tr->harga }}"
                                    placeholder="Total Bayar"disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-end control-label col-form-label">Upload Bukti Bayar</label>
                            <div class="col-sm-10">
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="validatedCustomFile"
                                            required>
                                        <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Layanan Paket</h5>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Kecepatan</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if ($user->pelanggans->pakets_id == null)
                                <td class="text-success"><h5>-</h5></td>
                                <td><h5>-</h5></td>
                                <td><h5>Rp.0</h5></td>
                                @else
                                <td class="text-success"><h5>{{ $user->pelanggans->paket->namapaket }}</h5></td>
                                <td><h5>{{ $user->pelanggans->paket->kecepatan }}</h5></td>
                                <td><h5>Rp.{{ $user->pelanggans->paket->harga }}</h5></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div> --}}
        {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tagihanpelanggan.create') }}" type="button" class="btn btn-success btn-sm float-end text-white">Bayar Semua</a>
                    <h5 class="card-title mb-0">Riwayat Transaksi</h5>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.Invoice</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Paket</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Informasi Tagihan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                            <tr>
                                <td><h5>{{ $item->infoice_id }}</h5></td>
                                <td><h5>{{ $item->pelanggan->userpelanggan->name }}</h5></td>
                                <td><h5>{{ $item->paket->namapaket }}</h5></td>
                                <td><h5>Rp.{{ $item->harga }}</h5></td>
                                @if ($item->tanggaltempo_id == null)
                                <td class="text-success"><h5>Tagihan Pemasangan Awal</h5></td>
                                @else
                                <td><h5 class="text-success">{{ $item->bulantempo->bulan }} - {{ $item->bulantempo->tahun }}</h5></td>
                                @endif
                                <td><span class="badge rounded-pill bg-danger">{{ $item->status}}</span></td>
                                <td><button type="button" class="btn btn-outline-success btn-sm"><i class="me-2 mdi mdi-square-inc-cash"></i>Bayar</button></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td colspan="1" class="text-warning"><h5>Total Bayar</h5></td>
                                <td colspan="5" class="text-danger"><h5>Rp.{{ $transaksi->sum('harga') }}</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div> --}}
        <!-- Column -->
    </div>
</div>
@endsection




