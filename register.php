<?php
    include('header_footer/header.php');
    require('classes/Database.php');
    require('classes/User.php');
    $conn = new Database();

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) > 5) {
            $user = new User($conn);
            $user->register($name, $surname, $email, $password);
        }
        else {
            echo '<script>alert("Neplatný email alebo heslo")</script>';
        }
    }
?>
<div style="padding-top: 5%;" class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card mt-5">
<div class="card-header text-center">
<h3>Registrácia</h3>
</div>
<div class="card-body">
<form id="loginForm" method="POST">
    <div class="form-group">
        <label for="email">Meno</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Zadajte meno" required>
    </div>
    <div class="form-group">
        <label for="password">Priezvisko</label>
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Zadajte priezvisko" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Zadajte email" required>
    </div>
    <div class="form-group">
        <label for="email">Heslo (dĺžka aspoň 6 znakov)</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Heslo" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Registrovať</button>
</form>
</div>
</div>
</div>
</div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php
    include('header_footer/footer.php');
?>
</body>
</html>


