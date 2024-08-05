<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancophp";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>