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
  td {
    padding-left: 30px;
    padding-right: 5px;
  }
  .input-hide {
    border: 0;
    background-color: inherit;
    color: white;
  }
  hr {
    background-color: #ddd;
  }
</style>

<header>
  <div class="col-md bg-kuning text-right">
    <a href="/about" class="text-ungu1 mr-2 small" data-toggle="popover" data-trigger="hover"
    data-placement="right" data-content="punten">
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
            <img src="{{ asset('img/search.png') }}" width="20">
          </button>
        </div>
      {{ Form::close() }}

    <! KERANJANG & CHAT>
      <a href="/transaksi" class="keranjangchat kanan mr-3" name="keranjang">
        <img src="{{ asset('img/keranjang.png') }}" width="20">
      </a>
      <a href="#" class="keranjangchat" name="chat">
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

  <div class="m-4 text-light">
    {{ Form::open(['url' => '/keranjang-satu']) }}
    {{ csrf_field() }}
    <table >
      <tr>
        <td rowspan="7">
          <img id="gbr_barang" class="rounded" src="{{ asset('img/').'/'.$barang2[0]->gambar }}" alt="a gambar" width="400px">
        </td>
      </tr>

      <! DETAIL BARANG >
      <tr>
        <td class="nama-barang" colspan="6">
          <input class="w-100 input-hide" type="text" name="nama_barang" value="{{ $barang2[0]->nama }}" readonly>
          <input id="test" type="hidden" name="gbr_barang" value="">
        </td>
      </tr>
      <tr class="tr-line">
        <td>Terjual 0 Produk</td>
        <td colspan="5">0x Dilihat</td>
      </tr>
      <tr class="tr-line">
        <td colspan="6">
          Harga: Rp <input class="input-hide" type="text" name="harga_barang" value="{{ number_format($barang2[0]->harga) }}" readonly>
        </td>
      </tr>
      <tr class="tr-line">
        <td colspan="5">
          Jumlah: <input class="rounded" type="number" name="jml_barang" value="0" min="1" max="99">
        </td>
      </tr>
      <tr class="tr-line">
        <td> Info Produk </td>
        <td> Berat <br> {{ $barang2[0]->berat }} </td>
        <td> Kondisi <br> {{ $barang2[0]->kondisi }} </td>
        <td> Asuransi <br> <font color='lime'> Tentu tidak </font> </td>
        <td> Kategori <br> {{ $barang2[0]->kategori }} </td>
      </tr>
      <tr>
        <td colspan="5"> Ongkos Kirim:
          <font color='yellow'>klik beli dulu, biar tau</font>
        </td>
        <td>
          @if( Session::get('username') )
            <button class="btn bg-green1 float-right" type="submit" name="lanjutBeli"> Beli </button>
          @else
            <button class="btn bg-green1 float-right" type="button" data-toggle="popover"
              data-trigger="focus" data-placement="top" data-content="Login dulu bos."> Beli </button>
          @endif
        </td>
      </tr>
    </table>
    {{ Form::close() }}
  </div>

  <div class="text-light m-5">
    <h5> Deskripsi </h5>
    <hr>
    <div class="">
      {!! $barang2[0]->deskripsi !!}
    </div>
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

<script src="{{ asset('js/logoutButton.js') }}"></script>
<script src="{{ asset('js/popover.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var src = $('#gbr_barang').attr('src');
    document.getElementById('test').value = src;
  });
</script>

</html>
