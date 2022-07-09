<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_GET["chassis"], false);

    $chassis = $obj->chassis;

    $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

    if (procuraOnibus($conexao, $chassis) == false) {
        echo "Veículo não cadastrado.";
    }
    else {
        $sql = "select * from `onibus` where `chassis` = '$chassis' order by `chassis`;";

        $result = $conexao->query($sql);

        $listaFunc = $result->fetchAll();

        echo json_encode($listaFunc);
    }

    $conexao = null

?>