@extends('layouts.back.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-15">

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif

            <form method="POST" action="{{route('admin.kreasi.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="nama" class="col-md-2 col-form-label text-md-right">Judul Tutorial</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}">

                        @error('nama')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="foto" class="col-md-2 col-form-label text-md-right">Upload Foto Tutorial</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control-form @error('foto') is-invalid @enderror" name="foto" accept="image/*">
                        @error('foto')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="keterangan" class="col-md-2 col-form-label text-md-right">Keterangan Awal</label>
                    <div class="col-md-6">

                        <textarea id="keterangan" type="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="" required autocomplete="keterangan">{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="keterangan_detail" class="col-md-2 col-form-label text-md-right">Keterangan Detail</label>
                    <div class="col-md-6">
                        <textarea id="keterangan_detail" type="keterangan_detail" class="form-control @error('keterangan_detail') is-invalid @enderror" name="keterangan_detail" value="" required autocomplete="keterangan_detail">{{ old('keterangan_detail') }}</textarea>

                        @error('keterangan_detail')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            TAMBAH TUTORIAL
                        </button>
                    </div>
                </div>
                
            </form>

      </div>
    </div>
  </div>


@endsection