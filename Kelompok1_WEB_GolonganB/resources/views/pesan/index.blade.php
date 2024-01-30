@extends('layouts.front.app')
@section('content')
<br>
<br>
<br>
<section id="services" class="services section-bg">
  <div class="container">
<div class="col-lg-8">
    <h1 class="mt-4">BUAT PESANAN</h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif


    <form method="POST" action="{{url('layanan/store')}}" enctype="multipart/form-data">

        
        <div class="form-group">
            <label for="">Nama Penanggung Jawab</label>
            <strong>{{$users->name}}</strong>
            <!-- <input type="" class="form-control @error('namapj') is-invalid @enderror" name="namapj" value="{{old('namapj')}}">
            @error('namapj')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror -->
        </div>
        <div class="form-group">
            <label for="">Alamat Rumah</label>
            <strong>{{$users->alamat}}</strong>
            <!-- <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat')}}">
            @error('alamat')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror -->
        </div>
        <div class="form-group">
            <label for="">Nomor Telepon</label>
            <strong>{{$users->nohp}}</strong>
            <!-- <input type="text" class="form-control @error('notelp') is-invalid @enderror" name="notelp" value="{{old('notelp')}}">
            @error('notelp')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror -->
        </div>
        <div class="form-group">
            <label for="">Kategori</label>
            <select class="form-control @error('category') is-invalid @enderror" name="category" id="">
                <option value="" @if(old('category')=='' or old('category')==0) selected="selected" @endif>Pilih Jenis Sampah</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(old('category')==$category->id) selected="selected" @endif>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Upload Foto Sampah</label><br>
            <input type="file" class="form-control-form @error('file') is-invalid @enderror" name="file" accept="image/*">
            @error('file')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <!-- <div class="form-group">
            <label for="">Foto Sampah</label>
                <input type="text" class="form-control" name="fotosampah">
        </div> -->
        <div class="form-group">
            <label for="">Tanggal Jemput</label>
            <input type="date" class="form-control @error('tanggaljemput') is-invalid @enderror" name="tanggaljemput" value="{{old('tanggaljemput')}}">
            @error('tanggaljemput')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{old('keterangan')}}">
            @error('keterangan')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <!-- <div class="form-group">
            <label for="">Pendapatan</label>
            <input type="text" class="form-control @error('pendapatan') is-invalid @enderror" name="pendapatan" value="{{old('pendapatan')}}">
            @error('pendapatan')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div> -->
        
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
    
</div>
</div>

</section>

@endsection