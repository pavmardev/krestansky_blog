<?php
class Article {
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function create_article($article_name, $article_text, $category) {
        $date = date("y-m-d H:i:s");
            $sql = "INSERT INTO clanky (nazov, text_clanku, datum, pouzivatelia_id, kategorie_id) VALUES (:nazov, :text_clanku, :datum, :pouzivatelia_id, :kategorie_id)";

            $id = 2;
            $cat = (int) $category;
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nazov", $article_name);
            $stmt->bindParam(":text_clanku", $article_text);
            $stmt->bindParam(":datum", $date);
            $stmt->bindParam(":pouzivatelia_id", $id);
            $stmt->bindParam(":kategorie_id", $cat);
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

    public function find_article($article_id) {

        $sql = "SELECT meno, priezvisko, clanky.datum AS clanky_datum, nazov, text_clanku, kategoria FROM pouzivatelia INNER JOIN clanky ON pouzivatelia.id = clanky.pouzivatelia_id INNER JOIN kategorie ON clanky.kategorie_id = kategorie.id WHERE clanky.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $article_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function load_article() {
        $sql = "SELECT clanky.id AS clanky_id, meno, priezvisko, clanky.datum AS clanky_datum, nazov, text_clanku, kategoria FROM pouzivatelia INNER JOIN clanky ON pouzivatelia.id = clanky.pouzivatelia_id INNER JOIN kategorie ON clanky.kategorie_id = kategorie.id";
        $stmt = $this->db->query($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update_article($article_name, $article_text, $id) {
        $sql = "UPDATE clanky SET nazov = :article_name, text_clanku = :article_text WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':article_name', $article_name);
        $stmt->bindParam(':article_text', $article_text);
        $stmt->execute();
        header('Location: admin.php');
    }
        
}

?>