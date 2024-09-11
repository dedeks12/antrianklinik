@extends('layout')
@section('content')
    <!-- Content -->
    <div class="main-panel">
        <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Pasien</h4>
            <p class="card-description"> Tambah Data Pasien </p>
            <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                @csrf
                @method('put')
                                <div class="form-group mb-3">
                                    <label>Nama</label>
                                    <input type="text" value="{{ old('nama', $pasien->nama) }}" placeholder="Name" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror form-control-lg" name="nama" >
                                    @if ($errors->has('nama'))
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>NIK</label>
                                    <input type="text" placeholder="Masukan NIK" value="{{ $pasien->nik }}" id="nik"
                                        class="form-control @error('nik') is-invalid @enderror form-control-lg" name="nik" required autofocus>
                                    @if ($errors->has('nik'))
                                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input type="text" placeholder="Masukan Username" value="{{ $pasien->username }}" id="username"
                                        class="form-control @error('username') is-invalid @enderror form-control-lg" name="username" required autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Telepon</label>
                                    <input type="text" value="{{ old('telepon', $pasien->telepon) }}" placeholder="Telepon" id="telepon"
                                        class="form-control @error('telepon') is-invalid @enderror form-control-lg" name="telepon" >
                                    @if ($errors->has('telepon'))
                                        <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Alamat</label>
                                    <input type="text" value="{{ old('alamat', $pasien->alamat) }}" placeholder="alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror form-control-lg" name="alamat" >
                                    @if ($errors->has('alamat'))
                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" value="{{ old('email', $pasien->email) }}" placeholder="Email" id="email_address"
                                        class="form-control @error('email') is-invalid @enderror form-control-lg" name="email" >
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                
                                {{-- <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" value="{{ old('password', $pasien->password) }}" placeholder="Email" id="email_address"
                                        class="form-control form-control-lg" name="password" >
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div> --}}

                                <div class="mt-3">
                                    <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                                    <a class="btn rounded-pill btn-warning" href="{{ url('home/pasien') }}">Kembali</a>
                                </form>
                        </div>
                    </div>
                  </div>
        </div>
    </div>
    @endsection