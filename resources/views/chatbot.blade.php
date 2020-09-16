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
</style>

<header>
  <div class="col-md bg-kuning text-right">
    <a href="/about" class="text-ungu1 mr-2 small" data-toggle="popover" data-trigger="hover"
    data-placement="right" data-content="punten">
      Tentang OnlenShop
    </a>
  </div>

  <nav class="col-md navbar navbar-expand-md bg-light justify-content-center border">
    <! LOGO>
    <a href="/home" class="mr-5">
      <img src="{{ asset('img/logo2.png') }}" alt="" width="70px">
    </a>

    <! KATEGORI>
    <div class="dropdown">
      <button type="button" class="btn btn-orange2 btn-sm dropdown-toggle" data-toggle="dropdown"> Kategori
      </button>
      <div class="dropdown-menu bg-sky">
        <a href="/kategori-komputer" class="dropdown-item"> Komputer </a>
        <a href="/kategori-handphone" class="dropdown-item"> Handphone </a>
        <a href="/kategori-makanminum" class="dropdown-item"> Makanan & Minuman </a>
      </div>
    </div>

    <! SEARCH BOX>
      {{ Form::open(['url'=>'/pencarian-item', 'method'=>'get']) }}
      {{ csrf_field() }}
        <div class="input-group">
          <input class="searchbox" type="text" name="kolomCari" value="{{ isset($keyword) ? $keyword:null }}"
          placeholder="masukkan nama/kategori barang" required>
          <button type="submit" class="btn-orange1 mr-5">
            <img src="img/search.png" width="20">
          </button>
        </div>
      {{ Form::close() }}

    <! KERANJANG & CHAT>
      <a href="/transaksi" class="keranjangchat kanan mr-3" title="Transaksi">
        <img src="{{ asset('img/keranjang.png') }}" width="20">
      </a>
      <a href="#" class="keranjangchat" title="Chat">
        <img src="{{ asset('img/message.png') }}" width="20">
      </a>

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

  <div class=" row mt-5 ml-5">

    <div class="col-md-6 row bg-wat">
      <div class="tab bg-sky m-2">
        <button class="tablinks bg-grey" onclick="openChat(event, 'chatbot1')" id="defaultOpen">Abang Iggy</button>
        <br>
        <button class="tablinks bg-grey" onclick="openChat(event, 'chatbot2')">Chatbot 2</button>
      </div>

      <div id="chatbot1" class="col-md tabcontent bg-dark text-light m-2 mr-n1">
        <div class="dari-bawah">

          <div id="chatOutput1" class="bisa-scroll"></div>

          <input type="text" id="chatInput" class="chat-bawah w-75" autofocus>
          <button type="button" class="chat-bawah2 w-25"> Kirim </button>

        </div>
      </div>

      <div id="chatbot2" class="col-md tabcontent bg-wheat m-2">
        bbb
      </div>
    </div>

    <div class="bg-sky h-100 p-2 ml-5 rounded">
      <h5> <pre>Panduan chatbot</pre> </h5>
      <hr>
      <span class="">bot hanya bisa menjawap kalimat:</span>
      <ul class="ml-n3">
        <li> barang ready? </li>
        <li> stock masih ada? </li>
        <li> barang sudah saya bayar </li>
      </ul>
      <hr>
      <small> <b>*huruf besar/kecil tidak berpengaruh</b> </small> <br>
      <small> <b>*bot masih dalam pengembangan</b> </small>
    </div>
  </div>

  @include('modal-login')
  @include('modal-register')

</body>

<footer>
  <div class="bg-info">
    &emsp;start 11 agustus 2020, tapi gk tiap hari dikerjain :'v
    <strong class="float-right mr-1 footer-text"> [Copyright, Master Paladin 2020] </strong>
  </div>
</footer>

