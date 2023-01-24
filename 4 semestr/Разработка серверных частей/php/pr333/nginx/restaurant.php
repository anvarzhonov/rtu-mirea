<!DOCTYPE html>
<html lang="ru">
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
  </head>
  <body>
    <h2 class="text-center m-1">Информация о столиках в ресторане</h2>
    <table class="table m-3">
    <thead>
      <tr>
        <th scope="col">Местонахождение столиков</th>
        <th scope="col">Количество столиков</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $mysqli = new mysqli("db", "user", "password", "restaurants_db");
        $result = $mysqli->query("SELECT * FROM tables");
        foreach ($result as $row) {
          echo "
            <tr>
              <th scope='row'>{$row['place']}</th>
              <td>{$row['numberOfTables']}</td>
            </tr>
          ";
        }
      ?> 
    </tbody>
    <table class="table m-3">
      <h2 class="text-center m-1">Информация о посещениях ресторана по дням</h2>
    <thead>
      <tr>
        <th scope="col">Дата</th>
        <th scope="col">Количество гостей</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $mysqli = new mysqli("db", "user", "password", "restaurants_db");
        $result = $mysqli->query("SELECT * FROM clients");
        foreach ($result as $row) {
          echo "
            <tr>
              <th scope='row'>{$row['date']}</th>
              <td>{$row['numberOfClients']}</td>
            </tr>
          ";
        }
      ?> 
      <br>
      
    </tbody>
  </table>
  </body>
</html>
