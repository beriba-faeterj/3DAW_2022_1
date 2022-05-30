<!DOCTYPE html>

<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

AV1 - 3DAW Manhã - 2022.1

-->

<head>
	<title>Incluído -- AV1 - Beriba - 3DAW Manhã - 2022.1</title>
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
                $nome = $_POST["nome"];
                $matr = $_POST["matr"];
                $funcao = $_POST["funcao"];

                $listaCamposForm = array(
                    $nome,
                    $matr,
                    $funcao
                );
                
                criaArquivo($arquivoProjeto, $stringCabecalho);

                $listaArquivo = vetorizaArquivo($arquivoProjeto);

                $erro = false;

                /*
                    Não consegui abstrair em funções na biblioteca (ele não conseguia ler
                    as variáveis de controle declaradas no arquivo, não aninhava múltiplos
                    arquivos de biblioteca, etc.) então coloquei as validações direto aqui
                    mesmo.
                */
                if(encontraNaPosicaoX($listaArquivo, $matr, $posMatr) != -1) {
                    $erro = true;

                    echo 'Já existe um funcionário com essa matrícula.';
                }
                else {
                    for ($i = 0; $i < $qtdColunasCabecalho; $i++) {
                        if ($listaCamposForm[$i] == "") {
                            $erro = true;

                            echo 'Campo "' . $arrayCamposForm[$i] . '" não pode estar vazio.' . '<br><br>';
                        }
                        else if (validaString($listaCamposForm[$i], $arrayValidacao[$i][$regexValidacao]) == 0) {
                            $erro = true;

                            echo $arrayValidacao[$i][$msgErroValidacao] . "<br><br>";
                        }
                    }
                }

                if ($erro == false) {
                    $arquivo = fopen($arquivoProjeto, "a") or die ("Arquivo com problema.");

                    $linha = $nome . ";"
                        . $matr . ";"
                        . $funcao .  "\n";
                
                    fwrite($arquivo, $linha);

                    echo "Funcionário adicionado. (" . $nome . "; Matrícula: " . $matr . ")";

                    fclose($arquivo);
                }
            }

        ?>
    <main>
</body>
</html>