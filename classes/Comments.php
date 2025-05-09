<?php
class Comment {
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function insert_comment($commentary, $article_id) {
        $date = date("y-m-d H:i:s");
        $sql = "INSERT INTO komentare (komentar, datum, pouzivatelia_id, clanky_id) VALUES (:komentar, :datum,
        :pouzivatelia_id, :clanky_id)";

        $id = 2;

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':komentar', $commentary);
        $stmt->bindParam(':datum', $date);
        $stmt->bindParam(':pouzivatelia_id', $id);
        $stmt->bindParam(':clanky_id', $article_id);
        $stmt->execute();
    }

    public function load_comments($article_id) {
        $sql = "SELECT komentare.id AS komentare_id, meno, priezvisko, komentare.datum AS komentare_datum, komentar FROM komentare INNER JOIN pouzivatelia ON komentare.pouzivatelia_id = pouzivatelia.id WHERE clanky_id = :clanky_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':clanky_id', $article_id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function delete_comment($id) {
        $sql = "DELETE FROM komentare WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();    
    }
}
?>