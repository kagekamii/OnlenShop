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
  .setengah {
    overflow: hidden;
    height: 70px;
  }
  .setengah.show {
    height: auto;
  }
  .nocopy {
    user-select: none;
  }
  input[type=radio] {
    appearance: none;
  }
  .segitiga-bawah {
    width: 0;
    height: 0;
    top: 20px;
    position: relative;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid white;
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
            <input type="radio" id="virtual" name="caraBayar" value="Virtual Account" onclick="pilihCara();">
            <span class="ml-2"> Virtual Account </span> <br>
            <img class="ml-3" src="{{ asset('img/bayar-bank.png') }}" alt="">
          </div>
        </label>

      </div>
      <br>
      <div class="col-md bg-secondary p-3 rounded">
        <h5> Metode bayar yang lain </h5>
        <hr>

        <div class="transfer setengah nocopy">
          <label class="caraBayar w-100 p-2 pb-3" for="transfer">
            <input type="radio" id="transfer" name="caraBayar" value="" onclick="bayarDengan(event);">
            <span class="ml-2"> Transfer Bank </span> <br>
            <img class="ml-3" src="{{ asset('img/bayar-bank.png') }}" alt="">
            <span class="segitiga-bawah ml-1"></span>
            <div class="ml-2 mt-3 pl-2">
              <select class="form-control w-50" name="transfer" onchange="pilihCara1();">
                <option value="" selected> -- pilih -- </option>
                <option value="BCA"> BCA </option>
                <option value="Mandiri"> Mandiri </option>
                <option value="BRI Virtual Akun"> BRI Virtual Akun </option>
                <option value="BNI"> BNI </option>
                <option value="BNI Syariah"> BNI Syariah </option>
              </select>
            </div>
          </label>
        </div>

        <div class="gerai setengah nocopy">
          <label for="gerai" class="caraBayar w-100 p-2 pb-3">
            <input type="radio" id="gerai" name="caraBayar" value="" onclick="bayarDengan(event);">
            <span class="ml-2"> Gerai </span> <br>
            <img class="ml-3" src="{{ asset('img/bayar-indomaret.png') }}" alt="">
            <img class="ml-1" src="{{ asset('img/bayar-alfamart.png') }}" alt="" width="210px">
            <span class="segitiga-bawah ml-1"></span>
            <div class="ml-2 mt-3 pl-2">
              <select class="form-control w-50" name="gerai" onchange="pilihCara2();">
                <option value="" selected> -- pilih -- </option>
                <option value="Indomaret"> Indomaret </option>
                <option value="Alfamart"> Alfamart </option>
                <option value="Alfamidi"> Alfamidi </option>
                <option value="DANDAN"> DANDAN </option>
                <option value="Lawson"> Lawson </option>
              </select>
            </div>
          </label>
        </div>



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
            <button id="submitDua" class="btn btn-danger mt-3" type="submit">
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
<script src="{{ asset('js/popover.js') }}"></script>
<script src="{{ asset('js/requiredInputs.js') }}"></script>

<!~~~~~~~~~~~~~~~~~~~NANTI GW PINDAHIN, JANGAN DIUBAH SCRIPT DI BAWAH~~~~~~~~~~~~~~~>
<script type="text/javascript">
  function bayarDengan(ev) {
    var b = ev.target.id;
    $('#pilihan').html("");
    $('.'+b).toggleClass('show');
  }
</script>
<script type="text/javascript">
  function pilihCara() {
    let c = $('#virtual');
    $('#pilihan').html(c.val());
  }
</script>
<script type="text/javascript">
  function pilihCara1() {
    let d = $("select[name=transfer]");
    if( d.click() ) {
      $('#transfer').val(d.val());
      $('#pilihan').html(d.val());
    }
  }
</script>
<script type="text/javascript">
  function pilihCara2() {
    let e = $("select[name=gerai]");
    if( e.click() ) {
      $('#gerai').val(e.val());
      $('#pilihan').html(e.val());
    }
  }
</script>
<script type="text/javascript">

</script>

</html>
