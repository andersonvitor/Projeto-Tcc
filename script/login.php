<?php
session_start(); // Inicia a sessão
require 'db.php'; // Inclui a conexão com o banco de dados

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        try {
            // Busca o usuário pelo email
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $user['password'] === md5($password)) {
                // Login bem-sucedido
                $_SESSION['user_id'] = $user['id'];
                header('Location: dashboard.php'); // Redireciona para a página protegida
                exit;
            } else {
                $error = 'Email ou senha incorretos.';
            }
        } catch (PDOException $e) {
            $error = 'Erro ao processar o login: ' . $e->getMessage();
        }
    } else {
        $error = 'Por favor, preencha todos os campos.';
    }
}

// Renderiza o erro no frontend
header('Content-Type: application/json');
echo json_encode(['error' => $error]);
exit;
?>
