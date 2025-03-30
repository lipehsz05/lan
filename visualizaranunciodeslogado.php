<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página inicial deslogado
    header("Location: pagina_inicial_deslogado");
    exit();
}
?>

<!DOCTYPE html>
<lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="shortcut icon"
            href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png"
        />
        <link rel="stylesheet" href="css/style_visualizacao_anuncio.css" />
        <title>Visualização do Anúncio - LAN</title>
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="./css/style_navbar.css" />
        <script src="./js/navbar.js" defer></script>
        <script src="js/script_visualizacaoDoAnuncio.js" defer></script>
    </head>

    <?php include 'navbar.php'; ?>

    <div class="anuncio"></div>

    <div class="visualizacao">
        <h2>Pré-visualização do Anúncio</h2>
        <p>Pintura decorativa para escritório</p>

        <img
            src="img_visualização/home_office_escritorio.jpg"
            alt="escritório"
        />

        <p>
            Este trabalho foi realizado no escritório de uma cliente que
            estava trabalhando de home office e queria deixar seu ambiente
            minimalista, mais aconchegante e agradável.
        </p>

        <button>CONFIRMAR</button>
    </div>
</body>
</html>
