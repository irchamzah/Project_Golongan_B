@extends('layouts.front.app')

@section('content')

<section id="services" class="services section-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-15">
        <a href="{{ url('home') }}" class="btn btn-primary"><i>Kembali</i></a>
      </div><br><br><br>
     
      <!-- <div class="col-md-12 mt-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }} "> Home </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Profile </li>
          </ol>
        </nav>
      </div> -->
      <div class="col-md-12">
      @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
        <div class="card">
          <div class="card-body">
            <h4>My Profile</h4>
            <table class="table">
              <tbody>
                <tr>
                  <td width="200">Foto Profil</td>
                  <td width="10">:</td>
                  <td><button type="button" class="btn" data-toggle="modal" data-target="#myModal{{$user->id}}"><img src="{{asset('img/fotoprofil').'/'.$user->foto}}" alt="" width="200"></button></td>
                </tr>

                <!-- The Modal -->
                <div class="modal fade" id="myModal{{$user->id}}">
                  <div class="modal-dialog modal-xl">
                      <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                          <h4 class="modal-title">Gambar Diperbesar</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body" align="center">
                      <img class="img" width="1000px" src="{{asset('img/fotoprofil').'/'.$user->foto}}" alt="" >
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>

                      </div>
                  </div>
                </div>

                <tr>
                  <td width="200">Nama</td>
                  <td width="10">:</td>
                  <td>{{ $user->name }}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td>{{ $user->alamat }}</td>
                </tr>
                <tr>
                  <td>No.HP</td>
                  <td>:</td>
                  <td>{{ $user->nohp }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        <div class="card">
          <div class="card-body">
            <h4>Edit Profile</h4>
            <form method="POST" action="{{ url('profil') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="foto" class="col-md-2 col-form-label text-md-right">Upload Foto Profil</label>

                    <div class="col-md-6">
                    <input type="file" class="form-control-form @error('foto') is-invalid @enderror" name="foto" accept="image/*">
                    @error('foto')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat Lengkap</label>

                    <div class="col-md-6">
                        <textarea id="alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $user->alamat }}" required autocomplete="alamat">{{old('alamat', $user->alamat)}}</textarea>

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nohp" class="col-md-2 col-form-label text-md-right">{{ __('No. HP') }}</label>

                    <div class="col-md-6">
                        <input id="nohp" type="nohp" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{old('nohp', $user->nohp)}}" required autocomplete="nohp">

                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            Update Profile
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