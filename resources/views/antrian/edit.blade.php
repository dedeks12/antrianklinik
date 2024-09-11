@extends('layout')
@section('content')
    <!-- Content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Antrian</h4>
                        <p class="card-description"> Edit Data Antrian </p>
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
                        <form action="{{ route('antrian.update', $antrian->id) }}" class="pt-3" method="POST">
                            @csrf
                            @method('put') <label for="">No Antrian</label>
                            <h3 class="text-black">{{ $antrian->no_antrian }}</h3>
                            <div class="form-group mb-3">
                                <label>NIK</label>
                                <input type="text" placeholder="NIK" id="no_antrian"
                                    class="form-control @error('nik') is-invalid @enderror form-control-lg"
                                    value="{{ $antrian->nik }}" name="nik" required autofocus>
                                @if ($errors->has('nik'))
                                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="" holder>Pilih</option>
                                    <option {{ $antrian->status == 'Pending' ? 'selected' : '' }} value="Pending">Pending
                                    </option>
                                    <option {{ $antrian->status == 'Cancel' ? 'selected' : '' }} value="Cancel">Cancel
                                    </option>
                                    <option {{ $antrian->status == 'Sukses' ? 'selected' : '' }} value="Sukses">Sukses
                                    </option>

                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('tujuan_keluhan') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" placeholder="Nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror form-control-lg"
                                    value="{{ $antrian->nama }}" name="nama" required autofocus>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" placeholder="Tanggal Lahir" value="{{ $antrian->tanggal_lahir }}"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror form-control-lg"
                                    name="tanggal_lahir" required autofocus>
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Usia</label>
                                <input type="text" placeholder="Masukan Usia" value="{{ $antrian->usia }}"
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
                                        {{ $antrian->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}
                                        class="@error('jenis_kelamin') is-invalid @enderror"
                                        value="Laki-laki">Laki-laki</label>
                                <label class="form-check-label text-black">
                                    <input type="radio" name="jenis_kelamin"
                                        {{ $antrian->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}
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
                                    value="{{ $antrian->alamat }}" name="alamat" required autofocus>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Cara Bayar</label>
                                <select name="cara_bayar" class="form-control @error('cara_bayar') is-invalid @enderror">
                                    <option value="" holder>Pilih Cara Bayar</option>
                                    <option {{ $antrian->cara_bayar == 'Cash' ? 'selected' : '' }} value="Cash">Cash
                                    </option>
                                    <option {{ $antrian->cara_bayar == 'BPJS' ? 'selected' : '' }} value="BPJS">BPJS
                                    </option>
                                </select>
                                @if ($errors->has('cara_bayar'))
                                    <span class="text-danger">{{ $errors->first('cara_bayar') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Telepon</label>
                                <input type="text" placeholder="Telepon" id="telepon" value="{{ $antrian->telepon }}"
                                    class="form-control @error('telepon') is-invalid @enderror form-control-lg"
                                    name="telepon" required autofocus>
                                @if ($errors->has('telepon'))
                                    <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" placeholder="Email" id="email_address" value="{{ $antrian->email }}"
                                    class="form-control @error('email') is-invalid @enderror form-control-lg"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <h3 class="text-black mt-5">Jika Mengubah Data Dibawah Ini Akan Mengakibatkan Perubahan Pada
                                Nomor Antrian</h3>
                            <div class="form-group mb-3">
                                <label>Tujuan</label>
                                {{-- <input type="text" placeholder="Tujuan Keluhan"
                                            class="form-control form-control-lg" name="tujuan_keluhan" required autofocus> --}}
                                <select @readonly(true) name="tujuan_keluhan"
                                    class="form-control @error('tujuan_keluhan') is-invalid @enderror">
                                    <option value="" holder>Pilih Tujuan Keluhan</option>
                                    <option {{ $antrian->tujuan_keluhan == 'Umum' ? 'selected' : '' }} value="Umum">
                                        Umum</option>
                                    <option {{ $antrian->tujuan_keluhan == 'Gigi' ? 'selected' : '' }} value="Gigi">
                                        Gigi</option>

                                </select>
                                @if ($errors->has('tujuan_keluhan'))
                                    <span class="text-danger">{{ $errors->first('tujuan_keluhan') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Kunjungan</label>
                                <input type="date" placeholder="Tanggal Kunjungan" value="{{ $antrian->tanggal }}"
                                    class="form-control @error('tanggal') is-invalid @enderror form-control-lg"
                                    name="tanggal" required autofocus>
                                @if ($errors->has('tanggal'))
                                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                @endif
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                                <a class="btn rounded-pill btn-warning" href="{{ url('home/antrian') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
