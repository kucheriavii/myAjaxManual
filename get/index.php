<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Приклад GET запиту для AJAX на чистому JS</title>
	<script>
		window.onload = function(){
			//не стосується прикладу. Просто ловлю елемент, при кліку по якому буде виконано запит.
			var button = document.getElementById("button");
			//при клыку на кнопку виконуэмо ф-цію ajaxGetRequest  
			button.addEventListener("click", ajaxGetRequest);

			//***************************************
			// GET запит на AJAX
			//***************************************
			function ajaxGetRequest () {
				//створюємо обєкт AJAX, з допомогою його будемо працювати з запитами
				var ajax = new XMLHttpRequest();
				//ajax.open - обовязковий метод. В ньому прописуються параметри запиту. 
				ajax.open("GET", "getTime.php", true);
				//якщо працюємо з асинхронним запитом то ми повинні відслідкувати event onreadystatechange на який і вішаємо handler 
				ajax.onreadystatechange = function() {
					if (ajax.readyState === 4 && ajax.status === 200){
						//************************
						//виводимо результати
						//************************
						var result = document.getElementById('result');
						//чистий текст
						result.innerHTML = ajax.responseText
						//статус
						result.innerHTML += ajax.statusText
						//статус число
						result.innerHTML += ajax.status


					}
				}
				ajax.send(null)
			}

		}
	</script>
</head>
<body>
	<input type="submit" value="Click here" id="button">
	<div id="result"></div>
</body>
</html>