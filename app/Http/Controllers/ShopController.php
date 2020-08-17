<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index() {
      return view('home');
    }

    public function daftar(Request $request) {
      //DAFTAR AKUN
      Akun::create([
        'username'=>$request->username,
        'password'=>$request->password
      ]);
      return redirect('/home');
    }

    public function login(Request $request) {
      session()->flash('username', $request->username);
      $username = $request->session()->get('username');
      session()->flash('password', $request->password);
      $password = $request->session()->get('password');
      if (Akun::where('username',$username)->exists() &&
          Akun::where('password',$password)->exists()) {
        return redirect('/home')->with(compact('username'));
      }
      else {
        session()->flash('username2', 'data tdk sesuai');
        return redirect('/home')->with(compact('username2'));
      }
    }
}
