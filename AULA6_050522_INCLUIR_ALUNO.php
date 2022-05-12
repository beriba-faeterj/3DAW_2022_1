<!DOCTYPE html>

<!--

Nome: Lucas Beriba
Matrícula: 2110478300001
Data: 05/05/2022

Tema da aula: Arquivos

-->

<?php

// OBS: fiz sem requisição de servidor sem querer kkk já aprendi e fiz certo na prova e no outro trabalho
// mas esse ta funcionando de qualquer forma

$modelo_cabecalho = "NOME;MATRICULA;EMAIL\n";

// Exercício 4 - Criar arquivo caso não exista
function criaArquivo ($nomeArquivo, $cabecalho) {
    if (!file_exists($nomeArquivo)) {
        $arquivo = fopen($nomeArquivo, "w");
        fwrite($arquivo, $cabecalho);
        fclose($arquivo);
    }

    return;
}

// Exercício 1, 2 - Escrever (append) no arquivo
if (isset($_POST['enviar'])) {
    $nome = $_POST["nome"];
    $matr = $_POST["matricula"];
    $email = $_POST["email"];

    //$modelo_cabecalho = "NOME;MATRICULA;EMAIL\n";

    criaArquivo("Alunos.txt", $modelo_cabecalho);

    $arquivo = fopen("Alunos.txt", "a") or die ("Arquivo com problema.");

    $linha = $nome . ";" . $matr . ";" . $email . "\n";
    fwrite($arquivo, $linha);
    fclose($arquivo);
}

// Exercício 3 - Passar para outro arquivo
else if (isset($_POST['outro'])) {
    $nomeNovoArquivo = $_POST["nomeArquivoTroca"];

    $arquivoAluno = fopen("Alunos.txt", "r") or die ("Arquivo com problema.");
    $novoArquivo = fopen($nomeNovoArquivo, "w") or die ("Arquivo com problema.");
    
    while (!feof($arquivoAluno))
        fwrite($novoArquivo, fgets($arquivoAluno));

    fclose($arquivoAluno);
    fclose($novoArquivo);
}

?>

<html>
<head>
    <title>AULA6_050522_INCLUIR_ALUNO</title>
</head>
<body>
    <h1>Formulário de inclusão de aluno</h1>

    <form method="post" action="AULA6_050522_INCLUIR_ALUNO.php">
        Nome: <input type="text" name="nome" value=""><br>
        Matrícula: <input type="text" name="matricula" value=""><br>
        Email: <input type="text" name="email" value=""><br><br>
        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="reset" value="Limpar"><br><br>
        
        <input type="submit" name="outro" value="Passar lista para outro arquivo">
        <input type="text" name="nomeArquivoTroca" placeholder="Digite o nome do arquivo"><br><br>
        <input type="submit" name="verificar" value="Verificar se arquivo existe">
        <input type="text" name="nomeArquivoVerifica" placeholder="Digite o nome do arquivo"><br><br>
        <input type="submit" name="listar" value="Listar alunos"><br><br>
    </form>

    <?php

        // Exercício ? (extra?) - Verificar se existe
        if (isset($_POST["verificar"])) {
            $nomeArquivo = $_POST["nomeArquivoVerifica"];

            if (!file_exists($nomeArquivo))
                echo "Arquivo não existe";

            else
                echo "Arquivo existe";
        }

        // Exercício ? (extra?) - Listar
        else if (isset($_POST["listar"])) {
            $arquivoAluno = fopen("Alunos.txt", "r") or die ("Arquivo com problema.");

            fgets($arquivoAluno);
            
            while (!feof($arquivoAluno))
                echo fgets($arquivoAluno) . "<br>";

            fclose($arquivoAluno);
        }

    ?>
</body>
</html>
