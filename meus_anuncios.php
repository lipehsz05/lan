<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página inicial deslogado
    header("Location: pagina_inicial_deslogado");
    exit();
}

if (isset($_SESSION['usuario_email'])) {
    $usuario_email = $_SESSION['usuario_email'];
} else {
    echo "<p>Você não tem anúncios ativos no momento.</p>";
    $usuario_email = null; // Define como null para evitar erros na consulta
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style_meusAnuncios.css" />
    <link rel="stylesheet" href="./css/style_navbar.css" />
    <script src="./js/navbar.js" defer></script>
    <title>Meus Anúncios - LAN</title>
    <script src="js/script_meusAnuncios.js" defer></script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!--Fim Barra topo-->

    <!--Começo anuncio-->
    <div class="anuncio"></div>
    <!--Fim anuncio-->

    <div class="container">
        <div class="anuncios">
            <header>
                <div class="meus_anuncios">
                    <h1>Meus Anúncios Ativos</h1>
                    <span id="num_anuncios"></span>
                </div>
            </header>
            <main>
                <?php
                include 'confi.php';

                // Consulta para buscar anúncios ativos do usuário
                $sql = "SELECT s.id, s.titulo, s.nome_completo, s.descricao, s.localizacao, TIMESTAMPDIFF(MINUTE, s.data_cadastro, NOW()) AS minutos_passados, s.fotos 
                        FROM servicos s
                        JOIN usuarios u ON s.email = u.email
                        WHERE u.email = ?";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("s", $usuario_email);
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($anuncio = $result->fetch_assoc()) {
                                $titulo = htmlspecialchars($anuncio['titulo']);
                                $descricao = htmlspecialchars($anuncio['descricao']);
                                $localizacao = htmlspecialchars($anuncio['localizacao']);
                                $minutos_passados = $anuncio['minutos_passados'];
                                $fotos = explode(',', $anuncio['fotos']);
                                $foto_principal = trim($fotos[0]);
                                
                                // Calcular tempo de postagem
                                if ($minutos_passados < 60) {
                                    $tempo_de_postagem = "$minutos_passados minutos atrás";
                                } elseif ($minutos_passados < 1440) { // Menos de 24 horas
                                    $horas_passadas = floor($minutos_passados / 60);
                                    $tempo_de_postagem = "$horas_passadas horas atrás";
                                } else {
                                    $dias_passados = floor($minutos_passados / 1440);
                                    $horas_restantes = floor(($minutos_passados % 1440) / 60);
                                    $tempo_de_postagem = "$dias_passados dia(s) e $horas_restantes horas atrás";
                                }

                                $anuncio_id = $anuncio['id']; // Supondo que há um campo 'id' para o anúncio

                                echo "<div class='conteudo-anuncio actived'>";
                                echo "<a href='visualizacao_anuncio'>";
                                echo "<img src='uploads/$foto_principal' alt='Imagem do Serviço' class='img-anuncios'/>";
                                echo "<div class='descricao'>";
                                echo "<h3 class='paragrafos'>$titulo</h3>";
                                echo "<p>$descricao</p>";
                                echo "<p id='tempo_de_postagem'>$tempo_de_postagem</p>";
                                echo "<p id='localizacao'>📍 $localizacao</p>";
                                echo "</div></a>";
                                echo "<button onclick='confirmarExclusao($anuncio_id)' id='apagar_anuncio'>Excluir anúncio ? 🗑</button>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>Você não tem anúncios ativos no momento.</p>";
                        }
                    } else {
                        echo "Erro na execução da consulta: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Erro na preparação da consulta: " . $conn->error;
                }

                $conn->close();
                ?>
            </main>
        </div>
    </div>
</body>
<script>
    function confirmarExclusao(anuncioId) {
        if (confirm('Você realmente deseja excluir este anúncio?')) {
            window.location.href = 'excluir_anuncio.php?id=' + anuncioId;
        }
    }
</script>
</html>