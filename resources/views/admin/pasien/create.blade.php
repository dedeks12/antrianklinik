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
                            <form action="{{ route('pasien.store') }}" class="pt-3" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Nama</label>
                                    <input type="text" placeholder="Masukan Name" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror form-control-lg" name="nama" required autofocus>
                                    @if ($errors->has('nama'))
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>NIK</label>
                                    <input type="text" placeholder="Masukan NIK" id="nik"
                                        class="form-control @error('nik') is-invalid @enderror form-control-lg" name="nik" required autofocus>
                                    @if ($errors->has('nik'))
                                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input type="text" placeholder="Masukan Username" id="username"
                                        class="form-control @error('username') is-invalid @enderror form-control-lg" name="username" required autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Telepon</label>
                                    <input type="text" placeholder="Masukan Telepon" id="telepon"
                                        class="form-control @error('telepon') is-invalid @enderror form-control-lg" name="telepon" required autofocus>
                                    @if ($errors->has('telepon'))
                                        <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Alamat</label>
                                    <input type="text" placeholder="Masukan alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror form-control-lg" name="alamat" required autofocus>
                                    @if ($errors->has('alamat'))
                                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" placeholder="Masukan Email" id="email_address"
                                        class="form-control @error('email') is-invalid @enderror form-control-lg" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" placeholder="Masukan Password" id="password"
                                        class="form-control @error('password') is-invalid @enderror form-control-lg" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                                    <a class="btn rounded-pill btn-warning" href="{{ url('home/pasien') }}">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
        </div>
    </div>
    @endsection
    {{-- <form id="callForm">
        <label for="phone">Nomor Telepon:</label>
        <input type="text" name="phone" id="phone" required>
        <button type="submit">Panggil</button>
      </form>
      
      <script>
      document.getElementById("callForm").addEventListener("submit", function(e) {
        e.preventDefault(); // Prevent form submission
        
        // Get the phone number from the input field
        var phoneNumber = document.getElementById("phone").value;
        
        // Open WhatsApp with the inputted phone number and pre-filled message
        var url = "https://api.whatsapp.com/send?phone=" + encodeURIComponent(phoneNumber) + "&text=Halo, saya memanggil nomor antrian.";
        window.open(url, "_blank");
      });
      </script> --}}
      