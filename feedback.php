<?php
session_start();
$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];
if (array_key_exists('user', $_SESSION)){
    $user_id = $_SESSION['user']['id'];
}
else{
    $user_id = null;
}
$mysql = new mysqli ("localhost","root", "", 'hotel_database');
$add_message = $mysql->query("
                    INSERT INTO `communication`( `id_user`, `name`, `email` ,`message`) 
                    VALUES('$user_id', '$name', '$email', '$text') 
                ");

$mysql->close();


$log = "Отправлено сообщение для email - " . $email . " " . date('Y-m-d h:i:s A');
file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);

echo "Сообщение отправлено";
?>