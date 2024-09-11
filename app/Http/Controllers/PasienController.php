<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;


class PasienController extends Controller
{
    //
    public function index()
    {
        //FacadesSession::flush();
        $user = User::all();
        $diri = Admin::where('id', Auth::guard('admin')->user()->id)->get();
        return view('admin.pasien.index', compact('user', 'diri'));
    }

    public function create()
    {
        $user = User::latest()->paginate(5);
        $diri = Admin::where('id', Auth::guard('admin')->user()->id)->get();
        return view('admin.pasien.create', compact('user', 'diri'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'username' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        user::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'username' => $request->username,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => FacadesHash::make($request['password'])
        ]);

        return redirect('home/pasien')->with('success', 'Data Berhasil Disimpan');
    }
    public function edit(User $pasien)
    {
        $diri = Admin::where('id', Auth::guard('admin')->user()->id)->get();
        return view('admin.pasien.edit', compact('pasien', 'diri'));
    }
    public function update(Request $request, User $pasien)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'username' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        //update post with new image
        $pasien->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'username' => $request->username,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        //redirect to index
        return redirect("home/pasien")->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(User $pasien)
    {

        //delete post
        $pasien->delete();

        //redirect to index
        return redirect("home/pasien")->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
