<html lang="ru">

<head>
    <meta charset="UTF-8">
</head>

<body>
<table>
    <tr><th>Id</th><th>Имя</th><th>Фамилия</th><th>Должность</th><th>Зарплата</th><th>Возраст</th</tr>
<?php
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM appDB.employers");
$mysqli->query("INSERT INTO employers (firstName, surname, post, salary, age) VALUE ('asdf', 'asdf', 'asdf', 123, 12123)");
foreach ($result as $row){
    echo "<tr><td>{$row['id']}</td><td>{$row['firstName']}</td><td>{$row['surname']}</td><td>{$row['post']}</td><td>{$row['salary']}</td><td>{$row['age']}</td></tr>";
}
?>
</table>
</body>