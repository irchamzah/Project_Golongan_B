@extends('layouts.front.app')
@section('content')

<br>
<br>
<br>
<section id="services" class="services section-bg">
  <div class="container">
    <div class="section-title">
      <a href="/kreasi"><h2>NOTIFIKASI</h2></a>
      <p>Update Notifikasi melalui Admin</p>
    </div>    
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">

              @foreach($notifikasis as $index=>$notifikasi)
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <th><h6><STRONg>{{$notifikasi->title}}</STRONg></h6></th>
                    </tr>
                    <tr>
                      <td>{{$notifikasi->keterangan}}. Lihat Riwayat Pemesanan <a href="{{url('/layanan')}}">Disini!</a><hr></td>
                      <td align="right">{{$notifikasi->updated_at}}</td>
                    </tr>
                  </tbody>
                </table>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

@endsection
