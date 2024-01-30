@extends('layouts.front.app')
@section('content')
<br>
<br>
<br>
<section id="services" class="services section-bg">
<div class="container">
    <div class="row">
      <div class="col-md-15">
            <h1 class="mt-4">UBAH PESANAN</h1>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            <form method="POST" action="{{url('/layanan/update', $layanan_details->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Nama Penanggung Jawab</label>
                <strong>{{$users->name}}</strong>
            </div>
            <div class="form-group">
                <label for="">Alamat Rumah</label>
                <strong>{{$users->alamat}}</strong>
            </div>
            <div class="form-group">
                <label for="">Nomor Telepon</label>
                <strong>{{$users->nohp}}</strong>
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
                <input type="file" class="form-control-form @error('file') is-invalid @enderror" name="file" accept="image/*" >
                @error('file')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Tanggal Jemput</label>
                <input type="date" class="form-control @error('tanggaljemput') is-invalid @enderror" name="tanggaljemput" value="{{old('tanggaljemput', $layanan_details->tanggaljemput)}}">
                @error('tanggaljemput')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{old('keterangan', $layanan_details->keterangan)}}">
                @error('keterangan')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
        </div></div>
</section>
@endsection