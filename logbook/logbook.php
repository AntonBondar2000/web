<?php
session_start();
if (array_key_exists('user', $_SESSION)) {
    $log = "Пользователь: " . $_SESSION['user']['id'] . " - Зашел на страницу журнала бронирования " . date('Y-m-d');
    file_put_contents('../log/log.txt', $log . PHP_EOL, FILE_APPEND);
    if ($_SESSION['user']['root'] != 10) {
        header('Location: /Hotel/home_page/home.php');
    }
} else {
    header('Location: /Hotel/home_page/home.php');
}
$mysql = new mysqli("localhost", "root", "", 'hotel_database');
$residents = $mysql->query("
        SELECT booking.*, users.full_name, users.phone FROM `booking` INNER JOIN `users` ON booking.id_user = users.id ORDER BY booking.id DESC
");
$residents = $residents->fetch_all();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logbook.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa619729a.js" crossorigin="anonymous"></script>
    <title>Logbook</title>
</head>

<body>

    <header>
        <div class="wrap">
            <div class="wrap-header">
                <div class="profile">
                    <?php if (!array_key_exists('user', $_SESSION)) { ?>
                        <div class="registration"><a href="../reg_auth/reg.php">Регистрация</a></div>
                        <p>|</p>
                        <div class="authorization"><a href="../reg_auth/auth.html">Авторизация</a></div>
                    <?php } else { ?>
                        <div class="registration"><a href="../personal_account/personal_account.php">Личный кабинет</a></div>
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


    <section class="journal">
        <h1>Журнал подачи заявлений</h1>
        <div class="container wrap">
            <div class="row block-journal">
                <?php foreach ($residents as $resident) { ?>
                    <div class="item-block-journal col-12">
                        <img src="../img/people_1.jpg" alt="Фотография">
                        <p class="fio"><?php echo $resident[3] ?></p>
                        <p class="phone"><?php echo $resident[9] ?></p>
                        <p class="class-room"><?php echo $resident[5] ?></p>
                        <p class="data"><?php echo $resident[4] ?> : <?php echo $resident[7] ?></p>
                    </div>

                <?php }; ?>
            </div>
            <div class="pagination">
                <nav aria-label="#">
                    <ul class="pagination ">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Назад</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Вперед</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>



    <Footer>
        <div class="wrap">
            <p>Все права защищены ©2020</p>
        </div>
    </Footer>




    <!-- Cкрипты-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>