<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/master.css">

  <!--Bootstrap JS-->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('input').attr('autocomplete','off');
      });
  </script>

  <title></title>
</head>

<header>
  <div class="col-md bg-kuning text-right">
    <a href="/about" class="text-ungu1 mr-2 small" data-toggle="popover" data-trigger="hover"
    data-placement="right" data-content="korone no.1 fix">
      Tentang OnlenShop
    </a>
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

  <div class="row m-4">

    <! Slideshow>
      <div id="demo" class="col-md carousel carousel-fade bg-orangreen rounded" data-ride="carousel">
        <!--Indicator-->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!--slideshow-->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/slide1.jpg" alt="pic-1">
            <div class="carousel-caption">
              <h3 class=""> </h3>
              <h5 class=""> </h5>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/slide2.jpg" alt="pic-2">
            <div class="carousel-caption">
              <h4 class=""> </h4>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/slide3.jpg" alt="pic-3">
            <div class="carousel-caption">
              <h4 class=""> </h4>
              <p></p>
            </div>
          </div>
        </div>

        <!--slideshow Left & Right controls-->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>

      <! Profile Akun>
        <div id="profil_user" class="col-md-3 bg-blue1 ml-4 rounded">
          <p class="text-light tambah-text">
            Username :
            {{-- if ini sama kaya yang di atas --}}
            @if(Session::get('username') != null)
            {{Session::get('username')}}
            @else
            <a data-toggle="modal" href="#myLogin">silahkan login</a>
            @endif

            <br>
            Sisa Saldo : 0 <br>
            Kupon Saya : 0
          </p>
        </div>

  </div>

  <div class="row m-4">
    <! List Barang >
    @foreach($apaan as $a)
    <div class="card" style="width:200px">
      <a href="/kategori-item/{{ $a->id }}">
        <img class="card-img-top" src="img/{{ $a->gambar }}" alt="Card image" style="width:100%">
      </a>
      <div class="card-body">
        <a href="/kategori-item/{{ $a->id }}" class="text-dark"> {{ $a->nama }} </a>
        <h5 class="card-text"> Rp {{ number_format($a->harga) }} </h5>
      </div>
      <div class="card-footer">
        <span class="small"> {{ $a->lokasi }} </span>
      </div>
    </div>
    &emsp;
    @endforeach

  </div>

  {{-- modal gua pindahin ke bawah ga usah deketan sama buttonya ko pusing aing liatnya disimpen diatas --}}
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
<script src="{{ asset('js/popover.js') }}"></script>
<script src="{{ asset('js/autofocusModal.js') }}"></script>

<script type="text/javascript">
  // edannnnnnnnnnnnnn logoutnya pusing bet
  $(function() {
    if( $('#ubahLogout').hasClass("active") ) {
      $("#ubahLogout").load("js/logoutButton.php");
    }
  });
</script>

</html>
