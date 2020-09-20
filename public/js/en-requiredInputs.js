$(document).ready(function() {
  $('#submitSatu').click(function(e) {
    let divAlert = $("<div>", {id:"alertBox2" ,"class":"alerting alert alert-danger"});
    $('.req_alamat').each(function() {
      if ( $(this).val() == "" ) {
        e.preventDefault();
        $('#alertBox').html(divAlert);
        $('#alertBox2').html("<b>Address</b> cannot be empty!");
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
        $('#alertBox2').html("<b>Courier</b> cannot be empty!");
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
      $('#alertBox2').html("<b>Hasn't</b> choosen a method yet.");
      setTimeout(function() {
        $(".alerting").addClass('fade');
        $(".alert").alert('close');
      }, 1500);
      return false;
    }
    else if( $('#pilihan').html() == "" ) {
      e.preventDefault();
      $('#alertBox').html(divAlert);
      $('#alertBox2').html("<b>Select</b> 1 of the methods.");
      setTimeout(function() {
        $(".alerting").addClass('fade');
        $(".alert").alert('close');
      }, 1500);
      return false;
    }
  });
});
