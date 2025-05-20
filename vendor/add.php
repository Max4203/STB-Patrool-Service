<?php 
include "../components/core.php";

if(!isset($_SESSION['user'])) {
    header("Location: auth.php");
}
if ($_POST) {
    $result = $mysqli->query("INSERT INTO `states`(
    `address`,
    `phone`,
    `date`,
    `time`,
    `service`,
    `payment_type`,
    `user_id`,
    `status_id`
    ) VALUES (
    '{$_POST['address']}',
    '{$_POST['phone']}',
    '{$_POST['date']}',
    '{$_POST['time']}',
    '{$_POST['service']}',
    '{$_POST['payment_type']}',
    '{$_SESSION['user']['id']}',
    '1'
    )");
    header("Location: state.php");
}

include "../components/header.php";
?>
 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        textarea, input[type="text"], input[type="date"], input[type="time"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
<form action="" method="post">
   Ваш адрес: <textarea name="address"></textarea> <br />
   Номер телефона: <input type="text" name="phone"> <br />
   Предпочтительная дата: <input type="date" name="date"> <br />
   Предпочтительное время: <input type="time" name="time"> <br />
<label for="service">Интересующая вас услуга</label>
    <select id="service" name="service">
        <option value="пультовая охрана">Пультовая охрана</option>
        <option value="охрана с ГБР">Охрана с ГБР</option>
        <option value="круглосуточная вооружённая охрана">Круглосуточная вооружённая охрана</option>
        <option value="сопровождение">Сопровождение</option>
        <option value="услуги телохранителя">Услуги телохранителя</option>
    </select> <br />
    Вид оплаты: <input type="radio" name="payment_type" value="наличные">Наличные
    <input type="radio" name="payment_type" value="банковская карта">Банковская карта <br />
    <input type="submit"
    onclick="alert('Заявка отправлена')"
    value="Сформировать заявку" />
</form>
</body>
</html>