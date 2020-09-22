<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
  textarea {
    resize: none;
  }
  select {
    width: 80%;
  }
</style>

@include('english.en-header2')

<body class="bg-navy">

  <div id="alertBox"></div>

  <div class="row m-5 text-light justify-content-center">

    <div class="col-md-5 mr-5">
      <div class="col-md bg-secondary p-3 rounded text-right">
        {{ Session::get('username') }} - {{ Session::get('nohp') }}
        <br><br>
      {{ Form::open(['url' => '/en-keranjang-satuhalf', 'method' => 'get']) }}
      {{ csrf_field() }}
        <img class="mb-1 invert" src="{{ asset('img/rumah.png') }}" alt="rumah" width="20"> Shipping Address:<br>
        <input class="alamat req_alamat" type="text" name="alamat_rumah" readonly><br>
        <input class="alamat small req_alamat" type="text" name="kecamatan" readonly><br>
        <input class="alamat small req_alamat" type="text" name="kota" readonly><br>
        <input class="alamat small req_alamat" type="text" name="provinsi" readonly><br>
        <hr class="mb-1">
        <a class="text-green1" href="#" id="resetAlamat"> Reset Adress </a> -
        <a class="text-green1" href="#myAlamat" data-toggle="modal"> Edit Address </a>

      </div>
      <br>
      <div class="col-md bg-secondary p-3 rounded">
        <! BARANG DAN JUMLAHNYA >
        <table class="w-100" cellpadding="5">
          <tr>
            <td rowspan="3"> <img class="border" src="{{ $gbr_barang }}" alt="a" width="100px"> </td>
          </tr>
          <tr>
            <td class="w-50"> {{ $nama_barang }} </td>
          </tr>
          <tr>
            <td class="w-50"> Amount: {{ $jml_barang }} item </td>
            <td class="">
               Rp <input class="subhargaBarang" type="text" name="subhargaBarang"
                        value="{{ number_format($harga_barang*$jml_barang) }}">
             </td>
          </tr>
          <! KURIR DAN ONGKOS KIRIM >
          <tr>
            <td colspan="3"> <hr> </td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">
              <textarea name="catatan" class="rounded" rows="1" cols="35"
              placeholder="Note for seller (optional)"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">
              <select class="rounded inconsolata req_kurir" id="kurir" name="kurir" onchange="gantiKurir();">

                <option value="">--- Select Courier ---</option selected>
                <option value="jne2d-14000">
                  JNE Regular
                  &emsp;&emsp;&emsp;&ensp;
                  (2 work days)
                  &emsp;&ensp;
                  Rp 14.000
                </option>
                <option value="j&t3d-13000">
                  J&T Regular
                  &emsp;&emsp;&emsp;&ensp;
                  (3 work days)
                  &emsp;&ensp;
                  Rp 13.000
                </option>
                <option value="pos2d-15000">
                  Pos Indonesia
                  &emsp;&emsp;&emsp;
                  (2 work days)
                  &emsp;&ensp;
                  Rp 15.000
                </option>
                <option value="sicepat1d-20000">
                  SiCepat Express
                  &emsp;&emsp;
                  (1 work days)
                  &emsp;&ensp;
                  Rp 20.000
                </option>

              </select>
            </td>
          </tr>
        </table>

      </div>
      <br>
      <div class="col-md bg-secondary p-3 rounded">
        <input type="checkbox" id="asuransi">
        <label for="asuransi">
          Shipping protection from <abbr title="nvm">Abang Iggy</abbr>
        </label>
      </div>
    </div>

    <! TOTAL PEMBAYARAN >
    <div class="col-md-4 bg-blue1 sticky h-100 p-3 rounded">
      <a href="#" class="text-light" data-toggle="popover"
        data-trigger="hover" data-placement="top" data-content="ofc no.">
        Have voucher code?
      </a>
      <hr>
      <h5> Pricing Details </h5>

      <table class="w-100" cellpadding='5'>
        <tr>
          <td> Total price of the goods </td>
          <td class="text-right">
            Rp <input class="subhargaBarang2" type="text" name="subhargaBarang2" readonly>
          </td>
        </tr>
        <tr>
          <td> Shipping fee </td>
          <td class="text-right">
            Rp <input class="subhargaBarang2" type="text" name="ongkosKirim" readonly>
          </td>
        </tr>
        <tr>
          <td class="pt-4"> Total Payment </td>
          <td class="pt-4 text-right">
            Rp <input class="subhargaBarang2" type="text" name="totalBayar" readonly>
          </td>
        </tr>
        <tr>
          <td colspan="2" class="text-center">
            {{ Form::submit('Select payment method', ['class'=>'btn btn-danger mt-3', 'id'=>'submitSatu']) }}
          </td>
        </tr>
      </table>
      {{ Form::close() }}
    </div>

  </div>

  <! MODAL EDIT ALAMAT >
  <!-- The Modal -->
  <div class="modal" id="myAlamat">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-green1">
          <h5 class="modal-title">Fill Address</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body bg-green2">
          <div class="container">

              <div class="">

                <div class="input-group mb-3">
                  <input id="alamat_rumah2" type="text" class="form-control" placeholder="street name, house number" autofocus>
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> Home address </span>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input id="kecamatan2" type="text" class="form-control" placeholder="sub-district">
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> sub-district </span>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input id="kota2" type="text" class="form-control" placeholder="city of residence">
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> City </span>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input id="provinsi2" type="text" class="form-control" placeholder="province & postal code. e.g. Banten 15443">
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> Province </span>
                  </div>
                </div>

              </div>
              <button id="simpanAlamat" type="button" class="btn btn-primary"> Save </button>

          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer bg-green1">
        </div>

      </div>
    </div>
  </div>

</body>

@include('english.en-footer')

<script src="{{ asset('js/alamat.js') }}"></script>
<script src="{{ asset('js/resetAlamat.js') }}"></script>
<script src="{{ asset('js/rincianHarga.js') }}"></script>
<script src="{{ asset('js/popover.js') }}"></script>
<script src="{{ asset('js/autofocusModal.js') }}"></script>
<script src="{{ asset('js/en-requiredInputs.js') }}"></script>

</html>
