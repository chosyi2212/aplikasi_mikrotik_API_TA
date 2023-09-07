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
        <a href="{{ route('userpelanggan.create') }}" type="button" class="btn btn-primary ">Tambah User</a>
        <br>
        <br>
        {{-- @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar User Pelanggan</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama Pelanggan</th>
                      <th>Email</th>
                      {{-- <th>Cek Tagihan</th> --}}
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($user as $item)
                      <tr>
                        <div hidden>{{ $id = str_replace('*','',$item['id']) }}</div>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        {{-- <td>
                            <a href="{{ route('userpelanggan.edit', $id) }}" type="button" class="btn btn-outline-success"><i class="fa-regular fa-pen-to-square"></i>Cek Tagihan</a>
                        </td> --}}
                        <td>
                          <a href="{{ route('userpelanggan.edit', $id) }}" type="button" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                          <a href="{{ route('userpelanggan.delete', $id) }}" type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
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
