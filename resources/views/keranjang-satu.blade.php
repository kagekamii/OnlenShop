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
  .atas {
    vertical-align: top;
  }
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

<header>
  <div class="col-md bg-kuning text-right">
    <a href="#" class="text-ungu1 mr-2 small"> Tentang OnlenShop </a>
  </div>
</header>

<body class="bg-navy">

  <div class="row m-5 text-light justify-content-center">

    <div class="col-md-5 mr-5">
      <div class="col-md bg-secondary p-3 rounded text-right">
        {{ Session::get('username') }} - {{ Session::get('nohp') }}
        <br><br>
      {{ Form::open(['url' => '/keranjang-satuhalf', 'method' => 'get']) }}
      {{ csrf_field() }}
        <img class="mb-1 invert" src="{{ asset('img/rumah.png') }}" alt="rumah" width="20"> Alamat Pengiriman:<br>
        <input class="alamat" type="text" name="alamat_rumah" value="" readonly><br>
        <input class="alamat small" type="text" name="kecamatan" value="" readonly><br>
        <input class="alamat small" type="text" name="kota" value="" readonly><br>
        <input class="alamat small" type="text" name="provinsi" value="" readonly><br>
        <hr class="mb-1">
        <a class="text-green1" href="#" id="resetAlamat"> Reset Alamat </a> -
        <a class="text-green1" href="#myAlamat" data-toggle="modal"> Edit Alamat </a>

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
            <td class="w-50"> Jumlah: {{ $jml_barang }} item </td>
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
              placeholder="Catatan untuk penjual (opsional)"></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">
              <select class="rounded inconsolata" id="kurir" name="kurir" onchange="gantiKurir();">

                <option value="">--- Pilih Kurir ---</option selected>
                <option value="jne2d-14000">
                  JNE Reg
                  &emsp;&emsp;&emsp;&emsp;&emsp;
                  (2 hari kerja)
                  &emsp;&ensp;
                  Rp 14.000
                </option>
                <option value="j&t3d-13000">
                  J&T Reg
                  &emsp;&emsp;&emsp;&emsp;&emsp;
                  (3 hari kerja)
                  &emsp;&ensp;
                  Rp 13.000
                </option>
                <option value="pos2d-15000">
                  Pos Indonesia
                  &emsp;&emsp;&emsp;
                  (2 hari kerja)
                  &emsp;&ensp;
                  Rp 15.000
                </option>
                <option value="sicepat1d-20000">
                  SiCepat Express
                  &emsp;&emsp;
                  (1 hari kerja)
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
          Perlindungan pengiriman dari <abbr title="iri bilang balls">Abang Iggy</abbr>
        </label>
      </div>
    </div>

    <! TOTAL PEMBAYARAN >
    <div class="col-md-4 bg-blue1 sticky h-100 p-3 rounded">
      <a href="#" class="text-light" data-toggle="popover"
        data-trigger="hover" data-placement="top" data-content="Tentu saja tidak!">
        Punya kode voucher?
      </a>
      <hr>
      <h5> Rincian Harga </h5>

      <table class="w-100" cellpadding='5'>
        <tr>
          <td> Total harga barang </td>
          <td class="text-right">
            Rp <input class="subhargaBarang2" type="text" name="subhargaBarang2" readonly>
          </td>
        </tr>
        <tr>
          <td> Ongkos Kirim </td>
          <td class="text-right">
            Rp <input class="subhargaBarang2" type="text" name="ongkosKirim" readonly>
          </td>
        </tr>
        <tr>
          <td class="pt-4"> Total Pembayaran </td>
          <td class="pt-4 text-right">
            Rp <input class="subhargaBarang2" type="text" name="totalBayar" readonly>
          </td>
        </tr>
        <tr>
          <td colspan="2" class="text-center">
            {{ Form::submit('Pilih metode bayar', ['class'=>'btn btn-danger mt-3']) }}
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
          <h5 class="modal-title">Isi Alamat</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body bg-green2">
          <div class="container">

              <div class="">

                <div class="input-group mb-3">
                  <input id="alamat_rumah2" type="text" class="form-control" placeholder="isi nama jalan, nomor rumah" required>
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> Alamat rumah </span>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input id="kecamatan2" type="text" class="form-control" placeholder="kecamatan" required>
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> Kecamatan </span>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input id="kota2" type="text" class="form-control" placeholder="kota tempat tinggal" required>
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> Kota </span>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input id="provinsi2" type="text" class="form-control" placeholder="provinsi & kodepos. contoh: Banten 15443" required>
                  <div class="input-group-append w-25">
                    <span class="input-group-text"> Provinsi </span>
                  </div>
                </div>

              </div>
              <button id="simpanAlamat" type="button" class="btn btn-primary"> Simpan </button>

          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer bg-green1">
        </div>

      </div>
    </div>
  </div>

</body>

<footer>
  <div class="bg-info">
    &emsp;start 11 agustus 2020, tapi gk tiap hari dikerjain :'v
    <strong class="float-right mr-1 footer-text"> [Copyright, Master Paladin 2020] </strong>
  </div>
</footer>

<script src="{{ asset('js/alamat.js') }}"></script>
<script src="{{ asset('js/resetAlamat.js') }}"></script>
<script src="{{ asset('js/rincianHarga.js') }}"></script>
<script src="{{ asset('js/popover.js') }}"></script>

</html>
