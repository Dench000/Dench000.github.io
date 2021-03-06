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

<!DOCTYPE>
<html>
<head>
	<title>RetroGame</title>
	<link rel="stylesheet" type="text/css" href="main.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
	<meta charset="UTF-8"/>
</head>
<body>
<div class="body_slides">
	<li></li>
	<li></li>
	<li></li>
	<li></li>
</div>

<a href="#">
	<div class="main">
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
		<img src="img/nlogo.png"/>
	</div>
</a>

<div class="wrapper">
	<div class="page">
		<a href="gamelist.html"><article>
			<img src="img/gameicon.png"/>
			<h1>Список игр</h1>
		</article></a>
		<a href="projectlist.html"><article>
			<img src="img/projecticon.png"/>
			<h1>О проекте</h1>
		</article></a>
		<a href="signup.php">
			<img src="img/regicon.png"/>
			<h1>Вход/Регистрация</h1>
		</article></a>
		<article class="con"><h5>Погрузись в мир старых игр. Бей рекорды и соревнуйся с друзьями.</h5></article>
		<article class="con"><h5>На сайте собранно большинство так всеми любимые старые игры.</h5></article>
		<article class="con"><h5>Войдите в свой профиль или создайте новый, чтобы ваш прогресс не потерялся!</h5></article>
	</div>
</div>

<div class="inf">
	<h1>Первая игра в мире!</h1>
	<h2>
			Самая первая компьютерная игра — дуэль двух космических кораблей — называлась Spacewar.
		    За пару месяцев в свободное от работы время ее создали несколько программистов из Массачусетского технологического института.
			В январе 1962 они написали простую программу, а через месяц это была уже простенькая игра с двумя стреляющими друг в друга ракетами.
			Spacewar работала на новом по тем временам компьютере PDP-1.
			Его процессор выполнял 100 тысяч операций в секунду (современные, напомним, разгоняются до 2 миллиардов), а оперативной памяти у PDP-1 было 9 килобайт.

			На круглый катодный дисплей выводилась карта боевых действий — фрагмент ночного неба, копирующий расположение звезд над Кембриджем.
			Два противника с помощью клавиатуры или джойстика могли перемещать свои шаттлы и стрелять.
			Боекомплект и количество топлива были ограничены.
			Чтобы увернуться от выстрела, можно было крутануться вокруг звезды в центре карты, используя ее гравитацию, или совершить «гиперпрыжок» — корабль исчезал
			и появлялся в случайном месте карты.
			Spacewar стала и первой коммерческой игрой.
			В 1971 году появилась ее аркадная версия Computer Space, которая, правда, успеха не имела.
			Кроме того, за несколько месяцев до этого игровой автомат с другой модификацией Spacewar — Galaxy Game — был установлен в помещении стэнфордского
			студенческого союза.
			Galaxy Game пользовалась огромным успехом в течение шести лет, что позволило создателю автомата Биллу Питтсу вернуть вложенные в проект 60 тысяч долларов.
			Сегодня его версия Spacewar в коллекции Computer Museum History Center в Маунтин Вью, Калифорния.

			Интересно, что своим создателям Spacewar не принесла никакого дохода, кроме славы в узких программистских кругах.
			«Единственные деньги, которые я заработал на Spacewar, это гонорары за консультации в судебных спорах 1970-х
			годов, связанных с игровой индустрией», — утверждает один из создателей игры Алан Коток (Alan Kotok).

			P.S. Речь идет о первой компьютерной игре, получившей широкое распространение.
			Поскольку до этого создавались штучные игры на базе суперкомпьютеров,
			такие как «OXO» (1952) и  «Tennis for Two»(1958).
	</h2>
</div>

	<div class="game">
		<div class="progame">
			<div class="block1"><img src="img/snake.png"/><h2>Змейка</h2></div>
			<div class="block2"><img src="img/snake.png"/><h2>21</h2></div>
			<div class="block3"><img src="img/snake.png"/><h2>Скоро...</h2></div>
			<h2><a href="#"><u>+ еще</u></a></h2>
		</div>
		<div class="sidebar"></div>
	</div>
<footer>
	<div class="soc">
		<a href="#"><img src="img/vkicon.png"/></a>
		<a href="#"><img src="img/nmkicon.png"/></a>
		<a href="#"><img src="img/insticon.png"/></a>
		<a href="#"><img src="img/tubeicon.png" color="white"/></a>
	</div>
</footer>
</body>
</html>