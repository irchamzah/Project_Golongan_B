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
      <h3 class="card-title">TABEL ADMIN</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <a href="{{route('admin.profiladmin.register')}}" class="btn btn-primary">TAMBAH AKUN ADMIN</a><br>
      <form action="/admin/profilAdmin" method="get" class="form-inline my-2 my-lg-0">
        <input type="search" name="cari" placeholder="Cari NAMA ADMIN" aria-label="Search" class="form-control mr-sm-2">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Cari</button>
      </form>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No.HP</th>
            <th>Foto Admin</th>
            <th>Dibuat pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($admins as $index=>$admin)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->alamat}}</td>
            <td>{{$admin->nohp}}</td>
            <td><button type="button" class="btn" data-toggle="modal" data-target="#myModal{{$admin->id}}"><img src="{{asset('img/fotoprofil').'/'.$admin->foto}}" alt="" width="200"></button></td>
            <td>{{$admin->created_at}}</td>
            <!-- <td>{{$admin->alamat}}</td>
          <td>{{$admin->nohp}}</td> -->
            <td>
              <a href="{{route('admin.profiladmin.edit', $admin->id)}}" class="btn btn-primary"> EDIT </a>
              <a href="{{route('admin.profiladmin.delete', $admin->id)}}" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"> DELETE </a>
            </td>
          </tr>

          <!-- The Modal -->
          <div class="modal fade" id="myModal{{$admin->id}}">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Gambar Diperbesar</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" align="center">
                  <img class="img" width="1000px" src="{{asset('img/fotoprofil').'/'.$admin->foto}}" alt="">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection