@extends('layout')
@section('content')
    <!-- Content -->

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Data Pasien </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Pasien</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Pasien</h4>
                            <a href="{{ route('pasien.create') }}" class="btn rounded-pill btn-primary">Tambah Pasien</a>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>AKSI</th>
                                    </tr>
                                    </tbody>
                                    @forelse ($user as $post)
                                        <tr>
                                            <td>
                                                {{ $post->nama }}
                                            </td>
                                            <td>
                                                {{ $post->telepon }}
                                            </td>
                                            <td>
                                                {{ $post->alamat }}
                                            </td>
                                            <td>
                                                {{ $post->email }}
                                            </td>
                                            <td>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('pasien.destroy', $post->id) }}" method="POST">
                                                    <a href="{{ route('pasien.edit', $post->id) }}"
                                                        class="btn btn-sm btn-primary"><i
                                                            class="mdi mdi-tooltip-edit me-1"></i>EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="mdi mdi-delete-forever
                                                            me-1"></i>HAPUS</button>
                                                </form>
                                            <td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
