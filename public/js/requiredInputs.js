$('#submitSatu').click(function(e) {
  $('.req_alamat').each(function() {
    if ( $(this).val() == "" ) {
      e.preventDefault();
      alert('Alamat tidak boleh kosong!');
      return false;
    }
    else if ( $('.req_kurir').val() == "" ) {
      e.preventDefault();
      alert('Kurir tidak boleh kosong!');
      return false;
    }
  });
});

$('#submitDua').click(function(e) {
  let rads = document.querySelectorAll('input[type=radio]:checked');

  if(rads.length === 0) {
    e.preventDefault();
    alert('Metode harus dipilih.');
    return false;
  }
  else if( $('#pilihan').html() == "" ) {
    e.preventDefault();
    alert('Metode harus dipilih.');
    return false;
  }

});
