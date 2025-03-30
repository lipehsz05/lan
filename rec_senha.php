<?php
session_start();
include 'confi.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $nova_senha = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nova_senha_hash, $email);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Senha alterada com sucesso!</div>";
            header("Location: login.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Erro ao alterar a senha: " . $stmt->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>E-mail não encontrado.</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_rec_senha.css">
    <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
    <script type="text/javascript" src="js/script.js" defer></script>
    <title>Recuperar Senha - LAN</title>
</head>
<body>   
    <main id="container">
        <form id="login_form" method="post">
            <div id="form_header">
                <h1>Recuperar Senha</h1>
                <i id="mode_icon" class="fa-solid fa-moon"></i>
            </div>
            <div id="inputs">
                <div class="input-box">
                    <label for="email">
                        E-mail
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </label>
                </div>
                <div class="input-box">
                    <label for="password">
                        Nova Senha
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" id="password" name="password" required>
                        </div>
                    </label>

                    <div id="return">
                        <a href="login">
                            Voltar
                        </a>
                    </div>

                </div>
            </div>

            <button type="submit" id="redefinir_button">
                Redefinir
            </button>
        </form>
    </main>

    
</body>
</html>