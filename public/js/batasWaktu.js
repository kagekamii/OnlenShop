$(document).ready(function() {
  var besok = new Date(1000*60*60*24 + +new Date()).getDate();
  var namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                    "Agustus", "September", "Oktober", "November", "Desember"];
  var bulan = namaBulan[new Date().getMonth()];
  var waktu = new Date().toLocaleTimeString('it-IT');
  var batasWaktu = waktu+', '+besok+' '+bulan+' 2020';

  var sekarang = new Date().getDate();
  var jam = new Date().getHours();
  var min = new Date().getMinutes();
  var sec = new Date().getSeconds();
  var ms = new Date().getMilliseconds();
  var kodeTransaksi = jam+''+min+''+sec+''+ms+'D'+sekarang;

  $('#timer').val(batasWaktu);
  $('#kode').val('T'+kodeTransaksi);
  $('#autoclick').trigger('click');
  // var x = setInterval(function() {
  //   var sekarang = new Date().getTime();
  //   $('#timer').html(sekarang);
  // }, 1000);
});
