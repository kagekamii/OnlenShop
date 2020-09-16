$(document).ready(function() {
  $('#submitSatu').click(function(e) {
    let divAlert = $("<div>", {id:"alertBox2" ,"class":"alerting alert alert-danger"});
    $('.req_alamat').each(function() {
      if ( $(this).val() == "" ) {
        e.preventDefault();
        $('#alertBox').html(divAlert);
        $('#alertBox2').html("<b>Alamat</b> tidak boleh kosong!");
        // $('#alertBox').append(divAlert);
        // $('#alertBox2').append("<b>Alamat</b> tidak boleh kosong!");
        setTimeout(function() {
          $(".alerting").addClass('fade');
          $(".alert").alert('close');
        }, 1500);
        return false;
      }
      else if ( $('.req_kurir').val() == "" ) {
        e.preventDefault();
        $('#alertBox').html(divAlert);
        $('#alertBox2').html("<b>Kurir</b> tidak boleh kosong!");
        // $('#alertBox').append(divAlert);
        // $('#alertBox2').append("<b>Kurir</b> tidak boleh kosong!");
        setTimeout(function() {
          $(".alerting").addClass('fade');
          $(".alert").alert('close');
        }, 1500);
        return false;
      }
    });
  });

  $('#submitDua').click(function(e) {
    let rads = document.querySelectorAll('input[type=radio]:checked');
    let divAlert = $("<div>", {id:"alertBox2" ,"class":"alerting alert alert-danger"});
    if(rads.length === 0) {
      e.preventDefault();
      $('#alertBox').html(divAlert);
      $('#alertBox2').html("<b>Belum</b> memilih metode.");
      setTimeout(function() {
        $(".alerting").addClass('fade');
        $(".alert").alert('close');
      }, 1500);
      return false;
    }
    else if( $('#pilihan').html() == "" ) {
      e.preventDefault();
      $('#alertBox').html(divAlert);
      $('#alertBox2').html("<b>Pilih</b> salah satu metode.");
      setTimeout(function() {
        $(".alerting").addClass('fade');
        $(".alert").alert('close');
      }, 1500);
      return false;
    }
  });
});
