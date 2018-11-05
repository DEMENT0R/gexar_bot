$script_update_time = 1000;

//first messages loading
UpdateMessages();
//autoupdate
setInterval(function(){
  UpdateMessages();
}, $script_update_time);


$('#send-message').click(function(){
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
});

// FUNCTIONS
//update function
function UpdateMessages(){
  $('#chat-history').load('app.php?get_message=4');
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
