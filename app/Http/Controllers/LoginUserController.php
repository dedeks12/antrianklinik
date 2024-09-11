<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Partner;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;


class LoginUserController extends Controller
{
    public function index()
    {
        return view('auth.loginuser');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
          return redirect()->intended('home/admin')->withSuccess('Signed in');
        }

        if (Auth::guard('user')->attempt($credentials)) {
          return redirect()->intended('home/user')
          ->withSuccess('Signed in');
        }
        return redirect("login")->with('warning', 'akun belum aktif');
    }

    //public function registration()
    //{
      //          return view('auth.registrationuser');
      
    //}
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'nik' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'nama' => $data['nama'],
        'username' => $data['username'],
        'nik' => $data['nik'],
        'telepon' => $data['telepon'],
        'alamat' => $data['alamat'],
        'email' => $data['email'],
        'password' => FacadesHash::make($data['password'])
      ]);
    }    
    
    public function signOut() {
        FacadesSession::flush();
        Auth::logout();
  
        return Redirect('login');
          //if(Auth::guard('admin')->check())
        //{ Auth::guard('admin')->logout();
        //}elseif
        //(Auth::guard('user')->check())
        //{Auth::guard('user')->logout();
        //}
        //return Redirect('login');
    }
}