<?php
    session_start();
    include 'confi.php';

    $sql = "SELECT nome_completo, usuario, email, titulo, subtitulo, descricao, categoria, imagem, 
    TIMESTAMPDIFF(MINUTE, data_criacao, NOW()) AS minutos_passados FROM anuncios ORDER BY data_criacao DESC LIMIT 5";
    $result = $conn->query($sql);
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style_pagina_inicial.css" />
    <script
        type="text/javascript"
        src="js/custom_pagina_inicial.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="shortcut icon"
        href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png" />
    <link rel="stylesheet" href="./css/style_navbar.css" />
    <title>Página Inicial</title>
</head>

<body>

    <?php include 'navbar.php'; ?>
    <!--Começo Anuncio-->

    <din class="content">
        <div class="slides">
            <input
                class="input1"
                type="radio"
                name="slide"
                id="slide1"
                checked />
            <input class="input1" type="radio" name="slide" id="slide2" />
            <input class="input1" type="radio" name="slide" id="slide3" />
            <input class="input1" type="radio" name="slide" id="slide4" />
            <input class="input1" type="radio" name="slide" id="slide5" />

            <div class="slide s1">
                <img
                    src="imagens_pagina_incial/Banner-Landing-Page-Material-Basico-.jpg"
                    alt="" />
            </div>

            <div class="slide">
                <img
                    src="imagens_pagina_incial/BANNER-MARTINS-CONSTROI-870x400-1.jpg"
                    alt="" />
            </div>

            <div class="slide">
                <img src="imagens_pagina_incial/banner.jpg" alt="" />
            </div>

            <div class="slide">
                <img src="imagens_pagina_incial/BANNER2.jpg" alt="" />
            </div>

            <div class="slide">
                <img
                    src="imagens_pagina_incial/img-full-banner.jpg"
                    alt="" />
            </div>

            <div class="navegation">
                <label class="bar" for="slide1" id="bar1"></label>
                <label class="bar" for="slide2" id="bar2"></label>
                <label class="bar" for="slide3" id="bar3"></label>
                <label class="bar" for="slide4" id="bar4"></label>
                <label class="bar" for="slide5" id="bar5"></label>
            </div>
        </div>
    </din>

    <!--Fim Anuncio-->

    <div class="icones">
        <div class="circulos c1">
            <a href="#t-materiais-contrução">
                <img
                    src="imagens_pagina_incial/ferramentas.png"
                    alt=""
                    class="img-icons"
                    id="img-icons-1" />
                <p class="text-icons">Materiais de construção</p>
            </a>
        </div>

        <div class="circulos c2">
            <a href="#t-fornecedores">
                <img
                    src="imagens_pagina_incial/usuarios-alt.png"
                    alt=""
                    class="img-icons"
                    id="img-icons-2" />
                <p class="text-icons">Fornecedores</p>
            </a>
        </div>

        <div class="circulos c3">
            <a href="#t-construtores">
                <img
                    src="imagens_pagina_incial/construcao.png"
                    alt=""
                    class="img-icons"
                    id="img-icons-3" />
                <p class="text-icons">Construtores</p>
            </a>
        </div>

        <div class="circulos c4">
            <a href="#t-equipamentos-maquinas">
                <img
                    src="imagens_pagina_incial/trator.png"
                    alt=""
                    class="img-icons"
                    id="img-icons-4" />
                <p class="text-icons">Equipamentos e maquinas</p>
            </a>
        </div>

        <div class="circulos c5">
            <a href="#t-mao-de-obra">
                <img
                    src="imagens_pagina_incial/carrinho-de-pessoa.png"
                    alt=""
                    class="img-icons"
                    id="img-icons-5" />
                <p class="text-icons">Mão de obra especializadas</p>
            </a>
        </div>

        <div class="circulos c6">
            <a href="#t-servicos">
                <img
                    src="imagens_pagina_incial/escavacao.png"
                    alt=""
                    class="img-icons"
                    id="img-icons-6" />
                <p class="text-icons">Serviços</p>
            </a>
        </div>

        <div class="circulos c7">
            <a href="todas_categorias">
                <img
                    src="imagens_pagina_incial/adicionar-aplicativos.png"
                    alt=""
                    class="img-icons"
                    id="img-icons-7" />
                <p class="text-icons">Todas as categorias</p>
            </a>
        </div>
    </div>

    

    <!--Começo Anuncios Recentes-->

    <div class="titulo-anuncios">Anúncios recentes</div>
    <div class="conteudo">
        <?php while ($anuncio = $result->fetch_assoc()) { ?>
            <div class="conteudo-anuncio">
                <h1 class="preço"><?php echo $anuncio['titulo']; ?></h1>
                <p class="paragrafos">Descrição: <?php echo $anuncio['descricao']; ?></p>
                <p class="paragrafos">Postado há: <?php echo $anuncio['minutos_passados']; ?> minutos</p>
                <img src="<?php echo $anuncio['imagem']; ?>" alt="" class="img-anuncios">
            </div>
        <?php } ?>
    </div>

    

    <!--Fim Anuncios Recentes-->

    <!--Começo Anuncios Patrocinados-->

    <div class="titulo-anuncio-patrocinados">Anuncios patrocinados</div>
    <div class="conteudo">
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 1</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 2</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 3</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 4</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 5</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 6</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 7</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 8</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 9</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 10</p>
            </a>
        </div>
    </div>

    <div class="scroll-buttons">
        <button class="scroll-button scroll-left">&lt;</button>
        <button class="scroll-button scroll-right">&gt;</button>
    </div>

    <!--Fim Anuncios Patrocinados-->

    <!--Começo Serviços-->

    <div class="titulo-anuncio-patrocinados" id="t-servicos">Serviços</div>
    <div class="conteudo">
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 1</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 2</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 3</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 4</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 5</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 6</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 7</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 8</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 9</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 10</p>
            </a>
        </div>
    </div>

    <div class="scroll-buttons">
        <button class="scroll-button scroll-left">&lt;</button>
        <button class="scroll-button scroll-right">&gt;</button>
    </div>

    <!--Fim Serviços-->

    <!--Começo Mão de obra especializadas-->

    <div class="titulo-anuncio-patrocinados" id="t-mao-de-obra">
        Mão de obra especializadas
    </div>
    <div class="conteudo">
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 1</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 2</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 3</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 4</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 5</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 6</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 7</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 8</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 9</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 10</p>
            </a>
        </div>
    </div>

    <div class="scroll-buttons">
        <button class="scroll-button scroll-left">&lt;</button>
        <button class="scroll-button scroll-right">&gt;</button>
    </div>

    <!--Fim Mão de obra especializadas-->

    <!--Começo Equipamentos e maquinas-->

    <div class="titulo-anuncio-patrocinados" id="t-equipamentos-maquinas">
        Equipamentos e maquinas
    </div>
    <div class="conteudo">
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 1</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 2</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 3</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 4</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 5</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 6</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 7</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 8</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 9</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 10</p>
            </a>
        </div>
    </div>

    <div class="scroll-buttons">
        <button class="scroll-button scroll-left">&lt;</button>
        <button class="scroll-button scroll-right">&gt;</button>
    </div>

    <!--Fim Equipamentos e maquinass-->

    <!--Começo Construtores-->

    <div class="titulo-anuncio-patrocinados" id="t-construtores">
        Construtores
    </div>
    <div class="conteudo">
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 1</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 2</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 3</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 4</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 5</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 6</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 7</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 8</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 9</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 10</p>
            </a>
        </div>
    </div>

    <div class="scroll-buttons">
        <button class="scroll-button scroll-left">&lt;</button>
        <button class="scroll-button scroll-right">&gt;</button>
    </div>

    <!--Fim Construtores-->

    <!--Começo Fornecedores-->

    <div class="titulo-anuncio-patrocinados" id="t-fornecedores">
        Fornecedores
    </div>
    <div class="conteudo">
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 1</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 2</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 3</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 4</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 5</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 6</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 7</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 8</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 9</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 10</p>
            </a>
        </div>
    </div>

    <div class="scroll-buttons">
        <button class="scroll-button scroll-left">&lt;</button>
        <button class="scroll-button scroll-right">&gt;</button>
    </div>

    <!--Fim Fornecedores-->

    <!--Começo Materiais de Contrução-->

    <div class="titulo-anuncio-patrocinados" id="t-materiais-contrução">
        Materiais de Contrução
    </div>
    <div class="conteudo">
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 1</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 2</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 3</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 4</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 5</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 6</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 7</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 8</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 9</p>
            </a>
        </div>
        <div class="conteudo-anuncio">
            <a href="visualizacao_anuncio"><img
                    src="img_cad/undraw_under_construction_-46-pa.svg"
                    alt=""
                    class="img-anuncios" />
                <h1 class="preço">399R$</h1>
                <p class="paragrafos">Conteúdo 10</p>
            </a>
        </div>
    </div>

    <div class="scroll-buttons">
        <button class="scroll-button scroll-left">&lt;</button>
        <button class="scroll-button scroll-right">&gt;</button>
    </div>

    <!--Fim Materiais de Contrução-->

    <!--Começo menu inferior-->

    <!--Fim menu inferior-->

    <section class="rodape" id="sobre_nos_id">
        <div class="container">
            <div class="coluna">
                <h2>Sobre nós:</h2>

                <p>Bem-vindos à LAN!</p>

                <p>
                    Somos uma empresa apaixonada por construção civil e
                    tecnologia, e estamos comprometidos em trazer uma
                    abordagem inovadora para o setor por meio do e-commerce.
                    Fundada por um grupo de profissionais experientes em
                    engenharia civil e comércio eletrônico, nossa jornada
                    começou com a visão de unir a conveniência do mundo
                    online com as necessidades únicas da indústria da
                    construção.
                </p>
            </div>

            <div class="coluna">
                <a href="pagina_incial"><img
                        src="images_planos/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png"
                        alt="logo" /></a>
            </div>
        </div>
    </section>
</body>

</html>