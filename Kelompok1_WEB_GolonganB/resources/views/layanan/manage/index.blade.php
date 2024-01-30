@extends('layouts.front.app')
@section('content')

<section id="hero" class="d-flex align-items-center">
    <div class="container">

        <div class="section-title">
            <!-- <h2>Bergabunglah Bersama Kami!</h2> -->
        </div>

        <div>
            <img style="border:0; width: 100%; padding:50px;" src="IMG/HOME/imgLayanan.png" frameborder="0" allowfullscreen></img>
        </div>

    </div>
</section>

<section id="services" class="about">
    <div class="container">

        <div class="row">
            <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative">
                <a class="glightbox play-btn mb-4">
                    <img src="IMG/HOME/recycle.png" class="img-fluid" alt="">
                </a>
            </div>

            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                <!-- START ACCORDION & CAROUSEL-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Proses Pemesanan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                                <div id="accordion">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    1. Klik Tombol "Buat Pesanan Baru" pada Tabel Dibawah
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                Setelah itu, Silahkan pilih Kategori Sampah dan Foto Seluruh Sampahmu yang akan Dijual (Foto Harus Jelas). Pilih Tanggal Jemput Sampah (Pemesan atau Penanggung Jawab Harus ada pada tanggal yang dipilih). Lalu Isi Keterangan (Pesan) untuk Penjemput Sampah.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                                    2. Kami Akan Memeriksa Pesanan yang Dikirim
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                Sebelum Kami tentukan, Pemesan dapat Membatalkan Pesanan. Jika Sudah Dikonfirmasi, Pesanan tidak Dapat Dibatalkan. Kami yang akan menentukan pesanan tersebut layak Diterima atau Ditolak tergantung Isi Pesanan dan Situasi. Jika Diterima, Kami akan Segera Menjemput Sampah Sesuai Tanggal yang ada pada Pesanan. Jika Ditolak, Kami akan Memberikan Alasannya. Alasan Penolakan akan muncul pada Fitur Notifikasi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                                    3. Pembayaran Berlangsung Ditempat
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                Setelah Harga Sampah Ditentukan, Kami akan Membayarnya Langsung Ditempat, Atau Biasa Disebut Cash On Delivery (COD).
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- END ACCORDION & CAROUSEL-->

            </div>
        </div>

    </div>
</section><!-- End About Section -->


<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">

    <div class="section-title">
        <h2>Riwayat Pesanan</h2>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <h3 class="card-title">
                    @if (empty($user->alamat))
                    <button type="button" class="btn btn-secondary" disabled>BUAT PESANAN BARU</button>
                    <font class="alert alert-danger" size="2">Harap Lengkapi Data Profil Terlebih Dahulu Sebelum Memesan! <a href="{{url('/profil')}}">Lengkapi Data Disini!</a></font>
                    @elseif(empty($user->nohp))
                    <button type="button" class="btn btn-secondary" disabled>BUAT PESANAN BARU</button>
                    <font class="alert alert-danger" size="2">Harap Lengkapi Data Profil Terlebih Dahulu Sebelum Memesan! <a href="{{url('/profil')}}">Lengkapi Data Disini!</a></font>
                    @else
                    <a href="{{ url('/layanan/create', $user->id)}}" class="btn btn-primary"> BUAT PESANAN BARU </a>
                    @endif
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Foto Sampah</th>
                            <th>Jenis Sampah</th>
                            <th>Tanggal Jemput</th>
                            <th>Keterangan</th>
                            <th>Status Pesanan</th>
                            <th>Pendapatan</th>
                            <th style="width: 40px">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($layanan_details as $index=>$layanan_detail)
                        <tr>
                            <td scope="row">{{$index+1}}</td>
                            <td scope="row"><button type="button" class="btn" data-toggle="modal" data-target="#myModal{{$layanan_detail->id}}"><img class="img" width="200px" src="{{asset('img/fotopesanan').'/'.$layanan_detail->file}}" alt=""></button></td>
                            <td scope="row">{{$layanan_detail->category->name}}</td>
                            <td scope="row">{{$layanan_detail->tanggaljemput}}</td>
                            <td scope="row">{{$layanan_detail->keterangan}}</td>
                            <td scope="row"><STRONG>{{$layanan_detail->status_pesanan->name}}</STRONG></td>
                            <td scope="row">{{"Rp. ".number_format($layanan_detail->pendapatan)}}</td>
                            <td scope="row">
                                @if ($layanan_detail->status_id == 1)
                                <a href="{{url('layanan/edit', $layanan_detail->id)}}" class="btn btn-primary"> EDIT </a>
                                <a href="{{url('layanan/delete', $layanan_detail->id)}}" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                    <font size="2"> BATALKAN PESANAN </font>
                                </a>
                                @elseif ($layanan_detail->status_id == 2)
                                <font><a href="{{url('/notifikasi')}}" class="btn btn-success"> PERIKSA PESANAN </a></font>
                                @elseif ($layanan_detail->status_id == 3)
                                <a href="{{url('layanan/delete', $layanan_detail->id)}}" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"> DELETE </a>
                                @else ($layanan_detail->status_id == 4)
                                <font><a href="{{url('/notifikasi')}}" class="btn btn-secondary"> PERIKSA PESANAN </a></font>
                                <a href="{{url('layanan/delete', $layanan_detail->id)}}" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"> DELETE </a>
                                @endif
                            </td>
                            <!-- <td><span class="badge bg-danger">55%</span></td> -->
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
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div> -->
        </div>
        <!-- /.card -->
</section><!-- End Portfolio Section -->
@endsection