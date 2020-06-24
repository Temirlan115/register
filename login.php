<?php
/* Logout */
if(isset($_GET['logout']) && $_GET['logout'] == 'yes'){
	setcookie("log", "", $login, time()-3600);
	setcookie("pass", "", $password, time()-3600);
	header("Location: form.php");
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
$log= $_POST['login'];
$pas= $_POST['password'];
$message = '';


if(isset($_POST['submit'])){

	$query = mysqli_query($link, "SELECT * FROM users WHERE login='".mysqli_real_escape_string($link,$log)."' LIMIT 1");
	$data = mysqli_fetch_assoc($query);
	
		
	if($data['password'] == sha1($pas)){
		setcookie("log", $log);
		setcookie("pass", sha1($pas), time()+3600);
		
		if($log==$data['login']){
			header("Location: form.php");
		}else{
			setcookie("log", "", $login, time()-3600);
			setcookie("pass", "", $password, time()-3600);
			header("Location: form.php");
		}
	
	}else{
		$message = "Ошибка авторизации";
	}
}else{
	$message = "Ошибка запроса";
}

mysqli_close($link);

header("Location: form.php?m={$message}");
?>
