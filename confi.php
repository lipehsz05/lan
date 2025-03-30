<?php
// Conexão com o banco de dados MySQL
$host = "localhost";
$username = "root";
$password = "MySQL2024@Admin!";
$database = "lan";

$conn = new mysqli($host, $username, $password, $database);

// Verifica a conexão com o banco
// echo "Conexão bem-sucedida com o banco de dados.";
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
