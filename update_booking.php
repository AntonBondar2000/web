<?php 
    session_start();
    $id_booking = $_POST['id_booking'];
    $room = $_POST['room'];
    $guests = $_POST['guests'];
    $mysql = new mysqli ("localhost","root", "", 'hotel_database');
    $update = $mysql->query("
                    UPDATE `booking` SET `room` = '$room', `guests` = '$guests' WHERE `booking`.`id` = '$id_booking'
                ");
    $mysql->close();

    $log = "Пользователь: " . $_SESSION['user']['id'] . " - изменил свои данные бронирования для брони №". $id_booking . " " . date('Y-m-d h:i:s A');
    file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);

    header('Location: /Hotel/personal_account/personal_account.php');
 ?>