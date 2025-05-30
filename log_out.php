<?php
require('classes/Database.php');
require('classes/User.php');
$conn = new Database();
$user = new User($conn);

$user->log_out();
?>