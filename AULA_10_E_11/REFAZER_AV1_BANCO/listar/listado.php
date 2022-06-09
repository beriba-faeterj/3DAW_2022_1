<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

Aulas 10 e 11 - 02/06/2022 e 09/06/2022 - Refazer AV1 com banco de dados

-->

<head>
	<title>Listado -- Aulas 10 e 11 - Beriba - 3DAW Manhã - 2022.1</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="../incluir/incluir.php">Incluir</a></div>
        <div><a href="../alterar/alterar.php">Alterar</a></div>
        <div><a href="listar_todos.php">Listar todos</a></div>
        <div><a href="listar_um.php">Listar um</a></div>
        <div><a href="../excluir/excluir.php">Excluir</a></div>
    </nav>
    <main>
    <?php

        include '../biblioteca_projeto.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $matr = $_GET["matr"];

            $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

            if (procuraFuncionario($conexao, $matr) == false) {
                echo "Funcionário não cadastrado.";

                $conexao = null;
            }
            else {
                $sql = "select * from `usuario` where `matricula` = '$matr';";

                $result = $conexao->query($sql);

                $row = $result->fetch();

                echo
                    'Nome: ' . $row['nome'] . '<br>' .
                    'Matrícula: ' . $row['matricula'] . '<br>' .
                    'Função: ' . $row['funcao'] . '<br>';
                        
                echo
                    '<br><div class="flex-container" style="justify-content: flex-start"><form method="post" action="../excluir/excluido.php">
                    <input type="hidden" name="matr" value="' . $row['matricula'] . '">
                    <input type="submit" name="excluirMatr" value="Excluir">
                    </form>
                    <form method="post" action="../alterar/alterando.php">
                    <input type="hidden" name="matr" value="' . $row['matricula'] . '">
                    <input type="submit" name="alterarMatr" value="Alterar">
                    </form></div>';

                $conexao = null;
            }
        }

        ?>
    <main>
</body>
</html>
