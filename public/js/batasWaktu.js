$(document).ready(function() {
  var besok = new Date(1000*60*60*24 + +new Date()).getDate();
  var namaBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                    "Agustus", "September", "Oktober", "November", "Desember"];
  var bulan = namaBulan[new Date().getMonth()];
  var bulan2 = new Date().getMonth()+1;
  var waktu = new Date().toLocaleTimeString('it-IT');
  var batasWaktu = waktu+', '+besok+' '+bulan+' 2020';
  var batasWaktu2 = bulan2+'/'+besok+'/2020'+' '+waktu;

  // SPLIT FORMAT
  var tes1 = new Date(batasWaktu2).toLocaleString('en-GB').split(' ');
  // SPLIT TANGGAL
  var tes2 = tes1[0].split('/');
  // SPLIT TAHUN KARNA ADA 'KOMA' NEMPEL
  var tahun = tes2[2].split(',');
  // FORMAT SESUAI PHP
  var batasWaktuFix = tahun[0]+'-'+tes2[1]+'-'+tes2[0]+' '+tes1[1];

  var sekarang = new Date().getDate();
  var jam = new Date().getHours();
  var min = new Date().getMinutes();
  var sec = new Date().getSeconds();
  var ms = new Date().getMilliseconds();
  var kodeTransaksi = jam+''+min+''+sec+''+ms+'D'+sekarang;

  $('#timer').val(batasWaktu);
  $('#timer2').val(batasWaktuFix);
  $('#kode').val('T'+kodeTransaksi);
  $('#autoclick').trigger('click');
  // var x = setInterval(function() {
  //   var sekarang = new Date().getTime();
  //   $('#timer').html(sekarang);
  // }, 1000);
});
