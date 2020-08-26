$('#simpanAlamat').click(function() {
  var alamat_rumah = $('#alamat_rumah2').val();
  var kecamatan = $('#kecamatan2').val();
  var kota = $('#kota2').val();
  var provinsi = $('#provinsi2').val();

  $('input[name=alamat_rumah]').val(alamat_rumah);
  $('input[name=kecamatan]').val(kecamatan);
  $('input[name=kota]').val(kota);
  $('input[name=provinsi]').val(provinsi);

  $('#alamat_rumah2').val('');
  $('#kecamatan2').val('');
  $('#kota2').val('');
  $('#provinsi2').val('');
  $('#myAlamat').modal('hide');
});
