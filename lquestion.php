<?php
include 'functions.php';
$pdo = pdo_connect_sqlite();
$tablo = $pdo->query('SELECT * FROM questions ORDER BY time DESC');
$questions = $tablo->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Anasayfa')?>

<?php foreach ($questions as $q) {
    echo '<div class="message-box">';
        echo '<div class="title"><h3><i class="fa-solid fa-hashtag"></i>' . $q['title'] . '</h3></div>';
        echo '<div class="question"><h3><i class="fa-regular fa-message"></i>' . $q['question'] . '</h3><h5><i class="fa-regular fa-calendar"></i>' . $q['time'] . '</h5></div>';
        echo '<a class="footer" href="canswer.php?id=' . $q['id'] . '"><h3><i class="fa-regular fa-message-check"></i>Soruyu cevapla</h3></a>';
    echo '</div>';
    } ?>

<?=template_footer()?>