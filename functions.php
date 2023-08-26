<?php
    function pdo_connect_sqlite() {
        try {
            return new PDO('sqlite:db.sqlite');
        } catch (PDOException $exception) {
            exit('Veritabanına bağlanılamadı!');
        }
    }
    function template_header($title)
    {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="./assets/style.css" rel="stylesheet" type="text/css">
            <script src="./assets/fonawesomecrack.js" crossorigin="anonymous"></script>
        </head>
        <body class="content">
            <div class="top">
                <map name="logo"><area shape="poly" href="#" alt="balloon" coords="0,906, 135,752, 736,754, 891,693, 1000,505, 1000,37, 867,191, 255,191, 103,254, 0,437"></map>
                <a href="cquestion.php"><h3>Sor Öğren</h3></a>
                <a href="index.php" class="logolink"><img src="./assets/images/Logo.png" usemap="logo" class="logo"></a>
                <a href="lquestion.php"><h3>Cevapla Öğret</h3></a>
            </div>
            <div class="middle">
    EOT;
    }
    function template_footer() {
    echo <<<EOT
            </div>
            <div class="bottom">
                <a href="https://goo.gl/maps/2YGZzGuNcAaJJiDV6" target="_blank"><h3><i class="fa-regular fa-map-location-dot"></i>Afyonkarahisar</h3></a>
                <div class="bottom-buttons">
                    <a href="https://hhhhh_ckr.tabbs.co" target="_blank"><h3><i class="fa-regular fa-user"></i>Hazar Çakar</h3></a>
                    <a href="#"><h3><i class="fa-regular fa-user"></i>Enes Yaren</h3></a>
                </div>
            </div>
        </body>
    </html>
    EOT;
    }
?>