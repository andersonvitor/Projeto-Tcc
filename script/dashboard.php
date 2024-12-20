<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: ..//login.php'); // Redireciona para o login se não estiver autenticado
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-3xl font-bold">Bem-vindo à sua Dashboard!</h1>
        <a href="logout.php" class="mt-4 inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Sair</a>
    </div>
</body>
</html>
