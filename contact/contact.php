<?php
include_once "../cut_string.php";
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa619729a.js" crossorigin="anonymous"></script>
    <title>Contact</title>
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

    <section class="contact">
        <div class="wrap">
            <div class="left">
                <h1>Контактная информация</h1>
                <p class="description">
                    <?php  
                    $text = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex porro qui corporis amet eos, ratione nulla ducimus debitis sunt, maxime, architecto accusantium corrupti! Fuga tempore perspiciatis mollitia illo dignissimos accusamus delectus exercitationem ut a eaque dolorem expedita dolores nisi quos eveniet atque aperiam, iusto asperiores veniam numquam in architecto cumque, totam at. Quos nisi iure hic itaque delectus officiis unde. Eligendi expedita alias vitae unde aliquid placeat, doloribus incidunt obcaecati! Aliquam aliquid, asperiores quia cupiditate veritatis optio pariatur, dolor numquam ratione voluptatum, explicabo consequuntur culpa? Illo ipsa necessitatibus, vitae quos aliquid eaque dolores labore, pariatur dolor esse cum fugiat fuga exercitationem deleniti repudiandae quam explicabo. Id distinctio consequuntur eveniet perferendis magni voluptate, aliquam soluta optio reprehenderit harum. Velit harum excepturi dolores aut dolorem enim aliquid ducimus ea unde quisquam non maxime repellat incidunt a nisi iste aliquam hic asperiores doloremque libero soluta corporis, numquam quae? Neque eaque unde ea quo officiis deleniti aut assumenda error illo cupiditate quasi, optio omnis. Nostrum temporibus suscipit laboriosam voluptas, assumenda libero neque quae nihil repudiandae, sapiente, numquam atque quam quia dolore. Perspiciatis minima asperiores voluptates recusandae laborum obcaecati nesciunt et sed repellendus, illo molestiae sapiente non ea ut harum esse placeat, blanditiis fugit corrupti minus nemo numquam accusamus! Ex aspernatur commodi consequatur, beatae laborum ea cupiditate dolor! Debitis magnam ipsum atque sapiente accusantium. Assumenda molestias, itaque aspernatur ad nam fuga, modi porro aliquid sequi optio quia placeat, maxime adipisci molestiae? Soluta aut, sed, veritatis, itaque ipsum dolorum beatae nesciunt expedita pariatur mollitia tempora dolore? Debitis dignissimos sed ex architecto optio similique odio aliquid odit est, quia tenetur quaerat sapiente, molestias dolorem at. Laudantium molestias id, molestiae commodi, dolor ipsa, error modi nobis sint nulla nisi amet enim deserunt accusantium quo? Eaque et ut assumenda reiciendis, placeat quae! Odio ab laboriosam tempore accusamus possimus dolore!";
                    $link = "https://www.google.com";
                    echo cut_string($text, $link);
                    ?>
                </p>
                <p class="address">Адресс: Мальдивы, Куреду, Hurawalhi Island Resort Lhaviyani Atoll</p>
                <p class="phone">Телефон: +79991145151</p>
                <p class="email">Почта: lorem@mail.ru</p>

            </div>
            <div class="right">
                <form action="#">
                    <input type="text" class="form-control" id="name" placeholder="Ваше имя">
                    <input type="email" class="form-control" id="email" placeholder="Ваша электронная почта">
                    <input type="text" class="form-control" id="text" placeholder="Текст сообщения">
                    <button>Забронировать</button>
                </form>
            </div>
        </div>
    </section>
    <section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d21086.24813136367!2d44.44176004999999!3d48.6523043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1605961058288!5m2!1sru!2sru" width="100%" height="1000" frameborder="0" style="border:0; padding: 100px 0 100px 0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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