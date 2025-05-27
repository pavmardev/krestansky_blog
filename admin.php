<?php
    include('header_footer/header.php');
    include('classes/Database.php');
    include('classes/Article.php');
    include('classes/User.php');

    if (!isset($_SESSION['user_id']) || $_SESSION['rola'] == '0') {
      header('Location: index.php');
      exit;
    }

    $conn = new Database();
    $article = new Article($conn);
    $user = new User($conn);
    $result = $article->load_article();
    $res = $user->load_users();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['delete_btn'])) {
            $del_btn = $_POST['delete_btn'];
            $article->delete_article($del_btn);
        }
        elseif(isset($_POST['update_btn'])) {
            $article_id = $_POST['update_btn'];
            header("Location: update_article.php?id=" . $article_id);
        }
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="create_article.php">
        <button style="margin-top: 10%;" type="button" class="btn btn-primary btn-lg">Pridať článok</button>
    </a>
    <div style="margin-top: 5%;">
        <h2 class="text-center">Databáza používateľov</h2>
            <table class="table">
                <tr>
                    <th scope="col">
                        Id používateľa
                    </th>
                    <th scope="col">
                        Meno
                    </th>
                    <th scope="col">
                        Priezvisko
                    </th>
                    <th scope="col">
                        Dátum registrácie
                    </th>
                    <th scope="col">
                        Rola
                    </th>
                </tr>
                <?php 
                    
                        foreach($res as $row) {
                            
                            echo "<tr><th>" . $row['id'] . "</th>";
                            echo "<th>" . $row['meno'] . "</th>";
                            echo "<th>" . $row['priezvisko'] . "</th>";
                            echo "<th>" . $row['datum_vytvorenia'] . "</th>";
                            echo "<th>" . $row['rola'] . "</th>";
                        }
                ?>
            </table>
    </div>
    <div>
        <h2 class="text-center">Databáza článkov</h2>
        <form method="POST">
            <table class="table">
                <tr>
                    <th scope="col">
                        Id článku
                    </th>
                    <th scope="col">
                        Názov
                    </th>
                    <th scope="col">
                        Text
                    </th>
                    <th scope="col">
                        Dátum
                    </th>
                    <th scope="col">
                        Meno autora
                    </th>
                    <th scope="col">
                        Kategória
                    </th>
                </tr>
                <?php 
                    
                        foreach($result as $row) {
                            $substr = substr($row['text_clanku'], 0, 30);
                            echo "<tr><th>" . $row['clanky_id'] . "</th>";
                            echo "<th>" . $row['nazov'] . "</th>";
                            echo "<th>" . $substr . "</th>";
                            echo "<th>" . $row['clanky_datum'] . "</th>";
                            echo "<th>" . $row['meno'] . ' ' . $row['priezvisko'] . "</th>";
                            echo "<th>" . $row['kategoria'] . "</th>";
                            echo "<th><button type='submit' value='{$row['clanky_id']}' name='delete_btn' class='btn btn-danger'>Odstrániť</button></th>";
                            echo "<th><button type='submit' value='{$row['clanky_id']}' name='update_btn' class='btn btn-secondary'>Upraviť</button></th></tr>";
                        }
                ?>
            </table>
        </form>
    </div>
</body>
</html>