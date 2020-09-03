<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
    <!--Bootstrap JS-->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title></title>
  </head>

  <style media="screen">
    button {
      display: none;
    }
    input[type=text] {
      display: none;
    }
  </style>

  <header>
    <div class="col-md bg-kuning text-right">
      <a href="#" class="text-ungu1 mr-2 small"> Tentang OnlenShop </a>
    </div>
  </header>

  <body class="bg-navy">
    {{ Form::open(['url' => '/insertData2']) }}
    <input type="text" name="username3" value="{{ Session::get('username') }}">
    <input type="text" name="nohp3" value="{{ Session::get('nohp') }}">

    <input type="text" name="alamat_rumah3" value="{{ Session::get('alamat_rumah') }}">
    <input type="text" name="kecamatan3" value="{{ Session::get('kecamatan') }}">
    <input type="text" name="kota3" value="{{ Session::get('kota') }}">
    <input type="text" name="provinsi3" value="{{ Session::get('provinsi') }}">

    <input type="text" name="nama_barang3" value="{{ Session::get('nama_barang') }}">
    <input type="text" name="jml_barang3" value="{{ Session::get('jml_barang') }}">
    <input type="text" name="kurir3" value="{{ Session::get('kurir') }}">

    <input type="text" name="total_harga3" value="{{ Session::get('subhargaBarang') }}">
    <input type="text" name="ongkos_kirim3" value="{{ Session::get('ongkosKirim') }}">
    <input type="text" name="total_bayar3" value="{{ Session::get('totalBayar') }}">

    <input type="text" name="metode_bayar3" value="{{ Session::get('metode_bayar') }}">
    <input type="text" name="batas_waktu3" id="timer" value="">
    <input type="text" name="kode_transaksi3" id="kode" value="">
    <button type="submit" id="autoclick"></button>
    {{ Form::close() }}
  </body>

  <script src="{{ asset('js/batasWaktu.js') }}"></script>

</html>
