<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/css/bootstrap.min.css"
    />
    <?php include('server.php') ?>
    <title>Ресторан "Оскал"</title>
  </head>
  <style type="text/css">
    .btn-primary {
      background-color:  green !important;
    }
  </style>
  <body>
    <h2 class="text-center m-1">Система регистрации и авторизации</h2>
    
    <div class="container row mw-100">
      <div class="justify-content-center">
        <br>
        <strong>Для входа после регистрации:</strong>
      </div>
      <div class="justify-content-center">
        <form method="post" action="index.php" class="border p-3">
        <?php include('errorsLog.php'); ?>
          <div class="">
            <label for="login" class="form-label">Логин</label>
            <input
              type="text"
              class="form-control"
              id="login"
              name="loginLog"
              aria-describedby="loginHelp"
            />
          </div>
          <div class="">
            <label for="passwordInput" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="passwordInput" name="passwordLog"/>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary mt-2" name="loginUser">Войти</button>
          </div>
        </form>
      </div>
      <div class="justify-content-center">
        <br>
        <strong>Для первичной регистрации:</strong>
      </div>
      <div class="justify-content-center">
        <form method="post" action="index.php" class="border p-3">

        <?php include('errorsReg.php'); ?>
          <div class="">
            <label for="login" class="form-label">Логин</label>
            <input
              type="text"
              class="form-control"
              id="login"
              name="loginReg"
              aria-describedby="loginHelp"
            />
          </div>
          <div class="">
            <label for="passwordInput" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="passwordInput" name="passwordReg"/>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary mt-2" name="regUser">
              Зарегистрироваться
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="p-3 fixed-bottom ">
      <div class="text-center">
        <a href="http://localhost:8001/about.html" class="lead">О ресторане</a>
      </div>
      <div class="text-center">
        <a href="http://localhost:8001/dresscode.html" class="lead">Дресс-код</a>
      </div>
    </div>
  </body>
</html>
