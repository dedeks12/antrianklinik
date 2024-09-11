<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class LayoutAdminController extends Controller
{
    //
    public function index()
{
              $admin = Admin::all();
              //$user = auth()->id();
              //$proposal = Admin::where('user_id', $user)->get();
              return view('layout', compact('admin'));
          }
}
