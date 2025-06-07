<?php
    include('header_footer/header.php');
    require_once('classes/Database.php');
    require_once('classes/User.php');
    $conn = new Database();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];

        $user = new User($conn);
        $res = $user->log_in($name, $surname);

        if ($res != null) {
            $pass = $res['heslo'];
            if (password_verify($password, $pass)) {
                $_SESSION['user_id'] = $res['id'];
                $_SESSION['meno'] = $res['meno'];
                $_SESSION['priezvisko'] = $res['priezvisko'];
                $_SESSION['rola'] = $res['rola'];
                header('Location: index.php');
                exit;
            } else {
                echo "<script>alert('Nesprávne heslo')</script>";
            }
        }
    }
?>
<div style="padding-top: 5%;" class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card mt-5">
<div class="card-header text-center">
<h3>Login</h3>
</div>
<div class="card-body">
<form id="loginForm" method="POST" action="log_in.php">
    <div class="form-group">
        <label for="name">Meno</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Zadajte meno" required>
    </div>
    <div class="form-group">
        <label for="surname">Priezvisko</label>
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Zadajte priezvisko" required>
    </div>
    <div class="form-group">
        <label for="password">Heslo</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Heslo" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Prihlásiť</button>
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
