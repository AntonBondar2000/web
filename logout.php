<?php

session_start();
unset($_SESSION['user']);
header('Location: /Hotel/home_page/home.php');

?>