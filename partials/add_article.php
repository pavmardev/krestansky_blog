<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="card-body">
<form id="loginForm" method="POST" action="log_in.php">
    <div class="form-group">
        <label for="email">Názov</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Zadajte názov" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Text článku</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Pridať</button>
</form>
</div>
</div>
</div>


<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>