<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="row justify-content-center">
    <form method="POST">

        <!--        <div class="form-group">-->
        <!--        <label>Id</label>-->
        <!--        <input type="text" name="id" class="form-control" value="">-->
        <!--        </div>-->

        <div class="form-group">
            <label>Название</label>
            <input type="text" name="name" class="form-control" value="">
        </div>

        <div class="form-group">
            <label>Количество</label>
            <input type="text" name="amount" class="form-control" value="">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="save">Сохранить</button>
        </div>
</div>

<table>
    <h1>Список животных</h1>
    <tr>
        <th>Id</th>
        <th>Название</th>
        <th>Количество</th>
        <th>Редактировать</th>
    </tr>

    <!--POST ЖИВОТНОЕ В ТАБЛИЦУ-->
    <?php
    $mysqli = new mysqli("db", "user", "password", "appDB");
    if (isset($_POST['save']))
    {
//    $id = $_POST['id'];
        $name= $_POST['name'];
        $amount = $_POST['amount'];

        $mysqli->query("INSERT INTO zoo (name, amount) VALUES ('$name', '$amount')");
    }
    ?>
    <!-- GET ВСЕХ ЖИВОТНЫХ-->
    <?php
    $result = $mysqli->query("SELECT * FROM zoo");
    foreach ($result as $row){
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['amount']}</td></tr>";
    }

    ?>
</table>
</body>