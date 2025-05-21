<?php
    include('classes/Database.php');
    include('classes/Article.php');
    $conn = new Database();
    $article = new Article($conn);

    $article_id = $_GET['id'];
    $res = $article->find_article($article_id);
    $art_name = $res['nazov'];
    $art_text = $res['text_clanku'];
    $category = $res['kategoria'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $article_name = $_POST['article_name'];
      $article_text = $_POST['article_text'];

      $article->update_article($article_name, $article_text, $article_id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include('header_footer/header.php');
?>
<body>
<form method="POST" style="padding-top: 10%;">
  <div class="form-group">
    <label for="exampleFormControlInput1">Názov článku</label>
    <input type="text" value="<?php echo htmlspecialchars($art_name)?>" class="form-control" id="exampleFormControlInput1" name="article_name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Text článku</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="article_text" rows="3"><?php echo htmlspecialchars($art_text) ?></textarea>
    <button type="submit" class="btn btn-primary">Zverejniť</button>
  </div>
  
</form>

<?php
  include('header_footer/footer.php');
?>
</body>
</html>
