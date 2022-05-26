<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022 e 19/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Excluído</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <header>
        Trabalho aula 7 12/05/2022 e aula 8 19/05/2022 Beriba
    </header>
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

                if (isset($_POST["excluirID"])) {
                    $pos = encontraNaPosicaoX($lista, $_POST["id"], $posID);
                }
                else {
                    $pos = encontraNaPosicaoX($lista, $_POST["codBarras"], $posCodBarras);
                }

                if ($pos == -1) {
                    echo "Produto não encontrado.";
                }
                else {
                    $arquivo = fopen($arquivoProjeto, "w");
                    fwrite($arquivo, $stringCabecalho . "\n");

                    $qtdItens = retornaUltimoIndice($lista);

                    for ($i = 0; $i < $qtdItens; $i++) {
                        if ($i == $pos) {
                            echo "Produto excluído. ";

                            if (isset($_POST["excluirID"]))
                                echo "(ID: " . $_POST["id"] . ")";
                            else
                                echo "(COD. BARRAS: " . $_POST["codBarras"] . ")";

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
