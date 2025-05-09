<?php
    include('header_footer/header.php');
    include('classes/Database.php');
    include('classes/Article.php');
    $conn = new Database();
    $article = new Article($conn);

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
                        Id autora
                    </th>
                    <th scope="col">
                        Kategória
                    </th>
                </tr>
                <?php 
                        $stmt = "SELECT * FROM clanky";
                        $exe = $conn->getConnection()->query($stmt);
                        $result = $exe->fetchAll(PDO::FETCH_ASSOC);


                        foreach($result as $row) {
                            $substr = substr($row['text_clanku'], 0, 30);
                            echo "<tr><th>" . $row['id'] . "</th>";
                            echo "<th>" . $row['nazov'] . "</th>";
                            echo "<th>" . $substr . "</th>";
                            echo "<th>" . $row['datum'] . "</th>";
                            echo "<th>" . $row['pouzivatelia_id'] . "</th>";
                            echo "<th>" . $row['kategorie_id'] . "</th>";
                            echo "<th><button type='submit' value='{$row['id']}' name='delete_btn' class='btn btn-danger'>Odstrániť</button></th>";
                            echo "<th><button type='submit' value='{$row['id']}' name='update_btn' class='btn btn-secondary'>Upraviť</button></th></tr>";
                        }
                ?>
            </table>
        </form>
    </div>
</body>
</html>