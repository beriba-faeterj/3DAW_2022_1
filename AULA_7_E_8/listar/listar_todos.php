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
                $qtdItens = retornaUltimoIndice($lista);
    
                for ($i = 0; $i < $qtdItens; $i++) {
                    for ($j = 0; $j < $qtdColunasCabecalho; $j++) {
                        echo $arrayCabecalho[$j] . ": " . $lista[$i][$j] . "<br>" ;
                    }

                    echo '<form method="post" action="../excluir/excluido.php">
                    <input type="hidden" name="id" value="' . $lista[$i][$posID]. '">
                    <input type="submit" name="excluirID" value="Excluir">
                    </form>';
    
                    echo "<br><br>";
                }
            }
        ?>
    <main>
</body>
</html>
