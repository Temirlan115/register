<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>

	<?php if(isset($_GET['m'])):?>
		<p style='color:red'><?php print $_GET['m'];?></p>
	<?php endif;?>
	
	<?php
	if (isset($_COOKIE['log'])){

		echo "Вы успешно авторизованы! <br/>";
		echo "<a href='login.php?logout=yes'>Выход</a><br/>";

	}
	if (isset($_COOKIE['log']) && $_COOKIE['log']=='tima.tl@mail.ru'){
		echo "<a href='admin.php?log=yes'>Добавить пользователя</a>";
	}else{
	    ?>
		<form action="login.php" method="POST">
		<p>Введите логин:<br> 
		<input type="text" name="login" /></p>
		<p>Введите пароль:<br> 
		<input type="text" name="password" /></p>
		<input type="submit" name='submit' value="Войти">
		</form>
	<?php } ?>
</body>	
</html>