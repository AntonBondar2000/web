<?php
$name = filter_var(trim( $_POST['Fio']), FILTER_SANITIZE_STRING);
$email = filter_var(trim( $_POST['email']), FILTER_SANITIZE_STRING);
$login = filter_var(trim( $_POST['login']), FILTER_SANITIZE_STRING);
$password = md5(filter_var(trim( $_POST['password']), FILTER_SANITIZE_STRING)."Word");
$phone = filter_var(trim( $_POST['phone']), FILTER_SANITIZE_STRING);

if(($name == "") || ($email == "") || ($login == "") || ($password == "") || ($phone == "")){
    echo "неправильно введены данные";
    exit();
}
$mysql = new mysqli ("localhost","root", "", 'hotel_database');

$repead = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' OR `email` = '$email' OR `phone` = '$phone' ");

$repead = $repead->fetch_assoc();

if(count($repead)==0){
    $mysql->query("
    INSERT INTO `users` (`full_name`, `email`, `login`, `password`, `phone`)
    VALUES('$name', '$email', '$login', '$password', '$phone')        
    ");
    $mysql->close();
    header('Location: /Hotel/home_page/home.php');
}
else{
    echo "Пользователь с таким логином или почтой или телефоном существует";
    $mysql->close();
}
?>
