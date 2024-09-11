@extends('layout')
@section('content')
    {{-- <!-- Content -->

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            Administrator
        </div> --}}
    <!-- /.login-logo -->
    {{-- <div class="login-box-body">
            <h3 class="card-header text-center">Register Admin</h3>
            <div class="card-body"> --}}
    <!-- Content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Admin</h4>
                        <p class="card-description"> Tambah Data Admin </p>
                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <p class="alert alert-danger">{{ $err }}</p>
                            @endforeach
                        @endif
                        <form action="{{ route('admin.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Nama Admin</label>
                                <input type="text" placeholder="Masukan Nama" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    required autofocus>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Username</label>
                                <input type="text" placeholder="Masukan Username" id="username" class="form-control @error('username') is-invalid @enderror" name="username"
                                    required autofocus>
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nomor Telepon</label>
                                <input type="text" placeholder="Masukan No Telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                    name="telepon" required autofocus>
                                @if ($errors->has('telepon'))
                                    <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="">NIP</label>
                                <input type="text" placeholder="Masukan NIP" id="nip" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                    required autofocus>
                                @if ($errors->has('nip'))
                                    <span class="text-danger">{{ $errors->first('nip') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" placeholder="Masukan Email" id="email_address" class="form-control @error('email') is-invalid @enderror"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" placeholder="Masukan Password" id="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                                <a class="btn rounded-pill btn-warning" href="{{ url('home/admin') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
    </div>
</div>
            @endsection
