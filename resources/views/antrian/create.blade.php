@extends('layoutuser')
@section('content')
    <!-- Content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Antrian</h4>
                        <p class="card-description"> Tambah Data Antrian </p>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <p class="alert alert-danger">{{ $err }}</p>
                            @endforeach
                        @endif
                        <form action="{{ route('antrian.store') }}" class="pt-3" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>NIK</label>
                                <input type="text" placeholder="NIK" id="no_antrian"
                                    class="form-control @error('nik') is-invalid @enderror form-control-lg" name="nik"
                                    required autofocus>
                                @if ($errors->has('nik'))
                                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                {{-- <input type="text" placeholder="Tujuan Keluhan"
                                        class="form-control form-control-lg" name="tujuan_keluhan" required autofocus> --}}
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="" holder>Pilih</option>
                                    {{-- <option value="Pending">Pending</option>
                                            <option value="Cancels">Cancel</option> --}}
                                    <option value="Pending">Pending</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="Sukses">Sukses</option>

                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('tujuan_keluhan') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" placeholder="Nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror form-control-lg" name="nama"
                                    required autofocus>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" placeholder="Tanggal Lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror form-control-lg"
                                    name="tanggal_lahir" required autofocus>
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Usia</label>
                                <input type="text" placeholder="Masukan Usia"
                                    class="form-control @error('usia') is-invalid @enderror form-control-lg" name="usia"
                                    required autofocus>
                                @if ($errors->has('usia'))
                                    <span class="text-danger">{{ $errors->first('usia') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Jenis Kelamin</label><br>
                                <label class="form-check-label text-black">
                                    <input type="radio" name="jenis_kelamin"
                                        class="@error('jenis_kelamin') is-invalid @enderror"
                                        value="Laki-laki">Laki-laki</label>
                                <label class="form-check-label text-black">
                                    <input type="radio" name="jenis_kelamin"
                                        class="ml-3 @error('jenis_kelamin') is-invalid @enderror"
                                        value="Perempuan">Perempuan</label>
                                @if ($errors->has('usia'))
                                    <span class="text-danger">{{ $errors->first('usia') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <input type="text" placeholder="Alamat" id="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror form-control-lg"
                                    name="alamat" required autofocus>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Tujuan</label>
                                {{-- <input type="text" placeholder="Tujuan Keluhan"
                                        class="form-control form-control-lg" name="tujuan_keluhan" required autofocus> --}}
                                <select name="tujuan_keluhan"
                                    class="form-control @error('tujuan_keluhan') is-invalid @enderror">
                                    <option value="" holder>Pilih Tujuan Keluhan</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Gigi">Gigi</option>
                                </select>
                                @if ($errors->has('tujuan_keluhan'))
                                    <span class="text-danger">{{ $errors->first('tujuan_keluhan') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Kunjungan</label>
                                <input type="date" placeholder="Tanggal Kunjungan"
                                    class="form-control @error('tanggal') is-invalid @enderror form-control-lg"
                                    name="tanggal" required autofocus>
                                @if ($errors->has('tanggal'))
                                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Cara Bayar</label>
                                {{-- <input type="text" placeholder="Tujuan Keluhan"
                                            class="form-control form-control-lg" name="tujuan_keluhan" required autofocus> --}}
                                <select name="cara_bayar" class="form-control @error('cara_bayar') is-invalid @enderror">
                                    <option value="" holder>Pilih Cara Bayar</option>
                                    <option value="Cash">Cash</option>
                                    <option value="BPJS">BPJS</option>
                                </select>
                                @if ($errors->has('cara_bayar'))
                                    <span class="text-danger">{{ $errors->first('cara_bayar') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Telepon</label>
                                <input type="text" placeholder="Telepon" id="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror form-control-lg"
                                    name="telepon" required autofocus>
                                @if ($errors->has('telepon'))
                                    <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" placeholder="Email" id="email_address"
                                    class="form-control @error('email') is-invalid @enderror form-control-lg"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                                <a class="btn rounded-pill btn-warning" href="{{ url('home/antrian') }}">Kembali</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
