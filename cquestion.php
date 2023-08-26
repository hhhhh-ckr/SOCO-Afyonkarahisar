<?php
include 'functions.php';
// Connect to SQLite
$pdo = pdo_connect_sqlite();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Check if POST variable "title" exists, if not default the value to blank, basically the same for all variables
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $question = isset($_POST['question']) ? $_POST['question'] : '';
    // Insert new record into the "questions" table
    $stmt = $pdo->prepare('INSERT INTO questions (title, question) VALUES (?, ?)');
    $stmt->execute([ $title, $question ]);
    // Output message
    $msg = 'Soru başarıyla oluşturuldu!';
}
?>

<?=template_header('Anasayfa')?>

<form class="form-box" action="cquestion.php" method="post">
    <?php if ($msg): ?>
        <div class="msg"><h3><i class="fa-regular fa-check"></i><?=$msg?></h3></div>
    <?php endif; ?>
    <div class="title"><h3><i class="fa-solid fa-hashtag"></i><input type="text" name="title" id="title" placeholder="Başlık" required></h3></div>
    <div class="question"><h3><i class="fa-regular fa-message"></i><textarea name="question" id="question" placeholder="Soru hakkında detaylı anlatım" required></textarea></h3></div>
    <div class="footer" ><h3><i class="fa-regular fa-message-question"></i><input type="submit" value="Soru Oluştur"></h3></a>
</form>

<?=template_footer()?>