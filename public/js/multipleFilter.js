$("input[type=checkbox]").click(function() {
   $("td").hide();
   var val = [];
   $(":checkbox:checked").each(function(i) {
       val[i] = $(this).val();
       var val2 = val.join('');
       // $('#test').html(val2);

       if ( $("td[data-a="+val2+"]") ) {
          $("td[data-a="+val2+"]").show();

          if ( $("td[data-b="+val2+"]") )
             $("td[data-b="+val2+"]").show();

          if ( $("td[data-c="+val2+"]") )
             $("td[data-c="+val2+"]").show();

          if ( $("td[data-d="+val2+"]") )
             $("td[data-d="+val2+"]").show();

          if ( $("td[data-e="+val2+"]") )
             $("td[data-e="+val2+"]").show();
       }

   });
});
