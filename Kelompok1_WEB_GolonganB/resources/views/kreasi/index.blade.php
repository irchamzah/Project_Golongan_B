@extends('layouts.front.app')
@section('content')
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="section-title">
        </div>
        <div>
            <img style="border:0; width: 100%; padding:50px;" src="IMG/HOME/imgKreasi.png" frameborder="0" allowfullscreen></img>
        </div>
    </div>
</section>

<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="section-title">
            <a href="/kreasi">
                <h2>KREASI</h2>
            </a>
            <p>Klik gambar untuk detail!</p>
        </div>
        <!-- Default box -->
        <div class="card card-solid">
            @foreach($daurulangs as $index=>$daurulang)
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                <a href="{{url('kreasi/detail', $daurulang->id)}}">{{$daurulang->nama}}</a>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b></b></h2>
                                        <p class="text-muted text-sm">{{$daurulang->keterangan}}</p>
                                    </div>
                                    <div class="col-5 text-center">
                                        <a href="{{url('kreasi/detail', $daurulang->id)}}">
                                            <img src="{{asset('img/fotokreasi').'/'.$daurulang->foto}}" alt="user-avatar" class="img-circle img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="{{url('kreasi/detail', $daurulang->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

</main>

@endsection