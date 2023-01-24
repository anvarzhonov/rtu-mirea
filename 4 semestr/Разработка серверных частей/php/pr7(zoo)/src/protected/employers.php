<?php require_once 'process1.php';?>
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

<!-- HTML ВВОДА СОТРУДНИКА -->
<h1 class="row justify-content-center">Добавление сотрудника</h1>
<div class="row justify-content-center">
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>"
        <div class="form-group">
            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
            </div>

            <div class="form-group">
                <label>Фамилия</label>
                <input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>">
            </div>

            <div class="form-group">
                <label>Должность</label>
                <input type="text" name="post" class="form-control" value="<?php echo $post; ?>">
            </div>

            <div class="form-group">
                <label>Зарплата</label>
                <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
            </div>

            <div class="form-group">
                <label>Возраст</label>
                <input type="text" name="age" class="form-control" value="<?php echo $age; ?>">
            </div>
            <div class="form-group">
                <?php
                if ($update==true): ?>
                    <button type="submit" class="btn btn-primary" name="update">Редактировать</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="save">Сохранить</button>
                <?php endif; ?>
            </div>
        </div>

        <!--HTML ТАБЛИЦЫ СОТРУДНИКОВ [1]-->
        <!--Bootstrap4 класс, добавляет paddings и margins-->
        <div class="container">
            <table class="table">
                <h1 class="row justify-content-center">Список сотрудников</h1>
                <tr>
                    <th>Id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Должность</th>
                    <th>Зарплата</th>
                    <th>Возраст</th>
                    <th colspan=2>Изменить</th>
                </tr>

                <!-- GET ВСЕХ СОТРУДНИКОВ-->
                <?php
                $result = $mysqli->query("SELECT * FROM employers");
                while ($row = $result->fetch_assoc()): ?> <!--Функция fetch_assoc() выводит по очереди объекты в таблице, автоматически переходит на следующий -->
                    <!--HTML ТАБЛИЦЫ СОТРУДНИКОВ [2]-->
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['surname']; ?></td>
                        <td><?php echo $row['post']; ?></td>
                        <td><?php echo $row['salary']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td>
                            <!--Передаём id объекта в адрес страницы при редактировании-->
                            <a href="employers.php?edit=<?php echo $row['id']; ?>"
                               class="btn btn-info">Редактировать</a>
                            <a href="employers.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger">Удалить</a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <!--POST СОТРУДНИКА В ТАБЛИЦУ-->
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
        <!-- DELETE СОТРУДНИКА из таблицы -->
        <?php
        //if (isset($_GET['delete'])){
        //    $id = $_GET['delete'];
        //    echo($id);
        //    $mysqli->query("DELETE FROM zoo WHERE zoo_id = $id");
        //}
        //?>

</body>