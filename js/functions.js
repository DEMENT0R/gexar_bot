function UpdateChat {
  $.post( "app.php", function() {
    alert( "success" );
  })
  .done(function() {
    alert( "second success" );
  })
  .fail(function() {
    alert( "error" );
  })
  .always(function() {
    alert( "finished" );
  });
}

function SendMessage {
  $.ajax({
    url: "app.php",
    context: document.body,
    success: function(){
      $(this).addClass("done");
    }
  });
}
