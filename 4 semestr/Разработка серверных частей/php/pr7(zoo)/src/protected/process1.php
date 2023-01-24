<?php
session_start();
$mysqli = new mysqli("db", "user", "password", "appDB");
$id = 0;
$firstName = '';
$surname = '';
$post = '';
$salary = '';
$age = '';
$update=false;

if (isset($_POST['save']))
{
//    $id = $_POST['id'];
    $firstName = $_POST['$firstName'];
    $surname = $_POST['$surname'];
    $post = $_POST['$post'];
    $salary = $_POST['$salary'];
    $age = $_POST['$age'];
    $mysqli->query("INSERT INTO employers(firstName, surname, post, salary, age) VALUES ('$firstName', '$surname', '$post','$salary', '$age')") or die($mysqli->error);

    $_SESSION['message'] = "Сотрудник добавлен!";
    $_SESSION['msg_type'] = "success";
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $_SESSION['message'] = "Сотрудник удален!";
    $_SESSION['msg_type'] = "danger";
    $mysqli->query("DELETE FROM employers WHERE id=$id") or die($mysqli->error);
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli ->query("SELECT * FROM employers where id=$id") or die($mysqli->error);
    $row = $result->fetch_array();
    $id = $row['id'];
    $firstName = $_POST['$firstName'];
    $surname = $_POST['$surname'];
    $post = $_POST['$post'];
    $salary = $_POST['$salary'];
    $age = $_POST['$age'];
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $firstName = $_POST['$firstName'];
    $surname = $_POST['$surname'];
    $post = $_POST['$post'];
    $salary = $_POST['$salary'];
    $age = $_POST['$age'];

    $mysqli->query("UPDATE employers SET firstName='$firstName', surname='$surname', post='$post', salary='$salary', age='$age' where id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Сотрудник изменен!";
    $_SESSION['msg_type'] = "warning";
}

