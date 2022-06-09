<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

Aulas 10 e 11 - 02/06/2022 e 09/06/2022 - Refazer AV1 com banco de dados

-->

<head>
	<title>Excluir -- Aulas 10 e 11 - Beriba - 3DAW Manhã - 2022.1</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="../incluir/incluir.php">Incluir</a></div>
        <div><a href="../alterar/alterar.php">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="../listar/listar_um.php">Listar um</a></div>
        <div><a href="excluir.php">Excluir</a></div>
    </nav>
    <main>
        <form method="post" action="excluido.php">
            Matrícula: <input type="text" name="matr" value="">
            <input type="submit" name="excluirMatr" value="Excluir">
        </form>
    <main>
</body>
</html>
