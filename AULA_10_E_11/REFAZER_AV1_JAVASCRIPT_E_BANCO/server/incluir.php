<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $func = json_decode($_POST["incluir"], false);

    $erro = false;
    
    $nome = $func->nome;
    $matr = $func->matricula;
    $funcao = $func->funcao;
    $senha = $func->senha;

    $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

    if (validaString($nome, $arrayValidacao[$posNome][$regexValidacao]) == 0) {
        $erro = true;

        echo $arrayValidacao[$posNome][$msgErroValidacao] . '<br>';
    }
    if (validaString($matr, $arrayValidacao[$posMatr][$regexValidacao]) == 0) {
        $erro = true;
        
        echo $arrayValidacao[$posMatr][$msgErroValidacao] . '<br>';
    }

    if ($erro == false) {
        if (procuraFuncionario($conexao, $matr) == false) {
            $sql = "INSERT INTO `usuario`(`nome`, `matricula`, `funcao`, `senha`) VALUES ('$nome', '$matr', '$funcao', '$senha')";

            $result = $conexao->query($sql);

            $conexao = null;

            echo '<br>Funcionário ' . $nome . ' inserido com sucesso.';
        }
        else {
            $conexao = null;

            echo '<br>Esse funcionário já está cadastrado.';
        }
    }

?>