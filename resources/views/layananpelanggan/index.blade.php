@extends('layouts-pelanggan.master')
@section('crumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Layanan Paket {{Auth::guard('pengguna')->user()->name}}</h4>
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
        <div class="col-md-7">
            <div class="card">
                <form class="form-horizontal" action="{{ route('layananpelanggan.update',$user->pelanggans->pelanggan_id) }}">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Informasi Layanan</h4>
                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-3 text-end control-label col-form-label">No.Pelanggan</label>
                            <div class="col-sm-9">
                                <input hidden value="{{ $user->pelanggans->pelanggan_id }}" name="pelanggan_id">
                                <input hidden value="{{ $notransksi }}" name="invoice_id">
                                <input hidden id="kirim" name="harga">
                                <input type="text" class="form-control"  value="{{ $user->pelanggans->pelanggan_id }}"
                                    placeholder="Nama Depan"disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-3 text-end control-label col-form-label">Nama Depan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{{ $user->name }}"
                                    placeholder="Nama Depan"disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Username PPPoE </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{{ $user->email }}"
                                    placeholder="Nama Belakang"disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Layanan Paket</label>
                            <div class="col-sm-9">

                                @if ($user->pelanggans->pakets_id == null)
                                    <select class="select2 form-select shadow-none" id="service" name="pakets_id"
                                    style="width: 100%; height:36px;">
                                        <option>---pilih---</option>
                                        @foreach ($paket as $item)
                                        <option value="{{ $item->id }}">{{ $item->namapaket }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <select class="select2 form-select shadow-none" name="pakets_id"
                                    style="width: 100%; height:36px;" disabled>
                                        <option selected value="{{ $user->pelanggans->pakets_id }}" disabled>{{ $user->pelanggans->paket->namapaket }}</option>
                                    </select>
                                @endif
                                    {{-- @if ($user->pelanggans->pakets_id == null)

                                    @endif
                                    @foreach ($paket as $item)
                                    <option value="{{ $item->id }}">{{ $item->namapaket }}</option>
                                    @endforeach --}}

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1"
                                class="col-sm-3 text-end control-label col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $user->pelanggans->alamat }}"
                                    placeholder="Alamat" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1"
                                class="col-sm-3 text-end control-label col-form-label">No Telfon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{{ $user->pelanggans->no_telfon }}"
                                    placeholder="No Telfon" disabled>
                            </div>
                        </div>
                        @if ($ambilstat==2)
                        <div class="form-group row">
                            <label for="cono1"
                                class="col-sm-3 text-end control-label col-form-label">Password PPPoE</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{{ $user->pelanggans->passpppoe }}"
                                    placeholder="No Telfon" disabled>
                            </div>
                        </div>
                        @endif
                    </div>
                    @if ($user->pelanggans->pakets_id == null)
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        @if ($user->pelanggans->pakets_id != NULL)
        <div class="col-md-5">
            <div class="card">
                <form class="form-horizontal" action="{{ route('layananpelanggan.update',$user->pelanggans->pelanggan_id) }}">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Layanan Upgrade Paket</h4>
                        <input hidden  value="{{ $user->pelanggans->pelanggan_id }}" name="pelanggan_id">
                        <input hidden value="{{ $notransksi }}" name="invoice_id">
                        <input hidden value="{{ $idtam }}" name="id">
                        {{-- <input  value="{{ $user->pelanggans-> }}" name="id"> --}}
                        <input hidden id="harga" name="harga">
                        {{-- @if ($user->pelanggans->status == 1)
                            @if ($user->pelanggans->billing->tempo_id == null)
                            <input hidden value="{{ $user->pelanggans->billing->tempo_id }}" name="tempo_id">

                            @endif
                        @endif --}}
                        <h5 class="text-success">Menginformasikan kepada pelanggan bahwa jika ingin mengupgrade
                            paket anda, Anda dikenakan biaya tambahan administrasi sebesar <span class="text-danger">Rp.25.000</span> sekian dan terimakasih
                        </h5>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Paket Upgrade</label>
                            <div class="col-sm-9">
                                <select class="select2 form-select shadow-none" id="service" name="pakets_id"
                                style="width: 100%; height:36px;">
                                    @if ($user->pelanggans->pakets_id == null)
                                    <option>---pilih---</option>
                                    @foreach ($paket as $item)
                                    <option value="{{ $item->id }}">{{ $item->namapaket }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{ $user->pelanggans->pakets_id }}">{{ $user->pelanggans->paket->namapaket }}</option>
                                    @foreach ($paket as $item)
                                    <option value="{{ $item->id }}">{{ $item->namapaket }}</option>
                                    @endforeach
                                    @endif
                                    {{-- @if ($user->pelanggans->pakets_id == null)

                                    @endif
                                    @foreach ($paket as $item)
                                    <option value="{{ $item->id }}">{{ $item->namapaket }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                    <select class="select2 form-select shadow-none" name="keterangan"
                                style="width: 100%; height:36px;">
                                    <option>---pilih---</option>
                                    <option value="Saya ingin Menambah Paket">Saya ingin Menambah paket</option>
                                    <option value="Saya ingin Menurunkan Paket">Saya ingin Menurunkan paket</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {{-- @if ($user->pelanggans->pakets_id == null)
                    @endif --}}
                </form>
            </div>
        </div>
        @endif
        <div class="col-md-12">
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
                                <td><h5>Rp.{{ number_format($user->pelanggans->paket->harga) }}</h5></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Layanan paket yang tersedia</h5>
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
                            @foreach ($paket as $item)
                            <tr>
                                <td class="text-success"><h5>{{ $item->namapaket }}</h5></td>
                                <td><h5>{{ $item->kecepatan }}</h5></td>
                                <td><h5>Rp.{{ $item->harga }}</h5></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div> --}}
        <!-- Column -->
    </div>
</div>
@endsection




