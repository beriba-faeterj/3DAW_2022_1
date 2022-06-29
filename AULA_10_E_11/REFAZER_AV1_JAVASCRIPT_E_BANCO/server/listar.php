<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_GET["matr"], false);

    $matr = $obj->matricula;

    $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

    if (procuraFuncionario($conexao, $matr) == false) {
        echo "Funcionário não cadastrado.";
    }
    else {
        $sql = "select * from `usuario` where `matricula` = '$matr' order by `id`;";

        $result = $conexao->query($sql);

        $listaFunc = $result->fetchAll();

        echo json_encode($listaFunc);
    }

    $conexao = null

?>