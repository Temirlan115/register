<?php
if (isset($_COOKIE['log']) && $_COOKIE['log']!='tima.tl@mail.ru'){
	header("Location: form.php");
	die();
}?>
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
	<form action="register.php" method="POST">
	<p>Имя:<br> 
	<input type="text" name="name1" /></p>
	<p>Логин:<br> 
	<input type="text" name="login1" /></p>
	<p>Пароль:<br> 
	<input type="text" name="password1" /></p>
	<input type="submit" name='submit' value="Добавить">
	</form>
	<?php
	echo "<a href='form.php'>Выход</a><br/>";
	?>
</body>	
</html>