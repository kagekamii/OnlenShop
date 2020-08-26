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
  a > img {
    height: 230px;
  }
</style>

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
      <input class="searchbox" type="text" name="kolomCari" placeholder="masukkan kata kunci...">
      <button type="button" class="btn-orange1 mr-5" name="submitCari"> <img src="img/search.png" width="20">
      </button>

    <! KERANJANG & CHAT>
      <button type="button" class="no-border kanan mr-2" name="button"> <img src="img/keranjang.png" width="20">
      </button>
      <button type="button" class="no-border" name="button"> <img src="img/message.png" width="20"> </button>

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
    <! FILTER AMPAS >
    <div class="col-md-2 bg-info text-light text-center rounded">
      <strong> Filter </strong>
      <div class="bg-light text-dark text-left">

        <ul class="tanpa-dot" id="filters">
          Harga
          <li>
            <input id="50lebih-id" type="checkbox" value="50lebih" checked >
            <label for="50lebih-id"> > Rp 50.000 </label>
          </li>
          <li>
            <input id="50kurang-id" type="checkbox" value="50kurang" checked >
            <label for="50kurang-id"> < Rp 50.000 </label>
          </li>
        </ul>

        <ul class="tanpa-dot" id="filters2">
          Jenis
          <li>
            <input id="makanan-id" type="checkbox" value="makanan" checked >
            <label for="makanan-id"> Makanan </label>
          </li>
          <li>
            <input id="minuman-id" type="checkbox" value="minuman" checked >
            <label for="minuman-id"> Minuman </label>
          </li>
        </ul>

      </div>

    </div>

    <! DAFTAR BARANG >
    <div id="susah" class="col-md ml-2">

      <table cellpadding='5'>
        <tr>

          <td data-x="50kurang" data-a="makanan" data-b="50kurangmakanan" data-c="50lebih50kurangmakanan"
              data-d="50lebih50kurangmakananminuman" data-e="50kurangmakananminuman">
            <div class="card" style="width:200px">
              <a href="/kategori-makanminum/item/{{ $barang[0]->id }}">
                <img class="card-img-top" src="img/makanminum-basoAciTulangRangu.jpg" alt="Card image" style="width:100%">
              </a>
              <div class="card-body">
                <a href="/kategori-makanminum/item/{{ $barang[0]->id }}" class="text-dark"> Baso Aci Tulang Rungu </a>
                <h5 class="card-text"> Rp 32.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Ciamis </span>
              </div>
            </div>
          </td>
          <td data-x="50kurang" data-a="minuman" data-b="50kurangminuman" data-c="50lebih50kurangminuman"
              data-d="50lebih50kurangmakananminuman" data-e="50kurangmakananminuman">
            <div class="card" style="width:200px">
              <a href="/kategori-makanminum/item/{{ $barang[1]->id }}">
                <img class="card-img-top" src="img/makanminum-kombuchaHealBurgreens.jpg" alt="Card image" style="width:100%">
              </a>
              <div class="card-body">
                <a href="/kategori-makanminum/item/{{ $barang[1]->id }}" class="text-dark"> Kombucha HEAL X BURGREENS </a>
                <h5 class="card-text"> Rp 46.500 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Lampung </span>
              </div>
            </div>
          </td>
          <td data-x="50kurang" data-a="makanan" data-b="50kurangmakanan" data-c="50lebih50kurangmakanan"
              data-d="50lebih50kurangmakananminuman" data-e="50kurangmakananminuman">
            <div class="card" style="width:200px">
              <a href="/kategori-makanminum/item/{{ $barang[2]->id }}">
                <img class="card-img-top" src="img/makanminum-chikiballskeju.jfif" alt="Card image">
              </a>
              <div class="card-body">
                <a href="/kategori-makanminum/item/{{ $barang[2]->id }}" class="text-dark"> Chikiballs Keju </a>
                <h5 class="card-text"> Rp 15.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Serang </span>
              </div>
            </div>
          </td>
          <td data-x="50lebih" data-a="minuman" data-b="50lebihminuman" data-c="50lebih50kurangminuman"
          data-d="50lebih50kurangmakananminuman" data-e="50lebihmakananminuman">
            <div class="card" style="width:200px">
              <a href="/kategori-makanminum/item/{{ $barang[3]->id }}">
                <img class="card-img-top" src="img/makanminum-susuF&Nevaporasi390gr.jpg" alt="Card image">
              </a>
              <div class="card-body">
                <a href="/kategori-makanminum/item/{{ $barang[3]->id }}" class="text-dark"> Susu F&N evaporasi 390gr </a>
                <h5 class="card-text"> Rp 67.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Tangerang Kota </span>
              </div>
            </div>
          </td>

        </tr>
      </table>

    </div>
    <p id="test" class="text-light"></p>

  </div>

  <div class="row ml-4 mr-4">
    <div class="col-md-2 bg-warning small rounded">
      <strong> >> READ ME! << </strong> <br>
      Untuk filter, minimal centang <br>
      1 harga dan 1 jenis. Karna filternya tidak sempurna.
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
<!checkbox filter>
<script type="text/javascript">
  $("input[type=checkbox]").click(function() {
     $("td").hide();
     var val = [];
     $(":checkbox:checked").each(function(i) {
         val[i] = $(this).val();
         var val2 = val.join('');
         // $('#test').html(val2);

         if ( $("td[data-b="+val2+"]") )
            $("td[data-b="+val2+"]").show();

         if ( $("td[data-c="+val2+"]") )
            $("td[data-c="+val2+"]").show();

         if ( $("td[data-d="+val2+"]") )
            $("td[data-d="+val2+"]").show();

         if ( $("td[data-e="+val2+"]") )
            $("td[data-e="+val2+"]").show();
     });
  });
</script>
</html>
