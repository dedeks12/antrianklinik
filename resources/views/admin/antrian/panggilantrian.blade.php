@extends('layout')
@section('content')
    <!-- Content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Data Pasien</h2>
                        <form class="whatsapp-form pt-3">
                            <div class="form-group mb-3">
                                <label>No Antrian</label>
                                <input type="text" value="{{ $antrian->no_antrian }}" id="no_antrian" class="form-control form-control-lg"
                                    name="nama" readonly autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" value="{{ $antrian->nama }}" placeholder="Name" id="nama"
                                    class="form-control form-control-lg" name="nama" readonly autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <input type="text" value="{{ $antrian->alamat }}" id="alamat"
                                    class="form-control form-control-lg" name="alamat" readonly autofocus>

                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" value="{{ $antrian->tanggal }}" id="tanggal"
                                    class="form-control form-control-lg" name="email" readonly autofocus>

                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" value="{{ $antrian->telepon }}" id="telepon"
                                    class="form-control form-control-lg" name="telepon" readonly autofocus>

                            </div>
                            <input type="hidden" class="form-select" id="end" value="'Silahkan Datang Ke Klinik 15 Menit Lagi'">

                            <div class="mt-3"></div>
                            <a class="btn btn-success send_form" href="javascript:void" type="submit"
                                title="Send to Whatsapp">Send to
                                Whatsapp</a>
                                <a href="{{url('home/noantrian')}}" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="./script.js"></script>
    <script>
        $(document).on('click', '.send_form', function() {
            var input_blanter = document.getElementById('telepon');

            /* Whatsapp Settings */
            var walink = 'https://web.whatsapp.com/send',
                phone = $("#telepon").val(),
                walink2 = 'Halo Kami dari Klinik Pratama Anugerah Ingin Menyampaikan Kepada',
                text_yes = 'Terkirim.',
                text_no = 'Isi semua Formulir lalu klik Send.';

            /* Smartphone Support */
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                var walink = 'whatsapp://send';
            }

            if ("" != input_blanter.value) {

                /* Call Input Form */
                var input_noantrian = $("#no_antrian").val(),
                    input_nama = $("#nama").val(),
                    input_tanggal = $("#tanggal").val(),
                    input_alamat = $("#alamat").val();
                input_end = $("#end").val();


                /* Final Whatsapp URL */
                var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
                '*No Antrian* : ' + input_noantrian + '%0A' +
                    '*Name* : ' + input_nama + '%0A' +
                    '*Tanggal* : ' + input_tanggal + '%0A' +
                    '*Alamat* : ' + input_alamat + '%0A' +
                    '*Keterangan* : ' + input_end + '%0A';


                /* Whatsapp Window Open */
                window.open(blanter_whatsapp, '_blank');
                document.getElementById("text-info").innerHTML = '<span class="yes">' + text_yes + '</span>';
            } else {
                document.getElementById("text-info").innerHTML = '<span class="no">' + text_no + '</span>';
            }
        });
    </script>
@endsection
