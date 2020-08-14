<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!--Bootstrap JS-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title></title>
  </head>

  <style media="screen">
    .text-ungu1:hover{
      color: #b602b6 ;
    }
    .bg-kuning{
      background-color: #ffd94a ;
    }
    .btn-orange1{
      background-color: #feaa60 ;
      border: 0;
      border-radius: 0 5px 5px 0;
      height: 30px;
    }
    .btn-orange2{
      background-color: #feaa60 ;
    }
    .bg-sky{
      background-color: #75dafd ;
    }
    .searchbox{
      width: 450px;
      margin-left: 80px;
      border-radius: 5px 0 0 5px;
      height: 30px;
    }
    .separator{
      border-left: 1px solid;
    }
    .kanan{
      margin-left: 100px;
    }
  </style>

  <body>
    <div class="col-md bg-kuning text-right">
      <a href="#" class="text-ungu1 mr-2 small"> Tentang OnlenShop </a>
    </div>
    <nav class="col-md navbar navbar-expand-md bg-light border">
      <!-- LOGO -->
      <a href="#" class="mr-5"> Logo </a>

      <!-- KATEGORI -->
      <div class="dropdown">
        <button type="button" class="btn btn-orange2 btn-sm dropdown-toggle" data-toggle="dropdown"> Kategori </button>
        <div class="dropdown-menu bg-sky">
          <a href="#" class="dropdown-item"> Komputer </a>
          <a href="#" class="dropdown-item"> Handphone </a>
          <a href="#" class="dropdown-item"> Makanan & Minuman </a>
        </div>
      </div>

      <!-- SEARCH BOX -->
      <input class="searchbox" type="text" name="kolomCari" placeholder="masukkan kata kunci...">
      <button type="button" class="btn-orange1 mr-5" name="submitCari"> <img src="img/search.png" width="20"> </button>

      <!-- KERANJANG & CHAT -->
      <button type="button" class="kanan mr-2" name="button"> Keranjang </button>
      <button type="button" class="" name="button"> Chat </button>

      <!-- DAFTAR & LOGIN -->
      <button type="button" class="kanan mr-2" name="button"> Daftar </button>
      <button type="button" class="" name="button"> Login </button>
    </nav>
  </body>
</html>
