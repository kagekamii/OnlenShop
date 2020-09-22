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
  /* a > img {
    height: 230px;
  } */
</style>

@include('english.en-header1')

<body class="bg-navy">

  <div class="row m-4">
    <! FILTER AMPAS >
    <div class="col-md-2 bg-info text-light text-center rounded">
      <strong> Filter </strong>
      <div class="bg-light text-dark text-left">

        <ul class="tanpa-dot" id="filters">
          Price
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
          Type
          <li>
            <input id="makanan-id" type="checkbox" value="makanan" checked >
            <label for="makanan-id"> Food </label>
          </li>
          <li>
            <input id="minuman-id" type="checkbox" value="minuman" checked >
            <label for="minuman-id"> Drink </label>
          </li>
        </ul>

      </div>

    </div>

    <! DAFTAR BARANG >
    <div id="susah" class="col-md ml-2">

      <table cellpadding='5'>
        <tr>
          @foreach($barang as $b)
          <td data-x="50kurang" data-a="{{ $b->filter1 }}" data-b="{{ $b->filter2 }}" data-c="{{ $b->filter3 }}"
              data-d="{{ $b->filter4 }}" data-e="{{ $b->filter5 }}">
            <div class="card" style="width:200px">
              <a href="/en-kategori-item/{{ $b->id }}">
                <img class="card-img-top" src="img/{{ $b->gambar }}" alt="Card image" height="200px">
              </a>
              <div class="card-body">
                <a href="/en-kategori-item/{{ $b->id }}" class="text-dark">
                  {{ str_replace($namaLama, $namaBaru, $b->nama) }}
                </a>
                <h5 class="card-text"> Rp {{ number_format($b->harga) }} </h5>
              </div>
              <div class="card-footer">
                <span class="small"> {{ $b->lokasi }} </span>
              </div>
            </div>
          </td>
          @endforeach
          <!-- <td data-x="50kurang" data-a="minuman" data-b="50kurangminuman" data-c="50lebih50kurangminuman"
              data-d="50kurangmakananminuman" data-e="50lebih50kurangmakananminuman">
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
              data-d="50kurangmakananminuman" data-e="50lebih50kurangmakananminuman">
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
          data-d="50lebihmakananminuman" data-e="50lebih50kurangmakananminuman">
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
          </td> -->

        </tr>
      </table>

    </div>
    <p id="test" class="text-light"></p>

  </div>

  <div class="row ml-4 mr-4">
    <div class="col-md-2 bg-warning small rounded">
      <strong> >> READ ME! << </strong> <br>
      For filters, check one 'type' (cannot both).
      Due to filters aren't purfect.
    </div>
  </div>

  @include('modal-login')
  @include('modal-register')

</body>

@include('english.en-footer')

<!checkbox filter>
<script src="js/multipleFilter.js"></script>
<script src="js/logoutButton.js"></script>

</html>
