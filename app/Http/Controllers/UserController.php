<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;


class UserController extends Controller
{


    public function index()
    {
        //FacadesSession::flush();
        if (Auth::guard('user')->check()) {
            $user = User::all();
            $diri = User::where('id', auth()->user()->id)->get();
            return view('user.index', compact('user', 'diri'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function dashboard()
    {
        //FacadesSession::flush();
        if (Auth::guard('user')->check()) {
            $user = Auth::user();
            $diri = User::where('id', auth()->user()->id)->get();
            $antrian = Antrian::where('user_id', $user->id)->count();
            $antrian_pending = Antrian::where('user_id', $user->id)->where('status', 'Pending')->count();
            $antrian_cancel = Antrian::where('user_id', $user->id)->where('status', 'Cancel')->count();
            $antrian_sukses = Antrian::where('user_id', $user->id)->where('status', 'Sukses')->count();
            
            $today = Carbon::now()->format('Y-m-d');
            $antrian_gigi = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Gigi')->count();
            $antrian_gigi_pending = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Gigi')->where('status', 'Pending')->count();
            $antrian_gigi_cancel = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Gigi')->where('status', 'Cancel')->count();
            $antrian_gigi_sukses = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Gigi')->where('status', 'Sukses')->count();
      
      
      
      
            $antrian_umum = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Umum')->count();
            $antrian_umum_pending = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Umum')->where('status', 'Pending')->count();
            $antrian_umum_cancel = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Umum')->where('status', 'Cancel')->count();
            $antrian_umum_sukses = Antrian::where('user_id', $user->id)->where('tujuan_keluhan', 'Umum')->where('status', 'Sukses')->count();
      
      
            $antrian_today = Antrian::where('user_id', $user->id)->whereDate('created_at', $today)->count();
            $antrian_today_pending = Antrian::where('user_id', $user->id)->whereDate('created_at', $today)->where('status', 'Pending')->count();
            $antrian_today_cancel = Antrian::where('user_id', $user->id)->whereDate('created_at', $today)->where('status', 'Cancel')->count();
            $antrian_today_sukses = Antrian::where('user_id', $user->id)->whereDate('created_at', $today)->where('status', 'Sukses')->count();
      
      
            $tanggalMulai = Carbon::now(); // Mendapatkan tanggal saat ini
    $tanggalAkhir = $tanggalMulai->copy()->addDays(6); // Menambahkan 6 hari ke tanggal saat ini

    $ketersediaanTanggal = [];

    while ($tanggalMulai <= $tanggalAkhir) {
        $tanggal = $tanggalMulai->toDateString();

        // Menghitung jumlah antrian pada tanggal ini
        $jumlahAntrian = Antrian::whereDate('tanggal', $tanggal)->count();

        // Mengecek apakah jumlah antrian melebihi batas maksimal (30)
        $tersedia = $jumlahAntrian < 30;

        // Menambahkan data ketersediaan tanggal ke array
        $ketersediaanTanggal[] = [
            'tanggal' => $tanggal,
            'tersedia' => $tersedia,
        ];

        // Melanjutkan ke tanggal berikutnya
        $tanggalMulai->addDay();
    }
            return view('user.dashboard', compact('antrian', 'diri', 'antrian_today', 'antrian_gigi', 
            'antrian_umum','antrian_pending','antrian_cancel','antrian_sukses', 
            'antrian_gigi_cancel','antrian_gigi_pending','antrian_gigi_sukses'
             ,'antrian_umum_cancel' ,'antrian_umum_pending','antrian_umum_sukses'
             ,'antrian_today_cancel','antrian_today_pending','antrian_today_sukses'
             ,'ketersediaanTanggal'
          ));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function edit(User $user)
    {
        $diri = User::where('id', auth()->user()->id)->get();
        return view('user.edit', compact('user', 'diri'));
    }
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        //update post with new image
        $user->update([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => FacadesHash::make($request['password'])
        ]);

        //redirect to index
        return redirect("home/user")->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(User $user)
    {

        //delete post
        $user->delete();

        //redirect to index
        return redirect('home/user')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
