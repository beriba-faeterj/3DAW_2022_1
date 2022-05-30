<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

AV1 - 3DAW Manhã - 2022.1

-->

<head>
	<title>Alterando -- AV1 - Beriba - 3DAW Manhã - 2022.1</title>
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
            if (!file_exists($arquivoProjeto)) {
                echo "Arquivo não existe.";
            }
            else {
                $lista = vetorizaArquivo($arquivoProjeto);

                $posFunc = encontraNaPosicaoX($lista, $_POST["matr"], $posMatr);

                if ($posFunc == -1) {
                    echo "Funcionário não encontrado.";
                }
                else {
                    echo '
                        <form method="post" action="alterado.php">
                            Nome: <input type="text" name="nome" value="' . $lista[$posFunc][$posNome] . '"><br>
                            Matrícula: <input type="text" name="matr" value="' . $lista[$posFunc][$posMatr] . '"><br>
                            Função: <input type="text" name="funcao" value="' . $lista[$posFunc][$posFuncao] . '"><br>
                            <input type="hidden" name="posOriginal" value="' . $posFunc . '">
                            <input type="hidden" name="matrOriginal" value="' . $lista[$posFunc][$posMatr] . '">
                            <input type="submit" name="alterar" value="Alterar"><br><br>
                        </form>
                    ';
                }
            }
        }

        ?>
    <main>
</body>
</html>
