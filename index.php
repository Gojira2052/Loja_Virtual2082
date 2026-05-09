<?php
require 'config.php';

// Buscar produtos no banco de dados

$tmt = $pdo->query("SELECT * FROM produtos ORDER BY criado_em DESC");
$produtos = $stmt->fetchAll();

// Lógica simples para adicionar ao carrinho

if (isset($_GET['adicionar'])) {
    $id_produto = (int)$_GET['adicionar'];
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
}
// Adicionar o ID ao carrinho

$_SESSION['carrinho'][] = $id_produto;
header("Location: index.php?sucesso=1");
    exit;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Loja PHP - Ecommerce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Minha Loja PHP</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="carrinho.php">
                Carrinho (<?php echo isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0; ?>)
            </a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="cadastro_produto.php">Cadastrar Produto</a>
            <a href="logout.php">Sair (<?php echo $_SESSION['usuario_nome']; ?>)</a>
            <?php else: ?>
            <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>