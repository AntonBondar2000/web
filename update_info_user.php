<?php 
    session_start();
    $user_id = $_SESSION["user"]['id'];
    $new_full_name = $_POST["update_fullname"];
    $new_email = $_POST["update_email"];
    $new_phone = $_POST["update_phone"];

    $mysql = new mysqli ("localhost","root", "", 'hotel_database');
    $update = $mysql->query("
                    UPDATE `users` SET `full_name` = '$new_full_name', `email` = '$new_email', `phone` = '$new_phone' WHERE `users`.`id` = '$user_id'
                ");
    $mysql->close();

    $log = "Пользователь: " . $_SESSION['user']['id'] . " - изменил свои данные " . date('Y-m-d h:i:s A');
    file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);


    header('Location: /Hotel/personal_account/personal_account.php');
 ?>