<?php
    include 'login.php';
    
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $stmt = $mysqli->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
    $res = $stmt->bind_param('ss', $_POST['name'], $_POST['password']);
    $stmt->execute();

    header('Location: /admin/index.php');
?>