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
        <div><a href="">Alterar</a></div>
        <div><a href="listar_todos.php">Listar todos</a></div>
        <div><a href="listar_um.php">Listar um</a></div>
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

                if(isset($_POST["procurarID"]))
                    $pos = encontraNaPosicaoX($lista, $_POST["id"], $posID);
                else
                    $pos = encontraNaPosicaoX($lista, $_POST["codBarras"], $posCodBarras);

                if ($pos == -1) {
                    echo "Produto não encontrado.";
                }
                else {
                    for ($i = 0; $i < $qtdColunasCabecalho; $i++)
                        echo $arrayCabecalho[$i] . ": " . $lista[$pos][$i] . "<br>";
                }
            }
        }

        ?>
    <main>
</body>
</html>
