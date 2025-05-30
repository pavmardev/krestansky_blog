<?php
class User {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    public function log_in($name, $surname) {
            $sql = "SELECT * FROM pouzivatelia WHERE meno = :meno AND priezvisko = :priezvisko";

            $stmt = $this->db->prepare($sql);
            $sub = $stmt->bindParam(":meno", $name);
            $sub = $stmt->bindParam(":priezvisko", $surname);
            $exe = $stmt->execute();

            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if($res) {
                return $res;
            } else {
                echo "<script>alert('Nesprávne zadané údaje')</script>";
                return null;
            }
        }

    public function log_out() {
            session_start();

            $_SESSION = array();

            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),   
                    '',               
                    time() - 42000,   
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }

            session_destroy();
            header('Location: log_in.php');
            exit;
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
            exit;
        } catch (PDOException $e) {
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