<?php 
	//перевіряємо чи існують змінні. Якщо не існують ставимо значення - "невідомий"
	if (!empty($_POST['name'])){
		$name = $_POST['name'];
	} else $name = "невідомий";
	if (!empty($_POST['message'])){
		$message = $_POST['message'];
	} else $message = "невідомий";

	echo "$name";
	echo "<br>";
	echo "$message";
 ?>