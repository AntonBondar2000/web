<?php
session_start();


if (!array_key_exists('user', $_SESSION)) {
    header('Location: /Hotel/home_page/home.php');
    exit();
}
else{
    $log = "Пользователь: " . $_SESSION['user']['id'] . " - Зашел на страницу личного аккаунта " . date('Y-m-d');
    file_put_contents('../log/log.txt', $log . PHP_EOL, FILE_APPEND);
}



$mysql = new mysqli("localhost", "root", "", 'hotel_database');
$id_user = $_SESSION['user']['id'];
$user_info = $mysql->query("
      SELECT * FROM `users` WHERE `id` = '$id_user'
      ");
$user_info = $user_info->fetch_all();

$login = $_SESSION['user']['login'];
$id_user = $_SESSION['user']['id'];




if (array_key_exists('bookings', $_SESSION)) {
    $booking = $_SESSION['bookings']['booking'];
    $all_count =  $_SESSION['bookings']['all_count'];
} else {
    $booking = $mysql->query("
    SELECT * FROM `booking` WHERE `id_user` = '$id_user' ORDER BY `id` DESC");
    $all_count =  mysqli_num_rows($booking);
    $booking = $booking->fetch_all();
}
unset($_SESSION['bookings']);

$rooms = $mysql->query("
      SELECT name FROM `rooms`
      ");
$rooms = $rooms->fetch_all();



?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="personal_account.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa619729a.js" crossorigin="anonymous"></script>
    <title>Personal_account</title>
</head>

<body>
    <!-- Форма изменения информации о пользователе-->
    <div class="block_update_info" style="display:none">
        <div class="close"><i class="fas fa-times"></i></div>

        <form>
            <div class="form-group">
                <label for="update_full_name">Полное имя</label>
                <input type="text" class="form-control" id="update_full_name" value="<?php echo $user_info[0][1] ?>" name="update_fullname">
            </div>
            <div class="form-group">
                <label for="update_email">Электронная почта</label>
                <input type="email" class="form-control" id="update_email" value="<?php echo $user_info[0][2] ?>" name="update_email">
            </div>
            <div class="form-group">
                <label for="update_phone">Телефон</label>
                <input type="phone" class="form-control" id="update_phone" value="<?php echo $user_info[0][5] ?>>" name="update_phone">
            </div>
            <button type="button" class="btn btn-primary">Изменить</button>
        </form>
    </div>

    <!-- Форма изменения бронирования-->
    <div class="block_update_booking" style="display:none">
        <div class="close_booking"><i class="fas fa-times"></i></div>

        <form>
            <div class="rooms item-form">
                <label for="choose-room">Номер:</label>
                <select class="form-control" id="choose-room" name="room">
                    <?php foreach ($rooms as $room) { ?>
                        <option><?php echo $room[0] ?></option>
                    <?php }; ?>
                </select>
            </div>
            <div class="guests item-form">
                <label for="choose-quantity-guests">Гостей:</label>
                <select class="form-control" id="choose-quantity-guests" name="guests">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <button type="button" class="btn btn-primary btn_update_booking" name="id_booking">Изменить</button>
        </form>
    </div>

    <header>
        <div class="wrap">
            <div class="wrap-header">
                <div class="profile">
                    <?php if (!array_key_exists('user', $_SESSION)) { ?>
                        <div class="registration"><a href="../reg_auth/reg.php">Регистрация</a></div>
                        <p>|</p>
                        <div class="authorization"><a href="../reg_auth/auth.html">Авторизация</a></div>
                    <?php } else { ?>
                        <div class="registration"><a href="../personal_account/personal_account.php">Личный кабинет</a>
                        </div>
                        <p>|</p>
                        <div class="authorization"><a href="../logout.php">Выйти</a></div>
                    <?php }; ?>
                </div>
                <div class="logo">
                    <img src="../img/logo.jpg" alt="Логотип">
                </div>
                <div class="menu">
                    <div class="item-menu"><a href="../home_page/home.php">Главная</a></div>
                    <div class="item-menu"><a href="../rooms/room.php">Номера</a></div>
                    <?php if (array_key_exists('user', $_SESSION) && $_SESSION['user']['root'] == 10) { ?>
                        <div class="item-menu"><a href="../resident/resident.php">Проживающие</a></div>
                    <?php }; ?>
                    <div class="item-menu"><a href="../employee/employee.php">Сотрудники</a></div>
                    <div class="item-menu"><a href="../contact/contact.php">Контакты</a></div>
                    <?php if (array_key_exists('user', $_SESSION) && $_SESSION['user']['root'] == 10) { ?>
                        <div class="item-menu"><a href="../logbook/logbook.php">Журнал</a></div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </header>

    <section class="LK">
        <div class="wrap">
            <div class="row">
                <div class="col-3">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Личная информация</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Бронирование</a>

                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active personal-information" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="full_name">
                                <h2>Полное имя:</h2>
                                <p><?php echo $user_info[0][1] ?></p>
                            </div>
                            <div class="email">
                                <h2>Электронная почта</h2>
                                <p><?php echo $user_info[0][2] ?></p>
                            </div>
                            <div class="login">
                                <h2>Логин</h2>
                                <p><?php echo $user_info[0][3] ?></p>
                            </div>
                            <div class="phone">
                                <h2>Телефон</h2>
                                <p><?php echo $user_info[0][5] ?></p>
                            </div>

                            <button type="button" class="btn btn-outline-dark update_info">Изменить данные</button>

                        </div>


                        <div class="tab-pane fade booking" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <form class="form-inline" action="../search.php" method="post">
                                <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search" name='search_query'">
                                <button class=" btn btn-outline-success my-2 my-sm-0" type="submit">Поиск
                                </button>
                            </form>
                            <table class="table" id="second_page_person">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ФИО</th>
                                        <th scope="col">Дата </th>
                                        <th scope="col">Номер</th>
                                        <th scope="col">Гостей</th>
                                        <th scope="col">Изменить</th>
                                        <th scope="col">Удалить</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    for ($i = 1; $i <= $all_count; $i++) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $i ?></th>
                                            <td><?php echo $booking[$i - 1][3] ?></td>
                                            <td><?php echo $booking[$i - 1][4] . " : " . $booking[$i - 1][7] ?></td>
                                            <td><?php echo $booking[$i - 1][5] ?></td>
                                            <td><?php echo $booking[$i - 1][6] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success update_booking" value="<?php echo $booking[$i - 1][0] ?>">Изменить</button>
                                            </td>
                                            <td>
                                                <form id = "delete_form">
                                                    <button type="button" name="delete_booking" value="<?php echo $booking[$i - 1][0] ?>" class="btn btn-danger btn_delete_booking">Удалить
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>





    <Footer>
        <div class="wrap">
            <p>Все права защищены ©2020</p>
        </div>
    </Footer>




    <!-- Cкрипты-->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src = "person_ajax.js"></script>
    <script src = "booking_ajax.js"></script>
    <script src="delete_and_update.js"></script>
</body>

</html>