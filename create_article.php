<?php
    include('header_footer/header.php');
    require_once('classes/Database.php');
    require_once('classes/Article.php');
    $conn = new Database();
    $article = new Article($conn);

    if (!isset($_SESSION['user_id']) || $_SESSION['rola'] == '0') {
      header('Location: index.php');
      exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $article_name = $_POST['article_name'];
      $article_text = $_POST['article_text'];
      $category = $_POST['category'];

      $article->create_article($_SESSION['user_id'], $article_name, $article_text, $category);
    }
?>
<form method="POST" style="padding-top: 10%;">
  <div class="form-group">
    <label for="exampleFormControlInput1">Názov článku</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="article_name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Text článku</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="article_text" rows="3"></textarea>
    <div class="form-group">
      <label for="selectOption">Vyber kategóriu</label>
      <select class="form-control" id="selectOption" name="category">
        <option value="1">Teológia</option>
        <option value="2">Spiritualita</option>
        <option value="3">Svätí</option>
        <option value="4">Modlitba</option>
        <option value="5">Sviatosti</option>
        <option value="6">Cirkevná história</option>
      </select>
</div>
    <button type="submit" class="btn btn-primary">Zverejniť</button>
  </div>

</form>
    <?php
      include('header_footer/footer.php');
    ?>
</body>
</html>