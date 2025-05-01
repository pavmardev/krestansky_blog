<?php
    include('partials/log_in.php');
    require('database/database.php');

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];

        $user = new User($name, $surname, $password);
        $log_in = $user->log_in();
    }
    
?>
