<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

AV1 - 3DAW Manhã - 2022.1

-->

<head>
	<title>Incluir -- AV1 - Beriba - 3DAW Manhã - 2022.1</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
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
            Nome: <input type="text" name="nome" value=""><br>
            Matrícula: <input type="text" name="matr" value=""><br>
            Função: <input type="text" name="funcao" value=""><br><br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="Limpar"><br><br>
        </form>
    <main>
</body>
</html>