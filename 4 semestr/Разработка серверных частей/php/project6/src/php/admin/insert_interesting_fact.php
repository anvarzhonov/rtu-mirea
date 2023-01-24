<?php
    include 'login.php';

    $mysqli = new mysqli("db", "user", "password", "appDB");
    $stmt = $mysqli->prepare("INSERT INTO interesting_facts (title, text, url_video) VALUES (?, ?, ?)");
    $res = $stmt->bind_param('sss', $_POST['title'], $_POST['text'], $_POST['url_video']);
    $stmt->execute();

    header('Location: /admin/index.php');
?>