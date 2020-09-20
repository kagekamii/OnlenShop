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

<style media="screen">
  td {
    vertical-align: top;
  }
</style>

<header>
  <div class="col-md bg-kuning text-right">
    <a href="/about" class="text-ungu1 mr-2 small" data-toggle="popover" data-trigger="hover"
    data-placement="right" data-content="punten">
      About OnlenShop
    </a>
    <a href="/home" class="text-ungu1 mr-2 small">
      Indonesia
    </a>
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

  <div class="row m-4">

    <div class="col-md-2 bg-info text-light">
      Filter
      <div class="bg-light text-dark text-left">

        <ul class="tanpa-dot" id="filters">
          Price
          <li>
            <input type="checkbox" id="filter-kategoria" value="400-lebih" checked>
            <label for="filter-kategoria"> > Rp 400.000 </label>
          </li>
          <li>
            <input type="checkbox" id="filter-kategorib" value="400-kurang" checked>
            <label for="filter-kategorib"> < Rp 400.000 </label>
          </li>
        </ul>

      </div>
    </div>

    <div class="col-md ml-2">

      <table cellpadding='5' >
        <tr>
          @foreach($barang as $b)
          <td class="{{ $b->filter1 }}">
            <div class="card" style="width:200px">
              <a href="/en-kategori-item/{{ $b->id }}">
                <img class="card-img-top" src="img/{{ $b->gambar }}" alt="Card image" height="210px">
              </a>
              <div class="card-body">
                <a href="/en-kategori-item/{{ $b->id }}" class="text-dark"> {{ $b->nama }} </a>
                <h5 class="card-text"> Rp {{ number_format($b->harga) }} </h5>
              </div>
              <div class="card-footer">
                <span class="small"> {{ $b->lokasi }} </span>
              </div>
            </div>
          </td>
          @endforeach
        </tr>
      </table>

    </div>

  </div>

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
<!checkbox filter>
<script type="text/javascript">
  $("#filters :checkbox").click(function() {
     $("td").hide();
     $("#filters :checkbox:checked").each(function() {
         $("." + $(this).val()).show();
     });
  });
</script>

</html>
