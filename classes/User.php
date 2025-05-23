<?php
class User {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    public function log_in($name, $surname, $password) {
        if(isset($this->pdo)) {
            $sql = "SELECT id FROM pouzivatelia WHERE meno = :meno AND priezvisko = :priezvisko AND heslo = :heslo";

            $stmt = $this->db->prepare($sql);
            $sub = $stmt->bindParam(":meno", $name);
            $sub = $stmt->bindParam(":priezvisko", $surname);
            $sub = $stmt->bindParam(":heslo", $password);
            $exe = $stmt->execute();

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if($res) {
                header("Location: admin.php");
            } else {
                echo "<script>alert('Nesprávne zadané údaje')</script>";
            }
        }
    }

    public function register($name, $surname, $email, $password) {
        try {
            $date = date("y-m-d H:i:s");
            $sql = "INSERT INTO pouzivatelia (meno, priezvisko, email, heslo, datum_vytvorenia, rola) VALUES (:meno, :priezvisko, :email, :heslo, :datum_vytvorenia, :rola)";

            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            $rola = 0;

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":meno", $name);
            $stmt->bindParam(":priezvisko", $surname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":heslo", $hashedPass);
            $stmt->bindParam(":datum_vytvorenia", $date);
            $stmt->bindParam(":rola", $rola);
            $stmt->execute();
            header('Location: index.php');
            echo '<script>alert("Registrácia prebehla úspešne")</script>';
        } catch (Exception $e) {
            echo '<script>alert("Používateľ s daným emailom už existuje")</script>';
        }

        
    }

    public function load_users() {
        $sql = "SELECT id, meno, priezvisko, datum_vytvorenia, rola FROM pouzivatelia";
        $query = $this->db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    
}
?>