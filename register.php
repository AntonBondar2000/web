<?php
session_start();
$mysql = new mysqli ("localhost","root", "", 'hotel_database');
$name = filter_var(trim( $_POST['Fio']), FILTER_SANITIZE_STRING);
$email = filter_var(trim( $_POST['email']), FILTER_SANITIZE_STRING);
$login = filter_var(trim( $_POST['login']), FILTER_SANITIZE_STRING);
$password = trim( $_POST['password']);
if(strlen($password) <=5){
    $_SESSION['error'] = [
        "error_message"=>"Слишком короткий пароль"
    ];
    header('Location: /Hotel/reg_auth/reg.php');
    exit();
}
$password = md5(filter_var(trim( $_POST['password']), FILTER_SANITIZE_STRING)."Word");
$phone = filter_var(trim( $_POST['phone']), FILTER_SANITIZE_STRING);

if(($name == "") || ($email == "") || ($login == "") || ($password == "") || ($phone == "")){
    $_SESSION['error'] = [
        "error_message"=>"У вас есть пустые поля"
    ];
    header('Location: /Hotel/reg_auth/reg.php');
    exit();
}
$repead_login = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$repead_email = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
$repead_phone = $mysql->query("SELECT * FROM `users` WHERE `phone` = '$phone' ");

$repead_login = $repead_login->fetch_assoc();
$repead_email = $repead_email->fetch_assoc();
$repead_phone = $repead_phone->fetch_assoc() ;
if(count($repead_login) != 0){
    $_SESSION['error'] = [
        "error_message"=>"Пользователь с таким логином существует"
    ];
    header('Location: /Hotel/reg_auth/reg.php');
    exit();
}
if(count($repead_email) != 0){
    $_SESSION['error'] = [
        "error_message"=>"Пользователь с таким email существует"
    ];
    header('Location: /Hotel/reg_auth/reg.php');
    exit();
}
if(count($repead_phone) != 0){
    $_SESSION['error'] = [
        "error_message"=>"Пользователь с таким телефоном существует"
    ];
    header('Location: /Hotel/reg_auth/reg.php');
    exit();
}

$mysql->query("
    INSERT INTO `users` (`full_name`, `email`, `login`, `password`, `phone`)
    VALUES('$name', '$email', '$login', '$password', '$phone')        
    ");

$log = "Совершена регистрация пользователя - " . $login . date('Y-m-d h:i:s A');
file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);
$mysql->close();
header('Location: /Hotel/home_page/home.php');
?>
