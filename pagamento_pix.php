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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_pagamento.css">
    <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
    <title>Pagamentos</title>
</head>
<body>

<div class="container">

    <form action="">

        <div class="row">

            <div class="col">

                <h3 class="title">Endereço da Cobrança</h3>

                <div class="inputBox">
                    <span>Nome Completo :</span>
                    <input type="text" placeholder="Emanuel Petrovski">
                </div>
                <div class="inputBox">
                    <span>E-mail :</span>
                    <input type="email" placeholder="exemplo@gmail.com">
                </div>
                <div class="inputBox">
                    <span>Endereço :</span>
                    <input type="text" placeholder="Rua, Número">
                </div>
                <div class="inputBox">
                    <span>Cidade :</span>
                    <input type="text" placeholder="São Paulo">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Estado :</span>
                        <input type="text" placeholder="São Paulo">
                    </div>
                    <div class="inputBox">
                        <span>CEP :</span>
                        <input type="text" placeholder="11025-152">
                    </div>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>País :</span>
                        <input type="text" placeholder="Brasil">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Pagamento</h3>

                <div class="inputBox">
                    <span>Cartões aceitos :</span>
                    <a href="pagamento" ><img src="imgs_pagamento/cartoes.png" alt=""></a>
                </div>
                <div class="inputBox">
                    <span>Pix :</span>
                    <img src="imgs_pagamento/pix.png"  alt="">
                </div>
                <div class="inputBox">
                    <span>Nome do Titular :</span>
                    <input type="text" placeholder="Emanuel P Azevedo">
                </div>
                <div class="inputBox">
                    <span>CPF do Titular :</span>
                    <input type="number" placeholder="000.111.222-33">
                </div>

            </div>
    
        </div>

        <input type="submit" value="Prosseguir compra" class="submit-btn">

    </form>

</div>    
    
</body>
</html>