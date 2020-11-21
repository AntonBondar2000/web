
<?php 
    $id_booking = $_POST["delete_booking"];
    $mysql = new mysqli ("localhost","root", "", 'hotel_database');
    $delete = $mysql->query("
                         DELETE FROM `booking` WHERE `booking`.`id` = '$id_booking'
                                ");
    $mysql->close();
    header('Location: /Hotel/personal_account/personal_account.php');
 ?>