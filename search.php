<?php
session_start();
$search_query=$_POST['search_query'];
$id_user = $_SESSION['user']['id'];
$mysql = new mysqli ("localhost","root", "", 'hotel_database');
$search_query = trim($search_query);
if(strlen($search_query)!= 0){
    $booking = $mysql->query("
    SELECT * FROM `booking` WHERE `id_user` = '$id_user' AND `room` LIKE '%$search_query%' ORDER BY `id` DESC   
        ");
    $booking = $booking->fetch_all();
    $all_count = count($booking);    
}
else{
    $booking = $mysql->query("
                SELECT * FROM `booking` WHERE `id_user` = '$id_user' ORDER BY `id` DESC
            ");
    $booking = $booking->fetch_all();
    $all_count = count($booking); 
}
$_SESSION['bookings'] = [
    "booking"=> $booking,
    'all_count'=>$all_count
];
$mysql->close();
header('Location: /Hotel/personal_account/personal_account.php');
?>