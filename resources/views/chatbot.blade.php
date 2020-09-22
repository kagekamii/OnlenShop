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
    background-color: #000;
    margin-bottom: 5px;
    margin-top: -10px;
  }
  td:nth-child(1n+2) {
    border-left: 1px dashed;
  }
</style>

@include('header1')

<body class="bg-navy">

  <div class="row mt-5 ml-5">

    <div class="col-md-6 row h-100 bg-wat">
      <div class="tab bg-sky m-2">
        <button class="tablinks bg-grey" onclick="openChat(event, 'chatbot1')" id="defaultOpen">Abang Iggy</button>
        <br>
        <button class="tablinks bg-grey" onclick="openChat(event, 'chatbot2')">Chatbot 2</button>
      </div>

      <div id="chatbot1" class="col-md tabcontent bg-dark text-light m-2 mr-n1">
        <div id="vtuber"></div>
        <div class="dari-bawah">

          <div id="chatOutput1" class="bisa-scroll"></div>

          <input type="text" id="chatInput" class="chat-bawah w-75" placeholder="ketik sesuai isi tabel" autofocus>
          <button type="button" class="chat-bawah2 w-25"> Kirim </button>

        </div>
      </div>

      <div id="chatbot2" class="col-md tabcontent bg-wheat m-2">
        bbb
      </div>
    </div>

    <div class="col-md-4 bg-sky h-100 ml-5 p-2 rounded">
      <h5> <pre>Panduan chatbot</pre> </h5>
      <hr>
      Silahkan klik tombol di bawah: <br>
      <button type="button" class="btn bg-wat m-2" data-toggle="modal" href="#myTable1">
        List Pertanyaan
      </button>
      <button type="button" class="btn bg-wat" data-toggle="modal" href="#myTable2">
        List Jawaban
      </button>

      <br>
      <strong style="font-family: Times;">
        *I don't translate chatbot to English.
      </strong>

      @include('modal-chatbot1')
      @include('modal-chatbot2')
    </div>
  </div>

  @include('modal-login')
  @include('modal-register')

</body>

@include('footer')


<script src="{{ asset('js/logoutButton.js') }}"></script>
<script src="{{ asset('js/tabvertical.js') }}"></script>
<script src="{{ asset('js/chatbot.js') }}"></script>

</html>
