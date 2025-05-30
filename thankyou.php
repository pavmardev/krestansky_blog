<?php
        include('header_footer/header.php');
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            echo "<h2 style='padding-top: 10%;'>" . htmlspecialchars($name) . ' ' . "ďakujeme za správu</h2>";
        } else {
            header('Location: contact.php');
            exit;
        }

?>
</body>
</html>

