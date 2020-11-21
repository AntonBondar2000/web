<?php

session_start();

$login = filter_var(trim( $_POST['login']), FILTER_SANITIZE_STRING);
$password = md5(filter_var(trim( $_POST['password']), FILTER_SANITIZE_STRING)."Word");


$mysql = new mysqli ("localhost","root", "", 'hotel_database');

$check_user_login = $mysql->query("
SELECT * FROM `users` WHERE `login` = '$login'              
");
$check_user_login = $check_user_login->fetch_assoc();
if ($check_user_login == NULL){
    echo "Пользователь с таким логином не существует";
    unset($_SESSION['user']);
    exit();
}

$check_user = $mysql->query("
           SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'               
");
$check_user = $check_user->fetch_assoc();

if ($check_user == NULL){
    echo "Не верный пароль";
    unset($_SESSION['user']);
    exit();
}


$_SESSION['user'] = [
    "id" => $check_user['id'],
    "full_name" => $check_user['full_name'],
    "email" => $check_user['email'],
    "phone" => $check_user['phone'],
    "login" => $check_user['login'],
    "root" => $check_user['root']
];

$log = "Пользователь: " . $_SESSION['user']['id'] . " - Авторизовался " . date('Y-m-d h:i:s A');
file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);

$mysql->close();

header('Location: /Hotel/home_page/home.php');


?>