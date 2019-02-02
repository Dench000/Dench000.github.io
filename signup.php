<?php
$dbc = mysqli_connect('localhost', 'root', 'din123', 'testbase');
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
<meta charset="utf-8">
<link href="style/style.css" rel="stylesheet"/>
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

<a href="index.php">
	<div class="main">
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
	</div>
</a>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="username">Логин:</label>
	<input type="text" name="username">
	<label for="password">Пароль:</label>
	<input type="password" name="password">
	<button type="submit" name="submit">Вход</button>
	<a href="login.php"><input type="adres" value="Регистрация" id="send" name="send"/></a>
</form>

</body>
</html>