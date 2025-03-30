<?php
include 'confi.php';
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: pagina_inicial_deslogado.php");
    exit();
}

// Obtenha os dados do usuário logado
$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT email, celular FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if (!$usuario) {
    echo "Nenhum registro encontrado para o usuário logado.";
    exit();
}

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifique se os dados do formulário correspondem aos do usuário logado
    if ($_POST['email'] !== $usuario['email']) {
        echo "O email fornecido não corresponde ao do usuário logado.";
        exit();
    }
    if ($_POST['telefone'] !== $usuario['telefone']) {
        echo "O telefone fornecido não corresponde ao do usuário logado.";
        exit();
    }

    // Inicializa um array para os campos e valores preenchidos
    $campos = [];
    $valores = [];

    // Campos do formulário a serem processados
    $campos_formulario = [
        'titulo' => 's',
        'subtitulo' => 's',
        'nome_completo' => 's',
        'cpf_cnpj' => 's',
        'telefone_whatsapp' => 's',
        'email' => 's',
        'endereco' => 's',
        'localizacao' => 's',
        'descricao' => 's',
    ];

    // Loop pelos campos do formulário
    foreach ($campos_formulario as $campo => $tipo) {
        if (isset($_POST[$campo]) && is_string($_POST[$campo])) {
            $valor_limpo = htmlspecialchars(trim($_POST[$campo]));
            if (!empty($valor_limpo)) {
                $campos[] = $campo;
                $valores[] = $valor_limpo;
            }
        }
    }

    // Verifica se o campo 'tipo_servico' está presente e é um array
    if (isset($_POST['tipo_servico']) && is_array($_POST['tipo_servico'])) {
        $tipo_servico = implode(", ", $_POST['tipo_servico']);
        $campos[] = 'tipo_servico';
        $valores[] = $tipo_servico;
    }

    // Verifica se há campos preenchidos
    if (!empty($campos)) {
        // Monta a consulta SQL dinamicamente
        $sql = sprintf(
            "INSERT INTO servicos (%s) VALUES (%s)",
            implode(", ", $campos),
            implode(", ", array_fill(0, count($valores), '?'))
        );

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $conn->error);
        }

        // Define os tipos para bind_param
        $tipos = implode("", array_map(fn($campo) => $campos_formulario[$campo] ?? 's', $campos));

        $stmt->bind_param($tipos, ...$valores);

        if ($stmt->execute()) {
            $ultimo_id = $conn->insert_id;

            // Upload de fotos, se houver
            if (!empty($_FILES['fotos']['name'][0])) {
                $upload_dir = 'uploads/';
                $uploaded_files = [];

                // Cria o diretório, se não existir
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                foreach ($_FILES['fotos']['tmp_name'] as $key => $tmp_name) {
                    $file_name = $_FILES['fotos']['name'][$key];
                    $file_tmp = $_FILES['fotos']['tmp_name'][$key];

                    // Valida se o arquivo é uma imagem
                    $image_info = getimagesize($file_tmp);
                    if ($image_info !== false) {
                        $new_file_name = uniqid($ultimo_id . '_') . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
                        $upload_path = $upload_dir . $new_file_name;

                        if (move_uploaded_file($file_tmp, $upload_path)) {
                            $uploaded_files[] = $new_file_name;
                        }
                    }
                }

                // Atualiza o registro no banco com os nomes das fotos
                if (!empty($uploaded_files)) {
                    $foto_names = implode(', ', $uploaded_files);
                    $sql_update = "UPDATE servicos SET fotos = ? WHERE id = ?";
                    $stmt_update = $conn->prepare($sql_update);

                    if ($stmt_update) {
                        $stmt_update->bind_param("si", $foto_names, $ultimo_id);
                        $stmt_update->execute();
                        $stmt_update->close();
                    } else {
                        echo "Erro ao atualizar fotos: " . $conn->error;
                    }
                }
            }

            // Redireciona para a página de sucesso com uma mensagem
            header("Location: sucess?msg=sucesso");
            exit();
        } else {
            echo "Erro ao cadastrar serviço: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Nenhum campo foi preenchido.";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
