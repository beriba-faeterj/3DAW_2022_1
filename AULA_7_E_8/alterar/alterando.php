<!DOCTYPE html>
<html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 12/05/2022 e 19/05/2022

Tema da aula: Exercício de fixação para a prova

-->

<head>
	<title>Alterando</title>
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
            if (!file_exists($arquivoProjeto)) {
                echo "Arquivo não existe.";
            }
            else {
                $lista = vetorizaArquivo($arquivoProjeto);

                if (isset($_POST["alterarID"])) {
                    $posProduto = encontraNaPosicaoX($lista, $_POST["id"], $posID);
                }
                else {
                    $posProduto = encontraNaPosicaoX($lista, $_POST["codBarras"], $posCodBarras);
                }

                if ($posProduto == -1) {
                    echo "Produto não encontrado.";
                }
                else {
                    echo '
                        <form method="post" action="alterado.php">
                            ID: <input type="text" name="id" value="' . $lista[$posProduto][$posID] . '"><br>
                            Nome: <input type="text" name="nome" value="' . $lista[$posProduto][$posNome] . '"><br>
                            Código de barras: <input type="text" name="codBarras" value="' . $lista[$posProduto][$posCodBarras] . '"><br>
                            Descrição: <input type="text" name="desc" value="' . $lista[$posProduto][$posDescricao] . '"><br>
                            URL da imagem: <input type="text" name="urlImg" value="' . $lista[$posProduto][$posURL] . '"><br>
                            Valor: <input type="text" name="valor" value="' . $lista[$posProduto][$posValor] . '"><br>
                            Quantidade: <input type="text" name="qtd" value="' . $lista[$posProduto][$posQtd] . '"><br>
                            Peso: <input type="text" name="peso" value="' . $lista[$posProduto][$posPeso] . '"><br><br>
                            <input type="hidden" name="posOriginal" value="' . $posProduto . '">
                            <input type="hidden" name="idOriginal" value="' . $lista[$posProduto][$posID] . '">
                            <input type="hidden" name="codBarrasOriginal" value="' . $lista[$posProduto][$posCodBarras] . '">
                            <input type="submit" name="alterar" value="Alterar"><br><br>
                        </form>
                    ';
                }
            }
        }

        ?>
    <main>
</body>
</html>
