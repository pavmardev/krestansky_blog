<?php
require_once('classes/Database.php');
require_once('classes/User.php');
$conn = new Database();
$user = new User($conn);

$user->log_out();
?>