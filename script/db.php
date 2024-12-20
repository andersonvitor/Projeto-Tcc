<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'sistema_login';
$username = 'root'; // Usuário do banco
$password = ''; // Senha do banco

try {
    // Conexão com o banco usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuração de erros para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>
