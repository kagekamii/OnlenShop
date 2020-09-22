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

@include('header1')

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

@include('footer')

<script src="{{ asset('js/logoutButton.js') }}"></script>
<script src="{{ asset('js/popover.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var src = $('#gbr_barang').attr('src');
    document.getElementById('test').value = src;
  });
</script>

</html>
