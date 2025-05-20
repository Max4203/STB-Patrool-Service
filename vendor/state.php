<?php
include "../components/core.php";
$result = $mysqli->query("SELECT `statuses`.*, `states`.*
FROM `states` 
	LEFT JOIN `statuses` 
    ON `states`.`status_id` = `statuses`.`id`
    WHERE `states`.`user_id` = '{$_SESSION['user']['id']}'");
    include "../components/header.php";

?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .application {
        background: white;
        padding: 20px; /* Увеличен отступ */
        margin-bottom: 20px;
        border: 1px solid black; /* Добавлена рамка */
        border-radius: 10px; /* Увеличен радиус закругления */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Увеличена тень */
        transition: transform 0.2s; /* Плавный эффект при наведении */
    }
    .application:hover {
        transform: scale(1.02); /* Увеличение при наведении */
        cursor: pointer;
    }
    .application p {
        margin: 10px 0; /* Увеличены отступы между параграфами */
        color: #555;
    }
    .application hr {
        border: 1px solid #e0e0e0;
        margin: 10px 0; /* Добавлен отступ для hr */
    }
    .status {
        font-weight: bold;
        color: #333;
    }
    .status.completed {
        color: #28a745; /* Зеленый для завершенных */
    }
    .status.pending {
        color: #ffc107; /* Желтый для ожидающих */
    }
    .status.cancelled {
        color: #dc3545; /* Красный для отмененных */
    }
</style>
<?php foreach ($result as $key => $value) { ?>
    <div class="application">
        <p class="status <?= strtolower($value['status']) ?>">Статус: <?= $value['status'] ?></p>
        <p>Адрес: <?= $value['address'] ?></p>
        <p>Телефон: <?= $value['phone'] ?></p>
        <p>Дата: <?= $value['date'] ?></p>
        <p>Время: <?= $value['time'] ?></p>
        <p>Выбранная услуга: <?= $value['service'] ?></p>
        <p>Вид оплаты: <?= $value['payment_type'] ?></p>
        <hr>
    </div>
<?php } ?>
</body>
</html>