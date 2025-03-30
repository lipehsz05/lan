<?php
include 'confi.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: pagina_inicial_deslogado.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT imagem_perfil FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();


$imagemPerfilBase64 = $usuario['imagem_perfil'];
?>

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
        <script src="./js/navbar.js" defer></script>
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
                    <button>
                        <img src="data:image/jpeg;base64,<?php echo $imagemPerfilBase64; ?>" />
                        <span>Meu Perfil</span>
                        <i class="bx bx-chevron-down"></i>
                    </button>
                    <ul class="menu">
                        <li>
                            <a href="perfil">
                                <img
                                    src="./imagens_pagina_incial/do-utilizador.png"
                                    class="nav-logos"
                                />
                                <span>Meu Cadastro</span></a
                            >
                        </li>
                        <li>
                            <a href="notificacoes">
                                <img
                                    src="./imagens_pagina_incial/sino.png"
                                    class="nav-logos"
                                />
                                <span>Notificações</span>
                            </a>
                        </li>
                        <li>
                            <a href="meus_anuncios" class="meus-anuncios">
                                <img
                                    src="./imagens_pagina_incial/aplicativos.png"
                                    class="nav-logos"
                                />
                                <span>Meus Anúncios</span>
                            </a>
                        </li>
                        <li>
                            <a href="planos" class="planos">
                                <img
                                    src="./imagens_pagina_incial/pasta.png"
                                    class="nav-logos"
                                />
                                <span>Planos</span>
                            </a>
                        </li>
                        <li>
                            <a href="sair" class="sair">
                                <img
                                    src="./imagens_pagina_incial/sair.png"
                                    class="nav-logos"
                                />
                                <span>Sair</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="anuncio" class="anunciar">Anunciar</a></li>
            </ul>
        </nav>
    </body>
</html>
