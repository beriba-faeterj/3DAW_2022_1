<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Listar todos</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <header>
        Trabalho aula 7 12/05/2022 Beriba
    </header>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="../incluir/incluir.php">Incluir</a></div>
        <div><a href="">Alterar</a></div>
        <div><a href="">Listar todos</a></div>
        <div><a href="">Listar um</a></div>
        <div><a href="">Excluir</a></div>
    </nav>
    <main>
        <?php

            include '../biblioteca_projeto.php';

            if (!file_exists($arquivoProjeto)) {
                echo "Arquivo não existe.";
            }
            else {
                $arquivo = fopen($arquivoProjeto, "r") or die ("Arquivo com problema.");

                $lista = array();
    
                while (!feof($arquivo)) {
                    $linha = fgets($arquivo);
    
                    array_push($lista, explode(';', $linha));
                }
    
                // Qtd. menos 1 para não contar a última linha (EOF = vazio)
                $qtdItens = sizeof($lista) - 1;
    
                for ($i = 0; $i < $qtdItens; $i++) {
                    for ($f = 0; $f < $qtdColunasCabecalho; $f++) {
                        echo $arrayCabecalho[$f] . ": " . $lista[$i][$f] . "<br>" ;
                    }
    
                    echo "<br>";
                }
    
                fclose($arquivo);
            }
        ?>
    <main>
</body>
</html>