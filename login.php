<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson');
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url = 'http://' . $_SERVER['HTTP_HOST'];
				header('Location: '. $home_url);
			}
			else {
				echo 'Извините, вы должны ввести правильные имя пользователя и пароль';
			}
		}
		else {
			echo 'Извините вы должны заполнить поля правильно';
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RetroGame</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
</head>
<body>
<div class="body_slides">
	<li></li>
	<li></li>
	<li></li>
	<li></li>
</div>

<a href="index.html">
	<div class="main">
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
	</div>
</a>

<form action="" method="post">
	<label for="email">Введите почту</label>
	<input type="email" id="email" name="email" placeholder="adres@example.ru"/>
	<label for="name">Введите ваше имя</label>
	<input type="text" id="name" name="name" placeholder="example"/>
	<label for="pass">Введите пороль</label>
	<input type="text" id="pass" name="pass" placeholder="123456"/>
	<input type="submit" value="Регистрация" id="send" name="send"/>
</form>

</body>
</html>