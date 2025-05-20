<?php
include "../components/core.php";

if($_POST) {
    $result = $mysqli->query("SELECT * FROM `users` 
    WHERE `login` = '{$_POST['login']}'
    AND `password` = '{$_POST['password']}' ");
   if ($result->num_rows > 0) {
       foreach ($result as $key => $value) {
           $_SESSION['user']['id'] = $value['id'];
           $_SESSION['user']['role'] = $value['role_id'];
           header("Location: cab.php");
           exit;
       }

   } else {
       echo"<script>alert('Не верный логин или пароль')</script>";
   }
}
?>

<style>
    .back-button {
    display: inline-block; /* Чтобы кнопка вела себя как блок */
    margin-top: 10px; /* Отступ сверху */
    padding: 10px 15px; /* Внутренние отступы */
    background-color: rgb(252, 4, 4); /* Цвет фона кнопки "Назад" */
    color: white; /* Цвет текста */
    text-decoration: none; /* Убираем подчеркивание */
    border-radius: 5px; /* Закругленные углы */
    transition: background-color 0.3s; /* Плавный переход цвета фона */
}

.back-button:hover {
    background-color: black; /* Цвет фона при наведении */
}
/* Стили для формы */
form {
    max-width: 300px; /* Максимальная ширина формы */
    margin: 0 auto; /* Центрирование формы */
    padding: 20px; /* Отступы внутри формы */
    border: 1px solid #ccc; /* Рамка формы */
    border-radius: 5px; /* Закругленные углы */
    background-color: #f9f9f9; /* Цвет фона формы */
}

/* Стили для инпутов */
input[type="text"],
input[type="password"] {
    width: 100%; /* Ширина 100% */
    padding: 10px; /* Внутренние отступы */
    margin: 10px 0; /* Отступы сверху и снизу */
    border: 1px solid #ccc; /* Рамка */
    border-radius: 5px; /* Закругленные углы */
    box-sizing: border-box; /* Учет отступов и рамки в ширине */
}

/* Стили для кнопки сабмита */
input[type="submit"] {
    width: 100%;
    background-color: #4CAF50; /* Цвет фона кнопки */
    color: white; /* Цвет текста */
    padding: 10px; /* Внутренние отступы */
    border: none; /* Без рамки */
    border-radius: 5px; /* Закругленные углы */
    cursor: pointer; /* Курсор при наведении */
    font-size: 16px; /* Размер шрифта */
    transition: background-color 0.3s; /* Плавный переход цвета фона */
}

input[type="submit"]:hover {
    background-color: #45a049; /* Цвет фона при наведении */
}

.not-auth {
        display: block; /* Чтобы ссылка вела себя как блок */
        margin-top: 10px; /* Отступ сверху */
        text-align: center; /* Центрирование текста */
        color: #007BFF; /* Цвет текста ссылки */
        text-decoration: none; /* Убираем подчеркивание */
    }

    .not-auth:hover {
        text-decoration: underline; /* Подчеркивание при наведении */
    }
</style>
<a href="../index.html" class="back-button">Назад</a>
<form action="" method="post">
   Логин: <input type="text" name="login" required> <br/>
   Пароль: <input type="password" name="password" required> <br/>
   <input type="submit"
   value="Авторизоваться">
</form>
<a href="reg.php" class="not-auth">Ещё не зарегистрированы?</a>