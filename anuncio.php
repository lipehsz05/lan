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
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
        <title>Anuncie Aqui - LAN</title>
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="css/style_anuncio.css" />
        <script src="./js/anuncio.js" defer></script>
    </head>
    <body>
        <nav>
            <div class="logo-container">
                <a href="pagina_incial">
                    <img
                    src="images_planos/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png"
                    alt="logo_lan"
                    width="150"
                    height="150"
                />
            </a>
            </div>
        </nav>
        <form action="PHP.php" method="POST" enctype="multipart/form-data">
            <section>
                <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo" required>
                <input type="text" id="cpf_cnpj" name="cpf_cnpj" placeholder="CPF/CNPJ" required>
                <input type="tel" id="telefone_whatsapp" name="telefone_whatsapp" placeholder="Telefone/WhatsApp" required>
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="text" id="endereco" name="endereco" placeholder="Endereço">
                <input type="text" id="localizacao" name="localizacao" placeholder="Localização">
                <fieldset>
                    <legend>Categorias</legend>
                    <div class="esquerda">
                        <div class="option">
                            <input type="checkbox" id="pedreiro" name="tipo_servico[]" value="Pedreiro">
                            <label for="pedreiro">Pedreiro</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="pintor" name="tipo_servico[]" value="Pintor">
                            <label for="pintor">Pintor</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="gesseiro" name="tipo_servico[]" value="Gesseiro">
                            <label for="gesseiro">Gesseiro</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="eletricista" name="tipo_servico[]" value="Eletricista">
                            <label for="eletricista">Eletricista</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="encanador" name="tipo_servico[]" value="Encanador">
                            <label for="encanador">Encanador</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="carpinteiro" name="tipo_servico[]" value="Carpinteiro">
                            <label for="carpinteiro">Carpinteiro</label>
                        </div>
                    </div>
                    <div class="direita">
                        <div class="option">
                            <input type="checkbox" id="mão-de-obra-especializada" name="tipo_servico[]" value="Mão-de-obra especializada">
                            <label for="mão-de-obra-especializada">Mão-de-obra especializada</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="serviços" name="tipo_servico[]" value="Serviços">
                            <label for="serviços">Serviços</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="fornecedores" name="tipo_servico[]" value="Fornecedores">
                            <label for="fornecedores">Fornecedores</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="construtoras" name="tipo_servico[]" value="Construtoras">
                            <label for="construtoras">Construtoras</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="aluguel-e-vendas" name="tipo_servico[]" value="Aluguel e Vendas">
                            <label for="aluguel-e-vendas">Aluguel e Vendas</label>
                        </div>
                        <div class="option">
                            <input type="checkbox" id="outros" name="tipo_servico[]" value="Outros">
                            <label for="outros">Outros</label>
                        </div>
                    </div>
                </fieldset>
            </section>
            <section>
                <h2>O que você está anunciando?</h2>
                <h3>PORTFÓLIO</h3>
                <input type="text" id="titulo" name="titulo" placeholder="Título">
                <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo">
                <textarea id="descricao" name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
                <div class="dropbox-container">
                    <div class="dropbox">
                        <input type="file" name="fotos[]" multiple>
                        <i class="bx bxs-camera"></i>
                        <h4>
                            <b>Adicione até 6 fotos</b><br>JPEG, GIF e PNG
                        </h4>
                    </div>
                    <ul></ul>
                </div>
                <p>
                    Para aumentar a qualidade limite de .
                    <a class="texto-destacado" href="#">Clique Aqui!</a>
                </p>
                <button type="submit">Enviar</button>
            </section>
        
            <footer>
                <div class="sobre-nos">
                    <span>&copy;</span>
                    <p>
                        Sobre a LAN, Termos de uso, Política de privacidade, e
                        Proteção à Propriedade Intelectual.<br />R. Manoel
                        Cardoso Palhano, 124-152 - Itararé, Campina Grande - PB,
                        58408-326
                    </p>
                </div>
                <div class="redes-sociais">
                    <a>
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a>
                        <i class="bx bxl-facebook-circle"></i>
                    </a>
                </div>
            </footer>
        </form>
    </body>
</html>
