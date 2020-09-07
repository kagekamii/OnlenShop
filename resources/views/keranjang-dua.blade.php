<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">

  <!--Bootstrap JS-->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('input').attr('autocomplete','off');
      });
  </script>

  <title></title>
</head>

<style media="screen">
  hr {
    background-color: #ddd;
  }
</style>

<header>
  <div class="col-md bg-kuning text-right">
    <a href="#" class="text-ungu1 mr-2 small"> Tentang OnlenShop </a>
  </div>
</header>

<body class="bg-navy">

  <div class="row m-5 text-light justify-content-center">

    <div class="col-md-5 mr-5">
      <div class="col-md bg-secondary p-3 rounded">
      {{ Form::open(['url' => '/insertData', 'method' => 'get']) }}
      {{ csrf_field() }}
        <h5> Rekomendasi buat antum </h5>
        <hr>
        <label class="caraBayar w-100 p-2 pb-3" for="virtual">
          <div class="">
            <input type="radio" id="virtual" name="caraBayar" value="Virtual Account" onclick="bayarDengan(event);" checked>
            Virtual Account <br>
            <img class="ml-3" src="{{ asset('img/bayar-bank.png') }}" alt="">
          </div>
        </label>

      </div>
      <br>
      <div class="col-md bg-secondary p-3 rounded">
        <h5> Metode bayar yang lain </h5>
        <hr>
        <label class="caraBayar w-100 p-2 pb-3" for="transfer">
          <div class="">
            <input type="radio" id="transfer" name="caraBayar" value="Transfer Bank" onclick="bayarDengan(event);">
            Transfer Bank <br>
            <img class="ml-3" src="{{ asset('img/bayar-bank.png') }}" alt="">
          </div>
        </label>

        <label class="caraBayar w-100 p-2 pb-3" for="gerai">
          <div class="">
            <input type="radio" id="gerai" name="caraBayar" value="Gerai" onclick="bayarDengan(event);">
            Gerai <br>
            <img class="ml-3" src="{{ asset('img/bayar-indomaret.png') }}" alt="">
            <img class="ml-1" src="{{ asset('img/bayar-alfamart.png') }}" alt="" width="210px">
          </div>
          <div class="gerai">

          </div>
        </label>

      </div>
    </div>

    <! TOTAL PEMBAYARAN >
    <div class="col-md-4 bg-blue1 sticky h-100 p-3 rounded">
      <a href="#" class="text-light" data-toggle="popover"
        data-trigger="hover" data-placement="top" data-content="Tentu saja tidak!">
        Punya kode voucher?
      </a>
      <hr>
      <h5> Rincian Harga </h5>

      <table class="w-100" cellpadding='5'>
        <tr>
          <td> Total harga barang </td>
          <td class="text-right">
            Rp <input class="subhargaBarang2" type="text" name="subhargaBarang2" value="{{ Session::get('subhargaBarang') }}">
          </td>
        </tr>
        <tr>
          <td> Ongkos Kirim </td>
          <td class="text-right">
            Rp <input class="subhargaBarang2" type="text" name="ongkosKirim" value="{{ Session::get('ongkosKirim') }}">
          </td>
        </tr>
        <tr>
          <td class="pt-4"> Total Pembayaran </td>
          <td class="pt-4 text-right">
            Rp <input class="subhargaBarang2" type="text" name="totalBayar" value="{{ Session::get('totalBayar') }}">
          </td>
        </tr>
        <tr>
          <td colspan="2" class="text-center">
            <button class="btn btn-danger mt-3" type="submit" name="bayarin">
               Bayar dengan <span id="pilihan"></span>
             </button>
          </td>
        </tr>
      </table>

      <input type="hidden" name="username3" value="{{ Session::get('username') }}">
      <input type="hidden" name="nohp3" value="{{ Session::get('nohp') }}">

      <input type="hidden" name="alamat_rumah3" value="{{ Session::get('alamat_rumah') }}">
      <input type="hidden" name="kecamatan3" value="{{ Session::get('kecamatan') }}">
      <input type="hidden" name="kota3" value="{{ Session::get('kota') }}">
      <input type="hidden" name="provinsi3" value="{{ Session::get('provinsi') }}">

      <input type="hidden" name="nama_barang3" value="{{ Session::get('nama_barang') }}">
      <input type="hidden" name="jml_barang3" value="{{ Session::get('jml_barang') }}">
      <input type="hidden" name="catatan3" value="{{ Session::get('catatan') }}">
      <input type="hidden" name="kurir3" value="{{ Session::get('kurir') }}">

      <input type="hidden" name="total_harga3" value="{{ Session::get('subhargaBarang') }}">
      <input type="hidden" name="ongkos_kirim3" value="{{ Session::get('ongkosKirim') }}">
      <input type="hidden" name="total_bayar3" value="{{ Session::get('totalBayar') }}">

      <input type="hidden" name="metode_bayar3" value="{{ Session::get('metode_bayar') }}">
      <input type="hidden" name="batas_waktu3" id="timer" value="">
      <input type="hidden" name="batas_waktu4" id="timer2" value="">
      <input type="hidden" name="kode_transaksi3" id="kode" value="">

      {{ Form::close() }}
    </div>

  </div>

</body>

<footer>
  <div class="bg-info">
    &emsp;start 11 agustus 2020, tapi gk tiap hari dikerjain :'v
    <strong class="float-right mr-1 footer-text"> [Copyright, Master Paladin 2020] </strong>
  </div>
</footer>

<script src="{{ asset('js/batasWaktu.js') }}"></script>
<script type="text/javascript">
  var a = $('#virtual').val();
  $('#pilihan').html(a);
    function bayarDengan(ev) {
      var a = ev.target.value;
      var b = ev.target.id;
      // $('#'+b).focus(function() {
      //   $('.'+b).html('<p>aaa</p>');
      // }).blur(function() {
      //   $('.'+b).html('');
      // });

      $('#pilihan').html(a);
    }

</script>

</html>
