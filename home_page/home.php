<?php
session_start();
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
                    <div class="registration"><a href="../reg_auth/register.html">Регистрация</a></div>
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
                    <form action="../booking.php" method = "post">
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
                                <option>Стандарт</option>
                                <option>Стандарт-комфорт 2-местный</option>
                                <option>Семейный</option>
                                <option>Полулюкс</option>
                                <option>Люкс</option>
                                <option>Улучшенный люкс</option>
                                <option>Представительский люкс</option>
                                <option>Президентский люкс</option>
                                <option>Вилла</option>
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

                        <button>Забронировать</button>
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
                <h2>Отель Hurawalhi 5*</h2>
                <p class="about-us-information-text">
                    Курортный отель Hurawalhi Island Resort, расположенный на
                    очаровательном частном острове
                    в нетронутом атолле Лавияни на Мальдивах, очень похож на ваши отношения: это идеальное сочетание
                    безмятежности и азарта,комфорта и приключений.
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
                <div class="item-blocks-we-do">
                    <i class="fas fa-route"></i>
                    <h4>План поездки</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ab eligendi ex provident tempore
                        voluptas quia error, earum reiciendis temporibus, tempora molestias, quo adipisci illum.</p>
                </div>
                <div class="item-blocks-we-do">
                    <i class="fas fa-utensils"></i>
                    <h4>Ресторанное обслуживание</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium saepe perferendis sequi
                        pariatur eligendi. Ipsam rerum magni id corrupti autem incidunt. Commodi dicta officia
                        consequatur!</p>
                </div>
                <div class="item-blocks-we-do">
                    <i class="fas fa-bus"></i>
                    <h4>Трансфер</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus veniam similique, tempora
                        voluptatem vel corrupti. Necessitatibus animi cupiditate temporibus unde quaerat dicta est
                        explicabo provident.</p>
                </div>
                <div class="item-blocks-we-do">
                    <i class="far fa-star"></i>
                    <h4>All inclusive</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam cum tempore voluptatibus est
                        repellendus at dolor velit officia itaque laudantium non reprehenderit ratione, cupiditate
                        harum!</p>
                </div>
                <div class="item-blocks-we-do">
                    <i class="fas fa-bath"></i>
                    <h4>Прачечная</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates ab tempore, nulla voluptate
                        molestias adipisci a modi dolores. Facere deserunt itaque dignissimos nihil fugit possimus.</p>
                </div>
                <div class="item-blocks-we-do">
                    <i class="fas fa-umbrella-beach"></i>
                    <h4>Частный пляж</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, deleniti harum et at, quia laborum,
                        assumenda esse cumque quidem nobis numquam quisquam eum soluta vitae.</p>
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