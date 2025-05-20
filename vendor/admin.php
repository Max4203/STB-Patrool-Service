<?php
include "../components/core.php";

if (isset($_POST['+'])) {
    $mysqli->query("UPDATE `states` SET `status_id`='2' 
    WHERE `states`. `id` = '{$_POST['id']}'");
  }
  if (isset($_POST['-'])) {
    $mysqli->query("UPDATE `states` SET `status_id`='3' 
    WHERE `states`. `id` = '{$_POST['id']}'");
  }
  $result = $mysqli->query("SELECT `statuses`.*, `users`.*, `states`.*
  FROM `states` 
      LEFT JOIN `statuses` ON `states`.`status_id` = `statuses`.`id` 
      LEFT JOIN `users` ON `states`.`user_id` = `users`.`id`");

      include "../components/header.php";
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .admin-application {
        background: white;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .admin-application p {
        margin: 10px 0;
        color: #555;
    }
    .admin-application hr {
        border: 1px solid #e0e0e0;
        margin: 10px 0;
    }
    .admin-application button {
        padding: 10px 15px;
        margin-right: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .admin-application button[name="+"] {
        background-color: #28a745; /* Зеленый для принятия */
        color: white;
    }
    .admin-application button[name="-"] {
        background-color: #dc3545; /* Красный для отклонения */
        color: white;
    }
    .admin-application button:hover {
        opacity: 0.9; /* Эффект при наведении */
    }
</style>
<?php 
foreach ($result as $key => $value) {?>
   <div class="admin-application">
    <p>Статус: <?= $value['status']?></p>
    <p>ФИО: <?= $value['fullname']?></p>
    <p>Адрес: <?= $value['address']?></p>
    <p>Телефон: <?= $value['phone']?></p>
    <p>Дата: <?= $value['date']?></p>
    <p>Время: <?= $value['time']?></p>
    <p>Выбранная услуга: <?= $value['service']?></p>
    <p>Вид оплаты: <?= $value['payment_type']?></p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $value['id'] ?>">
        <button name="+">Заявка принята</button>
        <button name="-">Заявка отклонена</button>
    </form>
    <hr>
   </div>
<?php }
?>
</body>
</html>