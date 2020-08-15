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
    /* COLORS */
    .text-ungu1:hover{
      color: #b602b6 ;
    }
    .bg-kuning{
      background-color: #ffd94a ;
    }
    .bg-kuning2{
      background-color: #e8c747 ;
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
    .bg-green1{
      background-color: #bbfd75 ;
    }
    .bg-green2{
      background-color: #99d756 ;
    }
    .bg-orangreen{
      background-image: linear-gradient(to bottom right, #feaa60, #99d756);
    }
    .bg-navy{
      background-color: #001f3f;
    }
    .bg-blue1{
      background: rgba(131, 170, 205, 0.5);
    }

    /* UTILITIES */
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
    .no-border{
      border: 0;
    }

    /* CAROUSEL */
    .carousel-inner img{
      margin: 0px 0px 0px 48px;
      width: 90%;
    }
    .carousel.carousel-fade .carousel-item {
      display: block;
      opacity: 0;
      transition: opacity ease-out .7s;
    }
    .carousel.carousel-fade .carousel-item.active {
      opacity: 1 !important;
    }
  </style>

  <header>
    <div class="col-md bg-kuning text-right">
      <a href="#" class="text-ungu1 mr-2 small"> Tentang OnlenShop </a>
    </div>

    <nav class="col-md navbar navbar-expand-md bg-light justify-content-center border">
      <! LOGO >
      <a href="#" class="mr-5"> Logo </a>

      <! KATEGORI >
      <div class="dropdown">
        <button type="button" class="btn btn-orange2 btn-sm dropdown-toggle" data-toggle="dropdown"> Kategori </button>
        <div class="dropdown-menu bg-sky">
          <a href="#" class="dropdown-item"> Komputer </a>
          <a href="#" class="dropdown-item"> Handphone </a>
          <a href="#" class="dropdown-item"> Makanan & Minuman </a>
        </div>
      </div>

      <! SEARCH BOX >
      <input class="searchbox" type="text" name="kolomCari" placeholder="masukkan kata kunci...">
      <button type="button" class="btn-orange1 mr-5" name="submitCari"> <img src="img/search.png" width="20"> </button>

      <! KERANJANG & CHAT >
      <button type="button" class="no-border kanan mr-2" name="button"> <img src="img/keranjang.png" width="20"> </button>
      <button type="button" class="no-border" name="button"> <img src="img/message.png" width="20"> </button>

      <! DAFTAR MODAL >
      <button type="button" class="kanan mr-2 no-border bg-kuning2 rounded" data-toggle="modal" href="#myRegister"> Daftar </button>

      <!-- The Modal -->
      <div class="modal" id="myRegister">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-kuning">
              <h5 class="modal-title">Daftar</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body bg-kuning2">
              <div class="container">

                <form action="cek_register.php" method="post">
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" placeholder="maks. 20 karakter" name="username" required>
                  </div>

                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="maks. 20 karakter" name="password" required>
                  </div>

                  <button type="submit" class="btn btn-primary">Register</button>
                </form>

              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer bg-kuning">
            </div>

          </div>
        </div>
      </div>

      <! LOGIN MODAL >
      <button type="button" class="no-border bg-green2 rounded" data-toggle="modal" href="#myLogin"> Login </button>

      <!-- The Modal -->
      <div class="modal" id="myLogin">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-green1">
              <h5 class="modal-title">Login</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body bg-green2">
              <div class="container">

                <form action="#" method="post">
                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" placeholder="maks. 20 karakter" name="username" required>
                  </div>

                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="maks. 20 karakter" name="password" required>
                  </div>

                  <button type="submit" class="btn btn-primary">Login</button>
                </form>

              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer bg-green1">
            </div>

          </div>
        </div>
      </div>

    </nav>
  </header>

  <body class="bg-navy">

    <div class="row m-4">

      <! Slideshow >
      <div id="demo" class="col-md-9 carousel carousel-fade bg-orangreen rounded" data-ride="carousel">
        <!--Indicator-->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!--slideshow-->
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/slide1.jpg" alt="pic-1">
              <div class="carousel-caption">
                <h3 class=""> </h3>
                <h5 class=""> </h5>
              </div>
            </div>

            <div class="carousel-item">
              <img src="img/slide2.jpg" alt="pic-2">
              <div class="carousel-caption">
                <h4 class=""> </h4>
              </div>
            </div>

            <div class="carousel-item">
              <img src="img/slide3.jpg" alt="pic-3">
              <div class="carousel-caption">
                <h4 class=""> </h4>
                <p></p>
              </div>
            </div>
        </div>

        <!--slideshow Left & Right controls-->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>

      <! Profile Akun >
      <div class="col-md bg-blue1 ml-5 rounded">
        <p class="text-light"> test </p>
      </div>

    </div>


  </body>

</html>
