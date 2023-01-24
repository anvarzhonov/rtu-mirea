<?php
session_start();
$mysqli = new mysqli("db", "user", "password", "appDB");
$name = '';
$amount='';

if (isset($_POST['save']))
{
//    $id = $_POST['id'];
    $name= $_POST['name'];
    $amount = $_POST['amount'];
    $mysqli->query("INSERT INTO zoo (name, amount) VALUES ('$name', '$amount')");

    $_SESSION['message'] = "Животное добавлено!";
    $_SESSION['msg_type'] = "success";
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $_SESSION['message'] = "Животное удалено!";
    $_SESSION['msg_type'] = "danger";
    echo($id);
    $mysqli->query("DELETE FROM zoo WHERE id=$id") or die($mysqli->error);
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
        $result = $mysqli ->query("SELECT * FROM appDB where id=$id");
        if (count($result)==1){
            $row = $result->fetch_array();
            $id = $row['id'];
            $name = $row['name'];
            $amount = $row['amount'];
        }
}
