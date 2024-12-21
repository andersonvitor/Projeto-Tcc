<?php
require 'db.php'; // Inclui a conexão com o banco de dados
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($name) && !empty($email) && !empty($password)) {
        try {
            // Verifica se o email já está registrado
            $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->fetch()) {
                $error = 'O email já está registrado.';
            } else {
                // Criptografa a senha
                // Insere o novo usuário no banco de dados
                $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);

                if ($stmt->execute()) {
                    $success = 'Cadastro realizado com sucesso!';
                } else {
                    $error = 'Erro ao cadastrar. Tente novamente.';
                }
            }
        } catch (PDOException $e) {
            $error = 'Erro no servidor: ' . $e->getMessage();
        }
    } else {
        $error = 'Por favor, preencha todos os campos.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm">
        <h1 class="text-2xl font-bold text-center mb-4">Cadastro</h1>

        <?php if (!empty($error)): ?>
            <p class="text-red-500 text-center mb-4"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p class="text-green-500 text-center mb-4"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form action="register.php" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-gray-700">Nome:</label>
                <input type="text" id="name" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700">Senha:</label>
                <input type="password" id="password" name="password" class="w-full border px-3 py-2 rounded" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Cadastrar</button>
        </form>
        <div class="mt-4 text-center">
            <a href="login.php" class="text-sm text-blue-500 hover:underline">Já tem uma conta? Faça login</a>
        </div>
    </div>
</body>
</html>
