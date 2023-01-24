<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="shortcut icon" href="./img/icon.svg" type="image/x-icon">

    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/column.css">
    <link rel="stylesheet" href="./styles/interesting-fact.css">
    <link rel="stylesheet" href="./styles/list.css">
</head>
<body>
    <header>
        <div class="mobile_icon_menu">
            <button class="mobile_icon_menu_button">
                <span class="mobile_icon_menu_line top_line"></span>
                <span class="mobile_icon_menu_line middle_line"></span>
                <span class="mobile_icon_menu_line bottom_line"></span>
            </button>
        </div>
        <ul class="header_menu">
            <li><a href="./index.html">Главная</a></li>
            <li><a href="./eurasia.html">Реки Евразии</a></li>
            <li><a href="./northAmerica.html">Реки Северной Америки</a></li>
            <li><a href="./southAmerica.html">Реки Южной Америки</a></li>
            <li><a href="./africa.html">Реки Африки</a></li>
            <li><a href="./australia.html">Реки Австралии</a></li>
            <li><a href="./news.html">Новости</a></li>
            <li><a class="active_link" href="#">Интересные факты</a></li>
        </ul>   
    </header>
    
    <h1 class="wrap_title small_height without-skew">Интересные факты</h1>

    <section class="interesting-fact">
        <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");
            $result = $mysqli->query("SELECT * FROM interesting_facts");
            echo "<ul>";
            foreach ($result as $row) {
                echo '<div class="column-row">
                        <div class="column-row__column column-row__column_l-6 column-row__column_m-6 column-row__column_s-2">
                            <div class="interesting-fact__video">
                                <iframe 
                                    width="560" 
                                    height="315" 
                                    src="' .$row['url_video'] . '" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                ></iframe>
                            </div>
                        </div>

                        <div class="column-row__column column-row__column_l-6 column-row__column_m-6 column-row__column_s-2">
                            <div class="interesting-fact__text-wrapper">
                                <h2 class="interesting-fact__title ">' .$row['title'] . '</h2>
                                <ol class="list">' .$row['text'] . '
                                </ol>
                            </div>
                        </div>
                    </div>';
            }
        ?>
    </section>
    

    <script src="./scripts/menu.js"></script>
</body>
</html>
