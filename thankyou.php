<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $contact_name =  $_POST['name'];
        $contact_email = $_POST['email'];
        $contact_subject = $_POST['subject'];
        $contact_message = $_POST['message'];

        echo "<h2>$contact_name ďakujeme za správu</h2>";
    }

    else {
        echo 'Nesprávna metóda';
    }
    
?>

