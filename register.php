<?php
/* Logout */
if(isset($_GET['logout']) && $_GET['logout'] == 'yes'){
	header("Location: admin.php");
	die();
}


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


if(isset($_POST['submit'])){
	$query = "INSERT INTO users (id, name, login, password) VALUES (NULL, $name, $log, $pas)";
	$data = mysqli_query($link, $query);
	print_r($data);
	if ($data){
		$suc='Пользователь добавлен';	
	}

}


mysqli_close($link);

header("Location: admin.php?m={$message}");
?>
