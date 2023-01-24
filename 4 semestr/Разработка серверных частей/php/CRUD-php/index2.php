<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';

$mydatabase = 'MYSQL_DATABASE';

$conn = new mysqli($host, $user, $pass, $mydatabase);

$sql = 'SELECT * FROM users';

if ($result = $conn ->query($sql)) {
    while ($data = $result-> fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->username . " " . $user->password;
    echo "<br>";
}
?>