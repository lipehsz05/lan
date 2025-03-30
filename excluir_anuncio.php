<?php
session_start();
include 'confi.php';

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página inicial deslogado
    header("Location: pagina_inicial_deslogado.php");
    exit();
}

// Verifique se o ID do anúncio foi passado
if (isset($_GET['id'])) {
    $anuncio_id = $_GET['id'];
    $usuario_email = $_SESSION['usuario_email'];

    // Prepare a consulta para excluir o anúncio
    $sql = "DELETE FROM servicos WHERE id = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $anuncio_id, $usuario_email);

    if ($stmt->execute()) {
        // Redireciona de volta para a página de Meus Anúncios após a exclusão
        header("Location: meus_anuncios.php");
        exit();
    } else {
        echo "Erro ao excluir o anúncio.";
    }

    $stmt->close();
} else {
    echo "ID do anúncio não fornecido.";
}

$conn->close();
?>
