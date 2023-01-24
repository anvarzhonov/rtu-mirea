<?php
// Create database connection
$db = new mysqli("db", "user", "password", "appDB");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>