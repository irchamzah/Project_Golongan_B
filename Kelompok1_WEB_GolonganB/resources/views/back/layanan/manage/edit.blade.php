@extends('layouts.back.app')
@section('content')
<br>
<br>
<br>
<section id="services" class="services section-bg">
  <div class="container">
    <div class="col-lg-8">
      @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
          {{Session::get('success')}}
        </div>
      @endif
      <h6 class="mt-4">NAMA PEMESAN: {{$layanan_detail->user->name}}</h6>
      <h6 class="mt-4">ALAMAT PEMESAN: {{$layanan_detail->user->alamat}}</h6>
      <h6 class="mt-4">NO.HP PEMESAN: {{$layanan_detail->user->nohp}}</h6>
      <font>JENIS SAMPAH: {{$layanan_detail->category->name}}</font><br>
      <font>TANGGAL JEMPUT: {{$layanan_detail->tanggaljemput}}</font><br>
      <font>KETERANGAN DARI USER: {{$layanan_detail->keterangan}}</font><br>
      <p>FOTO SAMPAH YANG DIKIRIM:</p><img class="img" width="1000px" src="{{asset('img/fotopesanan').'/'.$layanan_detail->file}}" alt="">

      @if ($layanan_detail->status_id == 1)

        <form method="POST" action="{{ route('admin.home.konfirmasi.pesanan', $layanan_detail->id) }}" enctype="multipart/form-data">
          @csrf
          <br><button type="submit">KONFIRMASI PESANAN</button>
        </form>

        <form method="POST" action="{{ route('admin.home.konfirmasi.tolak', $layanan_detail->id) }}" enctype="multipart/form-data">
          @csrf
          
          <br>
          <div class="form-group">
          <label for="">Isi Alasan Menolak: </label>
            <input type="text" class="form-control @error('keterangantolak') is-invalid @enderror" name="keterangantolak" value="{{old('keterangantolak')}}">
            @error('keterangantolak')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <button type="submit">TOLAK PESANAN</button>
        </div>
          
          <br><br><br><br><br>
        </form>

      @elseif ($layanan_detail->status_id == 2)

        <form method="POST" action="{{ route('admin.home.konfirmasi.update', $layanan_detail->id) }}" enctype="multipart/form-data">
          @csrf
          <br><p>isi pendapatan: </p>Rp.<input type="text" class="form-control @error('pendapatan') is-invalid @enderror" name="pendapatan" value="{{old('pendapatan', $layanan_detail->pendapatan)}}"><br><br><br>
          @error('pendapatan')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <button type="submit">SELESAIKAN PESANAN</button><br><br><br><br><br>
        </form>

      @endif


    </div>
  </div>
</section>

@endsection