<?php
$servername = "localhost";
$username = "root";
$password = "";

// Crează conexiunea
$conn = new mysqli($servername, $username, $password);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Creează baza de date
$sql = "CREATE DATABASE IF NOT EXISTS tabel";
if ($conn->query($sql) === TRUE) {
    echo "Baza de date 'tabel' a fost creată cu succes.<br>";
} else {
    echo "Eroare la crearea bazei de date: " . $conn->error . "<br>";
}

// Selectează baza de date
$conn->select_db("tabel");

// Creează tabela users
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'users' a fost creată cu succes.";
} else {
    echo "Eroare la crearea tabelei: " . $conn->error;
}

$conn->close();
?>
