<!--<?php 
	// Може пригодитися. Не памятаю у якому випадку, але буває що сервер повертає 304 (не змінювався) і тоді перевірка статуса 200 не пройде, відповідно і не виконається ніяка подія.

	//header('Cache-Control: no-store; no-cache')
 ?>-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Приклад HEAD запиту для AJAX на чистому JS</title>
	<script>
		window.onload = function () {
			var result = document.getElementById("result");
			//стоворюємо обєкт аяксу
			var ajax = new XMLHttpRequest();
			//прописуємо мтод head
			ajax.open("HEAD", "options.php", true);
			//вішаємо хендлер
			ajax.onreadystatechange = function(){
				//функція хендлера
				if (ajax.readyState == 4 & ajax.status == 200){
					//тут і відбувається запит до заголовків
					phrase = ajax.getResponseHeader("Ajax-Message");
					
					//Суть запиту HEAD в тому, що ігнорується все тіло файла, а запит виконується лише до заголовків
					//phrase+=ajax.responseText;

					//вивід результатів
					result.innerHTML = phrase;
				}
			}
			ajax.send(null);
		}
	</script>
</head>
<body>
	<div id="result"></div>
</body>
</html>