<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Приклад POST запиту для AJAX на чистому JS</title>
	<style>
		#name, #message{
			display: block;
			margin-bottom: 20px;
		}
	</style>

	<script>
		//запускаємо скріпт при загрузці сторінки
		window.onload = function(){
			var result = document.getElementById('result')
			//шукаємо кнопку, щоб повісити хендлер
			var button = document.getElementById("button");
			//вішаємо хендлер
			button.addEventListener('click', ajaxPostReq);
			//************************************
			//функція з запитом POST
			//************************************
			function ajaxPostReq () {
				//Просто для прикладу. Зчитуємо дані введені в поля інпутів.
				var name = document.getElementById("name").value;
				var message = document.getElementById("message").value;
				//Формуємо запит, який пошлемона сервер
				var sendString = "name="+ name +"&message=" + message;
				
				//створюємо обєкт AJAX, з допомогою його будемо працювати з запитами
				var ajax = new XMLHttpRequest();
				//ajax.open - обовязковий метод. В ньому прописуються параметри запиту.
				ajax.open("POST", "registration.php", true);
				//якщо працюємо з асинхронним запитом то ми повинні відслідкувати event onreadystatechange на який і вішаємо handler 
				ajax.onreadystatechange = function(){
					if (ajax.readyState == 4){
						//виводимо результат
						result.innerHTML = ajax.responseText;
					}

				}
					//ОБОВЯЗКОВО ПРОПИСУЄМО ЗАГОЛОВОК. БЕЗ НЬОГО ЗАПИТ НЕ ВІДПРАВИТЬСЯ.
					ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					//також може знадобитися слідуючий заголовок
					//ajax.setRequestHeader("Content-Length", sendString.length);
					//відправляємо стрічку з даними. Яку ми сформували в рядку 27-28
					ajax.send(sendString);
			}
		}
	</script>
</head>
<body>
	<h1>Приклад POST запиту для AJAX на чистому JS</h1>
	<label for="name">Enter your name</label>
	<input type="text" name="name" id="name">
	<label for="message">Enter your message</label>
	<textarea name="message" id="message" cols="30" rows="10"></textarea>
	<input type="submit" id="button">
	<div id="result"></div>
</body>
</html>