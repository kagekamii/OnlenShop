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
           /kategori-makan&minum
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
        <button id="routeLogout" class="kanan mr-2 no-border bg-kuning2 rounded"> Logout </button>
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
    <div class="col-md-2 bg-info text-light">
      Filter
      <div class="bg-light text-dark text-left">
        <ul class="tanpa-dot" id="filters">
          Harga
          <li>
            <input class="check" type="checkbox" value="50lebih" checked >
            <label for="filter-eksekutif"> > Rp 50.000 </label>
          </li>
          <li>
            <input class="check" type="checkbox" value="50kurang" checked >
            <label for="filter-ekonomi"> < Rp 50.000 </label>
          </li>
          Jenis
          <li>
            <input class="check" type="checkbox" value="makanan" checked >
            <label for="filter-eksekutif"> Makanan </label>
          </li>
          <li>
            <input class="check" type="checkbox" value="minuman" checked >
            <label for="filter-ekonomi"> Minuman </label>
          </li>
        </ul>

        <!-- <ul class="tanpa-dot" id="filters2">
          Jenis
          <li>
            <input class="check" type="checkbox" value="makanan" checked >
            <label for="filter-eksekutif"> Makanan </label>
          </li>
          <li>
            <input class="check" type="checkbox" value="minuman" checked >
            <label for="filter-ekonomi"> Minuman </label>
          </li>
        </ul> -->
      </div>

    </div>

    <! DAFTAR BARANG >
    <div id="susah" class="col-md row ml-2">

      <table>
        <tr>

          <td class="50kurang" data-name="makanan">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/makanminum-basoAciTulangRangu.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <a href="#" class="text-dark"> Baso Aci Tulang Rungu </a>
                <h5 class="card-text"> Rp 32.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Ciamis </span>
              </div>
            </div>
          </td>
          <td class="50lebih 50kurang makanan minuman">&emsp;</td>
          <td class="50kurang" data-name="minuman">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/makanminum-kombuchaHealBurgreens.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <a href="#" class="text-dark"> Kombucha HEAL X BURGREENS </a>
                <h5 class="card-text"> Rp 46.500 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Lampung </span>
              </div>
            </div>
          </td>
          <td class="50lebih 50kurang makanan minuman">&emsp;</td>
          <td class="50kurang" data-name="makanan">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/makanminum-chikiballskeju.jfif" alt="Card image">
              <div class="card-body">
                <a href="#" class="text-dark"> Chikiballs Keju </a>
                <h5 class="card-text"> Rp 15.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Serang </span>
              </div>
            </div>
          </td>
          <td class="50lebih 50kurang makanan minuman">&emsp;</td>
          <td class="50lebih" data-name="minuman">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/makanminum-susuF&Nevaporasi390gr.jpg" alt="Card image">
              <div class="card-body">
                <a href="#" class="text-dark"> Susu F&N evaporasi 390gr </a>
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

</body>

<!checkbox filter>
<script type="text/javascript">
  $("#filters :checkbox").click(function() {
     $("td").hide();
     $("#filters :checkbox:checked").each(function() {
         $("td[data-name="+$(this).val()+"],"+"." + $(this).val()).show();
     });
  });
</script>

<!-- <script type="text/javascript">
  $("#filters2 :checkbox").click(function() {
     $("td").hide();
     $("#filters2 :checkbox:checked").each(function() {
         $("td[data-name="+$(this).val()+"]" ).show();
     });
  });
</script> -->


</html>