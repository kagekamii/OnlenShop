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

    <div class="dropdown">
      <a href="/about" class="text-ungu1 mr-2 small" data-toggle="popover" data-trigger="hover"
      data-placement="right" data-content="punten">
        About OnlenShop
      </a>
      <span class="text-ungu1 mr-2 small dropdown-toggle" data-toggle="dropdown"> Language </span>

      <div class="dropdown-menu">
        <a href="/home" class="text-ungu1 mr-2 small dropdown-item">
          Indonesia
        </a>
        <a href="//" class="text-ungu1 mr-2 small dropdown-item">
          English
        </a>
      </div>

    </div>
  </div>

  <nav class="col-md navbar navbar-expand-md bg-light justify-content-center border">
    <! LOGO>
    <a href="/en-home" class="mr-5">
      <img src="{{ asset('img/logo2.png') }}" alt="" width="70px">
    </a>

    <! KATEGORI>
    <div class="dropdown">
      <button type="button" class="btn btn-orange2 btn-sm dropdown-toggle" data-toggle="dropdown"> Category
      </button>
      <div class="dropdown-menu bg-sky">
        <a href="/en-kategori-komputer" class="dropdown-item"> Computer </a>
        <a href="/en-kategori-handphone" class="dropdown-item"> Handphone </a>
        <a href="/en-kategori-makanminum" class="dropdown-item"> Food & Drink </a>
      </div>
    </div>

    <! SEARCH BOX>
      {{ Form::open(['url'=>'/pencarian-item', 'method'=>'get']) }}
      {{ csrf_field() }}
        <div class="input-group">
          <input class="searchbox" type="text" name="kolomCari" value="{{ isset($keyword) ? $keyword:null }}"
          placeholder="insert item name/category" required>
          <button type="submit" class="btn-orange1 mr-5">
            <img src="img/search.png" width="20">
          </button>
        </div>
      {{ Form::close() }}

    <! KERANJANG & CHAT>
      <a href="/transaksi" class="keranjangchat chat-atas kanan mr-3" title="Transaction">
        <img src="{{ asset('img/keranjang.png') }}" width="20">
        <span class="notifikasi smaller"><b> {{ $jml_notif or '0' }} </b></span>
      </a>

      @if(Session::get('chat') != null)
      <a href="/chat" class="keranjangchat" title="Chat">
        <img src="{{ asset('img/message.png') }}" width="20">
      </a>
      @else
      <a href="//" class="keranjangchat" title="Chat">
        <img src="{{ asset('img/message.png') }}" width="20">
      </a>
      @endif


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
          Register
        </button>
        <button type="button" class="no-border bg-green2 rounded" data-toggle="modal" href="#myLogin">
          Login
        </button>
        @endif

      </div>

  </nav>
</header>

<body class="bg-navy">

  @if( Session::get('regisFail') )
  <div class="overlay"></div>
  <div class="alert alert-danger alert-dismissible alerting">
    <button type="button" class="close removeOverlay" data-dismiss="alert">&times;</button>
    {!! Session::get('regisFail') !!}
  </div>
  @elseif( Session::get('regisSucc') )
  <div class="overlay"></div>
  <div class="alert alert-success alert-dismissible alerting">
    <button type="button" class="close removeOverlay" data-dismiss="alert">&times;</button>
    {!! Session::get('regisSucc') !!}
  </div>
  @elseif( Session::get('userSalah') )
  <div class="overlay"></div>
  <div class="alert alert-danger alert-dismissible alerting">
    <button type="button" class="close removeOverlay" data-dismiss="alert">&times;</button>
    {!! Session::get('userSalah') !!}
  </div>
  @elseif( Session::get('passSalah') )
  <div class="overlay"></div>
  <div class="alert alert-danger alert-dismissible alerting">
    <button type="button" class="close removeOverlay" data-dismiss="alert">&times;</button>
    {!! Session::get('passSalah') !!}
  </div>
  @endif

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
            <a data-toggle="modal" href="#myLogin"> ~ </a>
            @endif

            <br>
            Remaining balance : 0 <br>
            My coupon : 0
          </p>
        </div>

  </div>

  <div class="row m-4">
    <! List Barang >
    @foreach($apaan as $a)
    <div class="card" style="width:200px">
      <a href="/en-kategori-item/{{ $a->id }}">
        <img class="card-img-top" src="img/{{ $a->gambar }}" alt="Card image" style="width:100%">
      </a>
      <div class="card-body">
        <a href="/en-kategori-item/{{ $a->id }}" class="text-dark">
          {{ str_replace($namaLama, $namaBaru, $a->nama) }}
        </a>
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
  @include('english.en-modal-login')
  @include('english.en-modal-register')

</body>

<footer>
  <div class="bg-info">
    &emsp;start 11 august 2020, but not everyday doin this :'v
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
<script type="text/javascript">
  $('.removeOverlay').click(function() {
    $(".alerting").addClass('fade');
    $('.overlay').css('display','none');
  });
  setTimeout(function() {
    $(".alerting").addClass('fade');
    $(".alert").alert('close');
    $('.overlay').css('display','none');
  }, 3000);
</script>

</html>
