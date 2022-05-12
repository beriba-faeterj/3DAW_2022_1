<!DOCTYPE html>

<?php

include '../biblioteca_projeto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idFun = $_POST["idFun"];
    $cargo = $_POST["cargo"];

    //$modelo_cabecalho = "NOME;ID_FUNCIONAL;CARGO\n";

    criaArquivo($arquivoProjeto, $stringCabecalho);

    $arquivo = fopen($arquivoProjeto, "a") or die ("Arquivo com problema.");

    $linha = $nome . ";" . $idFun . ";" . $cargo . "\n";
    fwrite($arquivo, $linha);
    fclose($arquivo);

}

?>

<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Incluir</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <header>
        Trabalho aula 7 12/05/2022 Beriba
    </header>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="incluir.php">Incluir</a></div>
        <div><a href="">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="">Listar um</a></div>
        <div><a href="">Excluir</a></div>
    </nav>
    <main>
        Funcionário <?php echo $nome . " (ID Funcional: " . $idFun . ") "; ?> incluído.
    <main>
</body>
</html>