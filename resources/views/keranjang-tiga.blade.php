<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" value="{{ csrf_token() }}" />
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
  .content-center {
    margin-left: auto;
    margin-right: auto;
  }
</style>

<header>
  <div class="col-md bg-kuning text-right">
    <a href="#" class="text-ungu1 mr-2 small"> Tentang OnlenShop </a>
  </div>

  <nav class="col-md navbar navbar-expand-md bg-light justify-content-center border">
    <! LOGO>
    <a href="/home" class="mr-5"> Logo </a>

    <! KATEGORI>
    <div class="dropdown">
      <button type="button" class="btn btn-orange2 btn-sm dropdown-toggle" data-toggle="dropdown"> Kategori
      </button>
      <div class="dropdown-menu bg-sky">
        <a href=
        "@if(Session::get('username') != null)
           /kategori-komputer
         @else
           #
         @endif" class="dropdown-item"> Komputer </a>
        <a href=
        "@if(Session::get('username') != null)
           /kategori-handphone
         @else
           #
         @endif" class="dropdown-item"> Handphone </a>
        <a href=
        "@if(Session::get('username') != null)
           /kategori-makanminum
         @else
           #
         @endif" class="dropdown-item"> Makanan & Minuman </a>
      </div>
    </div>

    <! SEARCH BOX>
      <input class="searchbox" type="text" name="kolomCari" placeholder="masukkan kata kunci...">
      <button type="button" class="btn-orange1 mr-5" name="submitCari"> <img src="img/search.png" width="20">
      </button>

    <! KERANJANG & CHAT>
      <button type="button" class="no-border kanan mr-2" name="button"> <img src="img/keranjang.png" width="20">
      </button>
      <button type="button" class="no-border" name="button"> <img src="img/message.png" width="20"> </button>

      {{-- kalo mau nampilin div pake if aja ga usah manggil ajax. tapi divnya gua simpen dulu aja ya
        btw anjing gua simpen modal daftar sama login dibawah deket </body>  --}}
      <div id="ubahLogout" class="{{ session('tab2_active') ? 'active' : null }}">

        {{-- if ini nge check SESSION dengan varibale USERNAME ada VALUENYA atau null --}}
        @if(Session::get('username') != null)
        {{-- kalo ada valuenya tampilin tombol logout --}}
        <div class="kanan">
          {{ Session::get('username') }}
          <button id="routeLogout" class="no-border bg-kuning2 rounded"> Logout </button>
        </div>
        @else
        {{-- kallo null tampilin tombol daftar dan login --}}
        <button type="button" class="kanan mr-2 no-border bg-kuning2 rounded" data-toggle="modal"href="#myRegister">
          Daftar
        </button>
        <button type="button" class="no-border bg-green2 rounded" data-toggle="modal" href="#myLogin">
          Login
        </button>
        @endif

      </div>

  </nav>
</header>

<body class="bg-navy">

  <div class="m-5 text-light">

    <div class="col-md-8 row content-center border p-3">
      <img src="{{ asset('img/privasi.png') }}" alt="gambar" width="120px">
      <div class="col-md" style="word-wrap: normal;">
        <strong class="ml-4"> Selalu waspada terhadap pihak tidak bertanggung jawab </strong> <br>
        <ul class="mb-1">
          <li> Jangan lakukan pembayaran dengan nominal yang berbeda dengan yang tertera pada tagihan kamu. </li>
          <li> Jangan lakukan transfer di luar nomor rekening atas nama Abang Iggy. </li>
        </ul>
        <a href="#" class="text-green1 ml-4" data-toggle="popover" data-trigger="focus"
        data-placement="right" data-content="Cari sendiri bos.">
          Pelajari selengkapnya
        </a>
      </div>
    </div>

    <div class="col-md-8 bg-light content-center border p-3 mt-4">
      <span class="text-dark" style="font-size: large; font-weight: 600;">
        Pembayaran via aaa <input type="hidden" id="user" value="{{ Session::get('username') }}">
      </span>
    </div>
    <div class="col-md-8 bg-secondary text-center content-center border p-3">
      <p>
        Batas pembayaran: <strong> {{ $getTime }} </strong>
        <br><br>

        Jumlah Tagihan:
        <h4 class="mt-n3"> Rp {{ $getTagihan}} </h4>
        <br>

        Nomor tagihan:
        <h4 class="text-turquoise"> {{ $getKode }} </h4>
      </p>
    </div>
    <div class="col-md-8 bg-light content-center border p-3">
      <span class="text-dark" style="font-size: large; font-weight: 600;">
        Petunjuk pembayaran
      </span>
      <div class="col-md bg-secondary content-center p-3 mt-2">
        <ul>
          <li> 1. Yes </li>
          <li> 2. No </li>
          <li> 3. Yes'nt </li>
        </ul>
      </div>
      <p class="text-dark mt-2">
        Pembelianmu dicatat dengan nomor tagihan pembayaran <span class="text-turquoise">{{ $getKode }}</span>.
        Jika kamu menghadapi kendala mengenai pembayaran, silahkan langsung berdoa kepada Yang Maha Kuasa.
      </p>
      <button class="btn btn-danger w-100" type="button" name="button"> Lihat Tagihan Pembayaran </button>
    </div>

  </div>

</body>

<footer>
  <div class="bg-info">
    &emsp;start 11 agustus 2020, tapi gk tiap hari dikerjain :'v
    <strong class="float-right mr-1"> [Copyright, Master Paladin 2020] </strong>
  </div>
</footer>

<script src="{{ asset('js/popover.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var tanggal = new Date().getDate()+1;
    var namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                      "Agustus", "September", "Oktober", "November", "Desember"];
    var bulan = namaBulan[new Date().getMonth()];
    var waktu = new Date().toLocaleTimeString('it-IT');
    var batasWaktu = waktu+', '+tanggal+' '+bulan+' 2020';

    $('#timer').html( batasWaktu );

    // var x = setInterval(function() {
    //   var sekarang = new Date().getTime();
    //   $('#timer').html(sekarang);
    // }, 1000);
  });
</script>

</html>
