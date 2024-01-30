@extends('layouts.front.app')

@section('content')

<section id="services" class="services section-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-15">
        <a href="{{ url('home') }}" class="btn btn-primary"><i>Kembali</i></a>
      </div><br><br><br>
      <div class="col-md-12">
      @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
        <div class="card">
          <div class="card-body">
            <h4>UBAH PESANAN</h4>
            <table class="table">
              <tbody>
                <tr>
                  <td width="200">Nama Penanggung Jawab</td>
                  <td width="10">:</td>
                  <td>{{$users->name}}</td>
                </tr>
                <tr>
                  <td>Alamat Rumah</td>
                  <td>:</td>
                  <td>{{$users->alamat}}</td>
                </tr>
                <tr>
                  <td>Nomor Telepon</td>
                  <td>:</td>
                  <td>{{$users->nohp}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-1">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{url('/layanan/update', $layanan_details->id)}}" enctype="multipart/form-data">
                @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Kategori</label>
                                <div class="col-md-6">
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
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Upload Foto Sampah</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-form @error('file') is-invalid @enderror" name="file" accept="image/*" >
                                @error('file')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-2 col-form-label text-md-right">Tanggal Jemput</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control @error('tanggaljemput') is-invalid @enderror" name="tanggaljemput" value="{{old('tanggaljemput', $layanan_details->tanggaljemput)}}">
                                @error('tanggaljemput')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nohp" class="col-md-2 col-form-label text-md-right">Keterangan</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{old('keterangan', $layanan_details->keterangan)}}">
                                @error('keterangan')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection