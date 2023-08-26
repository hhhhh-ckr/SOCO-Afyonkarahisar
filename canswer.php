<?php
include 'functions.php';
// Connect to SQLite
$pdo = pdo_connect_sqlite();
$msg = '';
  // MySQL query that selects the poll records by the GET request "id"
  $stmt = $pdo->prepare('SELECT * FROM questions WHERE id = ?');
  $stmt->execute([ $_GET['id'] ]);
  // Fetch the record
  $question = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if POST data is not empty
if (!empty($_POST['answer'])) {
  // MySQL query that selects the poll records by the GET request "id"
  $stmt = $pdo->prepare('SELECT * FROM questions WHERE id = ?');
  $stmt->execute([ $_GET['id'] ]);
  // Fetch the record
  $question = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($question) {
      // Post data not empty insert a new record
      // Check if POST variable "answer" exists, if not default the value to blank, basically the same for all variables
      $id = ($_GET['id']);
      $answer = isset($_POST['answer']) ? $_POST['answer'] : '';
      // Insert new record into the "questions" table
      $stmt = $pdo->prepare('INSERT INTO answers (question_id, answer) VALUES (?, ?)');
      $stmt->execute([ $id, $answer ]);
      if ($answer) {
      // Output message
      $msg = 'Soru başarıyla cevaplandı!';
      }
    } else {
        $msg2 = 'Belirtilen ID ile anket bulunamadı!';
    }
}

?>

<?=template_header('Anasayfa')?>

<?php {
  echo '<div class="message-box">';
      echo '<div class="title"><h3><i class="fa-solid fa-hashtag"></i>' . $question['title'] . '</h3></div>';
      echo '<div class="question"><h3><i class="fa-regular fa-message"></i>' . $question['question'] . '</h3><h5><i class="fa-regular fa-calendar"></i>' . $question['time'] . '</h5></div>';
      echo '<a class="footer" href="lanswer.php?id=' . $question['id'] . '"><h3><i class="fa-regular fa-message-check"></i>Cevaplara bak</h3></a>';
  echo '</div>';
  } ?>
<?php echo '
<form class="form-box" action="canswer.php?id=' . $question['id'] . '" method="post">' ?>
    <?php if ($msg): ?>
        <div class="msg"><h3><i class="fa-regular fa-check"></i><?=$msg?></h3></div>
    <?php endif; ?>
    <?php if ($msg2): ?>
        <div class="msg1"><h3><i class="fa-regular fa-xmark"></i><?=$msg2?></h3></div>
    <?php endif; ?>
    <?php
      echo '<div class="title"><h3><i class="fa-solid fa-hashtag"></i>' . $question['title'] . '</h3></div>'
    ?>
    <div class="answer"><h3><i class="fa-regular fa-message"></i><textarea name="answer" id="answer" placeholder="Soru hakkında detaylı cevap" required></textarea></h3></div>
    <div class="footer" ><h3><i class="fa-regular fa-message-check"></i><input type="submit" value="Soruyu cevapla"></h3></a>
</form>

<?=template_footer()?>