# Первичная документация

1. Каждая отправка текста юзеру будет инициировать
	* Внесение текста в БД сайта
	* Отправка запроса Нейроботу

2. Для отладки и т.п. 
	* по адресу http://bot.gexar.tk/request_test.php скрипт будет зеркалить post-запросы в json
 
3. Ответить юзеру можно, отправив POST-запрос на http://bot.gexar.tk/api/
В запросе должны быть следующие параметры:
	* send_message — любое не пустое значение, например "1"
	* ssid — сессия юзера
	* text — текст сообщения

4. Для ручного теста можно вставить в строку браузера:
> data:text/html, <form action="http://bot.gexar.tk/api/" method="post"><input name="send_message" value="1"><input name="ssid"><input name="name"><input name="text"><button type="submit">Send</button></form>
