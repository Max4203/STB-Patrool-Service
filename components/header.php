<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>СТБ Патруль-Сервис</title>
    <link href="img/logo.png" rel="icon">
</head>
<body>
    <header>
    <?php if(!isset($_SESSION['user'])) { ?>
    <a href="../vendors/auth.php">Авторизация</a>
    <a href="../vendors/reg.php">Регистрация</a>
    <a href="../index.html">На главную</a>
    <?php } else {?>
    <a href="cab.php">Личный кабинет</a>
    <a href="state.php">Мои заявки</a>
    <a href="add.php">Оформить заявку</a>
    <?php if($_SESSION['user']['role'] == 1) {?> 
    <a href="admin.php">Админ панель</a>
    <?php } ?>
    <a href="logout.php">Выход</a>
    <?php } ?>
    </header>