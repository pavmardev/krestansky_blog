<?php
class Article {
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function create_article($article_name, $article_text) {
        $date = date("y-m-d H:i:s");
            $sql = "INSERT INTO clanky (nazov, text_clanku, datum, pouzivatelia_id) VALUES (:nazov, :text_clanku, :datum, :pouzivatelia_id)";

            $id = 2;
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nazov", $article_name);
            $stmt->bindParam(":text_clanku", $article_text);
            $stmt->bindParam(":datum", $date);
            $stmt->bindParam(":pouzivatelia_id", $id);
            $stmt->execute();

            header('Location: admin.php');

    }

    public function delete_article($del_btn) {
        $sql = "DELETE FROM clanky WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $del_btn);
        $stmt->execute();
        header('Location: admin.php');

    }

}

?>