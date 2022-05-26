<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022 e 19/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Listar todos</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <header>
        Trabalho aula 7 12/05/2022 e aula 8 19/05/2022 Beriba
    </header>
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
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $codBarras = $_POST["codBarras"];
            $desc = $_POST["desc"];
            $urlImg = $_POST["urlImg"];
            $valor = $_POST["valor"];
            $qtd = $_POST["qtd"];
            $peso = $_POST["peso"];

            // Índice original para garantir que um produto repetido não seja,
            // na verdade, o mesmo produto (se não mudar o ID nem o código de barras)
            $posOriginal = $_POST["posOriginal"];

            // Dados originais para encontrar o produto
            $idOriginal = $_POST["idOriginal"];
            $codBarrasOriginal = $_POST["codBarrasOriginal"];

            $linha =  $id . ";"
                    . $nome . ";"
                    . $codBarras . ";"
                    . $desc . ";"
                    . $urlImg . ";"
                    . $valor . ";"
                    . $qtd . ";"
                    . $peso . "\n";

            $listaArquivo = vetorizaArquivo($arquivoProjeto);

            $erro = false;

            // Procura o ID e o cód. de barras novos para ver o produto já existe
            $posIDproduto = encontraNaPosicaoX($listaArquivo, $id, $posID);
            $posCodBarrasProdutob = encontraNaPosicaoX($listaArquivo, $codBarras, $posCodBarras);

            // Compara com a posição do produto pré-alteração para garantir que uma "repetição"
            // não seja, na verdade, o mesmo produto.
            if(($posIDproduto != -1 && $posIDproduto != $posOriginal) ||
               ($posCodBarrasProdutob != -1 && $posCodBarrasProdutob != $posOriginal)) {
                $erro = true;

                echo 'Esse produto já existe.';
            }

            // REGEX AQUI

            if ($erro == false) {
                if (isset($_POST["alterarID"])) {
                    $pos = encontraNaPosicaoX($listaArquivo, $idOriginal, $posID);
                }
                else {
                    $pos = encontraNaPosicaoX($listaArquivo, $codBarrasOriginal, $posCodBarras);
                }

                $arquivo = fopen($arquivoProjeto, "w");
                fwrite($arquivo, $stringCabecalho . "\n");

                $qtdItens = retornaUltimoIndice($listaArquivo);

                for ($i = 0; $i < $qtdItens; $i++) {
                    if ($i == $pos) {
                        echo "Produto alterado. ";

                        fwrite($arquivo, $linha);

                        continue;
                    }

                    $linha = "";

                    for ($j = 0; $j < $qtdColunasCabecalho; $j++) {
                        $linha = $linha . $listaArquivo[$i][$j];

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

        ?>
    <main>
</body>
</html>
