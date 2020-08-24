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

    <div class="col-md-2 bg-info text-light">
      Filter
      <div class="bg-light text-dark text-left">

        <ul class="tanpa-dot" id="filters">
          Harga
          <li>
            <input type="checkbox" id="filter-kategoria" value="100-lebih" checked>
            <label for="filter-eksekutif"> > Rp 100.000 </label>
          </li>
          <li>
            <input type="checkbox" id="filter-kategorib" value="100-kurang" checked>
            <label for="filter-ekonomi"> < Rp 100.000 </label>
          </li>
        </ul>

      </div>
    </div>

    <div class="col-md row ml-2">

      <table cellpadding='5'>
        <tr>

          <td class="100-kurang">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/handphone-chargerBaseus.jfif" alt="Card image" style="width:100%">
              <div class="card-body">
                <a href="#" class="text-dark"> Charger Baseus Fast Charging </a>
                <h5 class="card-text"> Rp 83.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Jakarta Selatan </span>
              </div>
            </div>
          </td>
          <td class="100-kurang">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/handphone-iphoneCase6&7.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <a href="#" class="text-dark"> Case Iphone 6/6s/7 </a>
                <h5 class="card-text"> Rp 25.500 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Depok </span>
              </div>
            </div>
          </td>
          <td class="100-lebih">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/handphone-powerbankUNEED10kMAH.png" alt="Card image">
              <div class="card-body">
                <a href="#" class="text-dark"> Powerbank UNEED 10k mAH </a>
                <h5 class="card-text"> Rp 151.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Tangerang Selatan </span>
              </div>
            </div>
          </td>
          <td class="100-lebih">
            <div class="card" style="width:200px">
              <img class="card-img-top" src="img/handphone-redminote9-4gb64gb.jfif" alt="Card image">
              <div class="card-body">
                <a href="#" class="text-dark"> Redmi Note 9 4/64 </a>
                <h5 class="card-text"> Rp 2.137.000 </h5>
              </div>
              <div class="card-footer">
                <span class="small"> Jakarta Barat </span>
              </div>
            </div>
          </td>

        </tr>
      </table>

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
  $("#filters :checkbox").click(function() {
     $("td").hide();
     $("#filters :checkbox:checked").each(function() {
         $("." + $(this).val()).show();
     });
  });
</script>

</html>
