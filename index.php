<?php
include 'functions.php';
$pdo = pdo_connect_sqlite();
$tablo = $pdo->query('SELECT * FROM questions ORDER BY time DESC');
$questions = $tablo->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Anasayfa')?>

<p>
  Bu proje Gastronomi ili olan Afyonkarahisarın yiyecek sektöründeki yerlerine odaklı olarak geliştirilmiştir.<br><br>
  Çok bilinmeyen, köşede bucakta kalmış restorantları keşfetmeyi planlayan bir vizyonumuz vardır.<br><br>
  WAMP server üzerinden PHP,HTML,CSS,SCSS,SASS,SQLİTE kullanılarak geliştirilmiştir.<br><br>
  Sayfanın en üstündeki butonlar ile soru sorabilir ve soru cevaplayabilirsiniz!<br><br>
  Sağ alttaki butonlardan projede bulunan kişilere ulaşabilirsiniz!<br><br>
  Sol alttaki butondan Afyonkarahisarı haritada görünteleyebilirsiniz!<br><br>
</p>

<?=template_footer()?>