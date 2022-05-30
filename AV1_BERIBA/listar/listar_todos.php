<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001

AV1 - 3DAW Manhã - 2022.1

-->

<head>
	<title>Listar todos -- AV1 - Beriba - 3DAW Manhã - 2022.1</title>
    <link rel="stylesheet" href="../formatacao.css">
</head>
<body>
    <nav class="flex-container">
        <div><a href="../index.php">Início</a></div>
        <div><a href="../incluir/incluir.php">Incluir</a></div>
        <div><a href="../alterar/alterar.php">Alterar</a></div>
        <div><a href="">Listar todos</a></div>
        <div><a href="listar_um.php">Listar um</a></div>
        <div><a href="../excluir/excluir.php">Excluir</a></div>
    </nav>
    <main>
        <?php 

            include '../biblioteca_projeto.php';

            if (!file_exists($arquivoProjeto)) {
                echo "Arquivo não existe.";
            }
            else {
                $lista = vetorizaArquivo($arquivoProjeto);
    
                // Ajusta a quantidade (sizeof não começa a contar do 0 como o vetor)
                $qtdFunc = retornaUltimoIndice($lista);
    
                for ($i = 0; $i < $qtdFunc; $i++) {
                    for ($j = 0; $j < $qtdColunasCabecalho; $j++) {
                        echo $arrayCabecalho[$j] . ": " . $lista[$i][$j] . "<br>" ;
                    }

                    echo '<br><div class="flex-container" style="justify-content: flex-start"><form method="post" action="../excluir/excluido.php">
                    <input type="hidden" name="matr" value="' . $lista[$i][$posMatr]. '">
                    <input type="submit" name="excluirMatr" value="Excluir">
                    </form>
                    <form method="post" action="../alterar/alterando.php">
                    <input type="hidden" name="matr" value="' . $lista[$i][$posMatr]. '">
                    <input type="submit" name="alterarMatr" value="Alterar">
                    </form></div>';
    
                    echo "<br><br>";
                }
            }
        ?>
    <main>
</body>
</html>
