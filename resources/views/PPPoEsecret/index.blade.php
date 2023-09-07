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
        <a href="{{ route('PPPoEsecret.create') }}" type="button" class="btn btn-primary ">Tambah Aktifasi Pelanggan</a>
        <br>
        <br>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar User Aktif</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th >No</th>
                        <th >nama</th>
                        <th >Password</th>
                        <th >Service</th>
                        <th >Local-address</th>
                        <th >Remote-address</th>
                        <th >status</th>
                        <th >Comment</th>
                        <th >action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pppoesecret as $no => $data)
                      <tr>
                        <div hidden>{{ $id = str_replace('*', '', $data['.id']) }}</div>
                        <td>{{ $no+1 }} </td>
                        <td>{{ $data['name'] ?? '' }} </td>
                        <td>{{ $data['password'] ?? '' }} </td>
                        <td>{{ $data['service'] ?? '' }} </td>
                        <td>{{ $data['local-address'] ?? '' }} </td>
                        <td>{{ $data['remote-address'] ?? '' }} </td>
                        <td><span class="badge {{ ($data['disabled'] == "true") ? 'badge-danger':'badge-success' }}">{{ ($data['disabled'] == "true") ? 'Tidak Aktif':'Aktif' }}</span></td>
                        <td>{{ $data['comment'] ?? '' }} </td>
                        <td>
                          <a href="{{ route('PPPoEsecret.edit', $id) }}" type="button" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                          <a href="{{ route('PPPoEsecret.delete', $id) }}" type="button" class="btn btn-outline-danger"data-confirm-delete="true"><i class="fa-solid fa-trash"></i></a>
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
