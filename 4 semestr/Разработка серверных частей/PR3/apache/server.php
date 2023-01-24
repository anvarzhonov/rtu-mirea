<?php
function redir() {
  echo "<script>window.location = 'restaurant.php'</script>";
  exit;
}

$login = "";
$errorsReg = array(); 
$errorsLog = array(); 

$db = mysqli_connect("db", "user", "password", "store_db");

if (isset($_POST['regUser'])) {
  $login = mysqli_real_escape_string($db, $_POST['loginReg']);
  $password = mysqli_real_escape_string($db, $_POST['passwordReg']);

  if (empty($login)) { array_push($errorsReg, "Требуется ввести имя учетной записи!"); }
  if (empty($password)) { array_push($errorsReg, "Требуется ввести пароль учетной записи!"); }

  $user_check_query = "SELECT * FROM users WHERE login='$login' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['login'] === $login) {
      array_push($errorsReg, "Введенное имя уже существует!");
    }
  }

  if (count($errorsReg) == 0) {
  	$password = md5($password);

  	$query = "INSERT INTO users (login, password) 
  			  VALUES('$login', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['login'] = $login;
  	$_SESSION['success'] = "Вы успешно вошли!";
  	redir();
  }
}

if (isset($_POST['loginUser'])) {
    $login = mysqli_real_escape_string($db, $_POST['loginLog']);
    $password = mysqli_real_escape_string($db, $_POST['passwordLog']);
  
    if (empty($login)) {
        array_push($errorsLog, "Требуется ввести имя учетной записи!");
    }
    if (empty($password)) {
        array_push($errorsLog, "Требуется ввести пароль учетной записи!");
    }
  
    if (count($errorsLog) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['login'] = $login;
          $_SESSION['success'] = "Вы успешно вошли!";
          redir();
        }else {
            array_push($errorsLog, "Имя или пароль пользователя неверны!");
        }
    }
  }
?>