<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

AV1 - 3DAW Manhã - 2022.1

-->

<head>
	<title>Excluído -- AV1 - Beriba - 3DAW Manhã - 2022.1</title>
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
            if (!file_exists($arquivoProjeto)) {
                echo "Arquivo não existe.";
            }
            else {
                $lista = vetorizaArquivo($arquivoProjeto);

                $pos = encontraNaPosicaoX($lista, $_POST["matr"], $posMatr);

                if ($pos == -1) {
                    echo "Funcionário não encontrado.";
                }
                else {
                    $arquivo = fopen($arquivoProjeto, "w");
                    fwrite($arquivo, $stringCabecalho . "\n");

                    $qtdFunc = retornaUltimoIndice($lista);

                    for ($i = 0; $i < $qtdFunc; $i++) {
                        if ($i == $pos) {
                            echo "Funcionário excluído. (Matrícula: " . $_POST["matr"] . ")";

                            continue;
                        }

                        $linha = "";

                        for ($j = 0; $j < $qtdColunasCabecalho; $j++) {
                            $linha = $linha . $lista[$i][$j];

                            if ($j < ($qtdColunasCabecalho-1)) {
                                // Se não estiver na última posição, coloque o ponto e vírgula
                                // (O último item já possui uma quebra de linha atrelada)
                                $linha = $linha . ";";
                            }
                        }

                        fwrite($arquivo, $linha);
                    }
                    
                    fclose($arquivo);
                }
            }
        }

        ?>
    <main>
</body>
</html>
