<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

Aulas 10 e 11 - 02/06/2022 e 09/06/2022 - Refazer AV1 com banco de dados

-->

<head>
	<title>Excluído -- Aulas 10 e 11 - Beriba - 3DAW Manhã - 2022.1</title>
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
    <?php

        include '../biblioteca_projeto.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $matr = $_POST["matr"];

            $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

            if (procuraFuncionario($conexao, $matr) == false) {
                echo "Funcionário não cadastrado.";

                $conexao = null;
            }
            else {
                $sql = "DELETE FROM `usuario` WHERE `matricula` = '$matr'";

                $conexao->query($sql);

                echo 'Funcionário excluído com sucesso.';

                $conexao = null;
            }
        }

        ?>
    <main>
</body>
</html>
