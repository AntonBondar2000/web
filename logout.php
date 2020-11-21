<?php

session_start();
$log = "Пользователь: " . $_SESSION['user']['id'] . " - Вышел из аккаунтра " . date('Y-m-d h:i:s A');
file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);
unset($_SESSION['user']);
header('Location: /Hotel/home_page/home.php');

?>