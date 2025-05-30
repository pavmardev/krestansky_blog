<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="sk">
<head>
  <meta charset="utf-8">
  <title>Kresťanský blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active"><a class="nav-link" href="index.php">Domov</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">O nás</a></li>
          <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Kontakt</a></li>
          <?php
          if (isset($_SESSION['rola']) && $_SESSION['rola'] == '1') {
            echo '<li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>';
          }
          ?>
        </ul>
      </div>

      <?php
        if (!isset($_SESSION['user_id'])) {
          echo '<a href="log_in.php" style="margin-right: 1%;"><button type="button" class="btn btn-warning">Prihlásiť</button></a>';

          echo '<a href="register.php" style="margin-right: 5%;"><button type="button" class="btn btn-warning">Registrácia</button></a>';
        } else {
          echo '<p style="font-size: 25px; font-weight: bolder; margin-right: 20px; margin-bottom: 0; color: #181818">' . htmlspecialchars($_SESSION['meno']) . ' ' . htmlspecialchars($_SESSION['priezvisko']) . '</p>';
          echo '<a href="log_out.php" style="margin-right: 1%;"><button type="button" class="btn btn-danger">Odhlásiť</button></a>';
        }
      ?>
    </div>
  </nav>
</header>

