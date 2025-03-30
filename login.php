<?php
include 'confi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identificador = $_POST['email']; // Pode ser email ou nome de usuário
    $senha = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE (email = ? OR nome_usuario = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $identificador, $identificador);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_email'] = $usuario['email']; // Armazena o email na sessão
            echo "Login realizado com sucesso!";
            header("Location: pagina_inicial");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
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
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
    <title>Login - LAN</title>
</head>
<body>   
    <main id="container">
        <form id="login_form" action="login.php" method="post">
            
            <div id="form_header">
                <h1>Login</h1>
                <i id="mode_icon" class="fa-solid fa-moon"></i>
            </div>

            
            <div id="social_media">

                <a class="logos" href="pagina_inicial">
                    <img src="imgs_login/LOGO_LAN_SERVICOS_DE_CONSTRUCAO-removebg-preview.png" alt="Empresa Logo">
                </a>

            </div>

            
            <div id="inputs">
                
            
                
                <div class="input-box">
                    <label for="email">
                        E-mail ou Nome de Usuário
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="text" id="email" name="email" required>
                        </div>
                    </label>
                </div>
                
                
                <div class="input-box">
                    <label for="password">
                        Senha
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" id="password" name="password" required>
                        </div>
                    </label>

                    <script>
                        function showOrHidePassword () {
                            const input = document.querySelector("#password");
                            input.type = input.type === "password" ? "text" : "password";
                        }
                    </script>

                    <input class="show-password" type="checkbox" onclick="showOrHidePassword()"><span> Mostrar Senha </span>
                    
                    
                    <div id="forgot_password">
                        <a href="rec_senha">
                            Esqueceu sua senha?
                        </a>
                    </div>

                    <div id="cadastrar">
                        <a href="cadastro">
                            Não tem login? Realizar Cadastro
                        </a>
                    </div>

                </div>
            </div>

            
            <button type="submit" id="login_button">
                Login
            </button>
        </form>
    </main>

    
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>