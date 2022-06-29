<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $func = json_decode($_POST["excluir"], false);

    $matr = $func->matricula;

    $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

    if (procuraFuncionario($conexao, $matr) == false) {
        $conexao = null;

        echo "<br>Funcionário não cadastrado.";
    }
    else {
        $sql = "DELETE FROM `usuario` WHERE `matricula` = '$matr'";

        $conexao->query($sql);

        $conexao = null;

        echo '<br>Funcionário excluído com sucesso.';
    }

?>