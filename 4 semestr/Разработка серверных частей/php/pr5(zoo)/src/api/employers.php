<?php
// подключаемся к бд
$mysqli = new mysqli("db", "user", "password", "appDB");

//eсли get запрос
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // записываем результат запроса к бд в переменную $employers
    $employers = $mysqli->query("SELECT * FROM employers");
    // создаем строковую переменную json и сразу задаем структуру
    $response = '{ employers: [';
    // проходим по массиву всех работников
    while ($row = $employers->fetch_assoc()) {
        // создаем список работников
        $arr = array('id' => $row["id"], 'firstName' => $row["firstName"], 'surname' => $row["surname"],
        'post' => $row["post"], 'salary' => $row["salary"], 'age' => $row["age"]);
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
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $post = $_POST['post'];
    $salary = $_POST['salary'];
    $age = $_POST['age'];
    //запрос к бд на сохранение новых данных
    $mysqli->query("INSERT INTO employers (firstName, surname, post, salary, age) VALUES ('$firstName', '$surname', '$post', '$salary', '$age')");
    //формируем ответ
    $response = array('status' => 'ok');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $mysqli->query("DELETE FROM employers WHERE id=$id") or die($mysqli->error);

    $response = array('status' => 'ok');
    echo json_encode($response);
}


if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    $id = $_GET['id'];
    $firstName = $_GET['firstName'];
    $surname = $_GET['surname'];
    $post = $_GET['post'];
    $salary = $_GET['salary'];
    $age = $_GET['age'];
    $mysqli->query("UPDATE employers SET firstName='$firstName', surname='$surname', post='$post', salary='$salary', age='$age' WHERE id='$id'") or die($mysqli->error);
    $response = array('status' => 'ok');
    echo json_encode($response);
}
?>