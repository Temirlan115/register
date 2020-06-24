<?php

/* DB Connection */
$host = 'localhost';
$database = 'site';
$user = 'root';
$password = '';

$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

/* Get POST data */
$name= htmlspecialchars($_POST['name1']);
$log= htmlspecialchars($_POST['login1']);
$pas= sha1(htmlspecialchars($_POST['password1']));
$message = '';
$suc ='';


if(isset($_POST['submit'])){ 
	$query = "INSERT INTO users (name, login, password) VALUES ('{$name}', '{$log}', '{$pas}')";
	$data = mysqli_query($link, $query);

	if ($data){
		$suc='Пользователь добавлен';
	}else{
		$message='Не удалось добавить пользователя';
	}
}

mysqli_close($link);

header("Location: admin.php?m={$message}&s={$suc}");
?>
