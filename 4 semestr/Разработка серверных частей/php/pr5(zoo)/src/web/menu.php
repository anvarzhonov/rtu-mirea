<?php require_once 'process.php';?>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


<!--Панелька при удалении/добавлении объектов-->
<?php
    if (isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
?>
</div>
<?php endif ?>

<!-- HTML ВВОДА ЖИВОТНОГО -->
<h1 class="row justify-content-center">Добавление животного</h1>
    <div class="row justify-content-center">
       <form method="POST">

<!--        <div class="form-group">-->
<!--        <label>Id</label>-->
<!--        <input type="text" name="id" class="form-control" value="">-->
<!--        </div>-->
        <div class="form-group">
        <label>Название</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        </div>

        <div class="form-group">
        <label>Количество</label>
        <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary" name="save">Сохранить</button>
        </div>
   </div>

<!--HTML ТАБЛИЦЫ ЖИВОТНЫХ [1]-->
    <div class="container"> <!--Bootstrap4 класс, добавляет paddings и margins-->
    <table class="table">
    <h1 class="row justify-content-center">Список животных</h1>
    <tr>
        <th>Id</th>
        <th>Название</th>
        <th>Количество</th>
        <th colspan="2">Изменить</th>
    </tr>

<!-- GET ВСЕХ ЖИВОТНЫХ-->
<?php
$result = $mysqli->query("SELECT * FROM zoo");
    while ($row = $result->fetch_assoc()): ?> <!--Функция fetch_assoc() выводит по очереди объекты в таблице, автоматически переходит на следующий -->
    <!--HTML ТАБЛИЦЫ ЖИВОТНЫХ [2]-->
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td>
<!--                <a href="menu.php?edit=--><?php //echo $row['id']; ?><!--" <!--Передаём id объекта в адрес страницы при редактировании-->-->
<!--                   <a class="btn btn-info">Редактировать</a>-->
                <a href="process.php?delete=<?php echo $row['id']; ?>"
                   <a class="btn btn-danger" name="delete">Удалить</a>
            </td>

        </tr>
        <?php endwhile; ?>
    </table>
    </div>

<!--POST ЖИВОТНОЕ В ТАБЛИЦУ-->
<?php
//if (isset($_POST['save']))
//{
////    $id = $_POST['id'];
//    $name= $_POST['name'];
//    $amount = $_POST['amount'];
//
//    $mysqli->query("INSERT INTO zoo (name, amount) VALUES ('$name', '$amount')");
//}
//?>
<!-- DELETE животное из таблицы -->
<?php
//if (isset($_GET['delete'])){
//    $id = $_GET['delete'];
//    echo($id);
//    $mysqli->query("DELETE FROM zoo WHERE zoo_id = $id");
//}
//?>

</body>