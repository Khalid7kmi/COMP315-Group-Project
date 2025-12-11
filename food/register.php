<?php
require_once "config.php";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

   
    if(empty($username) || empty($password)){
        
        echo "Please fill all fields.";
    } else {
        
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $username, $param_password);
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else {
                echo "Registration failed.";
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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .register-container { margin-top: 50px; }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center register-container">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Register</h2>
                        
                        <form action="" method="post">
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="3 to 20 characters, no spaces" required minlength="3" maxlength="20"pattern="^\S{3,20}$"
                                    title="Username must be 6-20 characters long and contain no spaces.">
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="6 to 20 characters, no spaces" required minlength="6" maxlength="20"pattern="^\S{6,20}$" 								title="Password must be 6-20 characters long and contain no spaces.">
                            </div>
                            
                            <div class="d-grid gap-2 mb-3">
                                <input type="submit" class="btn btn-success" value="Register">
                            </div>
                            
                            <p class="text-center mt-3">
                                I have an account! <a href="login.php" class="link-success">Login</a>.
                            </p>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>