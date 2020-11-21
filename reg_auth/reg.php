<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cfa619729a.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="main">
        <div class="form-block">
            <h1>Форма регистрации</h1>
            <form action="../register.php" method="post">
                <input type="text" class="form-control" id="name" placeholder="Фио" name='Fio'>
                <input type="email" class="form-control" id="email" placeholder="Ваша электронная почта" name="email">
                <input type="text" class="form-control" id="login" placeholder="Логин" name="login">
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
                <input type="tel" class="form-control" id="phone" placeholder="Телефон" name="phone">
                <div class="alert alert-danger"
                    style="margin-top: 25px; background-color: white; border: 1px solid black;<?php if(!array_key_exists('error', $_SESSION)){?> display: none"
                    <?php }?> role="alert" data="close">
                        <?php if(array_key_exists('error', $_SESSION)){
                            echo $_SESSION['error']['error_message'];
                        };?>
                </div>
                <?php if (isset($_SESSION['error']))
  {
    unset($_SESSION['error']);
  }?>
                <button>Зарегистрироваться</button>
            </form>

        </div>
    </section>
</body>

</html>