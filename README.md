# register
Register
<?php
$host = 'localhost';
$database = 'сайт';
$user = 'root';
$password = '';
?>
<?php
require_once 'login.php';


$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

$log=$_POST['login'];
$pas=$_POST['password'];
if(isset($_POST['submit'])){
    $query = mysqli_query($link,"SELECT Id, Password FROM users WHERE Login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if($data['password'] == sha1($_POST['password'])){
	setcookie("log", $log);
	setcookie("pass", $pas, time()+3600);
	}
 }
mysqli_close($link);
?>
<?php

if(isset($_GET['logout']) && $_GET['logout'] == 'yes'){
	setcookie("log", "", $login, time()-3600);
	setcookie("pass", "", $password, time()-3600);
	header("Location: form.php");
	die();
}

$hash=$password;
if ($_POST['login'] == '') {
    $message='Логин пуст!<br/>';
}
if ($_POST['password'] == '') {
    $message='Пароль пуст!<br/>';
}
if (sha1($_POST['password'])==$hash){
	$d="D";
}
header("Location: form.php?m={$message}&d={$d}");
?>
