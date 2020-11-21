<?php 
    session_start();
    print_r($_POST);
    $id_booking = $_POST['id_booking'];
    $room = $_POST['room'];
    $guests = $_POST['guests'];
    $mysql = new mysqli ("localhost","root", "", 'hotel_database');
    $update = $mysql->query("
                    UPDATE `booking` SET `room` = '$room', `guests` = '$guests' WHERE `booking`.`id` = '$id_booking'
                ");
    $mysql->close();
    header('Location: /Hotel/personal_account/personal_account.php');
 ?>