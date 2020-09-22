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

@include('header1')

<body class="bg-navy">

  <div class="m-5 text-light">

    <div class="col-md-8 row content-center border p-3">
      <img src="{{ asset('img/privasi.png') }}" alt="gambar" width="120px">
      <div class="col-md" style="word-wrap: normal;">
        <strong class="ml-4"> Selalu waspada terhadap pihak tidak bertanggung jawab </strong> <br>
        <ul class="mb-1">
          <li> Jangan lakukan pembayaran dengan nominal yang berbeda dengan yang tertera pada tagihan kamu. </li>
          <li> Jangan lakukan transfer di luar nomor rekening atas nama Abang Iggy. </li>
        </ul>
        <a href="#" class="text-green1 ml-4" data-toggle="popover" data-trigger="focus"
        data-placement="right" data-content="Cari sendiri bos.">
          Pelajari selengkapnya
        </a>
      </div>
    </div>

    <div class="col-md-8 bg-light content-center border p-3 mt-4">
      <span class="text-dark" style="font-size: large; font-weight: 600;">
        Pembayaran via {{ $getCara }}
      </span>
    </div>
    <div class="col-md-8 bg-secondary text-center content-center border p-3">
      <p>
        Batas pembayaran: <strong> {{ $getTime }} </strong>
        <br><br>

        Jumlah Tagihan:
        <h4 class="mt-n3"> Rp {{ $getTagihan}} </h4>
        <br>

        Nomor tagihan:
        <h4 class="text-turquoise"> {{ $getKode }} </h4>
      </p>
    </div>
    <div class="col-md-8 bg-light content-center border p-3">
      <span class="text-dark" style="font-size: large; font-weight: 600;">
        Petunjuk pembayaran
      </span>
      <div class="col-md bg-secondary content-center p-3 mt-2">
        <ul>
          <li> 1. Yes </li>
          <li> 2. No </li>
          <li> 3. Yes'nt </li>
        </ul>
      </div>
      <p class="text-dark mt-2">
        Pembelianmu dicatat dengan nomor tagihan pembayaran <span class="text-turquoise">{{ $getKode }}</span>.
        Jika kamu menghadapi kendala mengenai pembayaran, silahkan langsung berdoa kepada Yang Maha Kuasa.
      </p>
      <button class="btn btn-danger w-100" type="button" onclick="window.location.href='/transaksi2'">
        Lihat Tagihan Pembayaran
      </button>
    </div>

  </div>

  @include('modal-login')
  @include('modal-register')

</body>

@include('footer')

<script src="{{ asset('js/popover.js') }}"></script>
<script src="js/logoutButton.js"></script>

</html>
