<?php 
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página inicial deslogado
    header("Location: pagina_inicial_deslogado");
    exit();
}
?>

<?php include 'navbar.php'; ?>

<main>
    <nav class="navbox">
        <h2>Buscar por categorias</h2>
        <div class="categorias">
            <a href="categoria_materiais" class="categoria">
                <img
                    src="imagens_pagina_incial/ferramentas.png"
                    class="img-icons"
                />
                <span>Materiais de construção</span>
            </a>
            <a href="categoria_fornecedores" class="categoria">
                <img
                    src="imagens_pagina_incial/usuarios-alt.png"
                    class="img-icons"
                />
                <span>Fornecedores</span>
            </a>
            <a href="categoria_contrutores" class="categoria">
                <img
                    src="imagens_pagina_incial/construcao.png"
                    class="img-icons"
                />
                <span>Construtores</span>
            </a>
            <a href="categoria_equipamentos" class="categoria">
                <img
                    src="imagens_pagina_incial/trator.png"
                    class="img-icons"
                />
                <span>Equipamentos e maquinas</span>
            </a>

            <a href="categoria_servicos" class="categoria">
                <img
                    src="imagens_pagina_incial/escavacao.png"
                    class="img-icons"
                />
                <span>Serviços</span>
            </a>
            <a href="todas_categorias" class="categoria">
                <img
                    src="imagens_pagina_incial/adicionar-aplicativos.png"
                    class="img-icons"
                />
                <span>Todas as categorias</span>
            </a>
        </div>
    </nav>
    <ul class="anuncios">
        <li class="anuncio">
            <a href="visualizacao_anuncio">
                <div class="img-container">
                    <img
                        src="./imagens_pagina_incial/BANNER-MARTINS-CONSTROI-870x400-1.jpg"
                    />
                </div>
                <div class="conteudo">
                    <div class="conteudo-topo">
                        <div class="detalhes">
                            <h2>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit.
                            </h2>
                            <div class="preco-tela-pequena">
                                R$ 7.999
                            </div>
                            <ul class="insignias">
                                <li class="insignia">
                                    <i class="bx bx-check-shield"></i>
                                    <span class="descricao"
                                        >Garantia da LAN</span
                                    >
                                </li>
                                <li class="insignia">
                                    <i class="bx bx-shopping-bag"></i>
                                    <span class="descricao"
                                        >Pague online</span
                                    >
                                </li>
                                <li class="insignia">
                                    <i class="bx bx-credit-card"></i>
                                    <span class="descricao"
                                        >Parcelamento sem juros</span
                                    >
                                </li>
                                <li class="insignia">+1</li>
                            </ul>
                        </div>
                        <div class="preco">
                            <div class="preco-original">R$ 10.500</div>
                            <h3 class="preco-atual">R$ 7.999</h3>
                            <div class="preco-parcelado">
                                10x de R$ 799,90
                            </div>
                        </div>
                    </div>
                    <div class="conteudo-inferior">
                        <div class="detalhes">
                            <i class="bx bx-map"></i>
                            <span class="localizacao"
                                >Campina Grande - PB</span
                            >
                            <span class="separador">|</span>
                            <span class="horario">Hoje, 21:25</span>
                        </div>
                        <button class="fav-button">
                            <i class="bx bx-heart"></i>
                        </button>
                    </div>
                </div>
            </a>
        </li>
        <li class="anuncio">
            <a href="visualizacao_anuncio">
                <div class="img-container">
                    <img
                        src="./imagens_pagina_incial/Banner-Landing-Page-Material-Basico-.jpg"
                    />
                </div>
                <div class="conteudo">
                    <div class="conteudo-topo">
                        <div class="detalhes">
                            <h2>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit.
                            </h2>
                            <div class="preco-tela-pequena">
                                R$ 7.999
                            </div>
                            <ul class="insignias">
                                <li class="insignia">
                                    <i class="bx bx-check-shield"></i>
                                    <span class="descricao"
                                        >Garantia da LAN</span
                                    >
                                </li>
                                <li class="insignia">
                                    <i class="bx bx-shopping-bag"></i>
                                    <span class="descricao"
                                        >Pague online</span
                                    >
                                </li>
                                <li class="insignia">
                                    <i class="bx bx-credit-card"></i>
                                    <span class="descricao"
                                        >Parcelamento sem juros</span
                                    >
                                </li>
                                <li class="insignia">+1</li>
                            </ul>
                        </div>
                        <div class="preco">
                            <div class="preco-original">R$ 10.500</div>
                            <h3 class="preco-atual">R$ 7.999</h3>
                            <div class="preco-parcelado">
                                10x de R$ 799,90
                            </div>
                        </div>
                    </div>
                    <div class="conteudo-inferior">
                        <div class="detalhes">
                            <i class="bx bx-map"></i>
                            <span class="localizacao"
                                >Campina Grande - PB</span
                            >
                            <span class="separador">|</span>
                            <span class="horario">Hoje, 21:25</span>
                        </div>
                        <button class="fav-button">
                            <i class="bx bx-heart"></i>
                        </button>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</main>
