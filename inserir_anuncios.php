<?php
include 'confi.php'; // Inclua seu arquivo de configuração de banco de dados

// Consulta para obter todos os serviços e usuários associados
$sql = "SELECT s.titulo, s.subtitulo, s.descricao, s.tipo_servico, s.fotos, s.data_cadastro, s.localizacao, u.id AS usuario_id, CONCAT(u.nome, ' ', u.sobrenome) AS nome_completo, u.nome_usuario, u.email, u.celular
        FROM servicos s
        JOIN usuarios u ON s.email = u.email";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($anuncio = $result->fetch_assoc()) {
        $usuario_id = $anuncio['usuario_id'];
        $nome_completo = $anuncio['nome_completo'];
        $usuario_nome = $anuncio['nome_usuario'];
        $email = $anuncio['email'];
        $celular = $anuncio['celular'];
        $titulo = $anuncio['titulo'];
        $subtitulo = $anuncio['subtitulo'];
        $descricao = $anuncio['descricao'];
        $tipo_servico = $anuncio['tipo_servico'];
        $fotos = $anuncio['fotos'];

        // Inserir um anúncio para cada serviço
        $insert_sql = "INSERT INTO anuncios (usuario_id, nome_completo, usuario, email, telefone, titulo, subtitulo, descricao, categoria, imagem)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("isssssssss", $usuario_id, $nome_completo, $usuario_nome, $email, $celular, $titulo, $subtitulo, $descricao, $tipo_servico, $fotos);
        $stmt->execute();
    }
    echo "Anúncios inseridos com sucesso para todos os serviços.";
} else {
    echo "Nenhum serviço encontrado.";
}

$conn->close();
?>
