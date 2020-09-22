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
          /*3*/["bisa dikirim hari ini?"],
          /*4*/["korone no.1", "haachama no.1"]
              ];

const botArr = [
          /*0*/["mangga..", "sae euy", "kumaha damang", "wa'alaikumsalam"],
          /*1*/["Ready semua bos!", "Stock lagi kosong.", "Tinggal nabati vanila sama teh gelas euy."],
          /*2*/["Pesanannya akan kami proses.", "Sabar atuh, yang beli banyak."],
          /*3*/["Bisa, gan.", "Kalo udah lewat jam 13:00 dikirim besok.", "Kalau pakai gojek bisa."],
          /*4*/["Mestilah!", "<i>korone / haachama? h3h3"]
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

      for (var x = 0; x < userArr.length; x++) {
        for (var y = 0; y < botArr.length; y++) {
          if ( userArr[x][y] == textKecil ) {
            replies = botArr[x];
            reply = replies[Math.floor(Math.random() * replies.length)];
          }
        }
      }
      setTimeout(function() {
        $(chatBot).html(reply);
        if(reply == "Mestilah!") {
          let div = $("<div>", {"class":"alert alert-dismissable kejutan text-light"});
          let img = $("<img>", {src:"img/vtuber.png", "class":"vtuber"});
          $('#vtuber').html(div);
          $(div).append(img);
          setTimeout(function() {
            $(".kejutan").addClass('fade');
            $(".alert").alert('close');
          }, 1300);
        }
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
    setTimeout(function() {
      reply = alternatif[Math.floor(Math.random() * alternatif.length)];
      $(chatBot).html(reply);
    }, 399);

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

    let textKecil = textInput.toLowerCase();
    let reply;

    for (var x = 0; x < userArr.length; x++) {
      for (var y = 0; y < botArr.length; y++) {
        if ( userArr[x][y] == textKecil ) {
          replies = botArr[x];
          reply = replies[Math.floor(Math.random() * replies.length)];
        }
      }
    }
    setTimeout(function() {
      $(chatBot).html(reply);
      if(reply == "Mestilah!") {
        let div = $("<div>", {"class":"alert alert-dismissable kejutan text-light"});
        let img = $("<img>", {src:"img/vtuber.png", "class":"vtuber"});
        $('#vtuber').html(div);
        $(div).append(img);
        setTimeout(function() {
          $(".kejutan").addClass('fade');
          $(".alert").alert('close');
        }, 1300);
      }
    }, 400);
  }
  setTimeout(function() {
    reply = alternatif[Math.floor(Math.random() * alternatif.length)];
    $(chatBot).html(reply);
  }, 399);
});
