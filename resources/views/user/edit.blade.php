@extends('layoutuser')
@section('content')
    <!-- Content -->
    <div class="main-panel">
        <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Pasien</h4>
            <p class="card-description"> Tambah Data Pasien </p>
                            <form action="{{ route('user.update', $user->id) }}" class="pt-3" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group mb-3">
                                    <label>Nama</label>
                                    <input type="text" value="{{ old('nama', $user->nama) }}" placeholder="Name" id="nama"
                                        class="form-control form-control-lg" name="nama" >
                                    @if ($errors->has('nama'))
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Telepon</label>
                                    <input type="text" value="{{ old('telepon', $user->telepon) }}" placeholder="Telepon" id="telepon"
                                        class="form-control form-control-lg" name="telepon" >
                                    @if ($errors->has('telepon'))
                                        <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Alamat</label>
                                    <input type="text" value="{{ old('alamat', $user->alamat) }}" placeholder="alamat" id="alamat"
                                        class="form-control form-control-lg" name="alamat" >
                                    @if ($errors->has('alamat'))
                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" value="{{ old('email', $user->email) }}" placeholder="Email" id="email_address"
                                        class="form-control form-control-lg" name="email" >
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="text" value="{{ old('password', $user->password) }}" placeholder="Email" id="email_address"
                                        class="form-control form-control-lg" name="password" >
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Sign
                                        up</button>

                                </div>

                            </form>
                        </div>
                    </div>
                  </div>
        </div>
    </div>
    @endsection