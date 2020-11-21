<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="room.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa619729a.js" crossorigin="anonymous"></script>
    <title>Room</title>
</head>

<body>

    <header>
        <div class="wrap">
            <div class="wrap-header">
                <div class="profile">
            <?php if(!array_key_exists('user', $_SESSION)) { ?>
                    <div class="registration"><a href="../reg_auth/reg.php">Регистрация</a></div>
                    <p>|</p>
                    <div class="authorization"><a href="../reg_auth/auth.html">Авторизация</a></div>
            <?php } else{ ?>
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
                    <?php if(array_key_exists('user', $_SESSION) && $_SESSION['user']['root'] == 10) { ?>
                    <div class="item-menu"><a href="../resident/resident.php">Проживающие</a></div>
                    <?php }; ?>
                    <div class="item-menu"><a href="../employee/employee.php">Сотрудники</a></div>
                    <div class="item-menu"><a href="../contact/contact.php">Контакты</a></div>
                    <?php if(array_key_exists('user', $_SESSION) && $_SESSION['user']['root'] == 10) { ?>
                    <div class="item-menu"><a href="../logbook/logbook.php">Журнал</a></div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </header>
    <section class="rooms">
        <div class="wrap container">
            <h1>Комнаты</h1>
            <div class="row block-room">
                <div class="item-block-room col-lg-4 col-md-1">
                    <img src="../img/standart_room.jpg" alt="Стандарт">
                    <h2>Стандарт</h2>
                    <p class="cost-room"><span>600₽</span> / В день</p>
                    <p class="apartament"> Количество комнат: 1</p>
                    <p class="area">Общая площадь: 15</p>
                    <p class="guest">Гостей: 1</p>
                </div>
                <div class="item-block-room col-lg-4 col-md-1">
                    <img src="../img/two_standar_room.jpg" alt="Двухместный стандарт">
                    <h2>Двухместный стандарт</h2>
                    <p class="cost-room"><span>1500₽</span> / В день</p>
                    <p class="apartament"> Количество комнат: 1</p>
                    <p class="area">Общая площадь: 18</p>
                    <p class="guest">Гостей: 2</p>
                </div>
                <div class="item-block-room col-lg-4 col-md-1">
                    <img src="../img/family_room.jpg" alt="Семейный">
                    <h2>Семейный</h2>
                    <p class="cost-room"><span>2100₽</span> / В день</p>
                    <p class="apartament"> Количество комнат: 2</p>
                    <p class="area">Общая площадь: 29</p>
                    <p class="guest">Гостей: 4</p>
                </div>
                <div class="item-block-room col-lg-4 col-md-1">
                    <img src="../img/half_luxe_room.jpg" alt="Полулюкс">
                    <h2>Полулюкс</h2>
                    <p class="cost-room"><span>4300₽</span> / В день</p>
                    <p class="apartament"> Количество комнат: 2</p>
                    <p class="area">Общая площадь: 35</p>
                    <p class="guest">Гостей: 2</p>
                </div>
                <div class="item-block-room col-lg-4 col-md-1">
                    <img src="../img/luxe.jpg" alt="Люкс">
                    <h2>Люкс</h2>
                    <p class="cost-room"><span>8800₽</span> / В день</p>
                    <p class="apartament"> Количество комнат: 2</p>
                    <p class="area">Общая площадь: 43</p>
                    <p class="guest">Гостей: 3</p>
                </div>
                <div class="item-block-room col-lg-4 col-md-1">
                    <img src="../img/advanced_luxe.jpg" alt="Улучшенный люкс">
                    <h2>Улучшенный люкс</h2>
                    <p class="cost-room"><span>16000₽</span> / В день</p>
                    <p class="apartament"> Количество комнат: 3</p>
                    <p class="area">Общая площадь: 59</p>
                    <p class="guest">Гостей: 4</p>
                </div>
                <div class="item-block-room col-lg-4 col-md-1">
                    <img src="../img/representative_luxe_room.jpg" alt="Представительский люкс">
                    <h2>Представительский люкс</h2>
                    <p class="cost-room"><span>22000</span> / В день</p>
                    <p class="apartament"> Количество комнат: 3</p>
                    <p class="area">Общая площадь: 59</p>
                    <p class="guest">Гостей: 4</p>
                </div>
                <div class="item-block-room col-lg-4 col-1">
                    <img src="../img/presedentation_luxe_room.jpg" alt="Президентский люкс">
                    <h2>Президентский люкс</h2>
                    <p class="cost-room"><span>40000₽</span> / В день</p>
                    <p class="apartament"> Количество комнат: 5</p>
                    <p class="area">Общая площадь: 72</p>
                    <p class="guest">Гостей: 4</p>
                </div>
                <div class="item-block-room col-lg-4 col-1">
                    <img src="../img/Villa.jpg" alt="Вилла">
                    <h2>Вилла</h2>
                    <p class="cost-room"><span>320000₽</span> / В день</p>
                    <p class="apartament"> Количество комна: 12</p>
                    <p class="area">Общая площадь: 400</p>
                    <p class="guest">Гостей: 4</p>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>