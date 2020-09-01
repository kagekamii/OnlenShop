function gantiKurir(){
  var x = $('input[name=subhargaBarang]').val();
  var xRes = x.replace(/\,/g,'');
  xRes = parseInt(xRes);
  $('input[name=subhargaBarang2]').val(x);

  var y = $('#kurir').val();
  var yRes = y.split('-');
  var yNum = parseInt(yRes[1]);
  var number = new Intl.NumberFormat();
  $('input[name=ongkosKirim]').val(number.format(yRes[1]));

  var z = xRes+yNum;
  $('input[name=totalBayar]').val(number.format(z));
}
