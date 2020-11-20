<?php
session_start();
if(!array_key_exists('user', $_SESSION)){
  header('Location: /Hotel/home_page/home.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="personal_account.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa619729a.js" crossorigin="anonymous"></script>
    <title>Personal_account</title>
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
    
    <section class="LK">
        <div class="wrap">
            <div class="row">
                <div class="col-4">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Личная информация</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Бронирование</a>

                  </div>
                </div>
                <div class="col-1"></div>
                <div class="col-7">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active personal-information" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="full_name">
                            <h2>Полное имя:</h2>
                            <p><?php echo $_SESSION['user']['full_name']?></p>
                        </div>
                        <div class="email">
                            <h2>Электронная почта</h2>
                            <p><?php echo $_SESSION['user']['email']?></p>
                        </div>
                        <div class="login">
                            <h2>Логин</h2>
                            <p><?php echo $_SESSION['user']['login']?></p>
                        </div>
                        <div class="phone">
                            <h2>Телефон</h2>
                            <p>+<?php echo $_SESSION['user']['phone']?></p>
                        </div>
                    </div>
                    
                      
                    <div class="tab-pane fade booking" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Номер</th>
                                <th scope="col">Гостей</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 
                            
                            $login = $_SESSION['user']['login'];
                            $mysql = new mysqli ("localhost","root", "", 'hotel_database');
                            $booking = $mysql->query("
                                SELECT * FROM `booking` WHERE `login` = '$login'
                                ");
                            $all_count =  mysqli_num_rows($booking);
                            $booking = $booking->fetch_all();
                            for($i = 1; $i<=$all_count; $i++){?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo $booking[$i-1][2] ?></td>
                                <td><?php echo $booking[$i-1][3]." : ".$booking[$i-1][6] ?></td>
                                <td><?php echo $booking[$i-1][4]?></td>
                                <td><?php echo $booking[$i-1][5]?></td>
                              </tr>
                            <?php };?>
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