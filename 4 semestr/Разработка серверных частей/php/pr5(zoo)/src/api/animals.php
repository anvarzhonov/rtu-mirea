<?php
// подключаемся к бд
$mysqli = new mysqli("db", "user", "password", "appDB");

//eсли get запрос
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // записываем результат запроса к бд в переменную $animals
    $animals = $mysqli->query("SELECT * FROM zoo");
    // создаем строковую переменную json и сразу задаем структуру
    $response = '{ animals: [';
    // проходим по массиву всех животных
    while ($row = $animals->fetch_assoc()) {
        // создаем список жывотного
        $arr = array('id' => $row["id"], 'name' => $row["name"], 'amount' => $row["amount"]);
        // функцией json_encode преобразуем список в json и добавляем в строковую переменную json
        $response .= json_encode($arr) . ',';
    }
    // закрываем json
    $response .= ']}';
    // возвращаем json
    echo $response;
}

// eсли post запрос
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //сохраняем переменные запроса
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    //запрос к бд на сохранение новых данных
    $mysqli->query("INSERT INTO zoo (name, amount) VALUES ('$name', '$amount')");


    //формируем ответ
    $response = array('status' => 'ok');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $mysqli->query("DELETE FROM zoo WHERE id=$id") or die($mysqli->error);

    $response = array('status' => 'ok');
    echo json_encode($response);
}


if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $amount = $_GET['amount'];

    $mysqli->query("UPDATE zoo SET name='$name', amount='$amount' WHERE id='$id'") or die($mysqli->error);
    $response = array('status' => 'ok');
    echo json_encode($response);
}

?>