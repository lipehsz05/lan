<?php
session_start();
include 'confi.php';

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: pagina_inicial_deslogado");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Obtenha os dados do usuário logado
$sql = "SELECT nome_usuario, nome, sobrenome, email, celular, imagem_perfil FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
$stmt->close();

if ($usuario) {
    $nome_usuario = htmlspecialchars($usuario['nome_usuario'] ?? '');
    $nome = htmlspecialchars($usuario['nome'] ?? '');
    $sobrenome = htmlspecialchars($usuario['sobrenome'] ?? '');
    $email = htmlspecialchars($usuario['email'] ?? '');
    $celular = htmlspecialchars($usuario['celular'] ?? '');
    $imagemPerfilBase64 = $usuario['imagem_perfil'];
} else {
    $nome_usuario = $nome = $sobrenome = $email = $celular = '';
    echo "Usuário não encontrado.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES['imagem_perfil']) && $_FILES['imagem_perfil']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['imagem_perfil']['tmp_name'];
        $imageType = mime_content_type($imageTmpPath);

        // Converta a imagem para JPEG ou PNG
        if ($imageType == 'image/png') {
            $image = imagecreatefrompng($imageTmpPath);
            ob_start();
            imagejpeg($image, null, 100);
            $imageData = ob_get_clean();
        } elseif ($imageType == 'image/jpeg') {
            $image = imagecreatefromjpeg($imageTmpPath);
            ob_start();
            imagejpeg($image, null, 100);
            $imageData = ob_get_clean();
        } else {
            echo "Formato de imagem não suportado. Apenas PNG e JPEG são permitidos.";
            exit();
        }

        if ($imageData === false) {
            echo "Erro ao converter a imagem.";
            exit();
        }

        $imageBase64 = base64_encode($imageData);

        // Atualize a imagem de perfil no banco de dados
        $sql = "UPDATE usuarios SET imagem_perfil = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $imageBase64, $usuario_id);

        if ($stmt->execute()) {
            echo "Imagem de perfil atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a imagem de perfil: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['resetar_imagem'])) {
        $imagem_padrao = file_get_contents('caminho/para/imagem/padrao.jpg'); // Substitua pelo caminho da imagem padrão
        $sql = "UPDATE usuarios SET imagem_perfil = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $imagem_padrao, $usuario_id);

        if ($stmt->execute()) {
            echo "Imagem de perfil resetada com sucesso!";
        } else {
            echo "Erro ao resetar a imagem de perfil: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['nome_usuario']) && isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['celular'])) {
        $nome_usuario = strtolower(trim($_POST['nome_usuario']));
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];

        $sql = "UPDATE usuarios SET nome_usuario = ?, nome = ?, sobrenome = ?, email = ?, celular = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $nome_usuario, $nome, $sobrenome, $email, $celular, $usuario_id);

        if ($stmt->execute()) {
            echo "Dados do perfil atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar os dados do perfil: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['alterar_senha'])) {
        $senha_atual = $_POST['senha_atual'];
        $nova_senha = $_POST['nova_senha'];

        // Verifique a senha atual
        $sql = "SELECT senha FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if (password_verify($senha_atual, $usuario['senha'])) {
            if ($senha_atual !== $nova_senha) {
                // Atualize a senha para a nova senha
                $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
                $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $nova_senha_hash, $usuario_id);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Senha alterada com sucesso!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Erro ao alterar a senha: " . $stmt->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-warning'>A nova senha não pode ser igual à senha atual.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Senha atual incorreta.</div>";
        }
    }
    // Redirecionar após o processamento do formulário
    header("Location: perfil.php");
    exit();
}

