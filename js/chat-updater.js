$script_update_time = 1000;

setInterval(function(){
  $(document).ready(function(){              // по окончанию загрузки страницы
    $('#chat-history').load('app.php?get_message=4'); // загрузку HTML кода из файла example.html
  });

  /*
  var chat_messages = $.get("app.php?get_message=3")
  .success(function() { alert("Успешное выполнение"); })
  .error(function() { alert("Ошибка выполнения"); })
  .complete(function() { alert("Завершение выполнения"); });
  */
}, $script_update_time);
