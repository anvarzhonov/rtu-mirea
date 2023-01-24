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
    
    <table class="table m-3">
      <h2 class="text-center m-1">Информация о игрушках</h2>
    <thead>
      <tr>
        <th scope="col">Название игрушки</th>
        <th scope="col">Количество наборов</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $mysqli = new mysqli("db", "user", "password", "store_db");
        $result = $mysqli->query("SELECT * FROM toys");
        foreach ($result as $row) {
          echo "
            <tr>
              <th scope='row'>{$row['name']}</th>
              <td>{$row['count_toys']}</td>
            </tr>
          ";
        }
      ?> 
      <br>
      
    </tbody>
    <br>
    
    <table class="table m-3">
      <h2 class="text-center m-1">Информация о покупателях</h2>
    <thead>
      <tr>
        <th scope="col">Кол-во купленных наборов</th>
        <th scope="col">Сумма покупки</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $mysqli = new mysqli("db", "user", "password", "store_db");
        $result = $mysqli->query("SELECT * FROM clients");
        foreach ($result as $row) {
          echo "
            <tr>
              <th scope='row'>{$row['count_set']}</th>
              <td>{$row['amount_purchased']}</td>
            </tr>
          ";
        }
      ?> 
      <br>
      
    </tbody>
    
  </table>
  </body>
</html>
