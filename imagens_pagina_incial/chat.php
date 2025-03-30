<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chat.css">
    <script type="text/javascript" src="js/chat.js"></script>
    <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
    <title>chat</title>
</head>
<body>

    <!--Barra topo-->
    <div class="menu-topo">
        <ul>
            <a href="pagina_incial.html">
                <img src="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png" alt="Logo LAN" class="logo"></a>
                <div class="espacamento"></div>

                <!--Conteudo barra topo Lista-->
        <li><img src="imagens_pagina_incial/pasta.png" alt="" class="img-pasta"><a href="planos.html" class="a-1">Planos</a></li>
        <li><img src="imagens_pagina_incial/aplicativos.png" alt="" class="img-anuncio"><a href="anuncio.html" class="a-1"><span class="nowrap">Meus anuncios</span></a></li>
        <li><img src="imagens_pagina_incial/pontos-de-comentario.png" alt="" class="img-chat"><a href="chat.html" class="a-1">Chat</a></li>
        <li><img src="imagens_pagina_incial/sino.png" alt="" class="img-sino"><a href="#notificacao" class="a-1">Notificações</a></li>
                <!--Fim Conteudo Lista-->
        
            <button class="perfil-btn" onclick="toggleInformacoes()">
              <img src="imagens_pagina_incial/pngwing.com.png" class="profile">
              Seu Nome
              <img src="imagens_pagina_incial/angulo-para-baixo.png" alt="Seta 1" class="seta-1">
              <img src="imagens_pagina_incial/angulo-para-baixo (1).png" alt="Seta 2" class="seta-2">
            </button>    
          
          <div class="informacoes" id="informacoes">
            <a href="perfil.html"><div class="cadastro">
                <img src="imagens_pagina_incial/do-utilizador.png" alt="Cadastro">
                <p>Meu cadastro</p>
            </div></a>

            <div class="not-chat">
                <a href="$"><div class="sino">
                <img src="imagens_pagina_incial/sino.png" alt="Sino">
                <p id="notifi-p">Notificações</p>
                </div></a>

                <a href="chat.html"><div class="chat-id">
                <img src="imagens_pagina_incial/pontos-de-comentario.png" alt="Chat">
                <p id="chat-p">Chat</p>
                </div></a>
            </div>

            <div class="outros">
                <a href="anuncio.html"><div class="apps">
                <img src="imagens_pagina_incial/aplicativos.png" alt="Anuncios">
                <p>Meus anuncios</p>
                </div></a>

                <a href="planos.html"><div class="planos-id">
                <img src="imagens_pagina_incial/pasta.png" alt="Planos">
                <p>Plano proficional</p>
                </div></a>
            </div>
          </div>
         
          
        <a href="anuncio.html"><button class="anunciar-btn">Anunciar</button></a>
        </ul>
    </div>
    <!--Fim Barra topo-->

    <!--Começo anuncio-->

    <div class="anuncio">

    </div>

    <!--Fim anuncio-->

    <!--Começo lado esquerdo-->

    <div class="lado-esquerdo">
    <div class="topo-esquerdo">
        <h1>Mensagens</h1>
        
        <div class="conteudo">
            <!--Começo perfis-->
            <a href="#"><div class="perfil-principal">
                <img src="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png" alt="Perfil">
                <h1>Vem ser LAN</h1>
                <p>Chat para duvidas</p>
            </div></a>

            <div class="perfil-usuarios">
                <img src="imagens_pagina_incial/pngwing.com.png" alt="Perfil">
                <h1>Nome e Sobrenome</h1>
                <p>Profissão</p>
            </div>

            <div class="perfil-usuarios">
                <img src="imagens_pagina_incial/pngwing.com.png" alt="Perfil">
                <h1>Nome e Sobrenome</h1>
                <p>Profissão</p>
            </div>

            <div class="perfil-usuarios">
                <img src="imagens_pagina_incial/pngwing.com.png" alt="Perfil">
                <h1>Nome e Sobrenome</h1>
                <p>Profissão</p>
            </div>

            <div class="perfil-usuarios">
                <img src="imagens_pagina_incial/pngwing.com.png" alt="Perfil">
                <h1>Nome e Sobrenome</h1>
                <p>Profissão</p>
            </div>

            <!--Fim perfis-->
        </div>
    </div>
</div>
    <!--Fim lado esquerdo-->

    <!--Começo Lado Direito-->

    <div class="ladodireito">
        <div class="sem-conteudo">
            <div class="chat conteudo-1"></div>
            <div class="chat conteudo-2"></div>
            <div class="chat conteudo-3"></div>
            <div class="chat conteudo-4"></div>
            <div class="chat conteudo-5"></div>
        <div class="barra-fim">
            <div class="chat conteudo-6"></div>
            <div class="chat conteudo-7"></div>
            <div class="chat conteudo-8"></div>
            <div class="chat conteudo-9"></div>
            <div class="chat conteudo-10"></div>
        </div>
    </div>

        <div class="com-conteudo" id="">
            <div class="barra-inicio">
                <p>Vem ser LAN</p>
            </div>
            <div class="content">
                <div class="aviso">
                    <img src="imagens_pagina_incial/aviso-de-triangulo.png" alt="aviso" class="img-aviso">
                    <span>Espaço para tirar dúvidas de forma rapida e pratica. Escolha uma das opções abaixo para mais informações.</span>
                </div>
        <div class="btns">
                <button id="btn-1" class="btn" data-target="mensagem-1">Preço e Pagamento</button>
                <button id="btn-2" class="btn" data-target="mensagem-2">Segurança e Privacidade</button>
                <button id="btn-3" class="btn" data-target="mensagem-3">Suporte ao Cliente</button>
                <button id="btn-4" class="btn" data-target="mensagem-4">Quais são as opções de pagamento aceitas?</button>
                <button id="btn-5" class="btn" data-target="mensagem-5">Posso cancelar meu pedido?</button>
                <button id="btn-6" class="btn" data-target="mensagem-6">É seguro fazer compras neste site?</button>
                <button id="btn-7" class="btn" data-target="mensagem-7">Qual é a política de reembolso?</button>
                <button id="btn-8" class="btn" data-target="mensagem-8">Quais são os termos de uso do site?</button>
                <button id="btn-9" class="btn" data-target="mensagem-9">O site oferece cupons de desconto?</button>
            </div>
            <div class="mensagens">
                <div id="mensagem-1">Mensagem para Preço e Pagamento</div>
                <div id="mensagem-2">Mensagem para Segurança e Privacidade</div>
                <div id="mensagem-3">Mensagem para Suporte ao Cliente</div>
                <div id="mensagem-4">Mensagem para Quais opção de pagamento</div>
                <div id="mensagem-5">Mensagem para Posso cancelar meu pedido?</div>
                <div id="mensagem-6">Mensagem para É seguro fazer compras neste site?</div>
                <div id="mensagem-7">Mensagem para Qual é a política de reembolso?</div>
                <div id="mensagem-8">Mensagem Quais são os termos de uso do site?</div>
                <div id="mensagem-9">Mensagem para O site oferece cupons de desconto?</div>
            </div>
        </div>
    </div>

    <!--Fim Lado Direito-->

</body>
</html>