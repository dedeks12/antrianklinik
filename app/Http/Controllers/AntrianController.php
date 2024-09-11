<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{
    //
    //
    // public $tujuan_keluhan, $no_antrian, $nama, $alamat, $tanggal, $no_hp, $no_ktp, $tujuan_keluhan, $tanggal_antrian, $user_id, $data;

    public function index(Request $request)
    {
        //FacadesSession::flush();
        $antrian = Antrian::where('user_id', auth()->user()->id)->get();
        $user = Auth::user();

        $tujuan_keluhan = $request->input('tujuan_keluhan');

        // Query untuk mendapatkan data antrian berdasarkan filter poli
        $antrian = Antrian::where('user_id', $user->id)->when($tujuan_keluhan, function ($query, $tujuan_keluhan) {
            return $query->where('tujuan_keluhan', $tujuan_keluhan);
        }, function ($query) {
            return $query; // Mengembalikan query tanpa kondisi jika $tujuan_keluhan kosong
        })->get();
        $diri = user::where('id', auth()->user()->id)->get();
        return view('antrian.index', compact('antrian', 'diri'));
    }

    public function today(Request $request)
    {
        //FacadesSession::flush();
        // $antrian = Antrian::where('user_id', auth()->user()->id)->get();

        $today = Carbon::now()->format('Y-m-d');
        $user = Auth::user();

        $antrian = Antrian::whereDate('created_at', $today)
            ->where('user_id', $user->id)
            ->get();


        $tujuan_keluhan = $request->input('tujuan_keluhan');
        $antrian = Antrian::whereDate('created_at', $today)->where('user_id', $user->id)
        ->when($tujuan_keluhan, function ($query, $tujuan_keluhan) {
            return $query->where('tujuan_keluhan', $tujuan_keluhan);
        }, function ($query) {
            return $query; // Mengembalikan query tanpa kondisi jika $tujuan_keluhan kosong
        })->get();


        $diri = user::where('id', auth()->user()->id)->get();
        return view('antrian.today', compact('antrian', 'diri'));
    }

    public function ubahstatus(Request $request, $id)
    {
        $update_Antrian = Antrian::findorfail($id);
        // $update_nota->nama_jasa_Antrian = $request->updateHarga;
        $update_Antrian->status = $request->updateStatus;
        $update_Antrian->save();
        return redirect()->back()->with('success', 'Status Antrian Berhasil Diubah');
    }

    public function create()
    {
        $antrian = antrian::latest()->paginate(5);
        $diri = User::where('id', auth()->user()->id)->get();
        return view('antrian.create', compact('antrian', 'diri'));
    }

    public function store(Request $request)
    {
        // Validasi inputan dan ambil data tanggal dan tujuan_keluhan dari request
        $this->validate($request, [
            'tanggal' => 'required|date',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'status' => '',
            'tujuan_keluhan' => 'required|min:3',
            'tanggal' => 'required',
            'cara_bayar' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $tanggal = $request->input('tanggal');
        $status = $request->input('status');
        //$tujuan_keluhan = $request->input('tujuan_keluhan');
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $tujuan_keluhan = $request->input('tujuan_keluhan');
        $cara_bayar = $request->input('cara_bayar');
        $telepon = $request->input('telepon');
        $email = $request->input('email');
        $usia = $request->input('usia');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $jenis_kelamin = $request->input('jenis_kelamin');

        // Periksa jumlah antrian pada tanggal dan tujuan_keluhan yang sama
        $jumlahAntrian = Antrian::where('tanggal', $tanggal)
            ->where('tujuan_keluhan', $tujuan_keluhan)
            ->count();

        // Jika jumlah antrian sudah mencapai batasan tertentu, berikan respons error
        if ($jumlahAntrian >= 30) {
            return redirect()->route('home/antrian')->with(['error' => 'Anda telah mencapai Batasan maksimum antrian pada tanggal dan tujuan_keluhan ini']);
        }
        $userId = Auth::id();

        // Periksa jumlah antrian pengguna pada tanggal yang sama
        $jumlahAntrian = Antrian::where('tanggal', $tanggal)
            ->where('user_id', $userId)
            ->count();

        // Jika jumlah antrian pengguna sudah mencapai 2, berikan respons error
        if ($jumlahAntrian >= 2) {
            return redirect()->route('home/antrian')->with(['error' => 'Batasan maksimum input antrian pada tanggal ini telah tercapai.']);
        }

        // $no_antrian = Antrian::generateno_antrian($tanggal, $tujuan_keluhan);


        // Simpan antrian baru ke database
        $antrian = new Antrian;
        $antrian->tanggal = $tanggal;
        $antrian->status = $status;
        $antrian->tujuan_keluhan = $tujuan_keluhan;
        $antrian->nik = $nik;
        $antrian->nama = $nama;
        $antrian->alamat = $alamat;
        $antrian->cara_bayar = $cara_bayar;
        $antrian->telepon = $telepon;
        $antrian->email = $email;
        $antrian->user_id = $userId;
        $antrian->tanggal_lahir = $tanggal_lahir;
        $antrian->usia = $usia;
        $antrian->jenis_kelamin = $jenis_kelamin;
        // Generate nomor antrian berdasarkan tujuan_keluhan yang dipilih
        // $no_antrian = $this->generateno_antrian($tujuan_keluhan, $tanggal);
        $no_antrian = $this->generateno_antrian($tanggal, $tujuan_keluhan);

        $antrian->no_antrian = $no_antrian;
        $antrian->save();

        // Response atau tindakan selanjutnya
        return redirect('home/antrian')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    private function generateno_antrian($tanggal, $tujuan_keluhan)
    {
        // Ambil jumlah antrian pada tanggal dan tujuan_keluhan yang sama
        $jumlahAntrian = Antrian::where('tanggal', $tanggal)
            ->where('tujuan_keluhan', $tujuan_keluhan)
            ->count();

        // Generate nomor antrian dengan format [tanggal]-[tujuan_keluhan]-[nomor]
        $no_antrian = $tujuan_keluhan . '-' . ($jumlahAntrian + 1);

        return $no_antrian;
    }

    public function edit(antrian $antrian)
    {
        // $diri1 = antrian::where('id', auth()->user()->id)->get();
        $diri = user::where('id', auth()->user()->id)->get();
        return view('antrian.edit', compact('antrian', 'diri'));
    }
    public function update(Request $request, $id)
    {
        // Validasi inputan
        $this->validate($request, [
            // 'tanggal' => 'required|date',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'status' => '',
            // 'tujuan_keluhan' => 'required|min:3',
            // 'tanggal' => 'required',
            'cara_bayar' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'tanggal' => 'required|date',
            'tujuan_keluhan' => 'required|string',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ]);


        // Ambil antrian dari database berdasarkan ID
        $antrian = Antrian::findOrFail($id);
        $tanggal = $request->input('tanggal');
        $tujuan_keluhan = $request->input('tujuan_keluhan');
        $nama = $request->input('nama');
        $nik = $request->input('nik');
        $status = $request->input('status');
        $alamat = $request->input('alamat');
        $cara_bayar = $request->input('cara_bayar');
        $telepon = $request->input('telepon');
        $email = $request->input('email');
        $usia = $request->input('usia');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $jenis_kelamin = $request->input('jenis_kelamin');

        // Periksa jumlah antrian pada tanggal dan tujuan_keluhan yang sama
        $jumlahAntrian = Antrian::where('tanggal', $tanggal)
            ->where('tujuan_keluhan', $tujuan_keluhan)
            ->count();

        // Jika jumlah antrian sudah mencapai batasan tertentu, berikan respons error
        if ($jumlahAntrian >= 30) {
            return redirect()->back()->with(['error' => 'Anda telah mencapai Batasan maksimum antrian pada tanggal dan tujuan_keluhan ini']);
            // response()->json(['error' => 'Batasan maksimum antrian pada tanggal dan tujuan_keluhan ini telah tercapai.'], 422);
        }
        $userId = Auth::id();

        // Periksa jumlah antrian pengguna pada tanggal yang sama
        $jumlahAntrian = Antrian::where('tanggal', $tanggal)
            ->where('user_id', $userId)
            ->count();

        // Jika jumlah antrian pengguna sudah mencapai 2, berikan respons error
        if ($jumlahAntrian >= 2) {
            return redirect()->back()->with(['error' => 'Anda telah mencapai Batasan maksimum antrian pada tanggal dan tujuan_keluhan ini']);

            // response()->json(['error' => 'Batasan maksimum input antrian pada tanggal ini telah tercapai.'], 422);
        }
        // Periksa apakah tanggal dan tujuan_keluhan berbeda dengan data antrian yang ada
        if ($tanggal != $antrian->tanggal || $tujuan_keluhan != $antrian->tujuan_keluhan) {
            // Cari nomor antrian otomatis yang baru dengan tanggal dan tujuan_keluhan yang diinputkan
            $no_antrianBaru = $this->generateno_antrian($tanggal, $tujuan_keluhan);

            // Lakukan perubahan pada atribut nomor antrian
            $antrian->no_antrian = $no_antrianBaru;
            $antrian->tanggal = $tanggal;
            $antrian->status = $status;
            $antrian->tujuan_keluhan = $tujuan_keluhan;
            $antrian->nik = $nik;
            $antrian->nama = $nama;
            $antrian->alamat = $alamat;
            $antrian->cara_bayar = $cara_bayar;
            $antrian->telepon = $telepon;
            $antrian->email = $email;
            $antrian->user_id = $userId;
            $antrian->tanggal_lahir = $tanggal_lahir;
            $antrian->usia = $usia;
            $antrian->jenis_kelamin = $jenis_kelamin;
            // Simpan perubahan ke database
            $antrian->save();
        } else {
            $antrian->tanggal = $tanggal;
            $antrian->status = $status;
            $antrian->tujuan_keluhan = $tujuan_keluhan;
            $antrian->nik = $nik;
            $antrian->nama = $nama;
            $antrian->alamat = $alamat;
            $antrian->cara_bayar = $cara_bayar;
            $antrian->telepon = $telepon;
            $antrian->email = $email;
            $antrian->tanggal_lahir = $tanggal_lahir;
            $antrian->usia = $usia;
            $antrian->jenis_kelamin = $jenis_kelamin;
            // Simpan perubahan ke database
            $antrian->save();
        }

        //redirect to index
        return redirect('home/antrian')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(antrian $antrian)
    {

        //delete post
        $antrian->delete();

        //redirect to index
        return redirect()->route('home/antrian')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function pdf($id)
    {
        $antrian = antrian::findOrFail($id);
        $pdf = pdf::loadView('admin.antrian.show', compact('antrian'));
        return $pdf->download('antrian.pdf');
    }
    public function show($id)
    {
        $antrian = Antrian::findorfail($id);
        return view('admin.antrian.show', compact('antrian'));
    }
}
