<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 02/06/2022

Tema da aula: Banco de dados

!!!!!!!!!!!!!! MUDAR NOME DO BANCO PRA faeterj3dawmanha

------

refazer AV1 usando arquivos

-->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $matr = $_POST["matr"];
    $funcao = $_POST["funcao"];
    $senha = $_POST["senha"];
    
    $usuarioDB = 'root';
    $senhaDB = '';

    $conexao = new PDO('mysql:host=localhost;dbname=3daw_2022_1_m', $usuarioDB, $senhaDB);

    $sql = "INSERT INTO `Usuario`(`nome`, `matricula`, `funcao`, `senha`) VALUES ('$nome','$matr','$funcao','$senha')";

    $result = $conexao->query($sql);
    
    $conexao = null;
}

?>

<head>
	<title>Incluir -- AV1 - Beriba - 3DAW Manhã - 2022.1</title>
    <link rel="stylesheet" href="formatacao.css">
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
        <form method="post" action="ex24_incluirUsuarioBanco.php">
            Nome: <input type="text" name="nome" value=""><br>
            Matrícula: <input type="text" name="matr" value=""><br>
            Função: <input type="text" name="funcao" value=""><br>
            Senha: <input type="text" name="senha" value=""><br><br>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="Limpar"><br><br>
        </form>
    <main>
</body>
</html>