{{-- haloooo
{{Auth::guard('pengguna')->user()->name}} --}}
@extends('layouts-pelanggan.master')
@section('crumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Selamat Datang {{Auth::guard('pengguna')->user()->name}}</h4>
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
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <a href="{{ route('layananpelanggan.index') }}"><h1 class="font-light text-white"><i class="mdi mdi-speedometer"></i></h1></a>
                    <h6 class="text-white">Layanan</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <a href="{{ route('tagihanpelanggan.index') }}"><h1 class="font-light text-white"><i class="mdi mdi-calendar"></i></h1></a>
                    <h6 class="text-white">Tagihan</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <a href="{{ route('useraktif.index') }}"><h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1></a>
                    <h6 class="text-white">Akun</h6>
                </div>
            </div>
        </div>

        <!-- Column -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Paket Anda</h5>
                    <h4>Halo {{ $user->name }} kamu sedang berada di <h2 class="text-success">{{ ($user->pelanggans->pakets_id==null) ? 'Belum memilih': $user->pelanggans->paket->kecepatan}}</h2></h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tagihan Anda</h5>
                    @if($total == "Lunas")
                        <h4>Tagihan anda yaitu <h2 class="text-success">{{ $total }}</h2></h4>
                    @else
                        <h4>Tagihan anda yaitu <h2 class="text-success">Rp.{{ $total }}</h2></h4>
                    @endif
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="row">
        @foreach ($mastenggang as $item)
        @if ($item->logpaket_id == null)
            @if ($item->status==0)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi</h5>
                        <marquee><h3 class="text-danger">ANDA TELAH MEMASUKI JATUH TEMPO SEGERA UNTUK MEMBAYAR UNTUK MENDAPATKAN SPEED YANG MAKSIMAL!!</h3></marquee>
                    </div>
                </div>
            </div>
            @endif
        @else

        @endif
        {{-- {{ ($item->logpaket_id == null) ? ($item->status == 0)? 'hai': $item->status : '' }} --}}
        @endforeach

        <div class="col-md-12">
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
                                <td><h5>Rp.{{ number_format($item->harga) }}</h5></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection



