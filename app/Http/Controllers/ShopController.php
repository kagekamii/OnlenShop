<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Barang;
use Session;

class ShopController extends Controller
{
  public function index()
  {
    return view('home');
  }

  public function daftar(Request $request)
  {
    //DAFTAR AKUN
    Akun::create([
      'username' => $request->username,
      'password' => $request->password
    ]);
    return redirect('/home');
  }

  public function login(Request $request)
  {

    // ji gua coba ini session tapi di refresh ilang jadi gua benerin

    // session()->flash('username', $request->username);
    // $username = $request->session()->get('username');
    // session()->flash('password', $request->password);
    // $password = $request->session()->get('password');
    // if (Akun::where('username',$username)->exists() &&
    //     Akun::where('password',$password)->exists()) {
    //   return redirect('/home')->with(compact('username'))->with('tab2_active', true);
    // }
    // else {
    //   session()->flash('username2', 'data tdk sesuai');
    //   return redirect('/home')->with(compact('username2'));
    // }


    $username = $request->input('username');
    $password = $request->input('password');

    // check ke db sama ga datanya, belajar perbedaan get() sama first() ji sekalian
    $data = Akun::where('username', $username)->where('password', $password)->first();

    // ini if buat ngecheck ada ga datanya
    // btw if ini returnnya false/true jadi kalo ada data (hasil search ga kosong) return nya True
    if ($data) {
      // true (data ada)

      // session::put artinya nyimpen value ($data->username) ke Session username
      Session::put('username', $data->username);
      return redirect('/home');
    } else {
      // false (data kosong)

      // nanti gua bikin contoh buat ngasih pesan jika username / pass salah. sementara redirect tanpa pesan
      return redirect('/home');
    }
  }

  public function logout()
  {
    // ini
    Session::flush();
    return redirect('/home');
  }

  public function komputer()
  {
    $komputer = Barang::find([1,2,3,4]);
    return view('kategori-komputer', ['barang'=>$komputer]);
  }

  public function handphone()
  {
    $handphone = Barang::find([5,6,7,8]);
    return view('kategori-handphone', ['barang'=>$handphone]);
  }

  public function makanminum()
  {
    $makanminum = Barang::find([9,10,11,12]);
    return view('kategori-makanminum', ['barang'=>$makanminum]);
  }

  public function komputerItem($id)
  {
    $komputerItem = Barang::where('id',$id)->get();
    return view('item-komputer', ['barang2'=>$komputerItem]);
  }

  public function handphoneItem($id)
  {
    $handphoneItem = Barang::where('id',$id)->get();
    return view('item-handphone', ['barang2'=>$handphoneItem]);
  }

  public function makanminumItem($id)
  {
    $makanminumItem = Barang::where('id',$id)->get();
    return view('item-makanminum', ['barang2'=>$makanminumItem]);
  }

  public function keranjangSatu(Request $request)
  {
    $nama_barang = $request->nama_barang;
    $jml_barang = $request->jml_barang;
    $harga_barang = filter_var($request->harga_barang, FILTER_SANITIZE_NUMBER_INT);
    $gbr_barang = $request->gbr_barang;
    return view('keranjang-satu', ['nama_barang'=>$nama_barang,
                                  'jml_barang'=>$jml_barang,
                                  'harga_barang'=>$harga_barang,
                                  'gbr_barang'=>$gbr_barang]);
  }
}
