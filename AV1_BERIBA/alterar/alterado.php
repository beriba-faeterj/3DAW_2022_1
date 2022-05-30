<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

AV1 - 3DAW Manhã - 2022.1

-->

<head>
	<title>Alterado -- AV1 - Beriba - 3DAW Manhã - 2022.1</title>
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
            $nome = $_POST["nome"];
            $matr = $_POST["matr"];
            $funcao = $_POST["funcao"];

            $listaCamposForm = array(
                $nome,
                $matr,
                $funcao
            );

            // Índice original para garantir que um funcionário repetido não seja,
            // na verdade, o mesmo funcionário (se não mudar a matrícula)
            $posOriginal = $_POST["posOriginal"];

            // Matrícula original para encontrar o funcionário
            $matrOriginal = $_POST["matrOriginal"];

            $linha =  $nome . ";"
                    . $matr . ";"
                    . $funcao . "\n";

            $listaArquivo = vetorizaArquivo($arquivoProjeto);

            $erro = false;

            // Procura a matrícula nova para ver se está disponível
            $posMatrNova = encontraNaPosicaoX($listaArquivo, $matr, $posMatr);

            // Compara com a posição do funcionário pré-alteração para garantir que uma "repetição"
            // não seja, na verdade, o mesmo funcionário.
            if(($posMatrNova != -1 && $posMatrNova != $posOriginal)) {
                $erro = true;

                echo 'Já existe um funcionário com essa matrícula.';
            }

            /*
                Não consegui abstrair em funções na biblioteca (ele não conseguia ler
                as variáveis de controle declaradas no arquivo, não aninhava múltiplos
                arquivos de biblioteca, etc.) então coloquei as validações direto aqui
                mesmo.
            */
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

            if ($erro == false) {
                $pos = encontraNaPosicaoX($listaArquivo, $matrOriginal, $posMatr);

                $arquivo = fopen($arquivoProjeto, "w");
                fwrite($arquivo, $stringCabecalho . "\n");

                $qtdFunc = retornaUltimoIndice($listaArquivo);

                for ($i = 0; $i < $qtdFunc; $i++) {
                    if ($i == $pos) {
                        echo "Funcionário alterado. ";

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
