$script_update_time = 1000;

//first messages loading
UpdateMessages();
//autoupdate
setInterval(function(){
  UpdateMessages();
}, $script_update_time);

//отправка сообщения
//при нажатии кнопки
$('#send-message').click(function(){
  sendMessage();

  $('#chat-input-field').val('');
});
//при нажатии enter
$("#chat-input-field").keyup(function(event){
  if(event.keyCode == 13){
    sendMessage();
  }
});

// FUNCTIONS
//update function
function UpdateMessages(){
  $('#chat-history').load('app.php?get_message=2');
}

//AJAX POST DEBUG
function onAjaxSuccess(data)
{
  //alert(data);
}

//get cookie
function get_cookie ( cookie_name )
{
  var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

  if ( results )
    return ( unescape ( results[2] ) );
  else
    return null;
}

//send message
function sendMessage(){
  $.post(
    "app.php",
    {
      send_message: "1",
      id: 0,
      ssid: get_cookie ( "ssid" ),
      name: get_cookie ( "user_name" ),
      text: $('#chat-input-field').val(),
      //updated: ''
    },
    onAjaxSuccess //debug
  );

  $('#chat-input-field').val('');

  $.post("stupid_bot.php");
}
