<?php

$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "store_db";
$port = "3307";
try {
	// $pdo = new PDO('mysql:dbname=MYSQL_DATABASE;charset=UTF8; host=localhost', 'MYSQL_USER', 'MYSQL_PASSWORD');
	$pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname",$username,$password);
} catch (PDOException $e) {
	die($e->getMessage());
}