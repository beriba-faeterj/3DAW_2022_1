<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

Aulas 10 e 11 - 02/06/2022 e 09/06/2022 - Refazer AV1 com banco de dados

-->

<head>
	<title>Alterado -- Aulas 10 e 11 - Beriba - 3DAW Manhã - 2022.1</title>
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
            $erro = false;
            
            $id = $_POST['id'];
            $nome = $_POST["nome"];
            $matr = $_POST["matr"];
            $funcao = $_POST["funcao"];
            $senhaAtual = $_POST["senhaAtual"];
            $senhaNova = $_POST["senhaNova"];

            $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

            if (verificaSenha($conexao, $matr, $senhaAtual) == false) {
                $erro = true;

                echo 'Senha incorreta.';
            }
            else {
                if (validaString($nome, $arrayValidacao[$posNome][$regexValidacao]) == 0) {
                    $erro = true;

                    echo $arrayValidacao[$posNome][$msgErroValidacao] . '<br>';
                }
                if (validaString($matr, $arrayValidacao[$posMatr][$regexValidacao]) == 0) {
                    $erro = true;
                    
                    echo $arrayValidacao[$posMatr][$msgErroValidacao] . '<br>';
                }
            }

            if ($erro == false) {
                $sql = "select `id` from `usuario` where `matricula` = '$matr'";

                $result = $conexao->query($sql);

                $row = $result->fetch();

                if ($row['id'] != $id) {
                    $conexao = null;

                    echo 'Já existe um funcionário com essa matrícula.';
                }
                else {
                    $sql = "UPDATE `usuario` SET `nome`='$nome',`matricula`='$matr',`funcao`='$funcao',`senha`='$senhaNova' WHERE `id`='$id';";

                    $result = $conexao->query($sql);
                    
                    echo 'Funcionário atualizado com sucesso';

                    $conexao = null;
                }
            }
        }

        ?>
    <main>
</body>
</html>
