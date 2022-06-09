<!DOCTYPE html>

<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

Aulas 10 e 11 - 02/06/2022 e 09/06/2022 - Refazer AV1 com banco de dados

-->

<head>
	<title>Incluído -- Aulas 10 e 11 - Beriba - 3DAW Manhã - 2022.1</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="incluir.php">Incluir</a></div>
        <div><a href="../alterar/alterar.php">Alterar</a></div>
        <div><a href="../listar/listar_todos.php">Listar todos</a></div>
        <div><a href="../listar/listar_um.php">Listar um</a></div>
        <div><a href="../excluir/excluir.php">Excluir</a></div>
    </nav>
    <main>
        <?php

            include '../biblioteca_projeto.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $erro = false;
                
                $nome = $_POST["nome"];
                $matr = $_POST["matr"];
                $funcao = $_POST["funcao"];
                $senha = $_POST["senha"];

                $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

                if (validaString($nome, $arrayValidacao[$posNome][$regexValidacao]) == 0) {
                    $erro = true;

                    echo $arrayValidacao[$posNome][$msgErroValidacao] . '<br>';
                }
                if (validaString($matr, $arrayValidacao[$posMatr][$regexValidacao]) == 0) {
                    $erro = true;
                    
                    echo $arrayValidacao[$posMatr][$msgErroValidacao] . '<br>';
                }

                if ($erro == false) {
                    if (procuraFuncionario($conexao, $matr) == false) {
                        $sql = "INSERT INTO `usuario`(`nome`, `matricula`, `funcao`, `senha`) VALUES ('$nome', '$matr', '$funcao', '$senha')";
    
                        $result = $conexao->query($sql);
    
                        $conexao = null;
    
                        echo 'Funcionário ' . $nome . ' inserido com sucesso.';
                    }
                    else {
                        $conexao = null;
    
                        echo 'Esse funcionário já está cadastrado.';
                    }
                }
            }

        ?>
    <main>
</body>
</html>