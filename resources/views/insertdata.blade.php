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
    {{ csrf_field() }}
    <input type="hidden" name="username3" value="{{ Session::get('username') }}">
    <input type="hidden" name="nohp3" value="{{ Session::get('nohp') }}">

    <input type="hidden" name="alamat_rumah3" value="{{ Session::get('alamat_rumah') }}">
    <input type="hidden" name="kecamatan3" value="{{ Session::get('kecamatan') }}">
    <input type="hidden" name="kota3" value="{{ Session::get('kota') }}">
    <input type="hidden" name="provinsi3" value="{{ Session::get('provinsi') }}">

    <input type="hidden" name="nama_barang3" value="{{ Session::get('nama_barang') }}">
    <input type="hidden" name="jml_barang3" value="{{ Session::get('jml_barang') }}">
    <input type="hidden" name="kurir3" value="{{ Session::get('kurir') }}">

    <input type="hidden" name="total_harga3" value="{{ Session::get('subhargaBarang') }}">
    <input type="hidden" name="ongkos_kirim3" value="{{ Session::get('ongkosKirim') }}">
    <input type="hidden" name="total_bayar3" value="{{ Session::get('totalBayar') }}">

    <input type="hidden" name="metode_bayar3" value="{{ Session::get('metode_bayar') }}">
    <input type="hidden" name="batas_waktu3" id="timer" value="">
    <input type="hidden" name="batas_waktu4" id="timer2" value="">
    <input type="hidden" name="kode_transaksi3" id="kode" value="">
    <button type="submit" id="autoclick"></button>
    {{ Form::close() }}
  </body>

  <script src="{{ asset('js/batasWaktu.js') }}"></script>

</html>
