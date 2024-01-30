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

            <form method="POST" action="{{route('admin.notifikasi.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="user" class="col-md-2 col-form-label text-md-right">Notifikasi Untuk</label>
                        <div class="col-md-6">
                        <select class="form-control @error('user') is-invalid @enderror" name="user" id="">
                        <option value="" @if(old('user')=='' or old('user')==0) selected="selected" @endif>Pilih USER</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if(old('user')==$user->id) selected="selected" @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>


                
                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label text-md-right">Judul Notifikasi</label>
                    <div class="col-md-6">

                        <textarea id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title">{{ old('title') }}</textarea>

                        @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="keterangan" class="col-md-2 col-form-label text-md-right">Isi Notifikasi</label>
                    <div class="col-md-6">
                        <textarea id="keterangan" type="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="" required autocomplete="keterangan">{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            BUAT NOTIFIKASI
                        </button>
                    </div>
                </div>
                
            </form>

      </div>
    </div>
  </div>


@endsection