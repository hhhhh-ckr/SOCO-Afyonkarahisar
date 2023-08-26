<?php
include 'functions.php';
$pdo = pdo_connect_sqlite();
$tablo = $pdo->prepare('SELECT title FROM questions WHERE id= ?');
$tablo->execute([ $_GET['id'] ]);
$question = $tablo->fetchAll(PDO::FETCH_ASSOC);
if (!empty($_GET)) {
$tablo = $pdo->prepare('SELECT * FROM answers WHERE question_id= ? ORDER BY time DESC');
$tablo->execute([ $_GET['id'] ]);
$answers = $tablo->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?=template_header('Anasayfa')?>

<?php 
    echo '<div class="message-box">';
        foreach ($question as $q) {
        echo '<div class="title"><h3><i class="fa-solid fa-hashtag"></i>' . $q['title'] . '</h3></div>';
        }
        foreach ($answers as $a) {
        echo '<div class="question"><h3><i class="fa-regular fa-message"></i>' . $a['answer'] . '</h3><h5><i class="fa-regular fa-calendar"></i>' . $a['time'] . '</h5></div>';
        }
    echo '</div>';
     ?>

<?=template_footer()?>