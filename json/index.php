<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JSON AJAX example</title>
	<script>
		window.onload = function () {
			//тут я видурнююсь, пробую використовувати ООП.
			//повністю логічно було б просто обявити змінні і не парити мізки
			var pageElement = {
				"result" : document.getElementById("result"), 	//div#result
				"button" : document.getElementById("button"), 	//input#button
				"ul" : "", 										//ul
				"ulli" : "" 									//ul li
			}
			var request = {
				"jsonAnswer":""									//сюда буду зберігати відповідь сервера. Власне текст json файла.
			}
			//Вішаємо хендлер на кнопочку
			pageElement.button.addEventListener("click", jsonReq);
			/******************************************************************************************/
			/*********************Коротеньке хавту, як користуватися ajax з json***********************/
			/******************************************************************************************/
			// 1. Створюємо обєкт XMLHttpRequest()
			function jsonReq() {	
				var ajax = new XMLHttpRequest();
				ajax.open("GET", "example.json", true);
				ajax.onreadystatechange = function(){	
					if (ajax.readyState === 4){
						
			// 2. Опрацьовуємо відповідь сервера через ф-цію JSON.parse
						request.jsonAnswer = JSON.parse(ajax.responseText);
					//добавляємо елемент ul - так буде гарніше виводитись выдповідь, це не обовязково - просто для естетичності
						pageElement.ul = pageElement.result.appendChild(createElement("ul",""));
						//перебираємо масив створений з json, і виводимо відповіді в окремих li
						for(var i = 0, length1 = request.jsonAnswer.length; i < length1; i++){
							pageElement.ulli = createElement("li", request.jsonAnswer[i].name) 
							pageElement.ul.appendChild(pageElement.ulli)
						}
					}
				}
				
				ajax.send(null)
			}
			/******************************************************************************************/
			/******************************************************************************************/
			/******************************************************************************************/
			//Функція, з допомогою якої простіше створювати елементи
			function createElement(tag, text){
				var element = document.createElement(tag);
				var elementText = document.createTextNode(text);
				element.appendChild(elementText);
				return element;
			}


		}
	</script>
</head>
<body>
	<div id="result"></div>
	<input type="submit" value="jsone test" id="button">
</body>
</html>