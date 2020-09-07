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
</style>

<header>
  <div class="col-md bg-kuning text-right">
    <a href="#" class="text-ungu1 mr-2 small"> Tentang OnlenShop </a>
  </div>

  <nav class="col-md navbar navbar-expand-md bg-light justify-content-center border">
    <! LOGO>
    <a href="/home" class="mr-5">
      <img src="{{ asset('img/logo2.png') }}" alt="" width="70px">
    </a>

    <! KATEGORI>
    <div class="dropdown">
      <button type="button" class="btn btn-orange2 btn-sm dropdown-toggle" data-toggle="dropdown"> Kategori
      </button>
      <div class="dropdown-menu bg-sky">
        <a href="/kategori-komputer" class="dropdown-item"> Komputer </a>
        <a href="/kategori-handphone" class="dropdown-item"> Handphone </a>
        <a href="/kategori-makanminum" class="dropdown-item"> Makanan & Minuman </a>
      </div>
    </div>

    <! SEARCH BOX>
      {{ Form::open(['url'=>'/pencarian-item', 'method'=>'get']) }}
      {{ csrf_field() }}
        <div class="input-group">
          <input class="searchbox" type="text" name="kolomCari" value="{{ isset($keyword) ? $keyword:null }}"
          placeholder="masukkan nama/kategori barang" required>
          <button type="submit" class="btn-orange1 mr-5">
            <img src="img/search.png" width="20">
          </button>
        </div>
      {{ Form::close() }}

    <! KERANJANG & CHAT>
      <a href="/transaksi" class="keranjangchat kanan mr-3" title="Transaksi">
        <img src="{{ asset('img/keranjang.png') }}" width="20">
      </a>
      <a href="#" class="keranjangchat" title="Chat">
        <img src="{{ asset('img/message.png') }}" width="20">
      </a>

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

    <h4> Transaksi </h4>
    <br>

    @foreach($status as $t)
      @if( Session::get('username') === $t->username )
      <div class="row col-md-8 bg-blue2 text-brown p-3">
        <div class="col-md">
          <span class="smaller text-blue"> NO. TAGIHAN </span> <br>
          <span> {{ $t->kode_transaksi }} </span> <br>
          <span class="small text-blue"> {{ $t->batas_waktu }} </span>
        </div>
        <div class="col-md">
          <span class="smaller text-blue"> TOTAL TAGIHAN </span> <br>
          <span> Rp {{ $t->total_bayar }} </span>
        </div>
        <div class="col-md">
          <span class="smaller text-blue"> STATUS TAGIHAN </span> <br>
          <span class="status"> {{ $t->batas_waktu3 }} </span>
        </div>
      </div>

      <div class="row col-md-8 bg-green3 text-brown p-3">
        <div class="col-md">
          <span class="smaller text-blue"> BARANG </span> <br>
          <span> {{ $t->nama_barang }} </span> <br>
        </div>
        <div class="col-md">
          <span class="smaller text-blue"> PELAPAK </span> <br>
          <span> Abang Iggy </span>
        </div>
        <div class="col-md mt-3">
          <a href="/transaksi-detail" class="p-2 text-dark bg-wat rounded" style="text-decoration: none;">
            Lihat Detail
          </a>
        </div>
      </div>
      <br>
      @endif
    @endforeach

  </div>

  @include('modal-login')
  @include('modal-register')

</body>

<footer>
  <div class="bg-info">
    &emsp;start 11 agustus 2020, tapi gk tiap hari dikerjain :'v
    <strong class="float-right mr-1 footer-text"> [Copyright, Master Paladin 2020] </strong>
  </div>
</footer>

<script src="js/logoutButton.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  //   var waktu = $('.waktu').val();
  //   var tes = new Date(waktu);
  //   $('.waktu2').val(tes1);
  //   if (tes2 >= tes) {
  //     $('.status').html("Kedaluwarsa");
  //     $('.status2').html("Dibatalkan");
  //   }
  //   else if (tes2 < tes) {
  //     $('.status').html("Cepetan bayar atuh");
  //     $('.status2').html("Niat beli gk?");
  //   }
  });
</script>

</html>
