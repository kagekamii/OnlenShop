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

@include('english.en-header1')

<body class="bg-navy">
  @foreach($barang2 as $b)
  <div class="m-4 text-light">
    {{ Form::open(['url' => '/en-keranjang-satu']) }}
    {{ csrf_field() }}
    <table >
      <tr>
        <td rowspan="7">
          <img id="gbr_barang" class="rounded" src="{{ asset('img/').'/'.$b->gambar }}" alt="a gambar" width="400px">
        </td>
      </tr>

      <! DETAIL BARANG >
      <tr>
        <td class="nama-barang" colspan="6">
          <input class="w-100 input-hide" type="text" name="nama_barang"
                  value="{{ str_replace($namaLama, $namaBaru, $b->nama) }}" readonly>
          <input id="test" type="hidden" name="gbr_barang" value="">
        </td>
      </tr>
      <tr class="tr-line">
        <td>Sold 0 Product</td>
        <td colspan="5">0x Seen</td>
      </tr>
      <tr class="tr-line">
        <td colspan="6">
          Price: Rp <input class="input-hide" type="text" name="harga_barang" value="{{ number_format($b->harga) }}" readonly>
        </td>
      </tr>
      <tr class="tr-line">
        <td colspan="5">
          Amount: <input class="rounded" type="number" name="jml_barang" value="0" min="1" max="99">
        </td>
      </tr>
      <tr class="tr-line">
        <td> Product Info </td>
        <td> Weight <br> {{ $b->berat }} </td>
        <td> Condition <br> {{ str_replace($infoLama, $infoBaru, $b->kondisi) }} </td>
        <td> Insurance <br> <font color='lime'> ofc NO </font> </td>
        <td> Category <br> {{ str_replace($infoLama, $infoBaru, $b->kategori) }} </td>
      </tr>
      <tr>
        <td colspan="5"> Shipping fee:
          <font color='yellow'>click buy, then you know</font>
        </td>
        <td>
          @if( Session::get('username') )
            <button class="btn bg-green1 float-right" type="submit" name="lanjutBeli"> Buy </button>
          @else
            <button class="btn bg-green1 float-right" type="button" data-toggle="popover"
              data-trigger="focus" data-placement="top" data-content="Login first, fella."> Buy </button>
          @endif
        </td>
      </tr>
    </table>
    {{ Form::close() }}
  </div>

  <div class="text-light m-5">
    <h5> Description </h5>
    <hr>
    <div class="">
      {!! $b->deskripsi !!}
    </div>
  </div>
  @endforeach

  @include('modal-login')
  @include('modal-register')

</body>

@include('english.en-footer')

<script src="{{ asset('js/logoutButton.js') }}"></script>
<script src="{{ asset('js/popover.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var src = $('#gbr_barang').attr('src');
    document.getElementById('test').value = src;
  });
</script>

</html>