<script src="js/logoutButton.js"></script>
<!tablinks gerbong>
<script>
  function openChat(evt, botName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(botName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>

<script type="text/javascript">
  let divOutput = $('#chatOutput1'),
      divScroll = document.querySelector('#chatOutput1');
      // chatBotArr = {"punten" : "mangga..",
      //               "barang ready?" : "Redy bos!",
      //               "stock masih ada?" : "Stock sedang kosong.",
      //               "barang sudah saya bayar" : "Pesanannya akan kami proses."};
  const userArr = [
            /*0*/["punten", "halo", "assalamualaikum", "permisi"],
            /*1*/["barang ready?", "barang apa aja yang ready?", "stock masih ada?"],
            /*2*/["barang sudah saya bayar", "tolong diproses barang saya"],
            /*3*/["korone no.1", "haachama no.1"]
                ];

  const botArr = [
            /*0*/["mangga..", "sae euy", "kumaha damang", "wa'alaikumsalam"],
            /*1*/["Ready bos!", "Stock lagi kosong.", "Tinggal nabati vanila sama teh gelas euy."],
            /*2*/["Pesanannya akan kami proses.", "Sabar atuh, yang beli banyak."],
            /*3*/["mestilah!", "korone / haachama? h3h3"]
                ];

  const alternatif = ["anjay", "misqueen bilang bos.", "betuah punya budak!"];

  $('.chat-bawah').on('keyup', function(e) {
    if(e.keyCode === 13) {
      let textInput = $('#chatInput').val();
      let divUser = $("<div>", {"class":"mb-3 text-right"});
      let chatUser = $("<div>", {"class":"border rounded p-1 mr-2 chat-atas"});

      let divBot = $("<div>", {"class":"mb-3 text-left"});
      let chatBot = $("<div>", {"class":"border rounded p-1 chat-atas"});

      if(textInput == '' ) {
        return false;
      }
      else {
        $('#chatOutput1').append(divUser);
        $(divUser).html(chatUser);
        $(chatUser).html(textInput);
        $('#chatInput').val('');

        $('#chatOutput1').append(divBot);
        $(divBot).html(chatBot);
        divScroll.scrollTop = divScroll.scrollHeight - divScroll.clientHeight;

        let textKecil = textInput.toLowerCase();
        let reply;
        let alter;

        for (var x = 0; x < userArr.length; x++) {
          for (var y = 0; y < botArr.length; y++) {
            if ( userArr[x][y] == textKecil ) {
              replies = botArr[x];
              reply = replies[Math.round(Math.random() * replies.length)];
            }
          }
        }
        setTimeout(function() {
          $(chatBot).html(reply);
        }, 400);

        // $.each(chatBotArr, function(key,val) {
        //   if(textInput.toLowerCase() === key) {
            // setTimeout(function() {
            //   $(chatBot).html(val);
            // }, 400);
        //   }
        // });
        // setTimeout(function() {
        //   $(chatBot).html("misqueen bilang bos.");
        // }, 399);
      }
    }
  });
  $('.chat-bawah2').click(function() {
    let entah = $('.dari-bawah');

    let textInput = $('#chatInput').val();
    let divUser = $("<div>", {"class":"mb-3 text-right"});
    let chatUser = $("<div>", {"class":"border rounded p-1 mr-2 chat-atas"});

    let divBot = $("<div>", {"class":"mb-3 text-left"});
    let chatBot = $("<div>", {"class":"border rounded p-1 chat-atas"});
    if(textInput == '' ) {
      return false;
    }
    else {
      $('#chatOutput1').append(divUser);
      $(divUser).html(chatUser);
      $(chatUser).html(textInput);
      $('#chatInput').val('');

      $('#chatOutput1').append(divBot);
      $(divBot).html(chatBot);
      divScroll.scrollTop = divScroll.scrollHeight - divScroll.clientHeight;

      $.each(chatBotArr, function(key,val) {
        if(textInput.toLowerCase() === key) {
          setTimeout(function() {
            $(chatBot).html(val);
          }, 400);
        }
      });
      setTimeout(function() {
        $(chatBot).html("misqueen bilang bos.");
      }, 399.9);
    }
  });
</script>

</html>
