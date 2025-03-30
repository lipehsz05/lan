<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Padronizando Navbar</title>
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="./css/style_navbar.css" />
    </head>
    <body>
        <nav class="navbar">
            <a href="pagina_inicial" class="logo">
                <img
                    src="./imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png"
                    width="76"
                    height="76"
                    alt="Logo LAN"
                />
            </a>
            <div class="busca">
                <input type="text" placeholder="Buscar" />
                <button>
                    <i class="bx bx-search"></i>
                </button>
            </div>
            <ul class="nav-menu">
                <li class="navbar-button">
                    <a href="planos">
                        <img
                            src="./imagens_pagina_incial/pasta.png"
                            class="nav-logos"
                        />
                        <span>Planos</span>
                    </a>
                </li>
                <li class="navbar-button">
                    <a href="meus_anuncios">
                        <img
                            src="./imagens_pagina_incial/aplicativos.png"
                            class="nav-logos"
                        />
                        <span>Meus Anúncios</span>
                    </a>
                </li>
                <li class="navbar-button">
                    <a href="notificacoes">
                        <img
                            src="./imagens_pagina_incial/sino.png"
                            class="nav-logos"
                        />
                        <span>Notificações</span>
                    </a>
                </li>
                <li class="meu-perfil-container">
                    <a href="login" class="entrar">Entrar</a>
                </li>
                <li><a href="login" class="anunciar">Anunciar</a></li>
            </ul>
        </nav>
    </body>
</html>
