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

@include('header1')

<body class="bg-navy">

  <div class="row m-4">

    <div class="col-md-2 bg-info text-light">
      Filter
      <div class="bg-light text-dark text-left">

        <ul class="tanpa-dot" id="filters">
          Harga
          <li>
            <input type="checkbox" id="filter-kategoria" value="100-lebih" checked>
            <label for="filter-kategoria"> > Rp 100.000 </label>
          </li>
          <li>
            <input type="checkbox" id="filter-kategorib" value="100-kurang" checked>
            <label for="filter-kategorib"> < Rp 100.000 </label>
          </li>
        </ul>

      </div>
    </div>

    <div class="col-md ml-2">

      <table cellpadding='5'>
        <tr>
          @foreach($barang as $b)
          <td class="{{ $b->filter1 }}">
            <div class="card" style="width:200px">
              <a href="/kategori-item/{{ $b->id }}">
                <img class="card-img-top" src="img/{{ $b->gambar }}" alt="Card image" height="210px">
              </a>
              <div class="card-body">
                <a href="/kategori-item/{{ $b->id }}" class="text-dark"> {{ $b->nama }} </a>
                <h5 class="card-text"> Rp {{ number_format($b->harga) }} </h5>
              </div>
              <div class="card-footer">
                <span class="small"> {{ $b->lokasi }} </span>
              </div>
            </div>
          </td>
          @endforeach
        </tr>
      </table>

    </div>

  </div>

  @include('modal-login')
  @include('modal-register')

</body>

@include('footer')

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
