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
	$query = mysqli_query($link,"INSERT INTO 'users' ('Id', 'Name', 'Login', 'Password') VALUES (NULL, '$name', '$log', '$pas')");
	$data = mysqli_fetch_assoc($query);
	if ($data){
		$message='Пользователь добавлен';	
	}

}


mysqli_close($link);

header("Location: admin.php?m={$message}");
?>
