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
    background-color: #aaa;
  }
  .khusus {
    border-top: 1px solid;
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

    <div class="col-md-4 text-center text-light">
      <div class="border p-2 mt-5">
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
@foreach($status as $s)
      <div class="bg-blue2 text-dark p-2 mt-3">
        <div class="bg-wheat text-left p-2">

          <table class="w-100 mt-n1">

            <tr>
              <td class="atas">
                <span class="small text-secondary"> METODE PEMBAYARAN </span> <br>
                {{ $s->metode_bayar }}
              </td>
            </tr>

            <tr class="khusus">
              <td>
                <span class="small text-secondary"> ALAMAT PENGIRIMAN </span> <br>
                {{ $s->alamat_rumah }} <br>
                {{ $s->kecamatan }} <br>
                {{ $s->kota }} <br>
                {{ $s->provinsi }} <br>
                No. Telp: <input class="no-border2" type="text" id="nohp" readonly>
              </td>
            </tr>

          </table>

        </div>
      </div>
    </div>

    <div class="col-md-6 text-right">
      <h4 class="mb-1"> Transaksi Detail </h4>
      <br>
      <div class="bg-wat text-dark p-3 mt-n2">
        <strong> Daftar Pembelian </strong>
      </div>
      <div class="bg-blue2 text-dark p-3">
        <div class="bg-wheat p-2">

          <table class="table-striped text-left w-100" cellpadding="15">
            <tr>
              <td class="atas">
                <span class="small text-secondary"> NO. TRANSAKSI </span> <br>
                <span> {{ $s->id }} </span>
              </td>
              <td class="atas">
                <span class="small text-secondary"> PELAPAK </span> <br>
                <span> Abang Iggy </span>
              </td>
              <td class=""> <a href="#">Chat Pelapak</a> </td>
            </tr>

            <tr>
              <td colspan="3" class="atas">
                <span class="small text-secondary"> CATATAN UNTUK PELAPAK </span> <br>
                <span> {{ $s->catatan or '~' }} </span>
              </td>
            </tr>

            <tr>
              <td colspan="3" class="atas">
                <div class="row ml-n1">
                  <img src="{{ asset('img/').'/'.$s->barang['gambar'] }}" alt="gambar" width="100px">

                  <div class="ml-2 w-75">
                    {{ $s->barang['nama'] }}
                    <span class="float-right"> Rp {{ $s->total_bayar }} </span> <br>
                    <span class="smaller"> Jumlah: {{ $s->jml_barang }} </span> <br>
                    <span class="smaller"> Berat: {{ $s->barang['berat'] }}  </span>
                  </div>

                </div>
              </td>
            </tr>

            <tr>
              <td>
                <span class="small text-secondary"> STATUS PEMBELIAN </span> <br>
                <span>
                  @if( $s->batas_waktu3 == 'Kedaluwarsa' )
                    Gelud bos? ({{ $s->batas_waktu3 }})
                  @else
                    Cepat bayarlah kaw betuah
                  @endif
                </span>
              </td>
              <td class="atas">
                <span class="small text-secondary"> JASA PENGIRIMAN </span> <br>
                <span>
                  @if( $s->kurir == 'jne2d' )
                    JNE Reg (2 hari Kerja)
                  @elseif( $s->kurir == 'j&t3d' )
                    J&T Reg (3 hari kerja)
                  @elseif( $s->kurir == 'pos2d' )
                    Pos Indonesia (2 hari kerja)
                  @elseif( $s->kurir == 'sicepat1d' )
                    SiCepat Express (1 hari kerja)
                  @endif
                </span>
              </td>
              <td class="atas">
                <span class="small text-secondary"> NO. RESI </span> <br>
                <span> yakali ada </span>
              </td>
            </tr>

            <tr>
              <td colspan="3" class="atas">
                <span class="small text-secondary"> KETERANGAN </span> <br>
                <span>
                  @if( $s->batas_waktu3 == 'Kedaluwarsa' )
                    Besok saia tunggu depan rumah.
                  @else
                    Niat beli, bos?
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
        <button type="button" class="btn btn-sm btn-primary mt-2 float-left" onclick="window.location.href='/transaksi2'">
          Kembali
        </button>

        @if( $s->batas_waktu3 == 'Kedaluwarsa' )
          <button type="button" class="btn btn-sm btn-warning mt-2" disabled> Batalkan transaksi </button>
          <button type="button" class="btn btn-sm btn-danger mt-2" onclick="window.location.href='/transaksi-hapus/{{ $s->id }}'">
            Hapus transaksi
          </button>
        @else
          <button type="button" class="btn btn-sm btn-warning mt-2" onclick="window.location.href='/transaksi-batal/{{ $s->id }}'">
            Batalkan transaksi
          </button>
          <button type="button" class="btn btn-sm btn-danger mt-2" disabled> Hapus transaksi </button>
        @endif
      </div>

    </div>
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

<script src="{{ asset('js/logoutButton.js') }}"></script>
<script src="{{ asset('js/popover.js') }}"></script>
<script type="text/javascript">
  $('.stay').click(function(e) {
    e.preventDefault();
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var nohp = @json($status[0]->nohp).slice(0,6);
    $('#nohp').val(nohp+'***');
  });
</script>

</html>
