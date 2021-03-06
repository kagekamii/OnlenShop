<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Barang;
use App\Master;
use Session;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class ShopController extends Controller
{
  public function index()
  {
    $apaan = Barang::find([1,2,5,6,9,10]);
    $apaan2 = $apaan->shuffle();
    $ruteNow = '/en-home';
    $jml_notif = Master::where('username', Session::get('username'))->count();
    return view('home', ['apaan'=>$apaan2, 'jml_notif'=>$jml_notif, 'ruteNow'=>$ruteNow]);
  }

  public function about()
  {
    return view('about');
  }

  public function daftar(Request $request)
  {
    if(Akun::where('username', $request->username)->exists()) {
      Session::flash('regisFail', "<b>Daftar Gagal!</b> <br> Username <b><i>".$request->username."</b></i>
                                  sudah ada! <br> Tolong jangan plagiat (h3h3).");
      return redirect()->back()->with(compact('regisFail'));
    }
    else {
      //DAFTAR AKUN
      Akun::create([
        'username' => $request->username,
        'password' => $request->password,
        'nohp' => $request->nohp
      ]);
      Session::flash('regisSucc', "<b>Berhasil terdaftar</b> <br>
                                    sebagai <b><i>".$request->username."</i></b> (h3h3).");
      return redirect()->back()->with(compact('regisSucc'));
    }

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
    $data2 = Akun::where('username', $username)->first();
    $data3 = Akun::where('username', $username)->where('password', '!=', $password)->first();
    // ini if buat ngecheck ada ga datanya
    // btw if ini returnnya false/true jadi kalo ada data (hasil search ga kosong) return nya True
    if ($data) {
      // true (data ada)

      // session::put artinya nyimpen value ($data->username) ke Session username
      Session::put('username', $data->username);
      Session::put('nohp', $data->nohp);
      Session::put('chat', ' ');
      return redirect()->back()->with(compact('chat'));
    }
    elseif (!$data2) {
      // false (data kosong)
      Session::flash('userSalah', "Username <b><i>".$request->username."</i></b> tidak terdaftar.");
      // nanti gua bikin contoh buat ngasih pesan jika username / pass salah. sementara redirect tanpa pesan
      return redirect()->back()->with(compact('userSalah'));
    }
    elseif ($data3) {
      Session::flash('passSalah', "Password tidak sesuai.");
      return redirect()->back()->with(compact('passSalah'));
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
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/en-kategori-komputer';
    return view('kategori-komputer', ['barang'=>$komputer,
                                      'ruteNow'=>$ruteNow,
                                      'jml_notif'=>$jml_notif]);
  }

  public function handphone()
  {
    $handphone = Barang::find([5,6,7,8]);
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/en-kategori-handphone';
    return view('kategori-handphone', ['barang'=>$handphone,
                                      'ruteNow'=>$ruteNow,
                                      'jml_notif'=>$jml_notif]);
  }

  public function makanminum()
  {
    $makanminum = Barang::find([9,10,11,12]);
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/en-kategori-makanminum';
    return view('kategori-makanminum', ['barang'=>$makanminum,
                                        'ruteNow'=>$ruteNow,
                                        'jml_notif'=>$jml_notif]);
  }

  public function kategoriesItem($id)
  {
    $kategoriesItem = Barang::where('id',$id)->get();
    $ruteNow = '/en-kategori-item/'.$id;
    $jml_notif = Master::where('username', Session::get('username'))->count();
    return view('item-kategories', ['barang2'=>$kategoriesItem,
                                    'ruteNow'=>$ruteNow,
                                    'jml_notif'=>$jml_notif]);
  }

  // public function komputerItem($id)
  // {
  //   $komputerItem = Barang::where('id',$id)->get();
  //   return view('item-komputer', ['barang2'=>$komputerItem]);
  // }
  //
  // public function handphoneItem($id)
  // {
  //   $handphoneItem = Barang::where('id',$id)->get();
  //   return view('item-handphone', ['barang2'=>$handphoneItem]);
  // }
  //
  // public function makanminumItem($id)
  // {
  //   $makanminumItem = Barang::where('id',$id)->get();
  //   return view('item-makanminum', ['barang2'=>$makanminumItem]);
  // }

  public function keranjangSatu(Request $request)
  {
    $nama_barang = $request->nama_barang;
    Session::put('nama_barang', $request->nama_barang);

    $jml_barang = $request->jml_barang;
    Session::put('jml_barang', $request->jml_barang);

    $harga_barang = filter_var($request->harga_barang, FILTER_SANITIZE_NUMBER_INT);
    Session::put('harga_barang', $harga_barang);
    $gbr_barang = $request->gbr_barang;
    return view('keranjang-satu', ['nama_barang'=>$nama_barang,
                                  'jml_barang'=>$jml_barang,
                                  'harga_barang'=>$harga_barang,
                                  'gbr_barang'=>$gbr_barang]);
  }

  public function keranjangSatuHalf(Request $request)
  {
    Session::put('alamat_rumah', $request->alamat_rumah);
    Session::put('kecamatan', $request->kecamatan);
    Session::put('kota', $request->kota);
    Session::put('provinsi', $request->provinsi);

    Session::put('catatan', $request->catatan);
    $kurir = $request->kurir;
    $kurirOnly = explode('-',$kurir);
    Session::put('kurir', $kurirOnly[0]);
    // RINCIAN HARGA
    Session::put('subhargaBarang', $request->subhargaBarang2);
    Session::put('ongkosKirim', $request->ongkosKirim);
    Session::put('totalBayar', $request->totalBayar);

    return redirect('keranjang-dua');
  }

  public function keranjangDua()
  {
    $nama = ["Logitech G402 Hyperion Fury", "WD SSD Green Sata3 240gb",
            "Monitor Dell 19 inch", "Nvidia GTX650", "Charger Baseus Fast Charging",
            "Case Iphone 6/6s/7", "Powerbank UNEED 10k mAH", "Redmi Note 9 4/64",
            "Baso Aci Tulang Rungu", "Kombucha HEAL X BURGREENS", "Chikiballs Keju",
            "Susu F&N evaporasi 390gr"];
    $nama_len = count($nama);
    // ID BARANG
    for ($i=0; $i < $nama_len; $i++) {
      if( Session::get('nama_barang') == $nama[$i] ) {
        Session::put('id_barang', $i+=1);
      }
    }

    return view('keranjang-dua');
  }

  public function insertData(Request $request)
  {
    // IDENTITAS
    $username3 = $request->username3;
    $nohp3 = $request->nohp3;
    // ALAMAT
    $alamat_rumah3 = $request->alamat_rumah3;
    $kecamatan3 = $request->kecamatan3;
    $kota3 = $request->kota3;
    $provinsi3 = $request->provinsi3;
    // DETAIL BARANG
    $nama_barang3 = $request->nama_barang3;
    $jml_barang3 = $request->jml_barang3;
    $catatan3 = $request->catatan3;
    $kurir3 = $request->kurir3;
    // RINCIAN BAYAR
    $total_harga3 = $request->total_harga3;
    $ongkos_kirim3 = $request->ongkos_kirim3;
    $total_bayar3 = $request->total_bayar3;
    // ENTAHLAH APAAN NAMANYA
    $metode_bayar3 = $request->caraBayar;
    $batas_waktu3 = $request->batas_waktu3;
    $batas_waktu4 = $request->batas_waktu4;
    $kode_transaksi3 = $request->kode_transaksi3;
    // ID BARANG
    $id_barang3 = Session::get('id_barang');

    Master::create([
      'username' => $username3,
      'nohp' => $nohp3,

      'alamat_rumah' => $alamat_rumah3,
      'kecamatan' => $kecamatan3,
      'kota' => $kota3,
      'provinsi' => $provinsi3,

      'barang_id' => $id_barang3,
      'nama_barang' => $nama_barang3,
      'jml_barang' => $jml_barang3,
      'kurir' => $kurir3,

      'total_harga' => $total_harga3,
      'ongkos_kirim' => $ongkos_kirim3,
      'total_bayar' => $total_bayar3,

      'metode_bayar' => $metode_bayar3,
      'batas_waktu' => $batas_waktu3,
      'batas_waktu2' => $batas_waktu4,
      'batas_waktu3' => 'Buruan bayar atuh',
      'kode_transaksi' => $kode_transaksi3,
      'catatan' => $catatan3
    ]);
    return redirect('keranjang-tiga');
  }

  public function keranjangTiga(Request $request)
  {
    $getData = Master::latest('id')->first();
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/en-keranjang-tiga';
    return view('keranjang-tiga', ['getTime'=>$getData->batas_waktu,
                                  'getTagihan'=>$getData->total_bayar,
                                  'getKode'=>$getData->kode_transaksi,
                                  'getCara'=>$getData->metode_bayar,
                                  'ruteNow'=>$ruteNow,
                                  'jml_notif'=>$jml_notif]);
  }

  public function pencarianItem(Request $request)
  {
    $keyword = $request->kolomCari;
    $ruteNow = '/en-pencarian-item?kolomCari='.$keyword;
    $barangs = Barang::where('nama', 'like', '%'.$keyword.'%')->orWhere('kategori', 'like', '%'.$keyword.'%')->get();
    // $acakBarangs = $barangs->shuffle();
    $jml_notif = Master::where('username', Session::get('username'))->count();
    return view('pencarian-item', ['acakBarangs'=>$barangs,
                                  'keyword'=>$keyword,
                                  'ruteNow'=>$ruteNow,
                                  'jml_notif'=>$jml_notif]);
  }

  public function transaksi()
  {
    $tes = Master::all();
    foreach($tes as $t) {
      $waktu2 = Carbon::now('Asia/Jakarta');
      if ($waktu2 > $t->batas_waktu2) {
        $t->batas_waktu3 = 'Kedaluwarsa';
        $t->save();
      }
      else {
        $t->batas_waktu3 = 'Buruan bayar atuh';
        $t->save();
      }
    }
    return redirect('transaksi2');
  }

  public function transaksi2()
  {
    $status = Master::all();
    $ruteNow = '/en-transaksi';
    return view('transaksi2', ['status'=>$status, 'ruteNow'=>$ruteNow]);
  }

  public function transaksiDetail($id)
  {
    $status1 = Master::where('id', $id)->get();
    $ruteNow = '/en-transaksi-detail/'.$id;
    return view('transaksi-detail', ['status'=>$status1, 'ruteNow'=>$ruteNow]);
  }

  public function transaksiBatal($id)
  {
    $batal = Master::where('id', $id)->first();
    $batal->batas_waktu3 = 'Kedaluwarsa';
    $batal->save();
    return redirect()->back();
  }

  public function transaksiHapus($id)
  {
    $hapus = Master::where('id', $id)->first();
    $hapus->delete();
    return redirect('/transaksi');
  }

  public function chat()
  {
    $jml_notif = Master::where('username', Session::get('username'))->count();
    return view('chatbot', ['jml_notif'=>$jml_notif]);
  }
  // EEEEEEEE    NNN    NN      GGGGGG     LL          II    SSSSSS    HH     HH
  // EEE         NNNNN  NN    GGG          LL          II    SS        HH     HH
  // EEEEEEEE    NN  NN NN   GG    GGGG    LL          II    SSSSSS    HHHHHHHHH
  // EEE         NN   NNNN    GG     GG    LL          II        SS    HH     HH
  // EEEEEEEE    NN    NNN     GGGGGGG     LLLLLLLL    II    SSSSSS    HH     HH
  public function enHome()
  {
    $apaan = Barang::find([3,4,7,8,11,12]);
    $apaan2 = $apaan->shuffle();
    $jml_notif = Master::where('username', Session::get('username'))->count();

    $namaLama = ["Chikiballs Keju", "Susu F&N evaporasi 390gr"];
    $namaBaru = ["Chikiballs Cheese", "Evaporated F&N Milk 390gr"];
    $ruteNow = '/home';
    return view('english.en-home', ['apaan'=>$apaan2,
                                    'jml_notif'=>$jml_notif,
                                    'namaBaru'=>$namaBaru,
                                    'namaLama'=>$namaLama,
                                    'ruteNow'=>$ruteNow]);
  }

  public function enDaftar(Request $request)
  {
    if(Akun::where('username', $request->username)->exists()) {
      Session::flash('regisFail', "<b>Register Fail!</b> <br> Username <b><i>".$request->username."</b></i>
                                  exists! <br> Please don't imitate (h3h3).");
      return redirect()->back()->with(compact('regisFail'));
    }
    else {
      //DAFTAR AKUN
      Akun::create([
        'username' => $request->username,
        'password' => $request->password,
        'nohp' => $request->nohp
      ]);
      Session::flash('regisSucc', "<b>Register success</b> <br>
                                    as <b><i>".$request->username."</i></b> (h3h3).");
      return redirect()->back()->with(compact('regisSucc'));
    }

  }

  public function enLogin(Request $request)
  {
    $username = $request->input('username');
    $password = $request->input('password');

    $data = Akun::where('username', $username)->where('password', $password)->first();
    $data2 = Akun::where('username', $username)->first();
    $data3 = Akun::where('username', $username)->where('password', '!=', $password)->first();

    if ($data) {
      Session::put('username', $data->username);
      Session::put('nohp', $data->nohp);
      Session::put('chat', ' ');
      return redirect()->back()->with(compact('chat'));
    }
    elseif (!$data2) {
      Session::flash('userSalah', "Username <b><i>".$request->username."</i></b> not listed.");
      return redirect()->back()->with(compact('userSalah'));
    }
    elseif ($data3) {
      Session::flash('passSalah', "Password incorrect.");
      return redirect()->back()->with(compact('passSalah'));
    }
  }

  public function enLogout()
  {
    Session::flush();
    return redirect('/en-home');
  }

  public function enKomputer()
  {
    $komputer = Barang::find([1,2,3,4]);
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/kategori-komputer';
    return view('english.en-kategori-komputer', ['barang'=>$komputer,
                                                'ruteNow'=>$ruteNow,
                                                'jml_notif'=>$jml_notif]);
  }

  public function enHandphone()
  {
    $handphone = Barang::find([5,6,7,8]);
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/kategori-handphone';
    return view('english.en-kategori-handphone', ['barang'=>$handphone,
                                                  'ruteNow'=>$ruteNow,
                                                  'jml_notif'=>$jml_notif]);
  }

  public function enMakanminum()
  {
    $makanminum = Barang::find([9,10,11,12]);
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/kategori-makanminum';
    $namaLama = ["Chikiballs Keju", "Susu F&N evaporasi 390gr", "Baso Aci Tulang Rungu"];
    $namaBaru = ["Chikiballs Cheese", "Evaporated F&N Milk 390gr", "Sago Flour Meatballs Rangu Bones"];
    return view('english.en-kategori-makanminum', ['barang'=>$makanminum,
                                                  'namaBaru'=>$namaBaru,
                                                  'namaLama'=>$namaLama,
                                                  'ruteNow'=>$ruteNow,
                                                  'jml_notif'=>$jml_notif]);
  }

  public function enKategoriesItem($id)
  {
    $kategoriesItem = Barang::where('id',$id)->get();
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/kategori-item/'.$id;
    $namaLama = ["Chikiballs Keju", "Susu F&N evaporasi 390gr", "Baso Aci Tulang Rungu"];
    $namaBaru = ["Chikiballs Cheese", "Evaporated F&N Milk 390gr", "Sago Flour Meatballs Rangu Bones"];
    $infoLama = ["baru", "bekas", "komputer", "makanan", "minuman"];
    $infoBaru = ["new", "secondhand", "computer", "food", "drink"];
    return view('english.en-item-kategories', ['barang2'=>$kategoriesItem,
                                              'namaBaru'=>$namaBaru, 'namaLama'=>$namaLama,
                                              'infoBaru'=>$infoBaru, 'infoLama'=>$infoLama,
                                              'ruteNow'=>$ruteNow, 'jml_notif'=>$jml_notif]);
  }

  public function enKeranjangSatu(Request $request)
  {
    $nama_barang = $request->nama_barang;
    Session::put('nama_barang', $request->nama_barang);

    $jml_barang = $request->jml_barang;
    Session::put('jml_barang', $request->jml_barang);

    $harga_barang = filter_var($request->harga_barang, FILTER_SANITIZE_NUMBER_INT);
    Session::put('harga_barang', $harga_barang);
    $gbr_barang = $request->gbr_barang;
    return view('english.en-keranjang-satu', ['nama_barang'=>$nama_barang,
                                  'jml_barang'=>$jml_barang,
                                  'harga_barang'=>$harga_barang,
                                  'gbr_barang'=>$gbr_barang]);
  }

  public function enKeranjangSatuHalf(Request $request)
  {
    Session::put('alamat_rumah', $request->alamat_rumah);
    Session::put('kecamatan', $request->kecamatan);
    Session::put('kota', $request->kota);
    Session::put('provinsi', $request->provinsi);

    Session::put('catatan', $request->catatan);
    $kurir = $request->kurir;
    $kurirOnly = explode('-',$kurir);
    Session::put('kurir', $kurirOnly[0]);
    // RINCIAN HARGA
    Session::put('subhargaBarang', $request->subhargaBarang2);
    Session::put('ongkosKirim', $request->ongkosKirim);
    Session::put('totalBayar', $request->totalBayar);

    return redirect('en-keranjang-dua');
  }

  public function enKeranjangDua()
  {
    $nama = ["Logitech G402 Hyperion Fury", "WD SSD Green Sata3 240gb",
            "Monitor Dell 19 inch", "Nvidia GTX650", "Charger Baseus Fast Charging",
            "Case Iphone 6/6s/7", "Powerbank UNEED 10k mAH", "Redmi Note 9 4/64",
            "Sago Flour Meatballs Rangu Bones", "Kombucha HEAL X BURGREENS", "Chikiballs Cheese",
            "Evaporated F&N Milk 390gr"];
    $nama_len = count($nama);
    // BARANG_ID
    for ($i=0; $i < $nama_len; $i++) {
      if( Session::get('nama_barang') == $nama[$i] ) {
        Session::put('id_barang', $i+=1);
      }
    }

    return view('english.en-keranjang-dua');
  }

  public function enInsertData(Request $request)
  {
    // IDENTITAS
    $username3 = $request->username3;
    $nohp3 = $request->nohp3;
    // ALAMAT
    $alamat_rumah3 = $request->alamat_rumah3;
    $kecamatan3 = $request->kecamatan3;
    $kota3 = $request->kota3;
    $provinsi3 = $request->provinsi3;
    // DETAIL BARANG
    $nama_barang3 = $request->nama_barang3;
    $jml_barang3 = $request->jml_barang3;
    $catatan3 = $request->catatan3;
    $kurir3 = $request->kurir3;
    // RINCIAN BAYAR
    $total_harga3 = $request->total_harga3;
    $ongkos_kirim3 = $request->ongkos_kirim3;
    $total_bayar3 = $request->total_bayar3;
    // ENTAHLAH APAAN NAMANYA
    $metode_bayar3 = $request->caraBayar;
    $batas_waktu3 = $request->batas_waktu3;
    $batas_waktu4 = $request->batas_waktu4;
    $kode_transaksi3 = $request->kode_transaksi3;
    // ID BARANG
    $id_barang3 = Session::get('id_barang');

    Master::create([
      'username' => $username3,
      'nohp' => $nohp3,

      'alamat_rumah' => $alamat_rumah3,
      'kecamatan' => $kecamatan3,
      'kota' => $kota3,
      'provinsi' => $provinsi3,

      'barang_id' => $id_barang3,
      'nama_barang' => $nama_barang3,
      'jml_barang' => $jml_barang3,
      'kurir' => $kurir3,

      'total_harga' => $total_harga3,
      'ongkos_kirim' => $ongkos_kirim3,
      'total_bayar' => $total_bayar3,

      'metode_bayar' => $metode_bayar3,
      'batas_waktu' => $batas_waktu3,
      'batas_waktu2' => $batas_waktu4,
      'batas_waktu3' => 'Buruan bayar atuh',
      'kode_transaksi' => $kode_transaksi3,
      'catatan' => $catatan3
    ]);
    return redirect('en-keranjang-tiga');
  }

  public function enKeranjangTiga(Request $request)
  {
    $getData = Master::latest('id')->first();
    $jml_notif = Master::where('username', Session::get('username'))->count();
    $ruteNow = '/keranjang-tiga';
    $bulanLama = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                  "Agustus", "September", "Oktober", "November", "Desember"];
    $bulanBaru = ["January", "February", "March", "April", "May", "June", "July",
                  "August", "September", "October", "November", "December"];
    return view('english.en-keranjang-tiga', ['getTime'=>$getData->batas_waktu,
                                  'getTagihan'=>$getData->total_bayar,
                                  'getKode'=>$getData->kode_transaksi,
                                  'getCara'=>$getData->metode_bayar,
                                  'bulanLama'=>$bulanLama,
                                  'bulanBaru'=>$bulanBaru,
                                  'ruteNow'=>$ruteNow,
                                  'jml_notif'=>$jml_notif]);
  }

  public function enTransaksi()
  {
    $tes = Master::all();
    foreach($tes as $t) {
      $waktu2 = Carbon::now('Asia/Jakarta');
      if ($waktu2 > $t->batas_waktu2) {
        $t->batas_waktu3 = 'Kedaluwarsa';
        $t->save();
      }
      else {
        $t->batas_waktu3 = 'Go get ur mom credit card.';
        $t->save();
      }
    }
    return redirect('en-transaksi2');
  }

  public function enTransaksi2()
  {
    $status = Master::all();
    $ruteNow = '/transaksi';
    $bulanLama = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                  "Agustus", "September", "Oktober", "November", "Desember"];
    $bulanBaru = ["January", "February", "March", "April", "May", "June", "July",
                  "August", "September", "October", "November", "December"];
    return view('english.en-transaksi2',['status'=>$status,
                                        'bulanLama'=>$bulanLama,
                                        'bulanBaru'=>$bulanBaru,
                                        'ruteNow'=>$ruteNow]);
  }

  public function enTransaksiDetail($id)
  {
    $status1 = Master::where('id', $id)->get();
    $ruteNow = '/transaksi-detail/'.$id;
    return view('english.en-transaksi-detail', ['status'=>$status1,
                                                'ruteNow'=>$ruteNow]);
  }

  public function enTransaksiBatal($id)
  {
    $batal = Master::where('id', $id)->first();
    $batal->batas_waktu3 = 'Kedaluwarsa';
    $batal->save();
    return redirect()->back();
  }

  public function enTransaksiHapus($id)
  {
    $hapus = Master::where('id', $id)->first();
    $hapus->delete();
    return redirect('/en-transaksi');
  }

  public function enPencarianItem(Request $request)
  {
    $ruteNow = '/pencarian-item?kolomCari='.$request->kolomCari;
    $keyword = $request->kolomCari;
    $infoLama = ["komputer", "makanan", "minuman"];
    $infoBaru = ["computer", "food", "drink"];
    $filterKeyword = str_replace($infoBaru, $infoLama, $keyword);
    $barangs = Barang::where('nama', 'like', '%'.$filterKeyword.'%')->orWhere('kategori', 'like', '%'.$filterKeyword.'%')->get();

    $namaLama = ["Chikiballs Keju", "Susu F&N evaporasi 390gr", "Baso Aci Tulang Rungu"];
    $namaBaru = ["Chikiballs Cheese", "Evaporated F&N Milk 390gr", "Sago Flour Meatballs Rangu Bones"];
    $jml_notif = Master::where('username', Session::get('username'))->count();
    return view('english.en-pencarian-item', ['acakBarangs'=>$barangs,
                                              'keyword'=>$keyword,
                                              'namaLama'=>$namaLama,
                                              'namaBaru'=>$namaBaru,
                                              'ruteNow'=>$ruteNow,
                                              'jml_notif'=>$jml_notif]);
  }
}