function formatarTelefone($numero) {
    $numeroFormatado = preg_replace("/[^0-9]/", "", $numero);
    if (strlen($numeroFormatado) == 11) {
        return sprintf("(%s) %s-%s", substr($numeroFormatado, 0, 2), substr($numeroFormatado, 2, 5), substr($numeroFormatado, 7));
    }
    return $numero; // Retorna o número original se não for possível formatar
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens_pagina_incial/LOGO_LAN_SERVICOS_DE_CONSTRUCAO2.png">
    <title>Perfil - LAN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_perfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="perfil_form">
    <?php include 'navbar.php'; ?>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Configurações da Conta
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Geral</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Mudar senha</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Informações</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Redes sociais</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Conexões</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img id="imagemPerfil" src="data:image/jpeg;base64,<?php echo $imagemPerfilBase64; ?>" alt="Imagem de Perfil" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <div class="d-flex align-items-center button-container">
                                        <form method="post" enctype="multipart/form-data">
                                            <label class="btn btn-outline-primary mr-2">
                                                Enviar nova foto
                                                <input type="file" class="account-settings-fileinput" name="imagem_perfil" accept=".png, .jpeg, .jpg" onchange="previewImagem(event)">
                                            </label>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                            <button type="submit" name="resetar_imagem" class="btn btn-reset">Resetar</button>
                                        </form>
                                        <i id="mode_icon" class="fa-solid fa-moon ml-2"></i>
                                    </div>
                                    <div class="text-light small mt-1">Permitido PNG e JPEG</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label class="form-label">Nome de Usuário</label>
                                        <input type="text" class="form-control mb-1" name="nome_usuario" value="<?php echo $nome_usuario; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nome</label>
                                        <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sobrenome</label>
                                        <input type="text" class="form-control" name="sobrenome" value="<?php echo $sobrenome; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Celular</label>
                                        <input type="text" class="form-control" name="celular" value="<?php echo formatarTelefone($celular); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar Informações</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <form method="post">
                                    <div class="form-group">
                                        <label class="form-label">Senha Atual</label>
                                        <input type="password" class="form-control mb-1" name="senha_atual" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nova Senha</label>
                                        <input type="password" class="form-control mb-1" name="nova_senha" required>
                                    </div>
                                    <button type="submit" name="alterar_senha" class="btn btn-primary">Salvar Alterações</button>
                                </form>
                                <?php
                                if (isset($_POST['alterar_senha'])) {
                                    $senha_atual = $_POST['senha_atual'];
                                    $nova_senha = $_POST['nova_senha'];

                                    // Verifique a senha atual
                                    $sql = "SELECT senha FROM usuarios WHERE id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $usuario_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $usuario = $result->fetch_assoc();

                                    if (password_verify($senha_atual, $usuario['senha'])) {
                                        if ($senha_atual !== $nova_senha) {
                                            // Atualize a senha para a nova senha
                                            $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
                                            $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("si", $nova_senha_hash, $usuario_id);

                                            if ($stmt->execute()) {
                                                echo "<div class='alert alert-success'>Senha alterada com sucesso!</div>";
                                            } else {
                                                echo "<div class='alert alert-danger'>Erro ao alterar a senha: " . $stmt->error . "</div>";
                                            }
                                        } else {
                                            echo "<div class='alert alert-warning'>A nova senha não pode ser igual à senha atual.</div>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>Senha atual incorreta.</div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Data de nascimento</label>
                                    <input type="text" class="form-control" value="20 de setembro de 1999">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">País</label>
                                    <select class="paises">
                                        <option value="Afeganistão">Afeganistão</option>
                                        <option value="África do Sul">África do Sul</option>
                                        <option value="Albânia">Albânia</option>
                                        <option value="Alemanha">Alemanha</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antilhas Holandesas">Antilhas Holandesas</option>
                                        <option value="Antárctida">Antárctida</option>
                                        <option value="Antígua e Barbuda">Antígua e Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Argélia">Argélia</option>
                                        <option value="Armênia">Armênia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Arábia Saudita">Arábia Saudita</option>
                                        <option value="Austrália">Austrália</option>
                                        <option value="Áustria">Áustria</option>
                                        <option value="Azerbaijão">Azerbaijão</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrein">Bahrein</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benim">Benim</option>
                                        <option value="Bermudas">Bermudas</option>
                                        <option value="Bielorrússia">Bielorrússia</option>
                                        <option value="Bolívia">Bolívia</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brasil" selected="selected">Brasil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgária">Bulgária</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Butão">Butão</option>
                                        <option value="Bélgica">Bélgica</option>
                                        <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
                                        <option value="Cabo Verde">Cabo Verde</option>
                                        <option value="Camarões">Camarões</option>
                                        <option value="Camboja">Camboja</option>
                                        <option value="Canadá">Canadá</option>
                                        <option value="Catar">Catar</option>
                                        <option value="Cazaquistão">Cazaquistão</option>
                                        <option value="Chade">Chade</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Chipre">Chipre</option>
                                        <option value="Colômbia">Colômbia</option>
                                        <option value="Comores">Comores</option>
                                        <option value="Coreia do Norte">Coreia do Norte</option>
                                        <option value="Coreia do Sul">Coreia do Sul</option>
                                        <option value="Costa do Marfim">Costa do Marfim</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croácia">Croácia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Dinamarca">Dinamarca</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Egito">Egito</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
                                        <option value="Equador">Equador</option>
                                        <option value="Eritreia">Eritreia</option>
                                        <option value="Escócia">Escócia</option>
                                        <option value="Eslováquia">Eslováquia</option>
                                        <option value="Eslovênia">Eslovênia</option>
                                        <option value="Espanha">Espanha</option>
                                        <option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
                                        <option value="Estados Unidos">Estados Unidos</option>
                                        <option value="Estônia">Estônia</option>
                                        <option value="Etiópia">Etiópia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Filipinas">Filipinas</option>
                                        <option value="Finlândia">Finlândia</option>
                                        <option value="França">França</option>
                                        <option value="Gabão">Gabão</option>
                                        <option value="Gana">Gana</option>
                                        <option value="Geórgia">Geórgia</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Granada">Granada</option>
                                        <option value="Gronelândia">Gronelândia</option>
                                        <option value="Grécia">Grécia</option>
                                        <option value="Guadalupe">Guadalupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernesei">Guernesei</option>
                                        <option value="Guiana">Guiana</option>
                                        <option value="Guiana Francesa">Guiana Francesa</option>
                                        <option value="Guiné">Guiné</option>
                                        <option value="Guiné Equatorial">Guiné Equatorial</option>
                                        <option value="Guiné-Bissau">Guiné-Bissau</option>
                                        <option value="Gâmbia">Gâmbia</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungria">Hungria</option>
                                        <option value="Ilha Bouvet">Ilha Bouvet</option>
                                        <option value="Ilha de Man">Ilha de Man</option>
                                        <option value="Ilha do Natal">Ilha do Natal</option>
                                        <option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
                                        <option value="Ilha Norfolk">Ilha Norfolk</option>
                                        <option value="Ilhas Cayman">Ilhas Cayman</option>
                                        <option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
                                        <option value="Ilhas Cook">Ilhas Cook</option>
                                        <option value="Ilhas Feroé">Ilhas Feroé</option>
                                        <option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
                                        <option value="Ilhas Malvinas">Ilhas Malvinas</option>
                                        <option value="Ilhas Marshall">Ilhas Marshall</option>
                                        <option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
                                        <option value="Ilhas Salomão">Ilhas Salomão</option>
                                        <option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
                                        <option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
                                        <option value="Ilhas Åland">Ilhas Åland</option>
                                        <option value="Indonésia">Indonésia</option>
                                        <option value="Inglaterra">Inglaterra</option>
                                        <option value="Índia">Índia</option>
                                        <option value="Iraque">Iraque</option>
                                        <option value="Irlanda do Norte">Irlanda do Norte</option>
                                        <option value="Irlanda">Irlanda</option>
                                        <option value="Irã">Irã</option>
                                        <option value="Islândia">Islândia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Itália">Itália</option>
                                        <option value="Iêmen">Iêmen</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japão">Japão</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordânia">Jordânia</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Lesoto">Lesoto</option>
                                        <option value="Letônia">Letônia</option>
                                        <option value="Libéria">Libéria</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lituânia">Lituânia</option>
                                        <option value="Luxemburgo">Luxemburgo</option>
                                        <option value="Líbano">Líbano</option>
                                        <option value="Líbia">Líbia</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedônia">Macedônia</option>
                                        <option value="Madagáscar">Madagáscar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldivas">Maldivas</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Malásia">Malásia</option>
                                        <option value="Marianas Setentrionais">Marianas Setentrionais</option>
                                        <option value="Marrocos">Marrocos</option>
                                        <option value="Martinica">Martinica</option>
                                        <option value="Mauritânia">Mauritânia</option>
                                        <option value="Maurícia">Maurícia</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Moldávia">Moldávia</option>
                                        <option value="Mongólia">Mongólia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Moçambique">Moçambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="México">México</option>
                                        <option value="Mônaco">Mônaco</option>
                                        <option value="Namíbia">Namíbia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Nicarágua">Nicarágua</option>
                                        <option value="Nigéria">Nigéria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Noruega">Noruega</option>
                                        <option value="Nova Caledônia">Nova Caledônia</option>
                                        <option value="Nova Zelândia">Nova Zelândia</option>
                                        <option value="Níger">Níger</option>
                                        <option value="Omã">Omã</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestina">Palestina</option>
                                        <option value="Panamá">Panamá</option>
                                        <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
                                        <option value="Paquistão">Paquistão</option>
                                        <option value="Paraguai">Paraguai</option>
                                        <option value="País de Gales">País de Gales</option>
                                        <option value="Países Baixos">Países Baixos</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Polinésia Francesa">Polinésia Francesa</option>
                                        <option value="Polônia">Polônia</option>
                                        <option value="Porto Rico">Porto Rico</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Quirguistão">Quirguistão</option>
                                        <option value="Quênia">Quênia</option>
                                        <option value="Reino Unido">Reino Unido</option>
                                        <option value="República Centro-Africana">República Centro-Africana</option>
                                        <option value="República Checa">República Checa</option>
                                        <option value="República Democrática do Congo">República Democrática do Congo</option>
                                        <option value="República do Congo">República do Congo</option>
                                        <option value="República Dominicana">República Dominicana</option>
                                        <option value="Reunião">Reunião</option>
                                        <option value="Romênia">Romênia</option>
                                        <option value="Ruanda">Ruanda</option>
                                        <option value="Rússia">Rússia</option>
                                        <option value="Saara Ocidental">Saara Ocidental</option>
                                        <option value="Saint Martin">Saint Martin</option>
                                        <option value="Saint-Barthélemy">Saint-Barthélemy</option>
                                        <option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
                                        <option value="Samoa Americana">Samoa Americana</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
                                        <option value="Santa Lúcia">Santa Lúcia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serra Leoa">Serra Leoa</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Singapura">Singapura</option>
                                        <option value="Somália">Somália</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Suazilândia">Suazilândia</option>
                                        <option value="Sudão">Sudão</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Suécia">Suécia</option>
                                        <option value="Suíça">Suíça</option>
                                        <option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
                                        <option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
                                        <option value="São Marino">São Marino</option>
                                        <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                                        <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
                                        <option value="Sérvia">Sérvia</option>
                                        <option value="Síria">Síria</option>
                                        <option value="Tadjiquistão">Tadjiquistão</option>
                                        <option value="Tailândia">Tailândia</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tanzânia">Tanzânia</option>
                                        <option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
                                        <option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Toquelau">Toquelau</option>
                                        <option value="Trinidad e Tobago">Trinidad e Tobago</option>
                                        <option value="Tunísia">Tunísia</option>
                                        <option value="Turcas e Caicos">Turcas e Caicos</option>
                                        <option value="Turquemenistão">Turquemenistão</option>
                                        <option value="Turquia">Turquia</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Ucrânia">Ucrânia</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Uruguai">Uruguai</option>
                                        <option value="Uzbequistão">Uzbequistão</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vaticano">Vaticano</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietname">Vietname</option>
                                        <option value="Wallis e Futuna">Wallis e Futuna</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                        <option value="Zâmbia">Zâmbia</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" class="form-control" value="<?php echo formatarTelefone($celular); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/user">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="card-body">
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                            class="ion ion-md-close"></i> Remover</a>
                                    <i class="ion ion-logo-google text-google"></i>
                                    Você está conectado com o Google:
                                </h5>
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="f9979498818e9c9595b994989095d79a9694">[email&#160;protected]</a>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-twitter">Conectado com
                                    <strong>Twitter</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-facebook">Conectado com
                                    <strong>Facebook</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-instagram">Conectado com
                                    <strong>Instagram</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <!-- Removido o botão de cancelar -->
        </div>
    </div>

    <style>
    .button-container {
        display: flex;
        align-items: center;
        gap: 10px; /* Espaço entre os botões e o ícone */
    }
    </style>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/perfil.js"></script>

    <script>
    function previewImagem(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('imagemPerfil');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
</body>

</html>