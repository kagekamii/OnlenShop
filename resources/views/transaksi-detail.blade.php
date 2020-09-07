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

  <div class="row m-4 justify-content-center text-light">

    <div class="col-md-3 text-center text-light border p-2 mt-5 h-100">
      <img src="{{ asset('img/privasi.png') }}" alt="gambar" width="120px">
      <div class="col-md text-left" style="word-wrap: normal;">
        <strong> Selalu waspada terhadap pihak tidak bertanggung jawab </strong> <br>
        <ul class="ml-n4 mb-1">
          <li> Jangan lakukan pembayaran dengan nominal yang berbeda dengan yang tertera pada tagihan kamu. </li>
          <li> Jangan lakukan transfer di luar nomor rekening atas nama Abang Iggy. </li>
        </ul>
        <a href="#" class="text-green1 ml-3" data-toggle="popover" data-trigger="focus"
        data-placement="right" data-content="Cari sendiri bos.">
          Pelajari selengkapnya
        </a>
      </div>
    </div>

    <div class="col-md-6 text-right">
      <h4> Transaksi Detail </h4>
      <br>
      <div class="bg-wat text-dark p-3">
        <strong> Daftar Pembelian </strong>
      </div>
      <div class="bg-blue2 text-dark p-3">
        <div class="bg-wheat p-2">

          <table class="table-striped text-left w-100" cellpadding="15">
            <tr>
              <td>
                <span class="small text-secondary"> NO. TRANSAKSI </span> <br>
                <span> {{ $status[0]->id }} </span>
              </td>
              <td>
                <span class="small text-secondary"> PELAPAK </span> <br>
                <span> Abang Iggy </span>
              </td>
              <td class=""> <a href="#">Chat Pelapak</a> </td>
            </tr>

            <tr>
              <td colspan="3">
                <span class="small text-secondary"> CATATAN UNTUK PELAPAK </span> <br>
                <span> ~ </span>
              </td>
            </tr>

            <tr>
              <td colspan="3">
                <div class="row ml-n1">
                  <img src="{{ asset('img/komputer-logitechg402.jfif') }}" alt="gambar" width="100px">

                  <div class="ml-2 w-75">
                    {{ $status[0]->nama_barang }}
                    <span class="float-right"> Rp 11,111.111 </span> <br>
                    <span class="smaller"> Jumlah: {{ $status[0]->jml_barang }} </span> <br>
                    <span class="smaller"> Berat: - </span>
                  </div>

                </div>
              </td>
            </tr>

            <tr>
              <td>
                <span class="small text-secondary"> STATUS PEMBELIAN </span> <br>
                <span>
                  @if( $status[0]->batas_waktu3 == 'Kedaluwarsa' )
                    Dibatalkan ({{ $status[0]->batas_waktu3 }})
                  @else
                    Niat beli bos?
                  @endif
                </span>
              </td>
              <td>
                <span class="small text-secondary"> JASA PENGIRIMAN </span> <br>
                <span> ~ </span>
              </td>
              <td>
                <span class="small text-secondary"> NO. RESI </span> <br>
                <span> yakali ada </span>
              </td>
            </tr>

            <tr>
              <td colspan="3">
                <span class="small text-secondary"> KETERANGAN </span> <br>
                <span>
                  @if( $status[0]->batas_waktu3 == 'Kedaluwarsa' )
                    Transaksi tidak dapat diproses karna anda ni
                    memang <span class="text-danger">betuah tak nak bayar!</span>
                  @else
                    Kalo niat ya bayar anjay
                  @endif
                </span>
              </td>
            </tr>

            <tr>
              <td>
                Butuh bantuan?
                <a href="#" class="stay" data-toggle="popover" data-trigger="hover"
                data-placement="right" data-content="h3h3 anda tertipu.">
                  FAQ
                </a>
              </td>
            </tr>
          </table>

        </div>
      </div>

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

<script src="js/logoutButton.js"></script>
<script src="{{ asset('js/popover.js') }}"></script>
<script type="text/javascript">
  $('.stay').click(function(e) {
    e.preventDefault();
  });
</script>

</html>
