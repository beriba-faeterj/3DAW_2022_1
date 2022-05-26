<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
''

Tema da aula: Exercício de fixação para a prova

-->

<?php

include '../biblioteca_projeto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["aaa"])) {
        echo "botao a pressionado";
    }
    if(isset($_POST["bbb"])) {
        echo "botao b pressionado";
    }

    echo "sidfjoas";

}

?>

<head>
	<title>Incluir</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body> 
    <header>
        Trabalho aula 7 12/05/2022 e aula 8 19/05/2022 Beriba
    </header>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="">Incluir</a></div>
        <div><a href="../alterar/alterar.php">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="">Listar um</a></div>
        <div><a href="">Excluir</a></div>
    </nav>
    <main>
        <form method="post" action="test2.php">
            <button type="submit" value="aaa" name="aaa">butao aaa</button>
        </form>
        <form method="post" action="test2.php">
            <button type="submit" value="bbb" name="bbb">butao bbb</button>
        </form>
    <main>
</body>
</html>