<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
	<?php
	if (isset($_COOKIE['log'])){
		echo "Вы успешно авторизованы! <br/>";
		echo "<a href='login.php?logout=yes'>Выход</a>";
	}
	else{
	    ?>
		<form action="login.php" method="POST">
		<p>Введите логин:<br> 
		<input type="text" name="login" /></p>
		<p>Введите пароль:<br> 
		<input type="text" name="password" /></p>
		<input type="submit" value="Войти">
		</form>
	<?php
	}
	if(isset($_GET["m"]) && $_GET["m"]!='Y' && $_GET["d"]!='D'){
		echo "Ошибка авторизации <br/>";
		echo $_GET["m"];
	}
	?>
</body>	
</html>