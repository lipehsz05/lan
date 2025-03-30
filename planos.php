<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
        <title>Planos - LAN</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="css/style_planos.css" rel="stylesheet" />
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <script src="./js/planos.js" defer></script>
    </head>
    <body>
        <header>
            <nav>
                <div class="logo-container">
                    <a href="pagina_inicial">
                        <img
                        src="images_planos/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png"
                        alt="logo_lan"
                        width="130"
                        height="130"
                        />
                    </a>
                </div>
                <i id="menuButton" class='bx bx-menu'></i>
                <div class="menu">
                    <a href="#sobre-nos">Sobre nós</a>
                    <a id="feedbackButton">Feedback</a>
                    <a href="login" class="bg-azul">Login</a>
                    <a href="anuncio" class="bg-azul" >Anuncie</a>
                </div>
            </nav>
            <div class="wrapper" id="feedbackWrapper">
                <h3>Qual sua satisfação com nosso site?</h3>
                <form action="#">
                    <div class="avaliar">
                        <input type="number" name="avaliar" hidden />
                        <i class="bx bx-star star"></i>
                        <i class="bx bx-star star"></i>
                        <i class="bx bx-star star"></i>
                        <i class="bx bx-star star"></i>
                        <i class="bx bx-star star"></i>
                    </div>
                    <textarea
                        name="opinon"
                        cols="30"
                        rows="5"
                        placeholder="Deixe um Feedback..."
                    ></textarea>
                    <div class="btn-group">
                        <button type="submit" class="btn enviar">
                            Enviar
                        </button>
                        <button class="btn cancelar">Cancelar</button>
                    </div>
                </form>
            </div>
            <h1>
                Anuncie, venda e <br />
                Contrate com <span class="titulo-destacado">LAN<span>
            </h1>
            <p>
                A <span class="texto-destacado">LAN</span> é um serviço especializado em contratações, vendas e anuncios do mercado de construção civil.
            </p>
        </header>
        <section id="produtos-container">
            <h2>CONHEÇA NOSSOS <span class="titulo-destacado">PLANOS</span></h2>
            <h3>Planos que sempre vão de acordo com seu <span class="titulo-destacado">bolso!</span></h3>
            <div class="planos-wrapper">
                <div class="tabela prata">
                    <div class="preco-section">
                        <div class="preco-area">
                            <div class="area-interna">                                
                                <span class="texto">R$</span>
                                <span class="preco">9,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="nome-do-pacote"></div>
                    <div class="beneficios">
                        <li>
                            <span class="nome-da-lista">Visibilidade</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">Anúncio volta ao topo 3 vezes!</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">7 dias na galeria!</span>
                            <span class="icone cross"><i class='bx bx-x'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">7 dias na galeria premium!</span>
                            <span class="icone cross"><i class='bx bx-x'></i></span>
                        </li>
                    </div>
                    <a href="pagamento" class="sublinhado">
                        <div class="botao"><button>Destaque Aqui!</button></div>
                    </a>
                </div>
                <div class="tabela ouro">
                    <div class="preco-section">
                        <div class="preco-area">
                            <div class="area-interna">                                
                                <span class="texto">R$</span>
                                <span class="preco">19,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="nome-do-pacote"></div>
                    <div class="beneficios">
                        <li>
                            <span class="nome-da-lista">Visibilidade Melhor</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">Anúncio volta ao topo 5 vezes!</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">7 dias na galeria!</span>
                            <span class="icone cross"><i class='bx bx-x'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">7 dias na galeria premium!</span>
                            <span class="icone cross"><i class='bx bx-x'></i></span>
                        </li>
                    </div>
                    <a href="pagamento" class="sublinhado">
                        <div class="botao"><button>Destaque Aqui!</button></div>
                    </a>
                </div>
                <div class="tabela diamante">
                    <div class="preco-section">
                        <div class="preco-area">
                            <div class="area-interna">                                
                                <span class="texto">R$</span>
                                <span class="preco">48,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="nome-do-pacote"></div>
                    <div class="beneficios">
                        <li>
                            <span class="nome-da-lista">Visibilidade Total</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">Anúncio volta ao topo 3 vezes!</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">7 dias na galeria!</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                        <li>
                            <span class="nome-da-lista">7 dias na galeria premium!</span>
                            <span class="icone check"><i class='bx bx-check'></i></span>
                        </li>
                    </div>
                    <a href="pagamento" class="sublinhado">
                        <div class="botao"><button>Destaque Aqui!</button></div>
                    </a>
                </div>
            </div>
            <div class="acesso-gratuito-wrapper">
                <h3>Continue o seu acesso<br/><span class="titulo-destacado">GRATUITAMENTE</span></h3>
                <a href="pagina_inicial" class="sublinhado"><button class="acesso-gratuito-botao">Acesse</button></a>
            </div>
        </section>
        <footer>
            <div class="colunas-container">
                <div class="coluna">
                    <h2 id="sobre-nos">Sobre Nós</h2>
                    <p>Bem-vindos à <b>LAN</b>!<br/>Somos uma empresa <u>apaixonada</u> por construção civil e tecnologia, e estamos <u>comprometidos</u> em trazer uma abordagem inovadora para o setor por meio do <i>e-commerce</i>. Fundada por um grupo de profissionais experientes em engenharia civil e comércio eletrônico, nossa jornada começou com a visão de unir a conveniência do mundo online com as necessidades únicas da indústria da construção.</p>
                </div>
                <div class="coluna">
                    <h2>Contatos</h2>
                    <ul class="contatos">
                        <li>Email: email@email.com</li>
                        <li>Telefone: 3333-4444</li>
                        <li>WhatsApp: <a class="link" href="">+55 (83) 99988-7766</a></li>
                    </ul>
                </div>
                <div class="contatos">
                    <a href="pagina_inicial_deslogado">
                        <img
                        src="images_planos/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png"
                        alt="logo_lan"
                        width="300"
                        height="300"
                        />
                    </a>
                </div>
            </div>
            <div class="copyright-container">
                <span>2023 Copyright: projetolan.com</span>
            </div>
        </footer>
    </body>
</html>
