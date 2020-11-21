<?php
session_start();

if(array_key_exists('user', $_SESSION)){
    $log = "Пользователь: " . $_SESSION['user']['id'] . " - Зашел на главную страницу " . date('Y-m-d');
    file_put_contents('../log/log.txt', $log . PHP_EOL, FILE_APPEND);

};



$mysql = new mysqli ("localhost","root", "", 'hotel_database');
$information = $mysql->query("
      SELECT * FROM `information` ORDER BY `id` DESC
      ");
$information = $information->fetch_all();
$id_info = $information[0][0];
$name_info = $information[0][1];
$description_info = $information[0][2];
$star_info = $information[0][3];

$services = $mysql->query("
SELECT services.* FROM `information_services` INNER JOIN information ON information_services.id_information = '$id_info' INNER JOIN `services` ON services.id = information_services.id
");
$services = $services->fetch_all();


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
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa619729a.js" crossorigin="anonymous"></script>
    <title>Home</title>
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
    <section class="carousel-section">
        <!--Блок карусели-->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../img/bagamy.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../img/las-vegas.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../img/sea.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

            <!--Элементы поверх карусели-->
            <div class="booking-hotel">
                <div class="booking-hotel-text">
                    <h1>Sona A Luxury Hotel</h1>
                    <p>Here are the best hotel booking sites, including recommendations for international travel and for
                        finding low-priced hotel rooms.</p>
                </div>

                <div class="booking-hotel-form">
                    <h3>Бронирование отеля</h3>
                    <form >
                        <div class="arrival item-form">
                            <label for="data-of-arrival">Дата заезда:</label>
                            <input type="date" id="data-of-arrival" class="form-control" name = "data_begin">
                        </div>
                        <div class="departure item-form">
                            <label for="date-of-departure">Дата отъезда:</label>
                            <input type="date" id="date-of-departure" class="form-control"  name = "data_end">
                        </div>
                        <div class="rooms item-form">
                            <label for="choose-room">Номер:</label>
                            <select class="form-control" id="choose-room"  name = "room">
                                <?php foreach($rooms as $room){?>
                                    <option><?php echo $room[0]?></option>
                                <?php };?>
                                
                            </select>
                        </div>
                        <div class="guests item-form">
                            <label for="choose-quantity-guests">Гостей:</label>
                            <select class="form-control" id="choose-quantity-guests" name = "guests" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <button type = "button">Забронировать</button>
                    </form>
                </div>
            </div>
        </div>
        <!--Блок для формы бронирования и надписей-->



    </section>
    <section class="about-us">
        <div class="wrap">
            <div class="about-us-information">
                <p class="about-us-information-title">Насчет нас</p>
                <h2><?php echo $name_info;?> <?php echo $star_info;?>*</h2>
                <p class="about-us-information-text">
                    <?php echo $description_info; ?>
                </p>
            </div>
            <div class="about-us-gallery">
                <img src="../img/hurawalhi_1.jpg" class="img-fluid" alt="Отель">
                <img src="../img/hurawalhi_2.jpg" alt="Отель">
            </div>
        </div>
    </section>
    <section class="we-do">
        <div class="wrap">
            <p class="we-do-title">Что мы делаем</p>
            <h2>Откройте наши услуги</h2>
            <div class="blocks-we-do">

                <?php foreach($services as $ser){?>
                <div class="item-blocks-we-do">
                    <?php echo $ser[1];?>
                    <h4><?php echo $ser[2]; ?></h4>
                    <p><?php echo $ser[3]?></p>
                </div>
                <?php };?>
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
    <script src = "home_page.js"></script>
</body>

</html>