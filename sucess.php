<?php
header("refresh:5;url=pagina_inicial");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviço Cadastrado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            color: #333;
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        .message-container {
            background-color: #28a745;
            color: white;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .redirect-info {
            font-size: 1rem;
            color: #f8f9fa;
        }

        .redirect-info b {
            color: yellow;
        }

        .timer {
            font-size: 1.5rem;
            color: white;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 0.9rem;
            }

            .timer {
                font-size: 1.2rem;
            }

            .message-container {
                width: 90%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="message-container">
        <h1>Serviço Cadastrado com Sucesso!</h1>
        <p>Seu serviço foi cadastrado corretamente. Você será redirecionado para a página inicial em breve.</p>
        <div class="redirect-info">
            <p>Se não for redirecionado automaticamente, <a href="pagina_inicial" style="color: yellow;">clique aqui</a>.</p>
            <div class="timer">Redirecionando em: <span id="countdown">5</span> segundos...</div>
        </div>
    </div>

    <script>
        // Redirecionamento após 5 segundos
        let countdownElement = document.getElementById('countdown');
        let countdown = 5;
        
        setInterval(function() {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown === 0) {
                window.location.href = 'pagina_inicial';
            }
        }, 1000);
    </script>

</body>
</html>
