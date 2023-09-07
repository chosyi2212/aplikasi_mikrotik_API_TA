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
        <a href="{{ route('routercon.create') }}" type="button" class="btn btn-primary ">Tambah Router</a>
        <br>
        <br>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Router</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama Router</th>
                      <th>Ip-address</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>status</th>
                      <th>connect</th>
                      <th>aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($routercon as $item)
                      <tr>
                        <div hidden>{{ $id = str_replace('*','',$item['id']) }}</div>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->ip }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->password }}</td>
                        <td><span class="badge {{ ($item->status==0) ? 'badge-danger':'badge-success' }}">{{ ($item->status==0) ? 'Tidak Aktif':'Aktif' }}</span></td>
                        <td>
                        @if ($item->status==0)
                        <a href="{{ route('routercon.status', $id) }}" type="button" class="btn btn-success">Connect</a>

                        @else
                        <a href="{{ route('routercon.status', $id) }}" type="button" class="btn btn-danger">Disconnect</a>

                        @endif
                        </td>
                        <td>
                          <a href="{{ route('routercon.edit', $id) }}" type="button" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                          <a href="{{ route('routercon.delete', $id) }}" type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
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
