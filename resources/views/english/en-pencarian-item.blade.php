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
  .div-fixed {
    color: black;
    width: 1000px;
  }
  .td-wrap {
    word-wrap: break-word;
    width: 240px;
  }
</style>

@include('english.en-header1')

<body class="bg-navy">

  <div class="row m-5 text-light">

    <div class="col-md-2 bg-info text-light h-25">
      Filter
      <div class="bg-light text-dark text-left">

        <ul class="tanpa-dot" id="filters">
          Condition
          <li>
            <input type="checkbox" id="filter-kategoria" value="baru" checked>
            <label for="filter-kategoria"> New </label>
          </li>
          <li>
            <input type="checkbox" id="filter-kategorib" value="bekas" checked>
            <label for="filter-kategorib"> Secondhand </label>
          </li>
        </ul>

      </div>
    </div>

    <div class="div-fixed row ml-5">
      @foreach($acakBarangs as $bs)
        <div class="card ml-5 mb-5 {{ $bs->kondisi }}" style="width:200px">
          <a href="/en-kategori-item/{{ $bs->id }}">
            <img class="" src="{{ asset('img/').'/'.$bs->gambar }}" alt="" width="100%">
          </a>
          <div class="card-body">
            <a href="/en-kategori-item/{{ $bs->id }}" class="text-dark">
              {{ str_replace($namaLama, $namaBaru, $bs->nama) }}
            </a>
            <h5 class="card-text"> Rp {{ number_format($bs->harga) }} </h5>
          </div>
          <div class="card-footer">
            <span class="small"> {{ $bs->lokasi }} </span>
          </div>
        </div>
      @endforeach
    </div>

  </div>

  @include('modal-login')
  @include('modal-register')

</body>

@include('english.en-footer')

<script src="{{ asset('js/popover.js') }}"></script>

<!checkbox filter>
<script type="text/javascript">
  $("#filters :checkbox").click(function() {
     $("."+$(this).val()).hide();
     $("#filters :checkbox:checked").each(function() {
         $("." + $(this).val()).show();
     });
  });
</script>

</html>
