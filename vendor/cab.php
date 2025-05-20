<?php

include "../components/core.php";

$result = $mysqli->query("SELECT `fullname`, `login`, `password`, `email` FROM `users` WHERE id = '{$_SESSION['user']['id']}'");

if (!$result) {
    echo "Ошибка запроса: " . $link->error; // Вывод ошибки, если запрос не удался
    exit();
}

if ($result->num_rows === 0) {
    echo "Пользователь не найден."; // Проверка, найдены ли данные
    exit();
}

$user = $result->fetch_assoc();
include "../components/header.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный Кабинет</title>
    <link rel="stylesheet" href="../css/cab.css">
</head>
<body>
<h1>Добро Пожаловать!</h1>
    <div class="blockCab">
    <img src="../img/avatar.jpg"  class="blockCab__image">
        <?php
        echo '
            <div class="blockCab__name">ВАШЕ ИМЯ: ' . $user['fullname'] . '</div>
            <div class="blockCab__log">ВАШ ЛОГИН: ' . $user['login'] . '</div>
            <div class="blockCab__email">ВАША ПОЧТА: ' . $user['email'] . '</div>
        ';
        ?>
    </div>
</body>
</html>