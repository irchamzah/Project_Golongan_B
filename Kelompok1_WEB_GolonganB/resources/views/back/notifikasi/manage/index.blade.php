@extends('layouts.back.app')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">TABEL NOTIFIKASI</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <a href="{{route('admin.notifikasi.create')}}" class="btn btn-primary">BUAT NOTIFIKASI</a>
      <form action="/admin/notifikasi" method="get" class="form-inline my-2 my-lg-0">
        <input type="search" name="cari" placeholder="Cari JUDUL NOTIFIKASI" aria-label="Search" class="form-control mr-sm-2">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Cari</button>
      </form>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Notifikasi Untuk</th>
            <th>Judul Notifikasi</th>
            <th>Keterangan Notifikasi</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($notifikasis as $index=>$notifikasi)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$notifikasi->user->name}}</td>
            <td>{{$notifikasi->title}}</td>
            <td>{{$notifikasi->keterangan}}</td>
            <td>{{$notifikasi->created_at}}</td>
            <td>
              <a href="{{route('admin.notifikasi.delete', $notifikasi->id)}}" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');">DELETE</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection