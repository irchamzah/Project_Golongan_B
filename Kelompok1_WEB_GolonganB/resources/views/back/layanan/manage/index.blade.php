@extends('layouts.back.app')

@section('content')

@if (Session::has('success'))
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
                <td scope="row"><img class="img" width="200px" src="{{asset('storage/'.$layanan->file)}}" alt=""></td>
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
@endsection