<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022 e 19/05/2022

Tema da aula: Exercício de fixação para a prova

-->

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

<?php

print_r(preg_match('/\d+(?:[,]\d{1,2})?/', ',2'));

// url: /(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|jpeg|png)/

// fazer 1 funcao que recebe a string com o padrao e usar regex pra tudo?

?>

        <form method="post" action="test2.php">
            <button type="submit" value="aaa" name="aaa">butao aaa</button>
        </form>
        <form method="post" action="test2.php">
            <button type="submit" value="bbb" name="bbb">butao bbb</button>
        </form>
    <main>
</body>
</html>