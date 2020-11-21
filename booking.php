<?php
session_start();

if (!array_key_exists('user', $_SESSION)) {
    echo "Зарегистрируйтесь";
    exit();

}


$date_begin = $_POST['data_begin'];
$date_end = $_POST['data_end'];
$room = $_POST['room'];
$guests = filter_var(trim($_POST['guests']), FILTER_SANITIZE_STRING);
$id = $_SESSION['user']['id'];
$login = $_SESSION['user']['login'];
$full_name = $_SESSION['user']['full_name'];

$mysql = new mysqli("localhost", "root", "", 'hotel_database');

$mysql->query("
    INSERT INTO `booking` (`id_user`, `login`, `full_name`, `date_begin`, `date_end`, `room`, `guests`)
    VALUES('$id', '$login', '$full_name', '$date_begin', '$date_end', '$room', '$guests')        
    ");

$mysql->close();

$log = "Пользователь: " . $_SESSION['user']['id'] . " - Забронировал номер " . date('Y-m-d h:i:s A');
file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);

echo "Бронирование успешно";
exit();

?>