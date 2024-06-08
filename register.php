<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurație bază de date
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tabel"; // Baza de date este 'tabel'

    // Crează conexiunea
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifică conexiunea
    if ($conn->connect_error) {
        die("Conexiune eșuată: " . $conn->connect_error);
    }

    // Obține datele din formular
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing password

    // Verifică dacă email-ul sau username-ul există deja
    $check_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $user, $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "Numele de utilizator sau email-ul există deja.";
    } else {
        // SQL pentru inserarea unui nou utilizator
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Eroare la pregătirea interogării: " . $conn->error);
        }

        $stmt->bind_param("sss", $user, $email, $pass);

        if ($stmt->execute()) {
            echo "Contul a fost creat cu succes. Redirecționare către pagina de login...";
            header("Location: login2.php"); // Redirect to login page
            exit();
        } else {
            echo "Eroare la inserare: " . $stmt->error;
        }

        $stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css"> <!-- Asigură-te că calea este corectă -->
</head>
<body>
    <div class="wrapper">
        <h1>Register</h1>
        <form id="registerForm" action="register.php" method="POST" id="myForm">
            <input class="login-up" type="text" name="username" placeholder="Username" required>
            <input class="login-up" type="email" name="email" placeholder="Email" required>
            <input class="login-up" type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
