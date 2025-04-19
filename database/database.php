<?php

class Database{
    public $host = "localhost";
    public $db_name = "zp_db";
    public $user = "root";
    public $password = "123456";
    public $dns;



    public function getConnection() {
        $dns = "mysql:host=$this->host;dbname=$this->db_name;port=3306";
        try {
            $db = new PDO($this->dns, $this->user, $this->password);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        
        if (isset($error)) {
            echo "<h2>Nastala chyba v spojení</h2>";
            echo $error;
        } else {
            return $db;
        }
        
    }


}

?>