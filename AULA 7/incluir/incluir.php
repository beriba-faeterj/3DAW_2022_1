<!DOCTYPE html>
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
        <div><a href="">Incluir</a></div>
        <div><a href="">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="">Listar um</a></div>
        <div><a href="">Excluir</a></div>
    </nav>
    <main>
        <form method="post" action="incluido.php">
            Nome: <input type="text" name="nome" value=""><br>
            ID Funcional: <input type="text" name="idFun" value=""><br>
            Cargo: <input type="text" name="cargo" value=""><br><br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="Limpar"><br><br>
        </form>
    <main>
</body>
</html>