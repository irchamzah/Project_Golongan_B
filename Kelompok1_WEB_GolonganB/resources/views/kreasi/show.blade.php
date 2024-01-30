@extends('layouts.front.app')
@section('content')

<br><br><br>

<main>
    <section id="contact" class="contact">
        <div class="container">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/fotokreasi').'/'.$daurulang->foto}}" alt="User profile picture">
                    </div>
                    <hr>

                    <h3 class="profile-username text-center">{{$daurulang->nama}}</h3>
                    <hr>

                    <h4 class="text-muted">{{$daurulang->keterangan}}</h4>
                    <hr>
                    <p class="text-muted">{{$daurulang->keterangan_detail}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</main>

@endsection