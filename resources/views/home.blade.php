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
      {{ Form::open(['url'=>'/pencarian-item']) }}
      {{ csrf_field() }}
        <div class="input-group">
          <input class="searchbox" type="text" name="kolomCari" value="{{ isset($keyword) ? $keyword:null }}"
          placeholder="masukkan nama/kategori barang" required>
          <button type="submit" class="btn-orange1 mr-5" name="submitCari">
            <img src="img/search.png" width="20">
          </button>
        </div>
      {{ Form::close() }}

    <! KERANJANG & CHAT>
      <button type="button" class="no-border bg-light kanan mr-2" name="button">
        <img src="img/keranjang.png" width="20">
      </button>
      <button type="button" class="no-border bg-light" name="button">
        <img src="img/message.png" width="20">
      </button>

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
            Nama :
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
  <! DAFTAR MODAL>
    <!-- The Modal -->
    <div class="modal" id="myRegister">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header bg-kuning">
            <h5 class="modal-title">Daftar</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body bg-kuning2">
            <div class="container">

              {{ Form::open(['url' => 'home/daftar']) }}
              {{ csrf_field() }}
              <div class="form-group">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'maks. 20 karakter', 'required']) }}
              </div>

              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="maks. 20 karakter" name="password" required>
              </div>

              <div class="form-group">
                {{ Form::label('nohp', 'No. Handphone:') }}
                {{ Form::text('nohp', '', ['class'=>'form-control', 'placeholder'=>'maks. 20 karakter', 'required']) }}
              </div>

              {{ Form::submit('Daftar', ['class'=>'btn btn-primary']) }}
              {{ Form::close() }}

            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer bg-kuning">
          </div>

        </div>
      </div>
    </div>

    <! LOGIN MODAL>
      <!-- The Modal -->
      <div class="modal" id="myLogin">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-green1">
              <h5 class="modal-title">Login</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body bg-green2">
              <div class="container">

                <form action="/home/login" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" placeholder="maks. 20 karakter" name="username" required>
                  </div>

                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="maks. 20 karakter" name="password"
                      required>
                  </div>

                  <button id="loginClick" type="submit" class="btn btn-primary">Login</button>
                </form>

              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer bg-green1">
            </div>

          </div>
        </div>
      </div>
</body>

<footer>
  <div class="bg-info">
    &emsp;start 11 agustus 2020, tapi gk tiap hari dikerjain :'v
    <strong class="float-right mr-1"> [Copyright, Master Paladin 2020] </strong>
  </div>
</footer>

<script src="js/logoutButton.js"></script>
<script type="text/javascript">
  // edannnnnnnnnnnnnn logoutnya pusing bet
  $(function() {
    if( $('#ubahLogout').hasClass("active") ) {
      $("#ubahLogout").load("js/logoutButton.php");
    }
  });
</script>

</html>
