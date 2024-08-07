<?php
session_start(); // Inicia a sessão

// Definir credenciais de login
$valid_username = 'vallesck';
$valid_password = 'vallescktelas';

// Processa o login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica as credenciais
    if ($username === $valid_username && $password === $valid_password) {
        // Define a variável de sessão de login
        $_SESSION['loggedin'] = true;
        
        // Define o tempo de expiração da sessão para 1 minuto
        $_SESSION['expire_time'] = time() + 60; // 60 segundos = 1 minuto
        
        // Redireciona para dados.php
        header("Location: dados.php");
        exit();
    } else {
        $error = "Nome de usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>

<div class="container-login">

    <div>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">Entrar</button>

        <a href="https://discord.gg/DEUBszy7">Adquirir tela</a>
    </form>
    </div>

    
</div>

</body>
</html>
