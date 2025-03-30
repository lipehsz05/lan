<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página inicial deslogado
    header("Location: pagina_inicial_deslogado.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_notificacao.css">
    <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
    <title>Notificações - LAN</title>
    <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
    <link rel="stylesheet" href="./css/style_navbar.css" />
</head>
<body>

<?php include 'navbar.php'; ?>

    <!--Fim Barra topo-->

    <!--Começo anuncio-->

    <div class="anuncio">

    </div>

    <!--Fim anuncio-->

        <div class="container">
            <div class="notificacoes">
                <header>
                    <div class="notificacoesH">
                        <h1>Notificações</h1>
                        <span id="num_notificacoes"></span>
                    </div>
                    <p id="marcar_como_lidas">Marcar todas como lidas</p>
                </header>
                <main>
                    <div class="notificationCard unread">
                        <img alt="logo" src="imgs_login/LOGO_LAN_SERVICOS_DE_CONSTRUCAO-removebg-preview.png"/>
                        <div class="descricao">
                            <p>Bot Lan, avisando sobre nova notificação</p>
                            <p id="tempo_de_notificacao">1 minuto atrás</p>
                        </div>
                    </div>
    
                    <div class="notificationCard unread">
                        <img alt="logo" src="imgs_login/LOGO_LAN_SERVICOS_DE_CONSTRUCAO-removebg-preview.png"/>
                        <div class="descricao">
                            <p>Bot Lan, confira novas ofertas no ramo da construção</p>
                            <p id="tempo_de_notificacao">1 minuto atrás</p>
                        </div>
                    </div>  
                    <div class="notificationCard ">
                        <img alt="logo" src="imgs_login/LOGO_LAN_SERVICOS_DE_CONSTRUCAO-removebg-preview.png"/>
                        <div class="descricao">
                            <p>Bot Lan, avisando sobre nova notificação</p>
                            <p id="tempo_de_notificacao">1 minuto atrás</p>
                        </div>
                    </div>
    
                    <div class="notificationCard unread">
                        <img alt="logo" src="imgs_login/LOGO_LAN_SERVICOS_DE_CONSTRUCAO-removebg-preview.png"/>
                        <div class="descricao">
                            <p>Bot Lan, confira novas ofertas no ramo da construção</p>
                            <p id="tempo_de_notificacao">1 minuto atrás</p>
                        </div>
                    </div>  
                    <div class="notificationCard ">
                        <img alt="logo" src="imgs_login/LOGO_LAN_SERVICOS_DE_CONSTRUCAO-removebg-preview.png"/>
                        <div class="descricao">
                            <p>Bot Lan, avisando sobre nova notificação</p>
                            <p id="tempo_de_notificacao">1 minuto atrás</p>
                        </div>
                    </div>
    
                    <div class="notificationCard unread">
                        <img alt="logo" src="imgs_login/LOGO_LAN_SERVICOS_DE_CONSTRUCAO-removebg-preview.png"/>
                        <div class="descricao">
                            <p>Bot Lan, confira novas ofertas no ramo da construção</p>
                            <p id="tempo_de_notificacao">1 minuto atrás</p>
                        </div>
                    </div>  
                </main>
            </div>
        </div>
    
        <script src="js/script_notificações.js"></script>
    
</body>
</html>