@extends('layouts.front.app')
@section('content')
<section id="services" class="services section-bg">
  <div class="container">
<div class="col-lg-8">
    <h1 class="mt-4">JUAL SAMPAH</h1>
    <p class="lead"><a href="{{route('layanan.create')}}">Tambah Pesanan</a> </p>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Penanggung Jawab</th>
                <th scope="col">Alamat </th>
                <th scope="col">No Telp</th>
                <th scope="col">Kategori</th>
                <th scope="col">Foto Sampah</th>
                <th scope="col">Tanggal jemput</th>
                <th scope="col">Status pesanan</th>
                <th scope="col">Pendapatan</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <body>
            @foreach($layanans as $index=>$layanan )
            <tr>
                <td scope="row">{{$index+1}}</td>
                <td scope="row">{{$layanan->namapj}}</td>
                <td scope="row">{{$layanan->alamat}}</td> 
                <td scope="row">{{$layanan->notelp}}</td>
                <td scope="row">{{$layanan->category->name}}</td>
                <td scope="row"><img class="img-fluid rounded" width="400px" src="{{asset('storage/'.$layanan->file)}}" alt=""></td>
                <td scope="row">{{$layanan->tanggaljemput}}</td>
                <td scope="row">{{$layanan->statuspesanan}}</td>
                <td scope="row">{{$layanan->pendapatan}}</td>
                <td scope="row"><a href="{{route('layanan.edit', $hash->encodeHex($layanan->id))}}"> Edit </a></td>
                <td scope="row"><a href="{{route('layanan.delete', $hash->encodeHex($layanan->id))}}"> Delete </a></td>
                <td scope="row"><a href="{{route('layanan.detail', $hash->encodeHex($layanan->id))}}"> Detail </a></td>
            </tr>
            @endforeach
        </body>
    
    </table>
    {{$layanans->render()}}

    </div>
    </div>
    </section>

@endsection