<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Antrian extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'nik', 'nama', 'alamat',
        'cara_bayar', 'telepon', 'email','status','tanggal_lahir','usia','jenis_kelamin'
    ];
    protected $table = 'antrian';

    // public static function generateno_antrian($tanggal, $tujuan_keluhan)
    // {
    //     // Hitung jumlah antrian pada tanggal dan tujuan_keluhan yang sama
    //     $jumlahAntrian = self::where('tanggal', $tanggal)
    //         ->where('tujuan_keluhan', $tujuan_keluhan)
    //         ->count();

    //     // Jika jumlah antrian melebihi batasan yang ditentukan, kembalikan null
    //     if ($jumlahAntrian >= 30) {
    //         return null;
    //     }

    //     // Ambil nomor antrian tertinggi pada tanggal dan tujuan_keluhan yang sama
    //     $antrianTertinggi = self::where('tanggal', $tanggal)
    //         ->where('tujuan_keluhan', $tujuan_keluhan)
    //         ->max('no_antrian');

    //     // Jika tidak ada nomor antrian sebelumnya, set no_antrian ke 1
    //     if ($antrianTertinggi === null) {
    //         $no_antrian = 1;
    //     } else {
    //         // Jika sudah ada nomor antrian sebelumnya, tambahkan 1 untuk mendapatkan nomor antrian berikutnya
    //         $no_antrian = $antrianTertinggi + 1;
    //     }

    //     $no_antriantujuan_keluhan = $tujuan_keluhan . '-' . $no_antrian;


    //     return $no_antriantujuan_keluhan;

//     public static function generateno_antrian($tanggal, $tujuan_keluhan)
// {
//     // Hitung jumlah antrian pada tanggal dan tujuan_keluhan yang sama
//     $jumlahAntrian = self::where('tanggal', $tanggal)
//         ->where('tujuan_keluhan', $tujuan_keluhan)
//         ->count();

//     // Jika jumlah antrian sudah mencapai batasan tertentu, kembalikan null
//     if ($jumlahAntrian >= 50) {
//         return null;
//     }

//     // Ambil nomor antrian terakhir pada tanggal dan tujuan_keluhan yang sama
//     $antrianTertinggi = self::where('tanggal', $tanggal)
//         ->where('tujuan_keluhan', $tujuan_keluhan)
//         ->max('no_antrian');

//     // Jika tidak ada nomor antrian sebelumnya, set nomor_antrian ke 1
//     if ($antrianTertinggi === null) {
//         $no_antrian = 1;
//     } else {
//         // Jika sudah ada nomor antrian sebelumnya, tambahkan 1 untuk mendapatkan nomor antrian berikutnya
//         $no_antrian = $antrianTertinggi + 1;
//     }

//     // Menggabungkan nomor antrian dengan tujuan_keluhan dan tanggal yang dipilih
//     $no_antriantujuan_keluhanTanggal = $no_antrian . '-' . $tujuan_keluhan;

//     return $no_antriantujuan_keluhanTanggal;
// }
    }

