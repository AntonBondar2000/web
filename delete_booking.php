
<?php 
    session_start();
    $id_booking = $_POST["id_booking"];
    $mysql = new mysqli ("localhost","root", "", 'hotel_database');
    $delete = $mysql->query("
                         DELETE FROM `booking` WHERE `booking`.`id` = '$id_booking'
                                ");
    $mysql->close();

    $log = "Пользователь: " . $_SESSION['user']['id'] . " - отменил бронирование №". $id_booking . " " . date('Y-m-d h:i:s A');
    file_put_contents('log/log.txt', $log . PHP_EOL, FILE_APPEND);

    echo "Успешно удалено";
    exit();
 ?>