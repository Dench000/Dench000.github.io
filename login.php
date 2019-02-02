<?php
$dbc = mysqli_connect('localhost', 'root', 'din123', 'testbase') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = "SELECT * FROM `signup` WHERE username = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `signup` (username, password) VALUES ('$username', SHA('$password2'))";
			mysqli_query($dbc,$query);
			echo 'Всё готово, можете авторизоваться';
			mysqli_close($dbc);
			exit();
		}
		else {
			echo 'Логин уже существует';
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

<a href="index.php">
	<div class="main">
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
	</div>
</a>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label for="username">Введите ваш логин:</label>
	<input type="text" name="username">
	<label for="password">Введите ваш пароль:</label>
	<input type="password" name="password1">
	<label for="password">Введите пароль еще раз:</label>
	<input type="password" name="password2">
	<button type="submit" name="submit">Регистрация</button>
</form>

</body>
</html>