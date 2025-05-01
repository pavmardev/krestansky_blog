<?php
    include('partials/register.php');
    require('database/database.php');
    $conn = new Database();
    $conn->getConnection();

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $user = new User($name, $surname, $password);
        $user->register($email);
    }
    
?>

