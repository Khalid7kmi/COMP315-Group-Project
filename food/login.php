<?php
session_start();
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["username"] == "admin" and $_POST["password"] == "admin123") {
    header ("location: admin/index.php");
	}
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $username);
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        header("location: index.php");
                    } else {
                        echo "Invalid username or password.";
                    }
                }
            } else {
                echo "Invalid username or password.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .login-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center login-container">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login</h2>
                        
                        <form action="" method="post">
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            
                            <div class="d-grid gap-2 mb-3">
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>
                            
                            <p class="text-center mt-3">
                                Don't have an account! <a href="register.php" class="link-primary">Register</a>.
                            </p>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>