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
      <h3 class="card-title">Daftar Pesanan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <form action="/admin/home" method="get" class="form-inline my-2 my-lg-0">
        <input type="search" name="cari" placeholder="Cari ID PESANAN" aria-label="Search" class="form-control mr-sm-2">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Cari</button>
      </form>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">No</th>
            <th>ID Pesanan</th>
            <th>Nama User</th>
            <th>Jenis Sampah</th>
            <th>Foto Sampah</th>
            <th>Dibuat Pada Tanggal</th>
            <th>Tanggal Jemput</th>
            <th>Keterangan Dari User</th>
            <th>Status</th>
            <th>Pendapatan</th>
            <th style="width: 40px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($layanan_details as $index=>$layanan_detail)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$layanan_detail->id}}</td>
            <td><a href="{{route('admin.profiluser.detail', $layanan_detail->User->id)}}">{{$layanan_detail->User->name}}</a></td>
            <td>{{$layanan_detail->category->name}}</td>
            <td><button type="button" class="btn" data-toggle="modal" data-target="#myModal{{$layanan_detail->id}}"><img class="img" width="200px" src="{{asset('img/fotopesanan').'/'.$layanan_detail->file}}" alt=""></button></td>
            <td>{{$layanan_detail->created_at}}</td>
            <td>{{$layanan_detail->tanggaljemput}}</td>
            <td>{{$layanan_detail->keterangan}}</td>
            <td><strong>{{$layanan_detail->status_pesanan->name}}</strong></td>
            <td>{{"Rp. ".number_format($layanan_detail->pendapatan)}}</td>
            <td>
              <div class="btn-group btn-group-vertical">
                @if ($layanan_detail->status_id == 1)

                <a href="{{route('admin.home.konfirmasi', $layanan_detail->id)}}">
                  <button type="button" class="btn btn-primary">
                    PERIKSA PESANAN
                  </button>
                </a>

                @elseif ($layanan_detail->status_id == 2)

                <a href="{{route('admin.home.konfirmasi', $layanan_detail->id)}}">
                  <button type="button" class="btn btn-success">
                    SELESAIKAN PESANAN
                  </button>
                </a>

                @elseif ($layanan_detail->status_id == 3)

                <button type="button" class="btn btn-success" disabled>
                  PESANAN SELESAI
                </button>


                @else ($layanan_detail->status_id == 4)

                <button type="button" class="btn btn-dark " disabled>
                  PESANAN DITOLAK
                </button>
                @endif


                <a href=" {{route('admin.home.konfirmasi.destroy', $layanan_detail->id)}}">
                  <button type="button" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');">
                    DELETE
                  </button>
                </a>


              </div>
            </td>
          </tr>

          <!-- The Modal -->
          <div class="modal fade" id="myModal{{$layanan_detail->id}}">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Gambar Diperbesar</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" align="center">
                  <img class="img" width="1000px" src="{{asset('img/fotopesanan').'/'.$layanan_detail->file}}" alt="">
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
@endsection