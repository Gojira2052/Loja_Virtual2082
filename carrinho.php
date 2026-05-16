<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria Robson</title>
</head>
<body>
    <form action="carrinho.php" method="post">
    <input type="text" name="sabor" placeholder="Sabor da Pizza"><br>
    <input type="number" name="quantidade" value="1" min="1"><br>
    <input type="number" name="preco" step="0.01"><br>
    <button type="submit">Fazer pedido</button>
<!-- PHP - pedido.php - captura e processa -->
</form>
<?php
// 1. Entrada - captura os campos pelo name"" do HTML //

$sabor = $_POST['sabor']; // String vinda do Input //
$quantidade = (int) $_POST['quantidade']; // Cast para inteiro //
$preco = (float) $_POST['preco']; // Cast para casa decimal/real //

// 1.5 Verificação segura antes de processar //
if(isset($_POST['SABOR']) && $_POST['sabor'] !== ''){
    $sabor = htmlspecialchars(strip_tags($_POST['sabor']));
} else {
    $sabor = "Sabor não informado";
}

// 2. Processamento //
$total = $quantidade * $preco;
$totalFmt = (float) number_format($total, 2, ',', '.');

// 3. Saída //
echo "<h2>Pedido Recebido</h2>";
echo "Sabor: $sabor";
echo "Quantidade: $quantidade<br>";
echo "Total a pagar: <strong> $totalFmt</strong>";

?>
</body>