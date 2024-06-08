<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Insider</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asigură-te că calea este corectă -->
    <script src="script.js"></script>
</head>
<body>
    <nav style="background-color: white">
        <div style="margin-left: 10px;">
            <img src="images/lotus.png" alt="lotus" class="lotus">
            
        <<span>Beauty Insider</span>
        </div>
        <div class="pages">
            <a href="login2.php" class="active-index">Login</a>
            <a href="index.php" class="active-index">Home</a>
            <a href="contact.php" class="active-index">Contact</a>
        </div>
    </nav>
    <div class="wrapper">
        <h1>Login</h1>
        <form id="myForm" action="index.php" method="POST">
            <input class="login-up" type="text" name="username" placeholder="Username or Email" required>
            <input class="login-up" type="password" name="password" placeholder="Password" required>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#" style="color: #555555">Forgot password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link"></div>
            <p>Don't have an account?<a href="register.php"> Register</a></p> <!-- Adaugă link-ul de înregistrare -->
        </form>
    </div>
</body>
</html>
