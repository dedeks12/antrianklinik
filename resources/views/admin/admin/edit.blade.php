@extends('layout')
@section('content')
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
                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <label for="">Nama Admin</label>
                    <div class="form-group mb-3">
                        <input type="text" value="{{ $admin->nama }}" placeholder="Masukan Nama" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            required autofocus>
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>

                    <label for="">Telepon</label>
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Masukan Telepon" value="{{ $admin->telepon }}" id="telepon" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                            required autofocus>
                        @if ($errors->has('telepon'))
                            <span class="text-danger">{{ $errors->first('telepon') }}</span>
                        @endif
                    </div>

                    <label for="">NIP</label>
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Masukan NIP" value="{{ $admin->nip }}" id="nip" class="form-control @error('nip') is-invalid @enderror" name="nip"
                            required autofocus>
                        @if ($errors->has('nip'))
                            <span class="text-danger">{{ $errors->first('nip') }}</span>
                        @endif
                    </div>

                    <label for="">Email</label>
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Masukan Email" value="{{ $admin->email }}" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email"
                            required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    {{-- <label for="">Password</label>
                    <div class="form-group mb-3">
                        <input type="password" placeholder="Password" value="{{ $admin->password }}" id="password" class="form-control"
                            name="password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div> --}}

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

