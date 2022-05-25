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
        <div><a href="../listar/listar_um.php">Listar um</a></div>
        <div><a href="../excluir/excluir.php">Excluir</a></div>
    </nav>
    <main>
        <form method="post" action="incluido.php">
            ID: <input type="text" name="id" value=""><br>
            Nome: <input type="text" name="nome" value=""><br>
            Código de barras: <input type="text" name="codBarras" value=""><br>
            Descrição: <input type="text" name="desc" value=""><br>
            URL da imagem: <input type="text" name="urlImg" value=""><br>
            Valor: <input type="text" name="valor" value=""><br>
            Quantidade: <input type="text" name="qtd" value=""><br>
            Peso: <input type="text" name="peso" value=""><br><br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="Limpar"><br><br>
        </form>
    <main>
</body>
</html>