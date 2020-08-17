//AMBIL ID LOGIN BUTTON
$("#login_click").click(function() {
  //AJAX JQUERY
  $.ajax({
    type: post,
    url: '/home/ajax_profil_user',
    data: '_token = <?php echo csrf_token() ?>',
    success: function(data){
      //UBAH ISI DATA PADA ID profil_user
      $("#profil_user").html(data.msg);
    }
  });

});
