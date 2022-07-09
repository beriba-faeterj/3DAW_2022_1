<?php

    include '../biblioteca_projeto.php';

    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_POST["excluir"], false);

    //print var_dump($obj);

    $chassis = $obj->chassis;

    $conexao = new PDO($stringConexao, $usuarioDB, $senhaDB);

    if (procuraOnibus($conexao, $chassis) == false) {
        $conexao = null;

        echo "<br>Veículo não cadastrado.";
    }
    else {
        $sql = "DELETE FROM `onibus` WHERE `chassis` = '$chassis'";

        $conexao->query($sql);

        $conexao = null;

        echo '<br>Veículo excluído com sucesso.';
    }

?>