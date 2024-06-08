<?php
session_start();

// Configurație bază de date
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tabel";

// Crează conexiunea
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Obține datele din formular
$user = $_POST['username'];
$pass = $_POST['password'];

// Pregătește și execută interogarea
$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $user, $user);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $username, $hashed_password);
$stmt->fetch();

if ($stmt->num_rows > 0) {
    // Verifică parola
    if (password_verify($pass, $hashed_password)) {
        $_SESSION['username'] = $username;
        echo "Login successful. Welcome, " . $username;
        header("Location: index.php"); // Redirect to a different page
    } else {
        echo "Parolă incorectă.";
    }
} else {
    echo "Nu există utilizator cu acest nume de utilizator sau email.";
}

$stmt->close();
$conn->close();
?>