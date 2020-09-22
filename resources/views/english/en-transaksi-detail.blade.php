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
    background-color: #aaa;
  }
  .khusus {
    border-top: 1px solid;
  }
</style>

@include('english.en-header1')

<body class="bg-navy">

  <div class="row m-4 justify-content-center text-light">

    <div class="col-md-4 text-center text-light">
      <div class="border p-2 mt-5">
        <img src="{{ asset('img/privasi.png') }}" alt="gambar" width="120px">
        <div class="col-md text-left" style="word-wrap: normal;">
          <strong> Always be aware of irresponsible parties </strong> <br>
          <ul class="ml-n4 mb-1">
            <li> Do not make payments with a nominal different from the one stated on your bill. </li>
            <li> Do not make transfers outside the account number in the name of Brother Iggy. </li>
          </ul>
          <a href="#" class="text-green1 ml-3" data-toggle="popover" data-trigger="focus"
          data-placement="right" data-content="Cari sendiri bos.">
            Learn more
          </a>
        </div>
      </div>
@foreach($status as $s)
      <div class="bg-blue2 text-dark p-2 mt-3">
        <div class="bg-wheat text-left p-2">

          <table class="w-100 mt-n1">

            <tr>
              <td class="atas">
                <span class="small text-secondary"> PAYMENT METHOD </span> <br>
                {{ $s->metode_bayar }}
              </td>
            </tr>

            <tr class="khusus">
              <td>
                <span class="small text-secondary"> SHIPPING ADDRESS </span> <br>
                {{ $s->alamat_rumah }} <br>
                {{ $s->kecamatan }} <br>
                {{ $s->kota }} <br>
                {{ $s->provinsi }} <br>
                Phone Number: <input class="no-border2" type="text" id="nohp" readonly>
              </td>
            </tr>

          </table>

        </div>
      </div>
    </div>

    <div class="col-md-6 text-right">
      <h4 class="mb-1"> Transaction Details </h4>
      <br>
      <div class="bg-wat text-dark p-3 mt-n2">
        <strong> Purchase List </strong>
      </div>
      <div class="bg-blue2 text-dark p-3">
        <div class="bg-wheat p-2">

          <table class="table-striped text-left w-100" cellpadding="15">
            <tr>
              <td class="atas">
                <span class="small text-secondary"> NUMBER </span> <br>
                <span> {{ $s->id }} </span>
              </td>
              <td class="atas">
                <span class="small text-secondary"> STALL </span> <br>
                <span> Abang Iggy </span>
              </td>
              <td class=""> <a href="/chat">Chat Stall</a> </td>
            </tr>

            <tr>
              <td colspan="3" class="atas">
                <span class="small text-secondary"> NOTE FOR STALL </span> <br>
                <span> {{ $s->catatan or '~' }} </span>
              </td>
            </tr>

            <tr>
              <td colspan="3" class="atas">
                <div class="row ml-n1">
                  <img src="{{ asset('img/').'/'.$s->barang['gambar'] }}" alt="gambar" width="100px">

                  <div class="ml-2 w-75">
                    {{ $s->barang['nama'] }}
                    <span class="float-right"> Rp {{ $s->total_bayar }} </span> <br>
                    <span class="smaller"> Amount: {{ $s->jml_barang }} </span> <br>
                    <span class="smaller"> Weight: {{ $s->barang['berat'] }}  </span>
                  </div>

                </div>
              </td>
            </tr>

            <tr>
              <td class="atas">
                <span class="small text-secondary"> PURCHASE STATUS </span> <br>
                <span>
                  @if( $s->batas_waktu3 == 'Kedaluwarsa' )
                    u wot m8? (Expired)
                  @else
                    why it takes so long to get ur mom credit card?
                  @endif
                </span>
              </td>
              <td class="atas">
                <span class="small text-secondary"> COURIER </span> <br>
                <span>
                  @if( $s->kurir == 'jne2d' )
                    JNE Reg (2 work days)
                  @elseif( $s->kurir == 'j&t3d' )
                    J&T Reg (3 work days)
                  @elseif( $s->kurir == 'pos2d' )
                    Pos Indonesia (2 work days)
                  @elseif( $s->kurir == 'sicepat1d' )
                    SiCepat Express (1 work days)
                  @endif
                </span>
              </td>
              <td class="atas">
                <span class="small text-secondary"> RECEIPT NUMBER </span> <br>
                <span> not even exists </span>
              </td>
            </tr>

            <tr>
              <td colspan="3" class="atas">
                <span class="small text-secondary"> INFORMATION </span> <br>
                <span>
                  @if( $s->batas_waktu3 == 'Kedaluwarsa' )
                    How dare u not buying this?
                  @else
                    Already give up, kid?
                  @endif
                </span>
              </td>
            </tr>

            <tr>
              <td>
                Need help?
                <a href="#" class="stay" data-toggle="popover" data-trigger="hover"
                data-placement="right" data-content="go commit stickbugged.">
                  FAQ
                </a>
              </td>
            </tr>
          </table>

        </div>
        <button type="button" class="btn btn-sm btn-primary mt-2 float-left" onclick="window.location.href='/en-transaksi2'">
          Back
        </button>

        @if( $s->batas_waktu3 == 'Kedaluwarsa' )
          <button type="button" class="btn btn-sm btn-warning mt-2" disabled> Cancel Transaction </button>
          <button type="button" class="btn btn-sm btn-danger mt-2" onclick="window.location.href='/en-transaksi-hapus/{{ $s->id }}'">
            Delete Transaction
          </button>
        @else
          <button type="button" class="btn btn-sm btn-warning mt-2" onclick="window.location.href='/en-transaksi-batal/{{ $s->id }}'">
            Cancel Transaction
          </button>
          <button type="button" class="btn btn-sm btn-danger mt-2" disabled> Delete Transaction </button>
        @endif
      </div>

    </div>
@endforeach

  </div>

  @include('modal-login')
  @include('modal-register')

</body>

@include('english.en-footer')

<script src="{{ asset('js/logoutButton.js') }}"></script>
<script src="{{ asset('js/popover.js') }}"></script>
<script type="text/javascript">
  $('.stay').click(function(e) {
    e.preventDefault();
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var nohp = @json($status[0]->nohp).slice(0,6);
    $('#nohp').val(nohp+'***');
  });
</script>

</html>
