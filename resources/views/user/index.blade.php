@extends('layoutuser')
@section('content')
    <!-- Content -->
    <div class="main-panel">
        <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">Data Pasien</h2>
                            <form action="" class="pt-3">
                                @forelse($diri as $post)
                                <div class="form-group mb-3">
                                    <label>Nama</label>
                                    <input type="text" value="{{$post->nama }}" placeholder="Name" id="nama"
                                        class="form-control form-control-lg" name="nama" readonly autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label>NIK</label>
                                    <input type="text" value="{{$post->nik }}"
                                        class="form-control form-control-lg" name="nama" readonly autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input type="text" value="{{$post->username }}"
                                        class="form-control form-control-lg" name="nama" readonly autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Telepon</label>
                                    <input type="text" value="{{$post->telepon }}" id="telepon"
                                        class="form-control form-control-lg" name="telepon" readonly autofocus>
                                   
                                </div>
                                <div class="form-group mb-3">
                                    <label>Alamat</label>
                                    <input type="text" value="{{$post->alamat }}" id="alamat"
                                        class="form-control form-control-lg" name="alamat" readonly autofocus>
                                    
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" value="{{$post->email }}" id="email_address"
                                        class="form-control form-control-lg" name="email" readonly autofocus>
                                    
                                </div>
                                <div class="mt-3">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('user.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </div>
                            </form>
                            @empty
                    <tr>
                        <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
                    </tr>
                @endforelse
                        </div>
                    </div>
                  </div>
        </div>
    </div>
    @endsection