<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <center>
                        <h1>No Antrian : {{ $antrian->no_antrian }}</h1>
                        <hr>
                        <h4>Nama :{{ $antrian->nama }}</h4>
                        <h4>NIK :{{ $antrian->nik }}</h4>
                        <h4>Alamat :{{ $antrian->alamat }}</h4>
                        <h4>Cara Bayar :{{ $antrian->cara_bayar }}</h4>
                        <h4>Telepon :{{ $antrian->telepon }}</h4>
                        <h4>Email :{{ $antrian->email }}</h4>
                        <h4>Status :{{ $antrian->status }}</h4>
                        {{-- <h4>Nama :{{ $antrian->nama }}</h4>
                        <h4>Nama :{{ $antrian->nama }}</h4> --}}
                    </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>