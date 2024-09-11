@extends('layout')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Data Antrian Hari Ini</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tabel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Antrian Hari Ini</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Antrian Hari Ini</h4>
                        <a href="{{ route('noantrian.create') }}" class="btn rounded-pill btn-primary">Tambah Antrian</a>
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
                        <form action="{{ url('home/noantrian') }}" class="mt-4" method="GET">
                            <label for="filterPoli">Filter Poli:</label>
                            <select name="tujuan_keluhan" class="form-control" id="filterPoli">
                                <option value="">Semua</option>
                                <option value="Umum">Umum</option>
                                <option value="Gigi">Gigi</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-secondary">Filter</button>
                        </form>
                        <input type="text" class="form-control mt-3" id="myInput1" onkeyup="myFunction()"
                            placeholder="Search for names.." title="Type in a name">
                        <table class="table table-striped" id="myTable1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>No Antrian</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Status</th>
                                    <th>AKSI</th>
                                </tr>
                                </tbody>
                                @forelse ($antrian as $post)
                                    <tr>
                                        <td>
                                            {{ $post->nama }}
                                        </td>
                                        <td>
                                            {{ $post->no_antrian }}
                                        </td>
                                        <td>
                                            {{ $post->tanggal }}
                                        </td>
                                        <td>
                                            @if ($post->status == 'Pending')
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#basicModal{{ $post->id }}" data-toggle="modal" data-target="#myModal">{{ $post->status }}</button>

                                            @elseif ($post->status == 'Cancel')
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#basicModal{{ $post->id }}">{{ $post->status }}</button>

                                            @elseif ($post->status == 'Sukses')
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#basicModal{{ $post->id }}">{{ $post->status }}</button>                                                
                                            @endif
                                            {{-- <td>
                                                @if ($post->status == 'Confirm')
                                                    <button class="btn btn-success" data-toggle="modal"
                                                        data-target="#basicModal{{ $post->id }}">{{ $post->status }}</button>
                                                @elseif ($post->status == 'Pending')
                                                    <button class="btn btn-warning" data-toggle="modal"
                                                        data-target="#basicModal{{ $post->id }}">{{ $post->status }}</button>
                                                @endif --}}
            
                                                <!-- Modal -->
                                                <div class="modal fade" id="basicModal{{ $post->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Update Status</h5>
                                                                <button type="button" class="close text-black" data-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!--FORM UPDATE BARANG-->
                                                                <form action="{{ route('antrian.status', $post->id) }}" method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-group mb-3">
                                                                        <label>Status</label>
                                                                        {{-- <input type="text" placeholder="Tujuan Keluhan"
                                                                            class="form-control form-control-lg" name="tujuan_keluhan" required autofocus> --}}
                                                        
                                                                                {{-- <option value="Pending">Pending</option>
                                                                                <option value="Cancels">Cancel</option> --}}
                                                                                <select name="updateStatus" class="form-control @error('status') is-invalid @enderror">
                                                                                    <?php old('status', $post->status); ?>
                                                                                    <option {{ $post->status == 'Sukses' ? 'selected' : '' }}
                                                                                        value="Sukses">Sukses</option>
                                                                                    <option
                                                                                        {{ $post->status == 'Pending' ? 'selected' : '' }}
                                                                                        value="Pending">Pending</option>
                                                                                        <option
                                                                                        {{ $post->status == 'Cancel' ? 'selected' : '' }}
                                                                                        value="Cancel">Cancel</option>
                                                                                </select>
                                                                            </select>
                                                                        @if ($errors->has('status'))
                                                                            <span class="text-danger">{{ $errors->first('tujuan_keluhan') }}</span>
                                                                        @endif
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal UPDATE Barang-->
                                        </td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('noantrian.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('noantrian.edit', $post->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="mdi mdi-tooltip-edit me-1"
                                                        title="EDIT"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="HAPUS"><i
                                                        class="mdi mdi-delete-forever
                                                        me-1"></i></button>
                                                <a class="btn btn-sm btn-warning" title="PREVIEW"
                                                    href="{{ route('noantrian.show', $post->id) }}"><i
                                                        class="mdi mdi-eye me-1"></i>
                                                </a>
                                                <a class="btn btn-sm btn-outline-danger" title="PDF"
                                                    href="{{ route('antrian.print.pdf', $post->id) }}">
                                                    <i class="mdi mdi-download me-1"></i>
                                                </a>
                                                <a href="{{ route('antrian.call', $post->id) }}"
                                                    class="btn btn-sm btn-success"><i class="mdi mdi-whatsapp me-1"
                                                        title="EDIT"></i></a>
                                                {{-- <a class="btn btn-sm btn-info" title="Panggil" href="{{ route('antrian.print.pdf', $post->id) }}">
                                                        <i class="mdi mdi-telegram me-1"></i> --}}
                                                {{-- </a>
                                                    <a href="{{ route('admin.call', ['id' => $post->id]) }}" class="btn btn-primary">Panggil</a> --}}
                                            </form>
                                        <td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput1");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable1");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
