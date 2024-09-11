<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Antrian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{
  public function index()
  {
    if (Auth::guard('admin')->check()) {
      $admin = admin::all();
      // $diri = Admin::findOrFail($id);
      $diri = Admin::where('id', Auth::guard('admin')->user()->id)->get();
      //$user = auth()->id();
      //$proposal = Admin::where('user_id', $user)->get();
      return view('admin.admin.index', compact('admin', 'diri'));
    }
    return redirect("login")->withSuccess('You are not allowed to access');
  }

  public function dashboard()
  {
    //FacadesSession::flush();
    if (Auth::guard('admin')->check()) {
      $antrian = Antrian::all()->count();
      $antrian_pending = Antrian::all()->where('status', 'Pending')->count();
      $antrian_cancel = Antrian::all()->where('status', 'Cancel')->count();
      $antrian_sukses = Antrian::all()->where('status', 'Sukses')->count();
      
      $diri = Admin::where('id', auth()->user()->id)->get();
      $today = Carbon::now()->format('Y-m-d');
      $antrian_gigi = Antrian::where('tujuan_keluhan', 'Gigi')->count();
      $antrian_gigi_pending = Antrian::where('tujuan_keluhan', 'Gigi')->where('status', 'Pending')->count();
      $antrian_gigi_cancel = Antrian::where('tujuan_keluhan', 'Gigi')->where('status', 'Cancel')->count();
      $antrian_gigi_sukses = Antrian::where('tujuan_keluhan', 'Gigi')->where('status', 'Sukses')->count();




      $antrian_umum = Antrian::where('tujuan_keluhan', 'Umum')->count();
      $antrian_umum_pending = Antrian::where('tujuan_keluhan', 'Umum')->where('status', 'Pending')->count();
      $antrian_umum_cancel = Antrian::where('tujuan_keluhan', 'Umum')->where('status', 'Cancel')->count();
      $antrian_umum_sukses = Antrian::where('tujuan_keluhan', 'Umum')->where('status', 'Sukses')->count();


      $antrian_today = Antrian::whereDate('created_at', $today)->count();
      $antrian_today_pending = Antrian::whereDate('created_at', $today)->where('status', 'Pending')->count();
      $antrian_today_cancel = Antrian::whereDate('created_at', $today)->where('status', 'Cancel')->count();
      $antrian_today_sukses = Antrian::whereDate('created_at', $today)->where('status', 'Sukses')->count();


      return view('admin.dashboard', compact('antrian', 'diri', 'antrian_today', 'antrian_gigi', 
      'antrian_umum','antrian_pending','antrian_cancel','antrian_sukses', 
      'antrian_gigi_cancel','antrian_gigi_pending','antrian_gigi_sukses'
       ,'antrian_umum_cancel' ,'antrian_umum_pending','antrian_umum_sukses'
       ,'antrian_today_cancel','antrian_today_pending','antrian_today_sukses'
    ));
    }
    return redirect("login")->withSuccess('You are not allowed to access');
  }

  public function create()
  {
    $data = Admin::latest()->paginate(5);
    $diri = Admin::where('id', Auth::guard('admin')->user()->id)->get();
    return view('admin.admin.create', compact('data', 'diri'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'nama' => 'required|min:3',
      'username' => 'required|min:3',
      'telepon' => 'required|min:3',
      'nip' => 'required|min:1',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:1'
    ]);

    admin::create([
      'nama' => $request->nama,
      'username' => $request->username,
      'telepon' => $request->telepon,
      'nip' => $request->nip,
      'email' => $request->email,
      'password' => FacadesHash::make($request['password'])
    ]);

    return redirect('home/admin')->with('success', 'Data Berhasil Disimpan');
  }
  public function edit(admin $admin)
  {
    if (Auth::check()) {
      $diri = Admin::where('id', Auth::guard('admin')->user()->id)->get();
      return view('admin.admin.edit', compact('admin', 'diri'));
    }
    return redirect("login")->withSuccess('You are not allowed to access');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, admin $admin)
  {
    $this->validate($request, [
      'nama' => 'required|min:3',
      'username' => 'required|min:3',
      'telepon' => 'required|min:3',
      'nip' => 'required|min:1',
      'email' => 'required|email|unique:users',
    ]);

    //update upload with new image
    $admin->update([
      'nama' => $request->nama,
      'username' => $request->username,
      'telepon' => $request->telepon,
      'nip' => $request->nip,
      'email' => $request->email,
    ]);

    //redirect to index
    return redirect("home/admin")->with(['success' => 'Data Berhasil Diubah!']);
  }
  public function destroy(admin $admin)
  {

    //delete post
    $admin->delete();

    //redirect to index
    return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
  }
}
