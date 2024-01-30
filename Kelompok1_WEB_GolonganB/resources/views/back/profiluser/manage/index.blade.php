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
      <h3 class="card-title">TABEL USER</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <form action="/admin/profilUser" method="get" class="form-inline my-2 my-lg-0">
        <input type="search" name="cari" placeholder="Cari NAMA USER" aria-label="Search" class="form-control mr-sm-2">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Cari</button>
      </form>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <!-- <th>Id User</th> -->
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No.Hp</th>
            <th>Foto User</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $index=>$user)
          <tr>
            <td>{{$index+1}}</td>
            <!-- <td>{{$user->id}}</td> -->
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->alamat}}</td>
            <td>{{$user->nohp}}</td>
            <td scope="row"><button type="button" class="btn" data-toggle="modal" data-target="#myModal{{$user->id}}"><img class="img" width="200px" src="{{asset('img/fotoprofil').'/'.$user->foto}}" alt=""></button></td>
            <td>{{$user->created_at}}</td>
            <td>
              <a href="{{route('admin.profiluser.detail', $user->id)}}" class="btn btn-primary"> LIHAT DETAIL </a>
            </td>
          </tr>

          <!-- The Modal -->
          <div class="modal fade" id="myModal{{$user->id}}">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Gambar Diperbesar</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" align="center">
                  <img class="img" width="1000px" src="{{asset('img/fotoprofil').'/'.$user->foto}}" alt="">
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