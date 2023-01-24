<?php
session_start();
$mysqli = new mysqli("db", "user", "password", "appDB");
$id = 0;
$name = '';
$amount='';
$update=false;

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
    $mysqli->query("DELETE FROM zoo WHERE id=$id") or die($mysqli->error);
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;

        $result = $mysqli ->query("SELECT * FROM zoo where id=$id") or die($mysqli->error);
            if ($result->num_rows){
            $row = $result->fetch_array();
            $id = $row['id'];
            $name = $row['name'];
            $amount = $row['amount'];
            }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];

    $mysqli->query("UPDATE zoo SET name='$name', amount='$amount' where id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Животное изменено!";
    $_SESSION['msg_type'] = "warning";
   }

