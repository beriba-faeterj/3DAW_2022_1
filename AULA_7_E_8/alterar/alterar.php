<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022 e 19/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Alterar</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <header>
        Trabalho aula 7 12/05/2022 e aula 8 19/05/2022 Beriba
    </header>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="../incluir/incluir.php">Incluir</a></div>
        <div><a href="">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="../listar/listar_um.php">Listar um</a></div>
        <div><a href="../excluir/excluir.php">Excluir</a></div>
    </nav>
    <main>
        <form method="post" action="alterando.php">
            Alterar por ID: <input type="text" name="id" value="">
            <input type="submit" name="alterarID" value="Enviar">
        </form>
        <br>
        <form method="post" action="alterando.php">
            Alterar pelo código de barras: <input type="text" name="codBarras" value="">
            <input type="submit" name="alterarCodBarras" value="Enviar">
        </form>
    <main>
</body>
</html>
