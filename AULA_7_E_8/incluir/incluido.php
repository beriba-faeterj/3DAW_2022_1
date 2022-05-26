<!DOCTYPE html>

<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022 e 19/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Incluir</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <header>
        Trabalho aula 7 12/05/2022 e aula 8 19/05/2022 Beriba
    </header>
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
                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $codBarras = $_POST["codBarras"];
                $desc = $_POST["desc"];
                $urlImg = $_POST["urlImg"];
                $valor = $_POST["valor"];
                $qtd = $_POST["qtd"];
                $peso = $_POST["peso"];

                $listaCamposForm = array(
                    $id,
                    $nome,
                    $codBarras,
                    $desc,
                    $urlImg,
                    $valor,
                    $qtd,
                    $peso
                );

                criaArquivo($arquivoProjeto, $stringCabecalho);

                $listaArquivo = vetorizaArquivo($arquivoProjeto);

                $erro = false;

                if(encontraNaPosicaoX($listaArquivo, $id, $posID) != -1 ||
                   encontraNaPosicaoX($listaArquivo, $codBarras, $posCodBarras) != -1) {
                    $erro = true;

                    echo 'Esse produto já existe.';
                }
                // else {
                //     for ($i = 0; $i < $qtdItens; $i++) {
                //         if (validaString($listaCamposForm[$i], $arrayValidacao[$i][$regexValidacao]) == 0) {
                //             $erro = true;

                //             echo $arrayValidacao[$i][$msgErroValidacao];
                //         }
                //     }
                // }

                if ($erro == false) {
                    $arquivo = fopen($arquivoProjeto, "a") or die ("Arquivo com problema.");

                    $linha = $id . ";"
                        . $nome . ";"
                        . $codBarras . ";"
                        . $desc . ";"
                        . $urlImg . ";"
                        . $valor . ";"
                        . $qtd . ";"
                        . $peso . "\n";
                
                    fwrite($arquivo, $linha);

                    echo "Produto incluído. (" . $nome . "; Cód. barras: " . $codBarras . ")";

                    fclose($arquivo);
                }
            }

        ?>
    <main>
</body>
</html>