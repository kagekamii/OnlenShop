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

    <h4> Transaksi </h4>
    <br>

    @foreach($status as $t)
      @if( Session::get('username') == $t->username )
      <div class="row col-md-8 bg-blue2 text-dark p-3">
        <div class="col-md">
          <span class="smaller text-blue"> NO. TAGIHAN </span> <br>
          <span> {{ $t->kode_transaksi }} </span> <br>
          <span class="small text-blue"> {{ $t->batas_waktu }} </span>
        </div>
        <div class="col-md">
          <span class="smaller text-blue"> TOTAL TAGIHAN </span> <br>
          <span> Rp {{ $t->total_bayar }} </span>
        </div>
        <div class="col-md">
          <span class="smaller text-blue"> STATUS TAGIHAN </span> <br>
          <span class="status"> {{ $t->batas_waktu3 }} </span>
        </div>
      </div>

      <div class="row col-md-8 bg-green3 text-dark p-3">
        <div class="col-md">
          <span class="smaller text-blue"> BARANG </span> <br>
          <span> {{ $t->nama_barang }} </span> <br>
        </div>
        <div class="col-md">
          <span class="smaller text-blue"> PELAPAK </span> <br>
          <span> Abang Iggy </span>
        </div>
        <div class="col-md mt-3">
          <a href="/transaksi-detail/{{ $t->id }}"
            class="p-2 text-dark bg-wat rounded" style="text-decoration: none;">
            Lihat Detail
          </a>
        </div>
      </div>
      <br>
      @endif
    @endforeach

  </div>

  @include('modal-login')
  @include('modal-register')

</body>

@include('footer')

<script src="js/logoutButton.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  //   var waktu = $('.waktu').val();
  //   var tes = new Date(waktu);
  //   $('.waktu2').val(tes1);
  //   if (tes2 >= tes) {
  //     $('.status').html("Kedaluwarsa");
  //     $('.status2').html("Dibatalkan");
  //   }
  //   else if (tes2 < tes) {
  //     $('.status').html("Cepetan bayar atuh");
  //     $('.status2').html("Niat beli gk?");
  //   }
  });
</script>

</html>
