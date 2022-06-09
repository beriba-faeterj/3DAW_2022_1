<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

Aulas 10 e 11 - 02/06/2022 e 09/06/2022 - Refazer AV1 com banco de dados

-->

<head>
	<title>Alterando -- Aulas 10 e 11 - Beriba - 3DAW Manhã - 2022.1</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="../incluir/incluir.php">Incluir</a></div>
        <div><a href="alterar.php">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="../listar/listar_um.php">Listar um</a></div>
        <div><a href="../excluir/excluir.php">Excluir</a></div>
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
                $sql = "select * from `usuario` where `matricula` = '$matr'";

                $result = $conexao->query($sql);

                $row = $result->fetch();

                echo '
                    <form method="post" action="alterado.php">
                        Nome: <input type="text" name="nome" value="' . $row['nome'] . '"><br>
                        Matrícula: <input type="text" name="dummy" value="' . $row['matricula'] . '" disabled><br>
                        Função: <input type="text" name="funcao" value="' . $row['funcao'] . '"><br>
                        Senha Atual: <input type="password" name="senhaAtual" value=""><br>
                        Nova Senha: <input type="password" name="senhaNova" value=""><br>
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <input type="hidden" name="matr" value="' . $row['matricula'] . '">
                        <input type="submit" name="alterar" value="Alterar"><br><br>
                    </form>
                ';

                $conexao = null;
            }
        }

        ?>
    <main>
</body>
</html>
