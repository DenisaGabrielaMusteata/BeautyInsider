<?php
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

// Creează tabela contact_messages
$sql = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    message TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela 'contact_messages' a fost creată cu succes.";
} else {
    echo "Eroare la crearea tabelei: " . $conn->error;
}

$conn->close();
?>
