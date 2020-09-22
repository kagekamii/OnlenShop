<header>
  <div class="col-md bg-kuning text-right">

    <div class="dropdown">
      <a href="/about" class="text-ungu1 mr-2 small" data-toggle="popover" data-trigger="hover"
      data-placement="right" data-content="punten">
        About OnlenShop
      </a>
      <span class="text-ungu1 mr-2 small dropdown-toggle" data-toggle="dropdown"> Language </span>

      <div class="dropdown-menu">
        <a href="{{ $ruteNow or '#' }}" class="text-ungu1 mr-2 small dropdown-item">
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
      {{ Form::open(['url'=>'/en-pencarian-item', 'method'=>'get']) }}
      {{ csrf_field() }}
        <div class="input-group">
          <input class="searchbox" type="text" name="kolomCari" value="{{ isset($keyword) ? $keyword:null }}"
          placeholder="insert item name/category. (e.g. food)" required>
          <button type="submit" class="btn-orange1 mr-5">
            <img src="img/search.png" width="20">
          </button>
        </div>
      {{ Form::close() }}

    <! KERANJANG & CHAT>
      <a href="/en-transaksi" class="keranjangchat chat-atas kanan mr-3" title="Transaction">
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
